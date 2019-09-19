<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Noticias extends MX_Controller {

function __construct(){
	parent::__construct();
	if (!$this->tank_auth->is_logged_in()){
		redirect('/auth/login/');
	} 
	$this->load->model('Noticias_model');
	$_SESSION['seccion'] = "Noticias";
	if (ENVIRONMENT == 'development') {
		$this->output->enable_profiler(TRUE);
	}
}

public function index(){
	
	$data['title']      	= "Noticias de mis administrados";
	$data['description']	= "Noticias de mis administrados";
	$data['keywords']   	= "Noticias de mis administrados";


	$rol = $this->tank_auth->get_user_profile();

	switch ($rol) {
			case '1':
				# registrado...
				$data['filas'] = $this->Noticias_model->getNoticiasDeMisAdministrados();
				break;
			case '2':
				# admin banda...
				$data['filas'] = $this->Noticias_model->getNoticiasDeMisAdministrados();
				break;			
			case '3':
				# admin mfa...
				$data['filas'] = $this->Noticias_model->get_all();
				break;
			default:
				# code...
				break;
		}	

	$data['breadcrumb'] 	= array(
								'Inicio' => base_url()
								);		
	$data['view']       	= 'misnoticias_view';
	//$data['sidebar']       	= 'interpretes_sidebar_view';
	$this->load->view('layout.php', $data);
}

}