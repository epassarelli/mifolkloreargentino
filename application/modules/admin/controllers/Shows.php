<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Shows extends MX_Controller {

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

	###################################################
	
	public function index(){
		$crud = new Grocery_crud();
		$crud->set_table('evento');
		$crud->set_subject('Show');
		$crud->display_as('even_titulo','Titulo')
			->display_as('inte_id','Interprete')
			->display_as('even_fecha','Fecha')
			->display_as('even_estado','Estado')
			->display_as('even_hora','Hora')
			->display_as('even_lugar','Lugar / Red social')
			->display_as('even_direccion','Direccion')
			->display_as('prov_id','Provincia')
			->display_as('loca_id','Localidad')
			->display_as('even_detalle','Detalle')
			->display_as('even_visitas','Visitas')
			->display_as('even_foto','Cartel / Banner / Afiche');
		$crud->set_relation('loca_id','localidad','loca_nombre');
		$crud->set_relation('prov_id','provincia','prov_nombre');
		$crud->set_relation('inte_id','interprete','inte_nombre');		
			
		$crud->required_fields('even_fecha','even_titulo');

		switch ($this->session->userdata('user_profile')) {
			case 1: 
				// Usuario
				$crud->where('evento.user_id', $this->session->userdata('user_id'));
				$crud->columns('even_fecha','inte_id','even_titulo','even_lugar');
				$crud->fields('user_id','inte_id','even_fecha','even_hora','even_titulo','even_lugar','even_direccion','prov_id','loca_id','even_detalle');
											
				$crud->unset_clone();
				$crud->unset_delete();
				break;

			case 2: 
				// Prensa
				$crud->unset_clone();
				break;

			case 3:
				// Admin MFA
				$crud->set_theme('flexigrid');
				$crud->columns('even_fecha','inte_id','even_titulo','even_lugar','even_estado');
				$crud->fields('inte_id','even_fecha','even_hora','even_titulo','even_lugar','even_direccion','prov_id','loca_id','even_detalle','even_estado');	
				break;

			default:
				// Sin loguearse
				break;
		}

		$crud->set_field_upload('even_foto','assets/upload/eventos');

		$crud->change_field_type('user_id','invisible');

		$crud->callback_before_insert(array($this,'show_before_insert'));
		$crud->callback_after_insert(array($this, 'notifica_after_insert_show'));


		$output = $crud->render();
		$this->_example_output($output);
	}

	###################################################
	#
	# Completa ID de usuario y alias
	#
	
	public function show_before_insert($post_array) {

	    $post_array['user_id'] 		= $this->session->userdata('user_id');
	    //$post_array['inte_alias'] 	= strtolower(url_title($post_array['inte_nombre']));
	 	
		return $post_array;

	}   

	###################################################
	#
	# Envía correo al Admin notificando el Alta
	#

	
	public function notifica_after_insert_show($post_array,$primary_key)
	{
	    $this->load->library('email');

		$this->email->from('info@mifolkloreargentino.com.ar', 'MFA');
		$this->email->to('info@mifolkloreargentino.com.ar');
		$this->email->cc('epassarelli@gmail.com');
		 
		$this->email->subject('MFA - Agregaron un show');
		
		$mensaje = "Agregaron el show: " . $post_array['even_titulo'] . "\r";
		$mensaje.= "Fecha: " . $post_array['even_fecha'] . "\r";
		$mensaje.= "Hora: " . $post_array['even_hora'] . "\r";
		$mensaje.= "Interprete: " . $post_array['inte_id'] . "\r";
		$this->email->message($mensaje);

		$this->email->send();
		
		return true;

	}

}
