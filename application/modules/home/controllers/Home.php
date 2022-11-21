<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends MX_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('noticias/Noticias_model');
		$this->load->model('interpretes/Interpretes_model');
		if (ENVIRONMENT == 'development') {
			$this->output->enable_profiler(TRUE);
		}
	}

	public function index()
	{
		if (isset($_GET['code'])) {
			redirect('auth/login?code=' . $_GET['code'], 'refresh');
		}

		$data['noticias']	= $this->Noticias_model->getUltimas(3);
		// $data['shows']	= $this->Cartelera_model->getProximos(5);
		// $data['canciones']	= $this->Canciones_model->getUltimas(9);
		// $data['discos']	= $this->Discografias_model->getUltimas(9);
		// $data['interpretes']	= $this->Noticias_model->getUltimas(9);
		$data['title'] 		= 'Folklore Argentino, Noticias, Festivales, Cartelera, Letras';
		$data['description']	= "Folklore Argentino, ultimas noticias, biografías, interpretes, cartelera de eventos y letras de canciones";

		$data['breadcrumb'] = array(
			'Inicio' => base_url()
		);

		$data['view']			= "home_view";
		$this->load->view('layout', $data);
	}
}
