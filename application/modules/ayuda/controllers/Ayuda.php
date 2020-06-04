<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Ayuda extends MX_Controller{

	public function __construct(){
		parent::__construct();
			if (ENVIRONMENT == 'development') {
				$this->output->enable_profiler(TRUE);
			}
		$this->load->model('Ayuda_model');
		}

	public function index($categoria_id){
		// Devuelvo todas las faqs habilitadas
		$data['faqs'] = $this->Ayuda_model->getPorCategoria($categoria_id);
		$data['title'] = 'Preguntas frecuentes';
		//$data['view'] = 'ayuda_home_view';
		$this->load->view('ayuda_partial_view', $data, FALSE);
		
	}



}
?>