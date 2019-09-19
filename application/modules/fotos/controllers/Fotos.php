<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fotos extends MX_Controller {

function __construct(){
	parent::__construct();
	$this->load->model('Fotos_model');
	$_SESSION['seccion'] = "Fotos";
	$this->output->enable_profiler(FALSE);
}

##############################################################
function index(){
	
	$data['title']      	= "Galerias de Fotos de Autores, Compositores, Interpretes";
	$data['description']	= "Galerias de Fotos de autores, compositores, grupos y solistas del Folklore Argentino";
    $data['keywords']   	= "fotos,imagenes,fotografias,interpretes,grupos,solistas,folklore,argentino,musica,cantores,payadores";
    
    $this->load->model('biografias/Biografias_model');
	//$data['interpretes'] 	= $this->Biografias_model->get_todos('interprete','inte_nombre');
	$this->load->model('interpretes/Interpretes_model');
	$data['interpretes'] 	= $this->Interpretes_model->getInterpretesConFotos(0);
	$data['redirigir']     	= "fotos-de-";
	
	$data['view']       	= 'fotos_home_view';
	$data['breadcrumb'] = array(
						'Inicio' => base_url()
					);
	$data['sidebar']       	= 'fotos_sidebar_view';

	$this->load->view('layout.php', $data);
}
##############################################################
function artista($alias){
	//echo $alias;
	$interprete       		= $this->Fotos_model->getOneBy('interprete','inte_alias',$alias);
	$data['fila']			= $interprete;
	$data['filas'] 			= $this->Fotos_model->get_by('foto','inte_id' ,$interprete->inte_id);
	$data['title']      	= "Fotos de " . $interprete->inte_nombre ;
	$data['description']	= "Galeria de Fotos de " . $interprete->inte_nombre . ". Tambien encontrara otras de Autores, Compositores, Grupos y Solistas";
	$data['keywords']   	= "fotos,imagenes,fotografias,interpretes,grupos,solistas,folklore,argentino,musica,cantores,payadores,biografias,artistas".$interprete->inte_nombre;
	
	$this->load->model('interpretes/Interpretes_model');
	$data['interpretes'] 	= $this->Interpretes_model->getInterpretesConFotos(0);
	$data['redirigir']     	= "fotos-de-";

	$data['view']       	= "fotos_por_interprete_view";
	$data['breadcrumb'] = array(
						'Inicio' => base_url()
					);
	$data['sidebar']       	= 'fotos_sidebar_view';
	
	$this->load->view('layout', $data);
}


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */