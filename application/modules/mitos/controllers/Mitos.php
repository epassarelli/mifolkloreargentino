<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mitos extends MX_Controller {

public function __construct(){
	parent::__construct();
	$this->load->model('Mitos_model');
		if (ENVIRONMENT == 'development') 
		{
			$this->output->enable_profiler(TRUE);
		}
}	

#############################################################
#
public function index(){
	$data['filas'] 			= $this->Mitos_model->getByLetra( 'mitos', 'titulo', 'A', 'titulo');
	
	$data['title'] 			= "Mitos y Leyendas | Supersticiones y Fabulas";
	$data['description'] 	= "Mitos y Leyendas Urbanas del Folklore Argentino, creencias populares que circulan de boca en boca";
	
	$data['keywords']		= "mitos,leyendas,folkloricas,argentinas,creencias,populares,superticiones,cuentos";	

	$data['pagina']     	= "mitos-leyendas-y-creencias";
	$data['view'] 			= "mitos_home_view";
	$data['breadcrumb'] = array(
						'Inicio' => base_url(),
					);
	$data['sidebar']       	= 'mitos_sidebar_view';

	$this->load->view('layout', $data);
}

#############################################################
#
public function mostrar($id)
{
	$data['filas']	= $this->Mitos_model->get($id);
	//var_dump($data['filas']);die();
	
	$data['title'] = "Mitos y leyendas - " . $data['filas']->titulo;
	$data['description'] = substr($data['filas']->contenido,0,150);	
	$data['keywords']	= "mitos,leyendas";	
	
	$data['pagina']     	= "mitos-leyendas-y-creencias";	
	$data['view'] 	= 'mitos_mostrar_view';
	$data['breadcrumb'] = array(
						'Inicio' => base_url(),
						'Mitos y Leyendas' => base_url() . 'mitos-y-leyendas',
					);
	$data['sidebar']       	= 'mitos_sidebar_view';
	$this->load->view('layout.php', $data);	
}

#############################################################
#
public function letra($letra)
{
	$data['filas'] 		= $this->Mitos_model->getByLetra( 'mitos', 'titulo', $letra, 'titulo');
	
	$data['title'] = "Mitos y Leyendas del Folklore Argentino con la letra " . $letra;
	$data['description'] = "Mitos y Leyendas del Folklore Argentino con la letra " . $letra;	
	
	$data['keywords']	= "mitos,leyendas";	
	$data['pagina']     	= "mitos-leyendas-y-creencias";
	$data['letra'] 		= $letra;
	$data['view'] 		= "mitos_por_letra_view";
	$data['breadcrumb'] = array(
						'Inicio' => base_url(),
						'Mitos y Leyendas' => base_url() . 'mitos-y-leyendas',
					);
	$data['sidebar']       	= 'mitos_sidebar_view';
	$this->load->view('layout', $data);
}


}