<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fiestas extends MX_Controller {


function __construct(){
	parent::__construct();
	$this->load->model('Fiestas_model');
	$this->output->enable_profiler(false);
}


function index(){
	$data['ultimasFiestas']				= $this->Fiestas_model->getUltimasFiestas(3);
	$data['fiestasMasVisitadas']		= $this->Fiestas_model->getFiestasMasVisitadas(3);
	$data['fiestasMesActual']			= $this->Fiestas_model->getNFiestasMesActual(date('n'),3);
	
	$data['title']      	= "Fiestas y festivales folkloricos tradicionales de Argentina";
	$data['description']	= "Fiestas y Festivales Tradicionales de Argentina, folklore argentino";
    $data['keywords']   	= "fiestas,tradicionales,festivales,argentina,folklore,folkloricas";
	$data['breadcrumb'] = array(
					'Inicio' => base_url()
				);

	$data['view'] 			= "fiestas_home_view";
	$data['sidebar'] 		= "fiestas_sidebar_view";
	$this->load->view('layout', $data);		
}


function detalle_fiesta($fiesta){
	$data['festival']				= $this->Fiestas_model->getFiesta($fiesta);
	$data['fiestasMasVisitadas']	= $this->Fiestas_model->getFiestasMasVisitadas(3);
	
	$data['title']      		= $data['festival']->fies_nombre . " Fiestas tradicionales de Argentina ";
	$data['description']		= "";
    $data['keywords']   		= "fiestas,tradicionales,festivales,argentina,folklore,folkloricas";
	//$data['fiesta'] 			= $fiesta;
	
	$data['breadcrumb'] 		= array(
					'Inicio' => base_url(),
					'Festivales Folkloricos' => base_url() . 'fiestas-tradicionales-argentina'
				);

	$data['view'] 			= "fiestas_mostrar_view";
	$data['sidebar'] 		= "fiestas_sidebar_view";
	$this->load->view('layout', $data);		
}


function detalle_edicion($fiesta,$edicion){
	$data['fila']		= $this->Fiestas_model->getEdicion($fiesta,$edicion);
	$data['title']      = $data['fila'] . " Fiestas tradicionales de Argentina";
	$data['description']= "";
    $data['keywords']   = "";   
	$data['fiesta'] 	= $fiesta;
	$data['edicion'] 	= $edicion;
	$data['breadcrumb'] = array(
					'Inicio' => base_url(),
					'Festivales Folkloricos' => base_url() . 'fiestas-tradicionales-argentina'
				);

	$data['view'] 		= "fiestas_mostrar_view";
	$data['sidebar'] 	= "fiestas_sidebar_view";
	$this->load->view('layout', $data);		
}


function listado_por_provincia($provincia){
	$data['filas']		= $this->Fiestas_model->getPorProvincia($provincia);	
	$data['fiestasMasVisitadas']			= $this->Fiestas_model->getFiestasMasVisitadas(3);

	$data['title']      = "Fiestas Tradicionales Argentinas en " . ucwords(str_replace("-", " ", $provincia));
	$data['description']= "";
    $data['keywords']   = "fiestas,tradicionales,festivales,argentina,folklore,folkloricas";   
	$data['valor1'] 	= $provincia;
	$data['breadcrumb'] = array(
					'Inicio' => base_url(),
					'Festivales Folkloricos' => base_url() . 'fiestas-tradicionales-argentina'
				);

	$data['view'] 		= "fiestas_listado_view";
	$data['sidebar'] 	= "fiestas_sidebar_view";
	$this->load->view('layout', $data);		
}


function listado_por_mes($mes){
	$data['filas']			= $this->Fiestas_model->getPorMes($mes);
	$data['fiestasMasVisitadas']			= $this->Fiestas_model->getFiestasMasVisitadas(3);

	$data['title']      	= "Fiestas Tradicionales Argentinas en " . $mes;
	$data['description']	= "";
    $data['keywords']   	= "fiestas,tradicionales,festivales,argentina,folklore,folkloricas";    
	$data['valor1'] 		= $mes;
	$data['breadcrumb'] 	= array(
					'Inicio' => base_url(),
					'Festivales Folkloricos' => base_url() . 'fiestas-tradicionales-argentina'
				);

	$data['view'] 			= "fiestas_listado_view";
	$data['sidebar'] 		= "fiestas_sidebar_view";
	$this->load->view('layout', $data);		
}


function ediciones_por_festival($fiesta){
	$data['filas']			= $this->Fiestas_model->getEdicionesDelFestival($festival);
	$data['title']      	= "";
	$data['description']	= "";
    $data['keywords']   	= "fiestas,tradicionales,festivales,argentina,folklore,folkloricas";
    
	$data['valor1'] 		= $mes;
	$data['breadcrumb'] 	= array(
					'Inicio' => base_url(),
					'Festivales Folkloricos' => base_url() . 'fiestas-tradicionales-argentina'
				);

	$data['view'] 			= "fiestas_ediciones_view";
	$data['sidebar'] 		= "fiestas_sidebar_view";
	$this->load->view('layout', $data);		
}


function sugerir(){
	$data['title']      = "Sugerir un Festival";
	$data['breadcrumb'] = array(
					'Inicio' => base_url(),
					'Festivales Folkloricos' => base_url() . 'fiestas-tradicionales-argentina'
				);

	$data['view'] 		= "fiestas_sugerir_form_view";
	$this->load->view('layout', $data);		
}



}