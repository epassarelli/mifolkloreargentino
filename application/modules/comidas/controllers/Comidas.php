<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comidas extends MX_Controller {

public function __construct(){
	parent::__construct();
	$this->load->model('Comidas_model');
	$this->load->library('form_validation');
		if (ENVIRONMENT == 'development') {
			$this->output->enable_profiler(TRUE);
		}
}	
#############################################################
public function index(){
	$data['ultimas'] 				= $this->Comidas_model->getUltimos('comidas', 'id', 15);
	$data['visitadas'] 				= $this->Comidas_model->getMasVisitadas();
	
	$data['title'] 				= "Recetas de Comidas Tipicas Folkloricas";
	$data['description'] 		= "Recetas de Comidas Tipicas del Folklore Argentino, preparacion e ingredientes";
	$data['keywords']			= "comidas,tipicas,recetas,preparacion,folkloricas";	
	$data['pagina']     		= "recetas-de-comidas-tipicas";

	$data['breadcrumb'] = array(
						'Inicio' => base_url(),
						'Comidas Tradicionales' => ''
					);

	$data['view'] 				= "comidas_home_view";
	$this->load->view('layout', $data);
}
#############################################################
public function letra($letra){
	$data['filas'] 				= $this->Comidas_model->getByLetra( 'comidas', 'titulo', $letra, 'titulo asc');
	$data['visitadas'] 			= $this->Comidas_model->getMasVisitadas();
	$data['title'] 				= "Recetas de Comidas Tipicas con " . $letra;
	$data['description'] 		= "Comidas Tipicas del Folklore Argentino con " . $letra . ", comidas tradicionales folkloricas";
	$data['keywords']			= "comidas,tipicas,recetas,folklore,argentino,tradicion";	
	$data['pagina']     		= "recetas-de-comidas-tipicas";
	$data['letra'] 				= $letra;
	$_SESSION['comi_letra']		= $letra;
	$data['view'] 				= "comidas_por_letra_view";
	$data['breadcrumb'] = array(
						'Inicio' => base_url(),
						'Comidas Tradicionales' => site_url('recetas-de-comidas-tipicas'),
						'Con letra ' . $letra => ''
					);
	$data['sidebar']       		= 'comidas_sidebar_view';
	$this->load->view('layout', $data);
}
##############################################################
public function mostrar($id){
	$data['comida'] 			= $this->Comidas_model->getComida($id);
	$data['visitadas'] 			= $this->Comidas_model->getMasVisitadas();
	$data['relacionadas'] 		= $this->Comidas_model->getUltimos('comidas', 'id', 10); // Misma letra

	$data['title'] 				= $data['comida']->titulo . " Recetas de Comidas Tipicas";
	$data['description'] 		= $data['comida']->titulo . "Comidas Tipicas del Folklore Argentino, tradicion folklorica";
	$data['keywords']			= "comidas,tipicas,recetas,tradicionales,folkloricas,popular";	
	$data['pagina']     		= "recetas-de-comidas-tipicas";
	$data['view'] 				= "comidas_mostrar_view";
	$data['breadcrumb'] = array(
						'Inicio' => base_url(),
						'Comidas Tradicionales' => site_url('recetas-de-comidas-tipicas'),
						 substr($data['comida']->titulo,0,25) => ''
					);
	$data['sidebar']       		= 'comidas_sidebar_view';
	$this->load->view('layout', $data);
}







##############################################################

public function sugerir(){
	$data['title'] = "Sugerir comidas tipicas del Folklore Argentino";
	
	$data['breadcrumb'] = array(
						'Inicio' => base_url(),
						'Comidas Tradicionales' => base_url() . 'recetas-de-comidas-tipicas'
					);

	$data['view'] = "comidas_sugerir_form_view";
	$this->load->view('layout', $data);
}




}