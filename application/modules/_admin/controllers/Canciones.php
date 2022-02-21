<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Canciones extends MX_Controller {

	function __construct(){
		if (!$this->ion_auth->logged_in() AND !$this->facebook->is_authenticated()){
			redirect('/auth/login/');
		} 
		else{
			parent::__construct();
			$this->load->library('Grocery_crud', 'recaptcha');
			$this->load->helper('url');
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

	public function index(){
		$crud = new Grocery_crud();
		$crud->set_table('canciones');
		$crud->set_subject('Canciones');

		$crud->display_as('canc_titulo','Titulo')
			->display_as('canc_alias','Alias')
			->display_as('inte_id','Interprete')
			->display_as('canc_youtube','Youtube')
			->display_as('canc_spotify','Spotify')
			->display_as('canc_visitas','Visitas')
			->display_as('canc_habilitado','Estado')
			->display_as('canc_contenido','Contenido');

		$crud->required_fields('inte_id','canc_titulo','canc_contenido');
		$crud->set_relation('inte_id','interprete','inte_nombre');
		$crud->set_relation_n_n('discos', 'album_cancion', 'album', 'canc_id', 'albu_id', 'albu_titulo');


				$crud->where('canciones.user_id', $this->session->userdata('user_id'));
				$crud->columns('inte_id','canc_titulo','canc_youtube','canc_habilitado');
				$crud->fields('user_id', 'inte_id','canc_titulo','canc_alias','canc_contenido','canc_youtube');
														
				$crud->unset_delete();

				$crud->change_field_type('user_id','invisible');
				$crud->change_field_type('canc_alias','invisible');	


		$crud->unset_clone();
		$crud->unset_print();
		$crud->unset_export();


		$crud->callback_before_insert(array($this,'canciones_before_insert'));
		$crud->callback_before_update(array($this,'canciones_before_update'));

		$crud->callback_after_insert(array($this, 'notifica_after_insert_interprete'));
		
		$output = $crud->render();
		$this->_example_output($output);
	}

	###################################################
	#
	# Completa ID de usuario y alias
	#

	public function canciones_before_insert($post_array) {

	    $post_array['user_id'] = $this->session->userdata('user_id');
	    $post_array['canc_alias'] = strtolower(url_title($post_array['canc_titulo']));
	 	
	    return $post_array;
	} 

	###################################################
	#
	# Vuelve a generar el alias por si cambió el titulo
	#

	public function canciones_before_update($post_array) {

	    $post_array['user_id'] = $this->session->userdata('user_id');
	    $post_array['canc_alias'] = strtolower(url_title($post_array['canc_titulo']));
	 	
	    return $post_array;
	} 

	###################################################
	#
	# Envía correo al Admin notificando el Alta
	#

	
	public function notifica_after_insert_cancion($post_array,$primary_key)
	{
	    $this->load->library('email');

		$this->email->from('info@mifolkloreargentino.com.ar', 'MFA Canción');
		$this->email->to('info@mifolkloreargentino.com.ar');
		$this->email->cc('epassarelli@gmail.com');
		 
		$this->email->subject('MFA - Agregaron una cancion');
		
		$mensaje = "Agregaron la cancion: " . $post_array['canc_titulo'] . "\r";
		$mensaje.= "Interprete: " . $post_array['inte_id'] . "\r";
		$mensaje.= "Letra: " . $post_array['canc_contenido'] . "\r";
		$mensaje.= "Video: " . $post_array['canc_youtube'] . "\r";

		$this->email->message($mensaje);

		$this->email->send();
		
		return true;

	}

}