<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Efemerides extends MX_Controller {

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
		$crud->set_table('efemeride');
		$crud->set_subject('efemeride');	

		switch ($this->session->userdata('user_profile')) {
			case 1: 
				// Usuario
				$crud->where('user_id', $this->session->userdata('user_id'));
				$crud->columns('efem_fecha','efem_contenido');		
				$crud->fields('efem_fecha','efem_contenido');
											
				$crud->unset_clone();
				$crud->unset_delete();
				break;

			case 2: 
				// Prensa
				$crud->unset_clone();
				break;

			case 3:
				// Admin MFA
				$crud->columns('efem_fecha','efem_contenido','efem_habilitado');		
				$crud->fields('efem_fecha','efem_contenido','efem_habilitado');
				break;

			default:
				// Sin loguearse
				break;
		}

		$output = $crud->render();
		$this->_example_output($output);
	}






}