<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MX_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model(
			array(
				'noticias/Noticias_model',
				'interpretes/Interpretes_model',
				'canciones/Canciones_model',
				'cartelera/Cartelera_model'
				));
		if (ENVIRONMENT == 'development') {
			$this->output->enable_profiler(TRUE);
		}
		
	}

	public function index(){
	    if(isset($_GET['code'])){
	    	redirect('auth/login?code='.$_GET['code'],'refresh');
	    }

	    $data['noticias']	= $this->Noticias_model->getUltimas(3);
	    $data['canciones']  = $this->Canciones_model->get_Ultimas(6);
	    $data['shows'] 		= $this->Cartelera_model->getProximos(4);
	    $data['interpretes']= $this->Interpretes_model->getUltimosActivos(6);


		$data['title'] 		= 'Noticias del Folklore Argentino, cartelera, festivales, letras';
		$data['description']	= "Folklore Argentino con noticias, cartelera de eventos, fiestas y festivales, peñas, biografías, interpretes y letras de canciones";
		$data['keywords']	= "folklore, argentino, noticias, cartelera, eventos, fiestas, festivales, peñas, biografías, interpretes, letras, canciones";

		$data['breadcrumb'] = array(
							'Inicio' => base_url()
						);	
		
		$data['view']			= "home_view";
		$this->load->view('layout', $data);
	}


}
