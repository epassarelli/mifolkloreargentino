<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Noticias extends MX_Controller {

function __construct(){
	parent::__construct();
	if (!$this->ion_auth->logged_in()){
		redirect('/auth/login/');
	} 
	$this->load->model('Noticias_model');
	$this->load->model('Interpretes_model');
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
	//$this->form_validation->set_rules('userfile', 'userfile', 'required');
		
	$this->form_validation->set_message('required', 'Debe introducir el campo "%s"');
	$this->form_validation->set_message('min_length', 'El campo "%s" debe ser de al menos %s carcteres');	
	
	// Si no pasó la validacion
	if($this->form_validation->run() == FALSE)
	{				
			$data['view'] 			= "misnoticias_form_view";
			$data['accion'] 		= "mipanel/misnoticias/nueva";
			// Traigo los artistas vinculadas y lo paso para el combo
			$data['artistas']		= $this->Interpretes_model->getMisAdministradosCbox();

			$this->load->view('layout', $data);	
	}
	else
		{

	        //upload pdf        
	        $result = $this->upload();
	        if($result['error'] == 1){
	        	$this->session->set_flashdata('mensaje', $result['errores']);
				$data['view'] 			= "misnoticias_form_view";
				$data['accion'] 		= "mipanel/misnoticias/nueva";
				// Traigo los artistas vinculadas y lo paso para el combo
				$data['artistas']		= $this->Interpretes_model->getMisAdministradosCbox();

				$this->load->view('layout', $data);	
	        }
	        else{
	        	//var_dump($result);	        	
	        


			$noticia['noti_foto']       = (isset($result)) ? $result['file_name'] : null;
			$noticia['noti_titulo'] 	= $this->input->post('titulo');
			$noticia['noti_fecha'] 		= date('Y-m-d',time());
			$noticia['noti_alias'] 		= url_title($this->input->post('titulo'), '-', TRUE);;
			$noticia['noti_detalle'] 	= $this->input->post('detalle');
			$noticia['inte_id'] 		= $this->input->post('inte_id');
			
			// inserto el show	
				
						
			if ($this->Noticias_model->set('noticia',$noticia)){	
			
				if( $_SERVER['SERVER_NAME'] !== 'localhost' ) {
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
				
				$this->session->set_flashdata('mensaje', 'La gacetilla ha sido agregada exitosamente');
			}
			else{
				$this->session->set_flashdata('mensaje', $result);
			}
			
			// Cargar vista con mensaje de éxito y dar a elegir agregar otra o volver al listado

			$redirecta = base_url() . "mipanel/misnoticias";
			Header("Location: $redirecta"); 
		}
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
	$this->form_validation->set_rules('file', '', 'callback_file_check');
		
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
			$noticia['inte_id'] 		= $this->input->post('inte_id');
			
			// Actualizo el show	
			if ($this->Noticias_model->update('noticia','noti_id',$noti_id,$noticia)){	
			
				if( $_SERVER['SERVER_NAME'] !== 'localhost' ) {
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

    // Metodo para upload de files
    function upload(){

        $config['upload_path']          = './assets/upload/noticias/';
        $config['allowed_types']        = 'jpg|jpeg';
        $config['max_size']             = 5000;
        
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('userfile')) {
            $data['error'] = 1; 
            $data['errores']= $this->upload->display_errors();
            return $data;
        } else {
            $data = $this->upload->data();
            $data['error'] = 0;

            // Si la imagen tiene un ancho mayor la achico
            // 
	    	# code...
	        $uploadData = $this->upload->data(); 
	        $uploadedImage = $uploadData['file_name']; 
	        $org_image_size = $uploadData['image_width'].'x'.$uploadData['image_height']; 
	         
	        $source_path = $config['upload_path'].$uploadedImage; 
	        $thumb_path = $config['upload_path'].'thumb/'; 
	        $thumb_width = 280; 
	        $thumb_height = 175; 
	         
	        // Image resize config 
	        $config2['image_library']    = 'gd2'; 
	        $config2['source_image']     = $source_path; 
	        $config2['new_image']        = $thumb_path; 
	        $config2['maintain_ratio']   = FALSE; 
	        $config2['width']            = $thumb_width; 
	        $config2['height']           = $thumb_height; 


			//var_dump($config2);die();

	        // Load and initialize image_lib library 
	        $this->load->library('image_lib', $config2); 
	         
	        // Resize image and create thumbnail 
	        if($this->image_lib->resize()){ 
	            $thumbnail = $thumb_path.$uploadedImage; 
	            $thumb_image_size = $thumb_width.'x'.$thumb_height; 
	            $thumb_msg = '<br/>Thumbnail created!'; 
	        }else{ 
	            $thumb_msg = '<br/>'.$this->image_lib->display_errors(); 
	        } 
	        var_dump($thumb_msg);die();
            return $data;
        }

    } # Upload de files

    public function resize($value='')
    {
    	# code...
        $uploadData = $this->upload->data(); 
        $uploadedImage = $uploadData['file_name']; 
        $org_image_size = $uploadData['image_width'].'x'.$uploadData['image_height']; 
         
        $source_path = $this->uploadPath.$uploadedImage; 
        $thumb_path = $this->uploadPath.'thumb/'; 
        $thumb_width = 280; 
        $thumb_height = 175; 
         
        // Image resize config 
        $config['image_library']    = 'gd2'; 
        $config['source_image']     = $source_path; 
        $config['new_image']        = $thumb_path; 
        $config['maintain_ratio']   = FALSE; 
        $config['width']            = $thumb_width; 
        $config['height']           = $thumb_height; 

        // Load and initialize image_lib library 
        $this->load->library('image_lib', $config); 
         
        // Resize image and create thumbnail 
        if($this->image_lib->resize()){ 
            $thumbnail = $thumb_path.$uploadedImage; 
            $thumb_image_size = $thumb_width.'x'.$thumb_height; 
            $thumb_msg = '<br/>Thumbnail created!'; 
        }else{ 
            $thumb_msg = '<br/>'.$this->image_lib->display_errors(); 
        } 
    }

    public function thumbnail($value='')
    {
    	# code...
    }


    public function cambiarestado($id='')
    {
    	# code...
    	if($this->Noticias_model->cambiarEstado($id)){
    	$redirecta = base_url() . "mipanel/misnoticias";
		Header("Location: $redirecta"); 
	}else{
		echo "Terrible error";
	}
    }
}