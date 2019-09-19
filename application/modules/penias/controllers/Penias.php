<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Penias extends MX_Controller {

function __construct(){
	parent::__construct();
	$this->load->model('Penias_model');
		if (ENVIRONMENT == 'development') {
			$this->output->enable_profiler(TRUE);
		}
}
##############################################################
function index(){
	$this->load->model('admin/Provincias_model');
	$data['provincias'] 	= $this->Provincias_model->get_all();
	$data['penias']   		= $this->Penias_model->getUltimos('penia', 'peni_id', 10);
	$data['title'] 			= "Pe&ntilde;as folkloricas";
	$data['description']	= "Encontra todas Peñas folkloricas en donde podras bailar, escuchar musica y comer. Folklore Argentino";
	$data['keywords']		= "peñas,folkloricas,bailar,musica,popular,shows";	
    $data['pagina']     	= "letras-de-canciones";
	$data['view'] 			= 'penias_home_view';

	$data['breadcrumb'] = array(
						'Inicio' => base_url(),
						'Pe&ntilde;as' => ''
					);

	$data['sidebar']       	= 'penias_sidebar_view';
	$this->load->view('layout', $data);
}
##############################################################
function listado(){
	$this->load->model('admin/Provincias_model');
	$data['provincias'] 	= $this->Provincias_model->get_all();
	$data['penias']   		= $this->Penias_model->getUltimos('penia', 'peni_id', 10);
	$data['title'] 			= "Pe&ntilde;as folkloricas";
	$data['description']	= "Encontra todas Peñas folkloricas en donde podras bailar, escuchar musica y comer. Folklore Argentino";
	$data['keywords']		= "peñas,folkloricas,bailar,musica,popular,shows";	
    $data['pagina']     	= "letras-de-canciones";
	$data['view'] 			= 'penias_home_view';

	$data['breadcrumb'] = array(
						'Inicio' => base_url(),
					);

	$data['sidebar']       	= 'penias_sidebar_view';
	$this->load->view('layout', $data);
}

function listadoX(){
	$localidad_id			= $this->input->post('localidad');
	$localidad				= "cordoba-rio-cuarto";
	$redireccionar_a		= "penias-folkloricas-en-" . $localidad ;
	redirect($redireccionar_a, 'refresh');
	
	echo $localidad_id;
}


function sugerir(){
	$data['title'] 			= "Sugerir una Pe&ntilde;as folklorica";
	$data['breadcrumb'] = array(
						'Inicio' => base_url(),
						'Pe&ntilde;as Folkloricas' => base_url() . 'penias-folkloricas',
					);

	$data['view']       	= 'penias_sugerir_form_view';
	$this->load->view('layout', $data);
}

}

/* End of file penias.php */
/* Location: ./application/modules/controllers/penias.php */