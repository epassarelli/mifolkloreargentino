<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Penias extends MX_Controller {

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
		$crud->set_table('penia');
		$crud->set_subject('penia');

		$crud->display_as('peni_nombre','Nombre')
			->display_as('prov_id','Provincia')
			->display_as('loca_id','Ciudad')
			->display_as('peni_telefono','Telefono')	
			->display_as('peni_descripcion','Descripcion')
			->display_as('peni_foto','Foto')
			->display_as('peni_longitud','Longitud')
			->display_as('peni_latitud','Latitud')
			->display_as('peni_direccion','Dirección (Calle y nro.)')
			->display_as('peni_habilitado','Habilitado')
			->display_as('peni_como_llegar','¿Como llegar?');

		$crud->required_fields('peni_nombre','peni_direccion');

		$crud->set_relation('loca_id','localidad','loca_nombre');
		$crud->set_relation('prov_id','provincia','prov_nombre');
		
		$crud->set_field_upload('peni_foto','assets/upload/penias'); 

		switch ($this->session->userdata('user_profile')) {
			case 1: 
				// Usuario
				$crud->where('user_id', $this->session->userdata('user_id'));
				$crud->columns('peni_nombre','peni_direccion','loca_id');
				$crud->fields('user_id','peni_nombre','peni_direccion','peni_como_llegar','peni_foto','prov_id','loca_id','peni_telefono','peni_descripcion','peni_longitud','peni_latitud'); 
											
				$crud->unset_delete();
				break;

			case 2: 
				// Prensa
				break;

			case 3:
				// Admin MFA
				$crud->columns('noti_foto','noti_fecha','inte_id','noti_titulo','noti_visitas','noti_habilitado');
				$crud->fields('inte_id','noti_fecha','noti_titulo','noti_alias','noti_foto','noti_detalle','noti_habilitado');  
				break;

			default:
				// Sin loguearse
				break;
		}

		$crud->unset_clone();
		$crud->unset_print();
		$crud->unset_export();

		$crud->change_field_type('user_id','invisible');

		$crud->callback_before_insert(array($this,'penias_before_insert'));
		$crud->callback_after_insert(array($this, 'notifica_after_insert_penias'));

		$output = $crud->render();
		$this->_example_output($output);
	}

	###################################################
	#
	# Completa ID de usuario y alias
	#
	
	public function penias_before_insert($post_array) {

	    $post_array['user_id'] 		= $this->session->userdata('user_id');
	 	
		return $post_array;

	}   

	###################################################
	#
	# Envía correo al Admin notificando el Alta
	#

	
	public function notifica_after_insert_penias($post_array,$primary_key)
	{
	    $this->load->library('email');

		$this->email->from('info@mifolkloreargentino.com.ar', 'MFA');
		$this->email->to('info@mifolkloreargentino.com.ar');
		$this->email->cc('epassarelli@gmail.com');
		 
		$this->email->subject('MFA - Agregaron una peña');
		
		$mensaje = "Peña: " . $post_array['peni_nombre'] . "\r";
		$mensaje.= "Direccion: " . $post_array['peni_direccion'] . "\r";
		$mensaje.= "Descripcion: " . $post_array['peni_descripcion'] . "\r";

		$this->email->message($mensaje);

		$this->email->send();
		
		return true;

	}



}