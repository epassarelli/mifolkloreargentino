<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Shows extends MX_Controller {

function __construct(){
	parent::__construct();
	if (!$this->tank_auth->is_logged_in()){
		redirect('/auth/login/');
	} 
	$this->load->model('Shows_model');
	$_SESSION['seccion'] = "Shows";
	if (ENVIRONMENT == 'development') {
		$this->output->enable_profiler(TRUE);
	}
}

public function index(){
	
	$data['title']      	= "Shows del Folklore Argentino";
	$data['description']	= "Shows, Grupos y Solistas del Folklore Argentino";
	$data['keywords']   	= "Shows";


	$rol = $this->tank_auth->get_user_profile();

	switch ($rol) {
			case '1':
				# registrado...
				$data['filas'] = $this->Shows_model->getShowsDeMisAdministrados();
				break;
			case '2':
				# admin banda...
				$data['filas'] = $this->Shows_model->getShowsDeMisAdministrados();
				break;			
			case '3':
				# admin mfa...
				$data['filas'] = $this->Shows_model->get_all();
				break;
			default:
				# code...
				break;
		}	

	$data['breadcrumb'] 	= array(
								'Inicio' => base_url()
								);		
	$data['view']       	= 'misshows_view';
	//$data['sidebar']       	= 'interpretes_sidebar_view';
	$this->load->view('layout.php', $data);
}

}