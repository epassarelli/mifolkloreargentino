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
	$data['description']	= "Interpretes, Grupos y Solistas del Folklore Argentino";
	$data['keywords']   	= "interpretes";

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

	$data['breadcrumb'] 	= array(
								'Mi panel' => base_url('mipanel'),
								);		
	$data['view']       	= 'misadministrados_view';
	$this->load->view('layout.php', $data);
}

##############################################################
##
## 		Ver un Artista completo
##

public function ver($id){
	$data['fila']       	= $this->Interpretes_model->getMiAdministrado($id);
	
	$data['title']      	= $data['fila']->inte_nombre ;
	$data['description']	= "Biografia de " . $data['fila']->inte_nombre . ". Tambien encontrara otras de Autores, Compositores, Grupos y Solistas";
	$data['keywords']   	= "interpretes";

	$data['breadcrumb'] = array(
						'Mi panel' => base_url('mipanel'), 
						'Mis administrados' => base_url('mipanel/interpretes')
					);	
	
	$data['view']       	= "misadministrados_mostrar_view";
	$this->load->view('layout', $data);
}

##############################################################
##
## 		Sugerir un Artista
##

public function nuevo(){
	
	$data['title'] 			= "Sugerir un interprete";
	$data['mensaje'] = 'a';
	
	$data['breadcrumb'] = array(
		'Inicio' => base_url(), 
		'Grupos y Solistas' => base_url().'grupos-y-solistas'
	);


	$this->form_validation->set_rules('nombre', 'nombre', 'required|trim|min_length[4]');
	$this->form_validation->set_rules('biografia', 'biografia', 'required|trim|min_length[25]');

	$this->form_validation->set_message('required', 'El campo {field} debe tener un valor');
	$this->form_validation->set_message('min_length', 'El campo %s debe tener minimamente %s caracteres');
	
	if (empty($_FILES['userfile']['name'])){
	    $this->form_validation->set_rules('userfile', 'foto', 'required');
	}



	// Si no pasó la validacion
	if($this->form_validation->run() == FALSE){	
		//var_dump('No pasó la validacion');
		$data['accion'] = 'nuevo';
    $data['files_js'] 	= array('interpretes_foto.js?v='.rand(),'sweetalert2.min.js');
    $data['files_css'] 	= array('sweetalert2.min.css');
		$data['view'] 	= 'misadministrados_form_view';
		$this->load->view('layout', $data);	
		}
	else
		{
		// Obtengo el Interprete si existe o un NULL
		$existe = $this->Interpretes_model->getOneBy('interprete', 'inte_nombre', $this->input->post('nombre'));	
		
		// Si no existe el Interprete en la base
		if(!$existe){

      $config['upload_path'] = './assets/upload/interpretes';
      $config['allowed_types'] = 'gif|jpg|jpeg|png';
      $config['max_size'] = '4048';
      $config['max_width'] = '4048';
      $config['max_height'] = '2008';

      $this->load->library('upload', $config);

      //SI LA IMAGEN FALLA AL SUBIR MOSTRAMOS EL ERROR EN LA VISTA UPLOAD_VIEW
      if (!$this->upload->do_upload()) {
         $errores = array('error' => $this->upload->display_errors());
		
				foreach ($errores as $key => $value) {
					$data['mensaje'] .= $value . '<br>';
				}

        $data['view'] 		= 'misadministrados_form_view';
				$this->load->view('layout', $data);	
      } 
      else 
      	{
      		//EN OTRO CASO SUBIMOS LA IMAGEN, CREAMOS LA MINIATURA Y HACEMOS 
      		//ENVÍAMOS LOS DATOS AL MODELO PARA HACER LA INSERCIÓN
          $file_info = $this->upload->data();
          //USAMOS LA FUNCIÓN create_thumbnail Y LE PASAMOS EL NOMBRE DE LA IMAGEN,
          //ASÍ YA TENEMOS LA IMAGEN REDIMENSIONADA
          //$this->_create_thumbnail($file_info['file_name']);
          //$data = array('upload_data' => $this->upload->data());

					// Recolecto y aseguro los datos
					$artista['inte_nombre'] 		= $this->input->post('nombre');
					$artista['inte_alias']			= url_title($this->input->post('nombre'),'-',TRUE);
					$artista['inte_biografia'] 	= nl2br($this->input->post('biografia'));			
					$artista['inte_foto'] 			= $file_info['file_name'];
					$artista['inte_correo'] 		= $this->input->post('correo');
					$artista['inte_telefono'] 	= $this->input->post('telefono');
					$artista['inte_twitter'] 		= $this->input->post('twitter');
					$artista['inte_facebook'] 	= $this->input->post('facebook');
					$artista['inte_youtube'] 		= $this->input->post('youtube');
					$artista['inte_instagram'] 	= $this->input->post('instagram');
					$artista['user_id'] 				= $this->session->userdata('user_id');			
					$artista['inte_habilitado'] = 0;
		            
					// Si se inserta correctamente
					if($this->Interpretes_model->set('interprete',$artista)){

						// Guardo en la BDD la solicitud
						$solicitud['user_id'] 		= $this->session->userdata('user_id');
						$solicitud['inte_id'] 		= $this->db->insert_id();
						$solicitud['habilitado']	= 0;

						// Inserto la relacion de admin en la BDD
						$this->Interpretes_model->set('users_interpretes',$solicitud);					
						
						// Si no estoy en LOCAL envio el MAIL
						if( $_SERVER['SERVER_NAME'] != 'localhost' ) {
								// Mando un correo a los administradores
								$this->load->library('email');
								$this->email->from('info@mifolkloreargentino.com.ar', 'Mi Folklore Argentino');
								$this->email->to('epassarelli@gmail.com', 'mifolkloreargentino@gmail.com');
								$this->email->subject('Interprete sugerido');
								$mensaje = "Se sugirió el interprete: " . $this->input->post('nombre') . "<br />";
								//$mensaje .= "para el dia: " . $this->input->post('fecha') . "<br /><br />";
								//$mensaje .= "con la siguiente biografíanl2br($this->input->post('biografia'));
								$this->email->message($mensaje);
								$this->email->send();
							}

						redirect(base_url('mipanel/interpretes'));					
					}
					else{
						$data['mensaje'] 	= 'El interprete NO SE PUDO INSERTAR, verifique todo';
						$data['accion']	= 'nuevo';
						$data['view'] 		= 'misadministrados_form_view';
						$this->load->view('layout', $data);						
					}

	            //$this->load->view('imagen_subida_view', $data);
	       }

	    }
	    else{
			$data['mensaje'] 	= 'El interprete YA EXISTE';
			$data['accion']	= 'nuevo';
			$data['view'] 		= 'misadministrados_form_view';
			$this->load->view('layout', $data);		    	
	    }
	}
}




