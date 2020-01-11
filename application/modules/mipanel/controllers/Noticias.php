<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Noticias extends MX_Controller {

function __construct(){
	parent::__construct();
	if (!$this->tank_auth->is_logged_in()){
		redirect('/auth/login/');
	} 
	$this->load->model(array('Noticias_model','Interpretes_model'));
	$_SESSION['seccion'] = "Noticias";
	if (ENVIRONMENT == 'development') {
		$this->output->enable_profiler(TRUE);
	}
}

public function index(){
	
	$data['title']      	= "Noticias de mis administrados";
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
###			Nueva Noticia del Artista
####################################################		

public function nuevo(){
	$data['title'] = "Nueva noticia";
	
	$this->form_validation->set_rules('titulo', 'evento', 'required|trim|min_length[5]|strip_tags');
	$this->form_validation->set_rules('fecha', 'fecha', 'required');
	$this->form_validation->set_rules('alias', 'Alias', 'required|strip_tags');
	$this->form_validation->set_rules('interprete[]', 'Interprete', 'required');
	$this->form_validation->set_rules('titulo', 'Titulo', 'required');
	$this->form_validation->set_rules('detalle', 'Detalle', 'required|trim|min_length[15]|strip_tags');	
	
	$this->form_validation->set_message('required', 'Debe introducir el campo "%s"');
	$this->form_validation->set_message('min_length', 'El campo "%s" debe ser de al menos %s carcteres');	
	
	// Si no pasó la validacion
	if($this->form_validation->run()==FALSE)
	{	
			
			$data['interpretes'] 	= $this->Interpretes_model->getMisAdministrados($this->tank_auth->get_user_id());
			$data['css_files'] = array('bootstrap-chosen.css');
			$data['js_files'] = array('chosen.jquery.min.js');
			$data['breadcrumb'] = array(
							'Inicio' => base_url()
						);
								
			$data['view'] 			= "misnoticias_form_view";
			$data['accion'] 		= "insertar";
			$this->load->view('layout', $data);	
	}
	else
		{

			
			//Cargamos la imagen en el servidor
			$result = $this->upload();

			$noticia['noti_titulo'] 		= $this->input->post('titulo');
			$noticia['noti_fecha'] 		= $this->input->post('fecha');
			$noticia['noti_alias'] 			= $this->input->post('alias');
			$noticia['noti_detalle'] 	= $this->input->post('detalle');
			$noticia['noti_foto'] 	= $result["file_name"] ;
			$interpretes			= $this->input->post('interprete[]');
			$noticia['noti_habilitado']		= 1;
			
			
			// inserto la noticia
			if ($this->Noticias_model->setNoticia($noticia, $interpretes)){	
			
				if( $_SERVER['SERVER_NAME'] != 'localhost' ) {
					// Mando un correo a los administradores
					$this->load->library('email');
					$this->email->from('info@mifolkloreargentino.com.ar', 'Mi Folklore Argentino');
					$this->email->to('epassarelli@gmail.com', 'aruffo73@gmail.com');
					$this->email->subject('Datos de Artista actualizados');
					$mensaje = "Sugirieron un evento: " . $this->input->post('titulo') . "<br />";
					$mensaje .= "para el dia: " . $this->input->post('fecha') . "<br /><br />";
					$mensaje .= nl2br($this->input->post('detalle'));
					$this->email->message($mensaje);
					$this->email->send();
				}
				
				$this->session->set_flashdata('mensaje', 'ok');
			}
			else{
				$this->session->set_flashdata('mensaje', 'error');
			}

			$redirecta = base_url() . "mipanel/noticias";
			Header("Location: $redirecta"); 
		}
}


 // funcion para subir la imagen
  function upload()
    {
      
      $config['upload_path']          = 'assets/img/noticias';
      $config['allowed_types']        = 'jpg';
      // $config['max_size']             = 100;
      // $config['max_width']            = 1024;
      // $config['max_height']           = 768;

      $this->upload->initialize($config);

      if (!$this->upload->do_upload('Imagen'))
      {
              $error = array('error' => $this->upload->display_errors());
              return $error;
      }
      else
      {
              $data = $this->upload->data();
              return $data;
      }
    }


}