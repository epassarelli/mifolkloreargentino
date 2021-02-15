<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Noticias extends MX_Controller {

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


	public function index(){
		
		$crud = new Grocery_crud();
		$crud->set_table('noticia');
		$crud->set_subject('Noticia');

		$crud->display_as('noti_titulo','Titulo')
			->display_as('noti_foto','Foto')
			->display_as('noti_fecha','Fecha')
			->display_as('noti_alias','Alias')
			->display_as('noti_visitas','Visitas')
			->display_as('noti_detalle','Gacetilla')
			->display_as('inte_id','Artista')	
			->display_as('noti_habilitado','Estado');

		$crud->set_relation('inte_id','interprete','inte_nombre');

	    $crud->required_fields('noti_titulo','noti_foto','noti_detalle');

		$crud->where('noticia.user_id', $this->session->userdata('user_id'));
		$crud->columns('inte_id','noti_titulo');
		$crud->fields('user_id','noti_alias','inte_id','noti_titulo','noti_foto','noti_detalle','noti_fecha');   
		$crud->unset_delete();							

		$crud->unset_clone();
		$crud->unset_print();
		$crud->unset_export();

		$crud->change_field_type('noti_alias','invisible');
		$crud->change_field_type('user_id','invisible');
		$crud->change_field_type('noti_fecha','invisible');
		
		$crud->set_field_upload('noti_foto','assets/upload/noticias');


		$crud->callback_before_insert(array($this,'noticias_before_insert'));
		$crud->callback_after_insert(array($this, 'notifica_after_insert_noticia'));

		$output = $crud->render();
		$this->_example_output($output);		
	}

	###################################################
	#
	# Completa ID de usuario y alias
	#
	
	public function noticias_before_insert($post_array) {

	    $post_array['user_id'] 		= $this->session->userdata('user_id');
	    $post_array['noti_fecha'] 	= date('Y-m-d',time());
	    $post_array['noti_alias'] 	= strtolower(url_title($post_array['noti_titulo']));
	 	
		return $post_array;

	}   

	###################################################
	#
	# Envía correo al Admin notificando el Alta
	#
	
	public function notifica_after_insert_noticia($post_array,$primary_key)
	{
	    $this->load->library('email');

		$this->email->from('info@mifolkloreargentino.com.ar', 'MFA');
		$this->email->to('info@mifolkloreargentino.com.ar');
		$this->email->cc('epassarelli@gmail.com');
		 
		$this->email->subject('MFA - Agregaron una gacetilla');
		
		$mensaje = "Titulo: " . $post_array['noti_titulo'] . "\r";
		$mensaje.= "Detalle: " . $post_array['noti_detalle'] . "\r";

		$this->email->message($mensaje);

		$this->email->send();
		
		return true;

	}




}