##############################################################
##
## 		Editar un Artista
##

public function editar($id=''){

	var_dump($this->input->post());

	$data['title'] 			= "Sugerir Interprete del Folklore Argentino";
	$data['mensaje'] 		= '';
	$data['breadcrumb'] = array(
		'Inicio' => base_url(), 
		'Grupos y Solistas' => base_url().'grupos-y-solistas'
	);	
	
	$nameFoto = $this->input->post('nameFoto');

	$this->form_validation->set_rules('nombre', 'nombre', 'required|trim|min_length[4]');
	$this->form_validation->set_rules('biografia', 'biografia', 'required|trim|min_length[25]');

  
  // Si viene vacio el campo oculto que era la foto actual y valido la nueva
  if (!empty($_FILES['userfile']['name'])) {
     $this->form_validation->set_rules('userfile','userfile', 'callback_validate_image');
  }
	
	// Si no pasó la validacion
	if($this->form_validation->run()==FALSE){	

		//$data['mensaje'] = 'No pasó la validacion';
		$data['accion'] = 'editar';
		$data['fila']    = $this->Interpretes_model->getMiAdministrado($id);
		//var_dump($data['fila']);
    $data['files_js'] 	= array('interpretes_foto.js?v='.rand(),'sweetalert2.min.js');
    $data['files_css'] 	= array('sweetalert2.min.css');
		$data['view'] 	= 'misadministrados_form_view';
		$this->load->view('layout', $data);	

	}
		else
		{
		
    	$id = $this->input->post('id');
    
	    if ($nameFoto == '') {
	        $result = $this->upload();
	        $file_name = null;
	    } 
		    else 
		    {
		        $file_name = $nameFoto;
		    }

		// Recolecto y aseguro los datos
		$artista['inte_nombre'] 		= $this->input->post('nombre');
		$artista['inte_alias']			= url_title($this->input->post('nombre'),'-',TRUE);
		$artista['inte_biografia'] 	= nl2br($this->input->post('biografia'));			
		$artista['inte_foto'] 			= (isset($result)) ? $result['file_name'] : $file_name; 
		$artista['inte_telefono'] 	= $this->input->post('telefono');
		$artista['inte_correo'] 		= $this->input->post('correo');
		$artista['inte_twitter'] 		= $this->input->post('twitter');
		$artista['inte_facebook'] 	= $this->input->post('facebook');
		$artista['inte_youtube'] 		= $this->input->post('youtube');
		$artista['inte_instagram'] 	= $this->input->post('instagram');
		$artista['user_id'] 				= $this->session->userdata('user_id');			
		$artista['inte_habilitado'] = 1;
	            
		// Si se inserta correctamente
		if($this->Interpretes_model->update('interprete', 'inte_id', $id, $artista)){
			
			// Si no estoy en LOCAL envio el MAIL
			if( $_SERVER['SERVER_NAME'] != 'localhost' ) {
					
					// Mando un correo a los administradores
					$this->load->library('email');
					$this->email->from('info@mifolkloreargentino.com.ar', 'Mi Folklore Argentino');
					$this->email->to('epassarelli@gmail.com', 'mifolkloreargentino@gmail.com');
					$this->email->subject('Interprete sugerido');
					$mensaje = "Se sugirió el interprete: " . $this->input->post('nombre') . "<br />";
					//$mensaje .= "para el dia: " . $this->input->post('fecha') . "<br /><br />";
					//$mensaje .= "con la siguiente biografíanl2br($this->input->post('biografia'));
					$this->email->message($mensaje);
					$this->email->send();
				}

			redirect(base_url('mipanel/interpretes'));					
		}
			else
			{
				$data['mensaje'] 	= 'El interprete NO SE Actualizar, hubo un fallo en la aplicacion';
				$data['view'] 		= 'misadministrados_form_view';
				$this->load->view('layout', $data);						
			}

		}
	}


    // Metodo para upload de files
    function upload()
    {
        $config['upload_path']          = './assets/upload/interpretes';
        $config['allowed_types']        = '*';

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('userfile')) {
            $data = $this->upload->display_errors();
            return $data;
        } else {
            $data = $this->upload->data();
            return $data;
        }
    } // Upload de files


    // Metodo para Eliminar el documento
    public function deleteFile()
    {      
        $fileName = $this->input->post('NameFile');
        $id = $this->input->post('Id');
        //var_dump($fileName, $id); die();
        $this->Interpretes_model->deleteAdjunto($id);
        $deletefile = './assets/upload/interpretes/' . $fileName;
        if(unlink($deletefile))
          {
            $response['success'] = true;
            echo json_encode($response);
          }
    }


    // Validacion de la imagen
    public function validate_image(){
      $check = TRUE;
      if ((!isset($_FILES['userfile'])) || $_FILES['userfile']['size'] == 0) {
          $this->form_validation->set_message('validate_image', 'El {field} es Requerido');
          var_dump(form_error('userfile'));
          $check = FALSE;
      }else
       if (isset($_FILES['userfile']) && $_FILES['userfile']['size'] !== 0) {
          $allowedExts = array("jpeg", "jpg");
          $extension = pathinfo($_FILES["userfile"]["name"], PATHINFO_EXTENSION);
          if(filesize($_FILES['userfile']['tmp_name']) > 2000000) {
              $this->form_validation->set_message('validate_image', 'El {field} NO puede exceder los 20MB');
              var_dump(form_error('userfile'));
              $check = FALSE;
          }
          if(!in_array($extension, $allowedExts)) {
              $this->form_validation->set_message('validate_image', "Tipo de archivo invalido ({$extension})");
              var_dump(form_error('userfile'));
              $check = FALSE;
          }
      }
      return $check;
    }















