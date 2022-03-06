<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Discos extends MX_Controller {

function __construct(){
	parent::__construct();
	// if (!$this->ion_auth->logged_in()){
	// 	redirect('/auth/login/');
	// } 

	$this->load->model(array('Discos_model','Interpretes_model'));
	$_SESSION['seccion'] = "Discos";
	if (ENVIRONMENT == 'development') {
		$this->output->enable_profiler(TRUE);
	}
	$this->objeto = 'discos';
}

public function index(){
	
	$data['title']      	= "Discos del Folklore";
	$data['description']	= "Discos, Grupos y Solistas del Folklore Argentino";
	$data['keywords']   	= "Discos";


		$data['files_js'] = array('datatables.min.js', 'datatables.init.js' );
		$data['files_css'] = array('datatables.min.css');
	$user_id = $this->session->userdata('user_id');

	if($this->ion_auth->in_group(1)){
		$data['filas'] = $this->Discos_model->getAllBackend();		
	}
		else
		{
			$data['filas'] = $this->Discos_model->getDiscosDeMisAdministrados($user_id);
		}

	$data['breadcrumb'] 	= array(
								'Inicio' => base_url()
								);		
	$data['view']       	= 'misdiscos_view';
	//$data['sidebar']       	= 'interpretes_sidebar_view';
	$this->load->view('layout.php', $data);
}


##############################################################
##
##
##

function nuevo(){

	$data['title']      = "Sugerir un Disco";

	$this->form_validation->set_rules('titulo', 'titulo', 'required|trim|min_length[5]');
	$this->form_validation->set_rules('anio', 'anio', 'required|trim|min_length[4]');
		
	$this->form_validation->set_message('required', 'Debe introducir el campo "%s"');
	$this->form_validation->set_message('min_length', 'El campo "%s" debe ser de al menos %s carcteres');	
	
	// Si no pasó la validacion
	if($this->form_validation->run()==FALSE)
	{	
			$this->load->model('admin/Provincias_model');
			$data['interpretes'] 	= $this->Interpretes_model->getMisAdministrados($this->tank_auth->get_user_id());
			$data['breadcrumb'] = array(
								'Inicio' => base_url()
							);			
			$data['view'] 			= "misdiscos_form_view";
			$data['accion'] 		= "cartelera/sugerir";
			$this->load->view('layout', $data);	
	}
	else
		{
			$album['albu_anio'] 		= $this->input->post('anio');
			$album['albu_titulo'] 		= $this->input->post('titulo');
			
			// inserto el articulo nuestro	
			$this->Discografias_model->set('album',$album);	
			
			$relacion['even_id'] 		= $this->db->insert_id();
			$relacion['inte_id'] 			= $this->tank_auth->get_user_id();
			
			// inserto la relacion entre evento e interprete	
			$this->Discografias_model->set('evento_interprete',$relacion);	

			// Mando un correo a los administradores
			$this->load->library('email');
			$this->email->from('info@mifolkloreargentino.com.ar', 'Mi Folklore Argentino');
			$this->email->to('epassarelli@gmail.com', 'aruffo73@gmail.com');
			$this->email->subject('Evento sugerido');
			$mensaje = "Sugirieron un evento: " . $this->input->post('titulo') . "<br />";
			$mensaje .= "para el dia: " . $this->input->post('fecha') . "<br /><br />";
			$mensaje .= nl2br($this->input->post('detalle'));
			$this->email->message($mensaje);
			$this->email->send();

			$redirecta = base_url() . "cartelera/evento";
			Header("Location: $redirecta"); 
		}
}




public function editar($id='')
{
	# code...
}


}