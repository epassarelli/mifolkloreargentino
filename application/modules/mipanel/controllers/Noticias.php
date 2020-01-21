<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Noticias extends MX_Controller {

function __construct(){
	parent::__construct();
	if (!$this->tank_auth->is_logged_in()){
		redirect('/auth/login/');
	} 
	$this->load->model('Noticias_model');
	$_SESSION['seccion'] = "Noticias";
	if (ENVIRONMENT == 'development') {
		$this->output->enable_profiler(TRUE);
	}
}

public function index(){
	
	$data['title']      	= "Noticias y gacetillas";
	$data['description']	= "Noticias de mis administrados";
	$data['keywords']   	= "Noticias de mis administrados";


	$rol = $this->tank_auth->get_user_profile();

	switch ($rol) {
			case '1':
				# registrado...
				$data['filas'] = $this->Noticias_model->getNoticiasDeMisAdministrados();
				break;
			case '2':
				# admin banda...
				$data['filas'] = $this->Noticias_model->getNoticiasDeMisAdministrados();
				break;			
			case '3':
				# admin mfa...
				$data['filas'] = $this->Noticias_model->get_all();
				break;
			default:
				# code...
				break;
		}	

	$data['breadcrumb'] 	= array(
								'Inicio' => base_url()
								);		
	$data['view']       	= 'misnoticias_view';
	//$data['sidebar']       	= 'interpretes_sidebar_view';
	$this->load->view('layout.php', $data);
}


####################################################
###			Nueva Gacetilla del Artista
####################################################

function nueva(){

	$data['title']      	= "Noticias y gacetillas";
	$data['description']	= "Noticias de mis administrados";
	$data['keywords']   	= "Noticias de mis administrados";
	
	$this->form_validation->set_rules('titulo', 'titulo', 'required|trim|min_length[5]');
	$this->form_validation->set_rules('detalle', 'detalle', 'required|trim|min_length[5]');
		
	$this->form_validation->set_message('required', 'Debe introducir el campo "%s"');
	$this->form_validation->set_message('min_length', 'El campo "%s" debe ser de al menos %s carcteres');	
	
	// Si no pasó la validacion
	if($this->form_validation->run()==FALSE)
	{				
			$data['view'] 			= "misnoticias_form_view";
			$data['accion'] 		= "mipanel/misnoticias/nueva";
			$this->load->view('layout', $data);	
	}
	else
		{
			$noticia['noti_titulo'] 	= $this->input->post('titulo');
			$noticia['noti_fecha'] 		= date('Y-m-d',time());
			$noticia['noti_alias'] 		= url_title($this->input->post('titulo'), '-', TRUE);;
			$noticia['noti_detalle'] 	= $this->input->post('detalle');
			$noticia['inte_id'] 		= $this->tank_auth->get_user_inte_id();
			
			// inserto el show	
				
						
			if ($this->Noticias_model->set('noticia',$noticia)){	
			
				if( $_SERVER['SERVER_NAME'] != 'localhost' ) {
					// Mando un correo a los administradores
					$this->load->library('email');
					$this->email->from('info@mifolkloreargentino.com.ar', 'Mi Folklore Argentino');
					$this->email->to('epassarelli@gmail.com', 'aruffo73@gmail.com');
					$this->email->subject('Nueva Gacetilla de Artista');
					$mensaje = "Sugirieron una gacetilla: " . $this->input->post('titulo') . "<br />";
					$mensaje .= "el artista: " . $this->tank_auth->get_user_inte_id() . "<br /><br />";
					$mensaje .= nl2br($this->input->post('detalle'));
					$this->email->message($mensaje);
					$this->email->send();
				}
				
				$this->session->set_flashdata('mensaje', 'ok');
			}
			else{
				$this->session->set_flashdata('mensaje', 'error');
			}

			$redirecta = base_url() . "mipanel/misnoticias";
			Header("Location: $redirecta"); 
		}
}

####################################################
###			Editar Gacetilla del Artista
####################################################

function editar($noti_id){

	$data['title']      	= "Noticias y gacetillas";
	$data['description']	= "Noticias de mis administrados";
	$data['keywords']   	= "Noticias de mis administrados";
	
	$this->form_validation->set_rules('titulo', 'titulo', 'required|trim|min_length[5]');
	$this->form_validation->set_rules('detalle', 'detalle', 'required|trim|min_length[5]');
		
	$this->form_validation->set_message('required', 'Debe introducir el campo "%s"');
	$this->form_validation->set_message('min_length', 'El campo "%s" debe ser de al menos %s carcteres');	
	
	// Si no pasó la validacion
	if($this->form_validation->run()==FALSE)
	{	
		$data['fila'] 		= $this->Noticias_model->getMiNoticia($noti_id,$this->tank_auth->get_user_inte_id());
		$data['view'] 		= "amisnoticias_form_view";
		$data['accion'] 	= "cartelera/evento/nuevo";
		$this->load->view('layout', $data);	
	}
	else
		{
			$noticia['noti_titulo'] 	= $this->input->post('titulo');
			$noticia['noti_fecha'] 		= date('Y-m-d',time());
			$noticia['noti_alias'] 		= url_title($this->input->post('titulo'), '-', TRUE);;
			$noticia['noti_detalle'] 	= $this->input->post('detalle');
			$noticia['inte_id'] 		= $this->tank_auth->get_user_inte_id();
			
			// Actualizo el show	
			if ($this->Noticias_model->update('noticia','noti_id',$noti_id,$noticia)){	
			
				if( $_SERVER['SERVER_NAME'] != 'localhost' ) {
					// Mando un correo a los administradores
					$this->load->library('email');
					$this->email->from('info@mifolkloreargentino.com.ar', 'Mi Folklore Argentino');
					$this->email->to('epassarelli@gmail.com', 'aruffo73@gmail.com');
					$this->email->subject('Noticia actualizada');
					$mensaje = "Editaron una noticia: " . $this->input->post('titulo') . "<br />";
					$mensaje .= "el artista: " . $this->tank_auth->get_user_inte_id() . "<br /><br />";
					$mensaje .= nl2br($this->input->post('detalle'));
					$this->email->message($mensaje);
					$this->email->send();
				}
				
				$this->session->set_flashdata('mensaje', 'ok');
			}
			else{
				$this->session->set_flashdata('mensaje', 'error');
			}

			$redirecta = base_url() . "mipanel/misnoticias";
			Header("Location: $redirecta"); 
		}

}



}