##############################################################
##
## 		Desvincular un Artista
##

public function desvincular($value=''){	
	$vinculados = $this->Interpretes_model->getMisAdministrados();
	
	// Si está vinculado lo desvinculo y redirijo a su listado de administrados
	if (in_array($value, $vinculados)) {
		$this->Interpretes_model->desvincularAdministrado($value);
		redirect(site_url('mipanel/interpretes/administrados'));
	}
	else{ // SINO, muestro una pantalla de error
		$data['view'] 	= 'misadministrados_view';
		$this->load->view('layout', $data);			
	}
}

##############################################################
##
## 		Solicitar administrar un Artista
##

public function solicitar($inte_id=''){

	$data['title']      	= "Interpretes del Folklore Argentino";
	$data['description']	= "Interpretes, Grupos y Solistas del Folklore Argentino";
	$data['keywords']   	= "interpretes";		
	//var_dump($this->Interpretes_model->solicitudesPendientes());die();
	// Si NO tiene ninguna solicitud pendiente
	//if($this->Interpretes_model->solicitudesPendientes() == 0){
	// Muestro el FORM o lo proceso
	$this->form_validation->set_rules('inte_id', 'inte_id', 'required');
	
	// Si no pasó la validacion muestro el formulario
	if($this->form_validation->run()==FALSE){	
		
		$this->load->model('interpretes/Interpretes_model');
		$data['filas'] 	= $this->Interpretes_model->getParaAdministrar();
		
		$data['view'] 	= 'solicitaradministracion_view';
		$this->load->view('layout', $data);	
		}
		else{ 
			// Guardo en la BDD la solicitud
			$solicitud['user_id'] 		= $this->session->userdata('user_id');
			$solicitud['inte_id'] 		= $this->input->post('inte_id');
			$solicitud['habilitado']	= 0;

			// Inserto la cancion en la BDD
			if ($this->Interpretes_model->set('users_interpretes',$solicitud))
				{	
				// Si no estoy en LOCAL envio el MAIL
				if( $_SERVER['SERVER_NAME'] != 'localhost' ) 
					{
						// Mando un correo a los administradores
						$this->load->library('email');
						$this->email->from('info@mifolkloreargentino.com.ar', 'Mi Folklore Argentino');
						$this->email->to('epassarelli@gmail.com', 'mifolkloreargentino@gmail.com');
						$this->email->subject('Solicitud de administrar interprete');
						$mensaje = "Se solicitó administrar el interprete: " . $this->input->post('inte_id') . "<br />";
						//$mensaje .= "para el dia: " . $this->input->post('fecha') . "<br /><br />";
						//$mensaje .= "con la siguiente biografíanl2br($this->input->post('biografia'));
						$this->email->message($mensaje);
						$this->email->send();
					}
				$data['view'] 	= 'biografias_solicitud_ok_view';
				$this->load->view('layout', $data);	
				}
				else{
					$data['view'] 	= 'biografias_solicitud_error_view';
					$this->load->view('layout', $data);	
				}
			}					
		//}
		// else{
		// // SINO, muestro mensaje de Solicitud en proceso
		// $data['view'] 	= 'biografias_procesando_solicitud_view';
		// $this->load->view('layout', $data);					
		// }


}

