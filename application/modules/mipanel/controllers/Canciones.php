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

		$data['files_js'] = array('datatables.min.js', 'datatables.init.js' );
		$data['files_css'] = array('datatables.min.css');
	$user_id = $this->session->userdata('user_id');

	if($this->ion_auth->in_group(1)){
		$data['filas'] = $this->Canciones_model->getAllBackend();		
	}
		else
		{
			$data['filas'] = $this->Canciones_model->getCancionesDeMisAdministrados($user_id);
		}


	$data['breadcrumb'] 	= array(
								'Inicio' => base_url()
								);		
	$data['view']       	= 'miscanciones_view';
	$this->load->view('layout.php', $data);
}

}