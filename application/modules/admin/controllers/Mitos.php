<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mitos extends MX_Controller {

	function __construct(){
		if (!$this->tank_auth->is_logged_in() AND !$this->facebook->is_authenticated()){
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
		$crud->set_table('mitos');
		$crud->set_subject('Mito');

	    $crud->required_fields('titulo','contenido');
		//$crud->set_field_upload('mito_foto','assets/upload/mitos');

		switch ($this->session->userdata('user_profile')) {
			case 1: 
				// Usuario
				$crud->where('user_id', $this->session->userdata('user_id'));
				$crud->columns('titulo','contenido');
				$crud->fields('titulo','contenido');   
											
				$crud->unset_clone();
				$crud->unset_delete();
				break;

			case 2: 
				// Prensa
				$crud->unset_clone();
				break;

			case 3:
				// Admin MFA
				$crud->columns('titulo','contenido');
				$crud->fields('titulo','contenido');   
				break;

			default:
				// Sin loguearse
				break;
		}

		$output = $crud->render();
		$this->_example_output($output);
	}


	



}