##############################################################
##
## 		Solicitar administrar un Artista
##

public function administrar($inte_id='')
{
	# code...
	$data['title']      	= "Interpretes del Folklore Argentino";
	$data['description']	= "Interpretes, Grupos y Solistas del Folklore Argentino";
	$data['keywords']   	= "interpretes";		

	$solicitud['user_id'] 		= $this->session->userdata('user_id');
	$solicitud['inte_id'] 		= $inte_id;
	// Verifico si existe el ID

	// Inserto la tupla y redirecciono a Mis Administrados y mando un mail


	
	// Muestro el FORM o lo proceso
	// $this->form_validation->set_rules('inte_id', 'inte_id', 'required');
	
	// Si no pasó la validacion muestro el formulario
	// if($this->form_validation->run()==FALSE){	
		
	// 	$this->load->model('interpretes/Interpretes_model');
	// 	$data['filas'] 	= $this->Interpretes_model->getParaAdministrar();
		
	// 	$data['view'] 	= 'solicitaradministracion_view';
	// 	$this->load->view('layout', $data);	
	// 	}
	// 	else{ 


	// Guardo en la BDD la solicitud


	// Inserto la cancion en la BDD
	if ($this->Interpretes_model->set('users_interpretes',$solicitud))
		{	
			// Si no estoy en LOCAL envio el MAIL
			if( $_SERVER['SERVER_NAME'] !== 'localhost' ) 
				{
					// Mando un correo a los administradores
					$this->load->library('email');
					$this->email->from('info@mifolkloreargentino.com.ar', 'Mi Folklore Argentino');
					$this->email->to('epassarelli@gmail.com', 'mifolkloreargentino@gmail.com');
					$this->email->subject('Solicitud de administrar interprete');
					$mensaje = "Se solicitó administrar el interprete: " . $this->input->post('inte_id') . "<br />";
					//$mensaje .= "para el dia: " . $this->input->post('fecha') . "<br /><br />";
					//$mensaje .= "con la siguiente biografíanl2br($this->input->post('biografia'));
					$this->email->message($mensaje);
					$this->email->send();
				}

		//redirect(base_url('mipanel/interpretes'));	

		// Muestro pantalla de exito
		$data['inte_id'] = $inte_id;
		$data['view'] 	= 'misadministrados_solicitud_exitosa_view';
		$this->load->view('layout', $data);
		}
		else{
			$data['view'] 	= 'misadministrados_solicitud_error_view';
			$this->load->view('layout', $data);	
			}		
}

