<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Discos extends MX_Controller {

	function __construct(){
		if (!$this->ion_auth->logged_in() AND !$this->facebook->is_authenticated()){
			redirect('/auth/login/');
		} 
		else{
			parent::__construct();
			$this->load->library('Grocery_crud');
		}

		if (ENVIRONMENT == 'development') {
			$this->output->enable_profiler(TRUE);
		}
	}
	

	###################################################
	
	public function _example_output($output = null)	{
		
		$this->load->view('layout',(array)$output);
	}

	###################################################
	#
	# DISCOS
	#
	
	public function index(){
		$crud = new Grocery_crud();
		$crud->set_table('album');
		$crud->set_subject('Album');

		$crud->display_as('albu_titulo','Titulo')
			->display_as('albu_anio','Año')
			->display_as('inte_id','Interprete')
			->display_as('albu_foto','Portada')
			->display_as('albu_alias','Alias')
			->display_as('albu_visitas','Visitas')
			->display_as('albu_habilitado','Estado');

		$crud->set_relation('inte_id','interprete','inte_nombre');
		$crud->set_relation_n_n('canciones', 'album_cancion', 'canciones', 'albu_id', 'canc_id', 'canc_titulo');
		//$crud->set_relation_n_n('interpretes', 'album_interprete', 'interprete', 'albu_id', 'inte_id', 'inte_nombre');	  
		//
	  	$crud->required_fields('albu_foto','albu_titulo','albu_anio');
		$crud->set_field_upload('albu_foto','assets/upload/albunes');

				$crud->where('album.user_id', $this->session->userdata('user_id'));
				$crud->columns('albu_foto','albu_anio','inte_id','albu_titulo','albu_habilitado');
				$crud->fields('inte_id','albu_foto','albu_anio','albu_titulo','albu_alias','user_id');
											
				$crud->unset_clone();
				$crud->unset_delete();

		$crud->change_field_type('user_id','invisible');
		$crud->change_field_type('albu_alias','invisible');	

		$crud->callback_before_insert(array($this,'discos_before_insert'));
		$crud->callback_after_insert(array($this, 'notifica_after_insert_disco'));

		$output = $crud->render();
		$this->_example_output($output);
	}

	###################################################
	#
	# Completa ID de usuario y alias
	#


	public function discos_before_insert($post_array) {

	    $post_array['user_id'] = $this->session->userdata('user_id');
	    $post_array['albu_alias'] = strtolower(url_title($post_array['albu_titulo']));
	 	
		return $post_array;

	}  

	###################################################
	#
	# Envía correo al Admin notificando el Alta
	#
	
	public function notifica_after_insert_disco($post_array,$primary_key)
	{
	    $this->load->library('email');

		$this->email->from('info@mifolkloreargentino.com.ar', 'MFA');
		$this->email->to('info@mifolkloreargentino.com.ar');
		$this->email->cc('epassarelli@gmail.com');
		 
		$this->email->subject('MFA - Agregaron un disco');
		
		$mensaje = "Agregaron el disco: " . $post_array['albu_titulo'] . "\r";
		$mensaje.= "Año: " . $post_array['albu_anio'] . "\r";
		$mensaje.= "Interprete: " . $post_array['inte_id'] . "\r";

		$this->email->message($mensaje);

		$this->email->send();
		
		return true;

	}

}