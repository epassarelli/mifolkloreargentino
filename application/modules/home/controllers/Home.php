<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MX_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('noticias/Noticias_model');
		$this->load->model('interpretes/Interpretes_model');
		if (ENVIRONMENT == 'development') {
			$this->output->enable_profiler(TRUE);
		}
		
	}

	public function index(){
	    $data['noticia']	= $this->Noticias_model->getUltimas(1);
		$data['title'] 		= 'Mi Folklore Argentino - Grupos y Solistas, Festivales, Show, Letras';
		$data['description']	= "El Folklore Argentino en un solo lugar, biografías, interpretes, cartelera de eventos y letras de canciones";

		$data['breadcrumb'] = array(
							'Inicio' => base_url()
						);	
		
		$data['view']			= "home_view";
		$this->load->view('layout', $data);
	}


}
