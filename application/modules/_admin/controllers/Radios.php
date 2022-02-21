<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Radios extends MX_Controller {

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
		$crud->set_table('radios');
		$crud->set_subject('Radio');

		$crud->display_as('nombre','Nombre')
			->display_as('amdial','Fecuencia en AM')
			->display_as('fmdial','Frecuencia en FM')
			->display_as('prov_id','Provincia')
			->display_as('loca_id','Localidad')
			->display_as('urlonline','URL web en vivo')
			->display_as('direccion','Dirección (Calle y nro.)')
			->display_as('web','Sitio Web');

		$crud->set_relation('loca_id','localidad','loca_nombre');
		$crud->set_relation('prov_id','provincia','prov_nombre');

	  $crud->required_fields('nombre');


		switch ($this->session->userdata('user_profile')) {
			case 1: 
				// Usuario
				$crud->where('user_id', $this->session->userdata('user_id'));
				$crud->columns('nombre','amdial','fmdial');
				$crud->fields('user_id','nombre','direccion','telefono','web','urlonline','amdial','fmdial','facebook','twitter','prov_id','loca_id','observaciones');
											
				$crud->unset_delete();
				break;

			case 2: 
				// Prensa
				$crud->unset_clone();
				break;

			case 3:
				// Admin MFA
				$crud->columns('nombre','amdial','fmdial'); 
				break;

			default:
				// Sin loguearse
				break;
		}

		$crud->unset_clone();
		$crud->unset_print();
		$crud->unset_export();

		$crud->change_field_type('user_id','invisible');

		$crud->callback_before_insert(array($this,'redios_before_insert'));
		$crud->callback_after_insert(array($this, 'notifica_after_insert_radio'));
		
		$output = $crud->render();
		$this->_example_output($output);
	}

	###################################################
	#
	# Completa ID de usuario y alias
	#
	
	public function redios_before_insert($post_array) {

	    $post_array['user_id'] 		= $this->session->userdata('user_id');
	 	
		return $post_array;

	}   

	###################################################
	#
	# Envía correo al Admin notificando el Alta
	#
	
	public function notifica_after_insert_radio($post_array,$primary_key)
	{
	    $this->load->library('email');

		$this->email->from('info@mifolkloreargentino.com.ar', 'MFA');
		$this->email->to('info@mifolkloreargentino.com.ar');
		$this->email->cc('epassarelli@gmail.com');
		 
		$this->email->subject('MFA - Agregaron un radio');
		
		$mensaje = "Radio: " . $post_array['nombre'] . "\r";
		$mensaje.= "Telefono: " . $post_array['telefono'] . "\r";
		$mensaje.= "Sitio web: " . $post_array['web'] . "\r";

		$this->email->message($mensaje);

		$this->email->send();
		
		return true;

	}

}