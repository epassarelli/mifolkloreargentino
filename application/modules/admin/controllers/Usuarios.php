<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuarios extends MX_Controller {

	function __construct(){
		if (!$this->tank_auth->is_logged_in() AND !$this->facebook->is_authenticated()){
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

	public function index(){

		$crud = new Grocery_crud();
		$crud->set_table('users');
		$crud->set_subject('Usuario');
		$crud->display_as('inte_nombre','Artista')
			->display_as('inte_alias','Alias')
			->display_as('inte_foto','Foto')
			->display_as('inte_biografia','Biografia')

			->display_as('inte_youtube','Youtube')
			->display_as('inte_twitter','Twitter')
			->display_as('inte_telefono','Tel. contrataciones')
			->display_as('inte_correo','Email de prensa')
			->display_as('inte_instagram','Instagram')
			->display_as('inte_facebook','Facebook')
			->display_as('inte_visitas','Visitas')
			->display_as('inte_habilitado','Estado');
		    
	    $crud->required_fields('inte_nombre','inte_biografia');
		$crud->set_field_upload('inte_foto','assets/upload/interpretes');

		
		switch ($this->session->userdata('user_profile')) {
			case 1: 
				// Usuario
				//$crud->where('user_id', $this->session->userdata('user_id'));
				$crud->columns('inte_foto','inte_nombre','inte_correo','inte_visitas','inte_habilitado');
				$crud->fields('user_id','inte_foto','inte_nombre','inte_biografia','inte_correo','inte_telefono','inte_facebook','inte_twitter','inte_instagram','inte_alias');
		
				
				$crud->unset_delete();
				break;

			case 2: 
				// Prensa
				$crud->where('user_id', $this->session->userdata('user_id'));
				$crud->columns('inte_foto','inte_nombre','inte_correo','inte_facebook');
				$crud->fields('user_id','inte_foto','inte_nombre','inte_biografia','inte_correo','inte_telefono','inte_facebook','inte_twitter','inte_instagram','inte_alias');

				break;

			case 3:
				// Admin MFA
				$crud->set_theme('flexigrid');
				//$crud->columns('inte_id','inte_foto','inte_nombre','inte_correo','inte_visitas','inte_habilitado');
				break;

			default:
				// Sin loguearse
				break;
		}

		$crud->unset_clone();
		$crud->unset_print();
		$crud->unset_export();

		$crud->change_field_type('inte_alias','invisible');
		$crud->change_field_type('user_id','invisible');

		$crud->callback_before_insert(array($this,'interpretes_before_insert'));
		//$crud->callback_after_insert(array($this, 'sendmail_after_insert_interprete'));
		
		$output = $crud->render();
		//var_dump($output);die();
		$this->_example_output($output);
	}

}