############################################################
###
###		Retorna los interpretes sugeridos
###

function eliminar($id){
	if (!$this->ion_auth->logged_in()){ 
		redirect('/auth/login/'); 
	} 
	else{ 
		//$data['interpretes']   	= $this->Interpretes_model->getSugeridos();
		$data['title'] 		= "Eliminar el interprete";
		$data['view']       	= 'interpretes_sugeridos_view';
		$this->load->view('layout.php', $data);
	}
}

function aprobar($inte_id){
	if (!$this->ion_auth->logged_in()){ redirect('/auth/login/'); } 
	else{ 
		// Si Apruebo el Interprete OK
		if ($this->Interpretes_model->aprobar($inte_id))
		{	
			// Si no estoy en LOCAL envio el MAIL
			if( $_SERVER['SERVER_NAME'] !== 'localhost' )
			{
				// Mando un correo a los administradores
				$this->load->library('email');
				$this->email->from('info@mifolkloreargentino.com.ar', 'Mi Folklore Argentino');
				$this->email->to('epassarelli@gmail.com', 'mifolkloreargentino@gmail.com',$this->tank_auth->get_user_email());
				$this->email->subject('Interprete sugerido Aprobado');
				$mensaje = "Se aprobó el interprete sugerido por usted.<br />";
				$mensaje .= "Ya puede solicitar su administración para agregarle contenidos en caso que así lo desee.<br />";
				$mensaje .= "Recuerde que puede agregarle Gacetillas de Prensa, Fechas de Shows, Letras de Canciones y mucho más...";
				$this->email->message($mensaje);
				$this->email->send();
			}

			$this->session->set_flashdata('mensaje', 'ok');

		}
		else
		{
			$this->session->set_flashdata('mensaje', 'error');
		}
	
	redirect(site_url('mipanel/interpretes'));

	// $data['interpretes']   	= $this->Interpretes_model->getSugeridos();
	// $data['title'] 		= "Solicitudes pendientes de aprobación";		
	// $data['view'] 	= 'interpretes_sugeridos_view';
	// $this->load->view('layout', $data);		
	}
}




}

/* End of file interpretes.php */
/* Location: ./application/modules/welcome.php */