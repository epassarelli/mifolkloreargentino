<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Canciones extends MX_Controller {

function __construct(){
	parent::__construct();
	if (!$this->ion_auth->logged_in()){
		redirect('/auth/login/');
	} 
	$this->load->model('Canciones_model');
	$_SESSION['seccion'] = "Canciones";
	if (ENVIRONMENT == 'development') {
		$this->output->enable_profiler(TRUE);
	}
}

public function index(){
	
	$data['title']      	= "Canciones del Folklore Argentino";
	$data['description']	= "Canciones, Grupos y Solistas del Folklore Argentino";
	$data['keywords']   	= "Canciones";


	$rol = $this->tank_auth->get_user_profile();

	switch ($rol) {
			case '1':
				# registrado...
				$data['filas'] = $this->Canciones_model->getCancionesDeMisAdministrados();
				break;
			case '2':
				# admin banda...
				$data['filas'] = $this->Canciones_model->getCancionesDeMisAdministrados();
				break;			
			case '3':
				# admin mfa...
				$data['filas'] = $this->Canciones_model->get_all();
				break;
			default:
				# code...
				break;
		}	

	$data['breadcrumb'] 	= array(
								'Inicio' => base_url()
								);		
	$data['view']       	= 'miscanciones_view';
	//$data['sidebar']       	= 'interpretes_sidebar_view';
	$this->load->view('layout.php', $data);
}

}