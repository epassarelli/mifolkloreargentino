<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mipanel extends MX_Controller {

function __construct(){
	parent::__construct();
	// if (!$this->ion_auth->logged_in()){
	// 	redirect('/auth/login/');
	// } 
	// $this->load->model('interpretes/Interpretes_model');
	// $_SESSION['seccion'] = "Biografias";
	if (ENVIRONMENT == 'development') {
		$this->output->enable_profiler(TRUE);
	}
}

public function index(){
	
	$data['title']      	= "Mi Panel de Administracion";
	$data['description']	= "Interpretes, Grupos y Solistas del Folklore Argentino";
	$data['keywords']   	= "panel";


	//$rol = $this->tank_auth->get_user_profile();
	//var_dump($rol);die();
	// switch ($rol) {
	// 		case '1':
	// 			# registrado...
	// 			$data['filas'] = $this->Interpretes_model->getMisSugeridos();
	// 			break;
	// 		case '2':
	// 			# admin banda...
	// 			$data['filas'] = $this->Interpretes_model->getMisAdministrados();
	// 			break;			
	// 		case '3':
	// 			# admin mfa...
	// 			$data['filas'] = $this->Interpretes_model->get_all();
	// 			break;
	// 		default:
	// 			# code...
	// 			break;
	// 	}	

	$data['breadcrumb'] 	= array(
								'Inicio' => base_url()
								);		
	$data['view']       	= 'mipanel_home_view';
	//$data['sidebar']       	= 'interpretes_sidebar_view';
	$this->load->view('layout.php', $data);
}







}

/* End of file interpretes.php */
/* Location: ./application/modules/welcome.php */