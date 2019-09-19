<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buscador extends MX_Controller {

function __construct(){
	parent::__construct();
	//$this->load->model('Biografias_model');
	$_SESSION['seccion'] = "Buscador";
	$this->output->enable_profiler(FALSE);
}
##############################################################
function index(){
	$data['filas']      	= $this->Biografias_model->get_todos('interprete','inte_nombre');
	$data['title']      	= "Biografias de Autores, Compositores, Interpretes";
	$data['description']	= "Biografias de autores, compositores, grupos y solistas del Folklore Argentino";
    $data['keywords']   	= "interpretes,grupos,solistas,folklore,argentino,musica,cantores,payadores";
    
	$data['interpretes'] 	= $this->Biografias_model->get_todos('interprete','inte_nombre');
	$data['redirigir']     	= "biografia-de-";
	
	$data['view']       	= 'biografias_home_view';
	$this->load->view('layout.php', $data);
}


}

/* End of file welcome.php */
/* Location: ./application/modules/buscador/buscador.php */