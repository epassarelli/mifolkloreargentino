<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Efemerides extends MX_Controller {

function __construct(){
	parent::__construct();
	$this->load->model('Efemerides_model');
	$this->output->enable_profiler(FALSE);
}
##############################################################
function index(){
	$data['filas']      = $this->Efemerides_model->getEfemerides();
	$data['title']      = "Efemerides del Folklore Argentino. Un dia como hoy: ....";
	$data['description']= "Efemerides de Autores, Compositores, Grupos, Solistas y hechos trascendentes del Folklore Argentino";
    $data['keywords']   = "efemerides,interpretes,grupos,solistas,folklore,argentino,musica,cantores,payadores";
	$data['view']       = 'efemerides_home_view';
	$this->load->view('layout.php', $data);
}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */