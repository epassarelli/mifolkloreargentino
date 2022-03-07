<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Shows extends MX_Controller {

	function __construct(){
		parent::__construct();
		if (!$this->ion_auth->logged_in()){
			redirect('/auth/login/');
		} 
		$this->load->model(
												array('Shows_model',
														'Interpretes_model',
														'Localidades_model')
											);
		$_SESSION['seccion'] = "Shows";
		if (ENVIRONMENT == 'development') {
			$this->output->enable_profiler(TRUE);
		}
	}

	
	public function index(){
		
		$data['title']      	= "Shows Folklore Argentino";
		$data['description']	= "Shows, Grupos y Solistas del Folklore Argentino";
		$data['keywords']   	= "Shows";

		$data['files_js'] = array('datatables.min.js', 'datatables.init.js', 'provincias_localidades.js' );
		$data['files_css'] = array('datatables.min.css');
		
		$user_id = $this->session->userdata('user_id');

		if($this->ion_auth->in_group(1)){
			$data['filas'] = $this->Shows_model->getAllBackend();		
		}
			else
			{
				$data['filas'] = $this->Shows_model->getShowsDeMisAdministrados($user_id);
			}

		$data['breadcrumb'] 	= array(
									'Inicio' => base_url()
									);		
		$data['view']       	= 'misshows_view';
		$this->load->view('layout.php', $data);
	}


####################################################
###			Nuevo Show del Artista
####################################################		

	public function nuevo(){
		$data['title'] = "Nuevo show folklorico";
		
		$this->form_validation->set_rules('titulo', 'evento', 'required|trim|min_length[5]');
		$this->form_validation->set_rules('fecha', 'fecha', 'required');
		$this->form_validation->set_rules('hora', 'hora', 'required');
		$this->form_validation->set_rules('provincia', 'provincia', 'required');
		$this->form_validation->set_rules('localidad', 'localidad', 'required');
		$this->form_validation->set_rules('lugar', 'lugar', 'required|trim|min_length[5]');
		$this->form_validation->set_rules('direccion', 'direccion', 'required|trim|min_length[5]');
		$this->form_validation->set_rules('detalle', 'detalle', 'required|trim|min_length[5]');
		
		
		$this->form_validation->set_message('required', 'Debe introducir el campo "%s"');
		$this->form_validation->set_message('min_length', 'El campo "%s" debe ser de al menos %s carcteres');	
		
		// Si no pasó la validacion
		if($this->form_validation->run()==FALSE)
		{	
				$this->load->model('Provincias_model');
				$data['provincias'] 	= $this->Provincias_model->get_all();

				if($this->ion_auth->in_group(1)){
					$data['interpretes'] = $this->Interpretes_model->get_all();		
				}
				else
				{
					$data['interpretes'] = $this->Interpretes_model->getMisAdministrados($this->session->userdata('user_id'));
				}


				$data['files_js'] = array('provincias_localidades.js' );
				$data['breadcrumb'] = array(
								'Inicio' => base_url()
							);
									
				$data['view'] 			= "misshows_form_view";
				$data['accion'] 		= "insertar";
				$this->load->view('layout', $data);	
		}
		else
			{
				$evento['even_titulo'] 		= $this->input->post('titulo');
				$evento['even_fecha'] 		= $this->input->post('fecha');
				$evento['even_hora'] 		= $this->input->post('hora');
				$evento['prov_id'] 			= $this->input->post('provincia');
				$evento['loca_id'] 			= $this->input->post('localidad');
				$evento['even_lugar'] 		= $this->input->post('lugar');
				$evento['even_direccion'] 	= $this->input->post('direccion');
				$evento['even_detalle'] 	= $this->input->post('detalle');
				$evento['inte_id'] 			= $this->input->post('interprete');
				$evento['even_estado']		= 1;
				
				// inserto el show	
				if ($this->Shows_model->setShow($evento)){	
				
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
				$redirecta = base_url() . "mipanel/shows";
				Header("Location: $redirecta"); 
			}
	}


	public function editar($id=''){
		$data['title'] = "Editar show folklorico";
		
		$this->form_validation->set_rules('titulo', 'evento', 'required|trim|min_length[5]');
		$this->form_validation->set_rules('fecha', 'fecha', 'required');
		$this->form_validation->set_rules('hora', 'hora', 'required');
		$this->form_validation->set_rules('provincia', 'provincia', 'required');
		$this->form_validation->set_rules('localidad', 'localidad', 'required');
		$this->form_validation->set_rules('lugar', 'lugar', 'required|trim|min_length[5]');
		$this->form_validation->set_rules('direccion', 'direccion', 'required|trim|min_length[5]');
		$this->form_validation->set_rules('detalle', 'detalle', 'required|trim|min_length[5]');
		
		
		$this->form_validation->set_message('required', 'Debe introducir el campo "%s"');
		$this->form_validation->set_message('min_length', 'El campo "%s" debe ser de al menos %s carcteres');	
		
		// Si no pasó la validacion
		if($this->form_validation->run()==FALSE)
		{	
				$this->load->model('Provincias_model');
				$data['provincias'] 	= $this->Provincias_model->get_all();

				if($this->ion_auth->in_group(1)){
					$data['interpretes'] = $this->Interpretes_model->get_all();		
				}
				else
				{
					$data['interpretes'] = $this->Interpretes_model->getMisAdministrados($this->session->userdata('user_id'));
				}

				$data['fila'] 	= $this->Shows_model->getOneBy('evento','even_id',$id);
				$data['localidades'] 	= $this->Localidades_model->localidades($data['fila']->prov_id);
				$data['files_js'] = array('provincias_localidades.js' );
				
				$data['breadcrumb'] = array(
								'Inicio' => base_url()
							);
									
				$data['view'] 			= "misshows_form_view";
				$data['accion'] 		= "editar";
				$this->load->view('layout', $data);	
		}
		else
			{
				$id = $this->input->post('show_id');
				$evento['even_titulo'] 		= $this->input->post('titulo');
				$evento['even_fecha'] 		= $this->input->post('fecha');
				$evento['even_hora'] 		= $this->input->post('hora');
				$evento['prov_id'] 			= $this->input->post('provincia');
				$evento['loca_id'] 			= $this->input->post('localidad');
				$evento['even_lugar'] 		= $this->input->post('lugar');
				$evento['even_direccion'] 	= $this->input->post('direccion');
				$evento['even_detalle'] 	= $this->input->post('detalle');
				$evento['inte_id'] 			= $this->input->post('interprete');
				// $evento['inte_estado'] 			= 1;
				
				// inserto el show	
				if ($this->Shows_model->updateShow($id,$evento)){	
				
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
				$redirecta = base_url() . "mipanel/shows";
				Header("Location: $redirecta"); 
			}
	}


	public function eliminar($id)
	{
		// inserto el show	
		if ($this->Shows_model->deleteShow($id)){	
				
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
			
			$this->session->set_flashdata('mensaje', 'eliminado');
		}
		else{
			$this->session->set_flashdata('mensaje', 'errorDelete');
		}
		$redirecta = base_url() . "mipanel/shows";
		Header("Location: $redirecta"); 
	}
}