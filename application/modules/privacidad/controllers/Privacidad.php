<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Privacidad extends MX_Controller {

function __construct(){
	parent::__construct();
	if (ENVIRONMENT == 'development') {
		$this->output->enable_profiler(TRUE);
	}
}

public function index(){
	
	$data['title']      	= "Politicas de privacidad";
	$data['description']	= "Politicas de privacidad de Mi Folklore Argentino";
	$data['keywords']   	= "privacidad";


	$data['breadcrumb'] 	= array(
								'Inicio' => base_url()
								);		
	$data['view']       	= 'privacidad_home_view';
	$this->load->view('layout.php', $data);
}







}

/* End of file interpretes.php */
/* Location: ./application/modules/welcome.php */