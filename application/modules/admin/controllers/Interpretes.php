<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Interpretes extends MX_Controller {

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
	#
	# INTERPRETES
	#
	
	public function index(){

		$crud = new Grocery_crud();
		$crud->set_table('interprete');
		$crud->set_subject('Interprete');
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
				$crud->where('user_id', $this->session->userdata('user_id'));
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
				$crud->columns('inte_id','inte_foto','inte_nombre','inte_correo','inte_visitas','inte_habilitado');
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
		$crud->callback_after_insert(array($this, 'notifica_after_insert_interprete'));
		
		$output = $crud->render();
		
		
		// echo gettype($output) . "<br>";
		// foreach ($output as $key => $value) {
		// 	# code...
		// 	echo $key . " : " . gettype($value) . "<br>";
		// }
		// var_dump($output);die();

		$this->_example_output($output);
	}

	###################################################
	#
	# Completa ID de usuario y alias
	#
	
	public function interpretes_before_insert($post_array) {

	    $post_array['user_id'] 		= $this->session->userdata('user_id');
	    $post_array['inte_alias'] 	= strtolower(url_title($post_array['inte_nombre']));
	 	
		return $post_array;

	}   

	###################################################
	#
	# Envía correo al Admin notificando el Alta
	#

	
	public function notifica_after_insert_interprete($post_array,$primary_key)
	{
	    $this->load->library('email');

		$this->email->from('info@mifolkloreargentino.com.ar', 'MFA');
		$this->email->to('info@mifolkloreargentino.com.ar');
		$this->email->cc('epassarelli@gmail.com');
		 
		$this->email->subject('MFA - Agregaron un interprete');
		
		$mensaje = "Agregaron el interprete: " . $post_array['inte_nombre'] . "\r";
		$mensaje.= "Correo: " . $post_array['inte_correo'] . "\r";
		$mensaje.= "Biografía: " . $post_array['inte_biografia'] . "\r";

		$this->email->message($mensaje);

		$this->email->send();
		
		return true;

	}


	public function interprete_set_NOuser_callback($post_array) {

	    $post_array['user_id'] = $this->session->userdata('user_id');
	    $post_array['inte_alias'] = strtolower(url_title($post_array['inte_nombre']));
	 	
	 	$secret = '6LcEtjIUAAAAACur8MfIZ9AJKAycyVQ-gP5ZbR1C';
		
		$response = $this->input->post('g-recaptcha-response');
		$verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$response);
		
		$responseData = json_decode($verifyResponse);
		    if(!$responseData->success)
		    {
				//$this->session->set_userdata(array('message'=>'reCAPTCHA input is not valid.'));
				//redirect($_SERVER['HTTP_REFERER'], 'refresh');

				$message = 'Debe validar el CAPTCHA';
				$this->form_validation->set_message('g-recaptcha_input_box', $message);
				return FALSE;
    		}
    		else{
    			return $post_array;
    		}     
	}



}