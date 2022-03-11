<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Interpretes extends MX_Controller {


public function __construct(){
	parent::__construct();
	if (!$this->ion_auth->logged_in()){
		redirect('/auth/login/');
	} 
	$this->load->model('Interpretes_model');

	if (ENVIRONMENT == 'development') {
		$this->output->enable_profiler(TRUE);
	}
	$this->objeto = 'interpretes';
}



public function index(){
	
	$data['title']      	= "Mis administrados";

	$data['files_js'] = array('datatables.min.js', 'datatables.init.js' );
	$data['files_css'] = array('datatables.min.css');
	
	$user_id = $this->session->userdata('user_id');

	if($this->ion_auth->in_group(1)){
		$data['filas'] = $this->Interpretes_model->get_all();		
	}
	else
	{
		$data['filas'] = $this->Interpretes_model->getMisAdministrados($user_id);
	}
	
	$data['view']       	= 'interpretes_abm_view';
	$this->load->view('layout.php', $data);
}

##############################################################
##
## 		Ver un Artista completo
##

public function ver($id){
	$data['fila']       	= $this->Interpretes_model->getMiAdministrado($id);
	$data['title']      	= $data['fila']->inte_nombre ;

	$data['view']       	= "interpretes_mostrar_view";
	$this->load->view('layout', $data);
}

##############################################################
##
## 		Inserta un interprete
##

public function insertar(){

	$this->form_validation->set_rules('nombre', 'nombre', 'required|trim|min_length[4]');
	//$this->form_validation->set_rules('biografia', 'biografia', 'required|trim|min_length[25]');

	$this->form_validation->set_message('required', 'El campo {field} debe tener un valor');
	$this->form_validation->set_message('min_length', 'El campo %s debe tener minimamente %s caracteres');
	
	// Si no pasó la validacion
	if($this->form_validation->run() == FALSE){	
		$data['accion'] = 'insertar';
    $data['files_js'] 	= array('interpretes_foto.js?v='.rand(),'sweetalert2.min.js');
    $data['files_css'] 	= array('sweetalert2.min.css');
		
		$data['view'] 	= 'interpretes_form_view';
		$this->load->view('layout', $data);	
		}
		else{
				var_dump($this->input->post());
				}
}


}

/* End of file interpretes.php */
/* Location: ./application/modules/welcome.php */