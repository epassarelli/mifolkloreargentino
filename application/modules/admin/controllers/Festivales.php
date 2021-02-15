<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Festivales extends MX_Controller {

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
		$crud->set_table('fiestas');
		$crud->set_subject('Fiesta');
		$crud->display_as('fies_nombre','Fiesta')
			->display_as('fies_alias','Alias')
			->display_as('fies_foto','Foto')
			->display_as('fies_provincia','Provincia')
			->display_as('fies_detalle','Detalle')
			->display_as('fies_mes','Mes')
			->display_as('fies_visitas','Visitas')
			->display_as('fies_habilitado','Estado');

		$crud->set_relation('fies_provincia','provincia','prov_nombre');
		$crud->set_relation('fies_mes','meses','nombre');

		switch ($this->session->userdata('user_profile')) {
			case 1: 
				// Usuario
				$crud->where('user_id', $this->session->userdata('user_id'));
				$crud->columns('fies_foto','fies_provincia','fies_mes','fies_nombre','fies_habilitado');
				$crud->fields('user_id','fies_alias','fies_nombre','fies_detalle','fies_foto','fies_provincia','fies_mes');
											
				$crud->unset_delete();
				break;

			case 2: 
				// Prensa
				break;

			case 3:
				// Admin MFA
				$crud->set_theme('flexigrid');
				$crud->columns('fies_foto','fies_nombre','fies_provincia','fies_mes','fies_visitas','fies_habilitado');
				$crud->fields('fies_nombre','fies_alias','fies_foto','fies_detalle','fies_provincia','fies_mes','fies_habilitado');
				break;

			default:
				// Sin loguearse
				break;
		}

		$crud->set_field_upload('fies_foto','assets/upload/fiestas');

		$crud->unset_clone();
		$crud->unset_print();
		$crud->unset_export();

		$crud->change_field_type('fies_alias','invisible');
		$crud->change_field_type('user_id','invisible');

		$crud->callback_before_insert(array($this,'festivales_before_insert'));
		$crud->callback_after_insert(array($this, 'notifica_after_insert_festival'));

		$output = $crud->render();
		$this->_example_output($output);
	}

	###################################################
	#
	# Completa ID de usuario y alias
	#
	
	public function festivales_before_insert($post_array) {

	    $post_array['user_id'] 		= $this->session->userdata('user_id');
	    $post_array['fies_alias'] 	= strtolower(url_title($post_array['fies_nombre']));
	 	
		return $post_array;

	}   

	###################################################
	#
	# Envía correo al Admin notificando el Alta
	#

	
	public function notifica_after_insert_festival($post_array,$primary_key)
	{
	    $this->load->library('email');

		$this->email->from('info@mifolkloreargentino.com.ar', 'MFA');
		$this->email->to('info@mifolkloreargentino.com.ar');
		$this->email->cc('epassarelli@gmail.com');
		 
		$this->email->subject('MFA - Agregaron un festival');
		
		$mensaje = "Agregaron el festival: " . $post_array['fies_nombre'] . "\r";
		$mensaje.= "Provincia: " . $post_array['fies_provincia'] . "\r";
		$mensaje.= "Detalle: " . $post_array['fies_detalle'] . "\r";

		$this->email->message($mensaje);

		$this->email->send();
		
		return true;

	}



}