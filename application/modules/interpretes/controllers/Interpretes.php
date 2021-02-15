<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Interpretes extends MX_Controller {

##############################################################

public function __construct(){
	parent::__construct();
	$this->load->model('Interpretes_model');
	$_SESSION['seccion'] = "Biografias";
	if (ENVIRONMENT == 'development') {
		$this->output->enable_profiler(TRUE);
	}
	if(!isset($_SESSION['interpretes'])){
		$_SESSION['interpretes'] 	= $this->Interpretes_model->get_InterpretesCBox('interprete','inte_nombre');
	}
}

##############################################################

public function index(){	
	$data['title']      	= "Grupos y Solistas del Folklore Argentino";
	$data['description']	= "Interpretes, Grupos y Solistas del Folklore Argentino";
	$data['keywords']   	= "interpretes,grupos,solistas,folklore,argentino,musica,cantores,abel,pintos,horacio,guarany,palavecino,mercedes,sosa,atahualpa,yupanki,nocheros,luciano,soledad";	
	$data['ultimos']      	= $this->Interpretes_model->getUltimosActivos(12);
	$data['populares']      = $this->Interpretes_model->getVisitados(30);			
	$data['interpretes'] 	= $_SESSION['interpretes'];
	$data['redirigir']     	= "biografia-de-";	
	$data['pagina']     	= "grupos-y-solistas";
	$data['breadcrumb'] 	= array(
								'Inicio' => base_url()
								);		
	$data['view']       	= 'interpretes_home_view';
	$data['sidebar']       	= 'interpretes_sidebar_view';
	$this->load->view('layout.php', $data);
}

############################################################
###
###			Arma una vista parcial de las X ultimas canciones
###

public function ultimos($cant){
	$data['interpretes'] = $this->Interpretes_model->get_Ultimos($cant);
	$data['titulo'] 	 = "Ultimos " . $cant ." artistas";
	$this->load->view('interpretes_partial_view', $data);
}

############################################################
###
###		Interpretes con la Letra N
###

public function letra($letra){
	$data['filas'] 			= $this->Interpretes_model->getInterpretesPorLetra( 'interprete', 'inte_nombre', $letra, 'inte_nombre');
	$data['title'] 			= "Grupos y Solistas del Folklore Argentino con letra $letra";
	$data['description'] 	= "Grupos y Solistas del Folklore Argentino";	
	$data['keywords']		= "grupos,solistas";	
	$data['pagina']     	= "grupos-y-solistas";
	$data['letra'] 			= $letra;	
	$data['interpretes'] 	= $_SESSION['interpretes'];
	$data['redirigir']     	= "biografia-de-";	
	$data['breadcrumb'] = array(
						'Inicio' => base_url(), 
						'Grupos y Solistas' => base_url().'grupos-y-solistas'
					);	
	$data['view'] 			= "interpretes_por_letra_view";
	$data['sidebar']       	= 'interpretes_sidebar_view';
	$this->load->view('layout', $data);
}

##############################################################
public function mostrar($alias){
	$data['fila']       	= $this->Interpretes_model->getInterprete($alias);	
	$data['title']      	= "Biografia de " . $data['fila']->inte_nombre ;
	$bio = substr(strip_tags(preg_replace('/\&(.)[^;]*;/', '\\1',$data['fila']->inte_biografia)),0,120);
	$data['description']	= "Biografia de " . $data['fila']->inte_nombre . ", " .  $bio;
	$data['keywords']   	= "interpretes, grupos, solistas, folklore, argentino, musica, cantores, payadores, biografias, artistas".$data['fila']->inte_nombre;
	$data['interpretes'] 	= $_SESSION['interpretes'];
	$data['redirigir']     	= "biografia-de-";
	$data['breadcrumb'] = array(
						'Inicio' => base_url(), 
						'Grupos y Solistas' => base_url().'grupos-y-solistas'
					);		
	$data['pagina']     	= "grupos-y-solistas";	
	$data['view']       	= "interpretes_mostrar_view";
	$data['sidebar']       	= 'interpretes_sidebar_view';
	$this->load->view('layout', $data);
}

#######################################################
##
##  Vista de sugerido de interprete OK

public function sugerido(){
	$data['title']      	= 'Interprete sugerido' ;
	$data['description']	= 'Se ha sugerido el interprete de forma correcta. Solo resta la validacion de los datos por parte del Administrador del sitio';
	$data['keywords']   	= 'interpretes, grupos, solistas, folklore, argentino, musica, cantores, payadores, biografias, artistas';
	$data['pagina']     	= "grupos-y-solistas";						
	$data['mensaje'] 		= 'El interprete se ha insertado exitosamente. Sólo resta la validación de los datos por parte del Administrador del sitio';
	$data['view'] 			= 'interprete_sugerido_ok_view';
	$this->load->view('layout', $data);	
}

#######################################################
##
##  Validación del CAPTCHA

public function validate_captcha() {
    $captcha = $this->input->post('g-recaptcha-response');
     $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=your secret key here &response=" . $captcha . "&remoteip=" . $_SERVER['REMOTE_ADDR']);
    if ($response . 'success' == false) {
        return FALSE;
    } else {
        return TRUE;
    }
}
############################################################
##
##		FUNCIONES PRIVADAS
##
############################################################

##############################################################
##
##		Funciones privadas en base a Permisos

##############################################################
##
## 		Sugerir un Artista
##

public function sugerir(){
	$data['title'] 			= "Sugerir Interprete del Folklore Argentino";
	$data['mensaje'] = '';
	
	$this->form_validation->set_rules('nombre', 'nombre', 'required|trim|min_length[4]');
	$this->form_validation->set_rules('biografia', 'biografia', 'required|trim|min_length[25]');
	
	$data['breadcrumb'] = array(
		'Inicio' => base_url(), 
		'Grupos y Solistas' => base_url().'grupos-y-solistas'
	);	

	// Si no pasó la validacion
	if($this->form_validation->run()==FALSE){	
		$data['view'] 	= 'interpretes_sugerir_view';
		$this->load->view('layout', $data);	
		}
	else
		{
		// Obtengo el Interprete si existe o un NULL
		$existe = 	$this->Interpretes_model->getOneBy('interprete', 'inte_nombre', $this->input->post('nombre'));	
		
		// Si no existe el Interprete en la base
		if($existe !== 'NULL'){

	        $config['upload_path'] = './assets/upload/interpretes';
	        //var_dump($config['upload_path']);die();
	        $config['allowed_types'] = 'gif|jpg|png';
	        $config['max_size'] = '4048';
	        $config['max_width'] = '4048';
	        $config['max_height'] = '2008';

	        $this->load->library('upload', $config);

	        //SI LA IMAGEN FALLA AL SUBIR MOSTRAMOS EL ERROR EN LA VISTA UPLOAD_VIEW
	        if (!$this->upload->do_upload()) {
	            $errores = array('error' => $this->upload->display_errors());
				
				foreach ($errores as $key => $value) {
					# code...
					$data['mensaje'] .= $value . '<br>';
				}

	            //$data['mensaje'] 	= array('error' => $this->upload->display_errors());                       
	            $data['view'] 		= 'interpretes_sugerir_view';
	            //var_dump($data['mensaje']);die();
				$this->load->view('layout', $data);	
	        } else {
	        //EN OTRO CASO SUBIMOS LA IMAGEN, CREAMOS LA MINIATURA Y HACEMOS 
	        //ENVÍAMOS LOS DATOS AL MODELO PARA HACER LA INSERCIÓN
	            $file_info = $this->upload->data();
	            //USAMOS LA FUNCIÓN create_thumbnail Y LE PASAMOS EL NOMBRE DE LA IMAGEN,
	            //ASÍ YA TENEMOS LA IMAGEN REDIMENSIONADA
	            $this->_create_thumbnail($file_info['file_name']);
	            $data = array('upload_data' => $this->upload->data());

				// Recolecto y aseguro los datos
				$artista['inte_nombre'] 	= $this->input->post('nombre');
				$artista['inte_alias']		= url_title($this->input->post('nombre'),'-',TRUE);
				$artista['inte_biografia'] 	= nl2br($this->input->post('biografia'));			
				$artista['inte_foto'] 		= $file_info['file_name'];	
						
				if( is_null($this->tank_auth->get_user_id()) ){
					$user_id = 0;
				}
				else{
					$user_id = $this->tank_auth->get_user_id();
				}

				$artista['user_id'] 		= $user_id;			
				$artista['inte_habilitado'] = 0;
	            
				// Si se inserta correctamente
				if($this->Interpretes_model->set('interprete',$artista)){
					
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

					redirect(base_url().'interpretes/sugerido');					
				}
				else{
					$data['mensaje'] 	= 'El interprete NO SE PUDO INSERTAR, verifique todo';
					$data['view'] 		= 'interpretes_sugerir_view';
					$this->load->view('layout', $data);						
				}

	            //$this->load->view('imagen_subida_view', $data);
	        }
	    }
	    else{
			$data['mensaje'] 	= 'El interprete YA EXISTE';
			$data['view'] 		= 'interpretes_sugerir_view';
			$this->load->view('layout', $data);		    	
	    }
	}
}


    //FUNCIÓN PARA SUBIR LA IMAGEN Y VALIDAR EL TÍTULO
    public function do_upload() {
		$this->form_validation->set_rules('nombre', 'nombre', 'required|trim|min_length[4]');
		$this->form_validation->set_rules('biografia', 'biografia', 'required|trim|min_length[25]');
        // SI EL FORMULARIO PASA LA VALIDACIÓN HACEMOS TODO LO QUE SIGUE
        if ($this->form_validation->run() == TRUE) 
        {
        $config['upload_path'] = './upload/interpretes';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '2000';
        $config['max_width'] = '2024';
        $config['max_height'] = '2008';

        $this->load->library('upload', $config);
        // SI LA IMAGEN FALLA AL SUBIR MOSTRAMOS EL ERROR EN LA VISTA UPLOAD_VIEW
        if (!$this->upload->do_upload()) {
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('interpretes_form_sugerir_view', $error);
        } else {
        // EN OTRO CASO SUBIMOS LA IMAGEN, CREAMOS LA MINIATURA Y HACEMOS 
        // ENVÍAMOS LOS DATOS AL MODELO PARA HACER LA INSERCIÓN
            $file_info = $this->upload->data();
            // USAMOS LA FUNCIÓN create_thumbnail Y LE PASAMOS EL NOMBRE DE LA IMAGEN,
            // ASÍ YA TENEMOS LA IMAGEN REDIMENSIONADA
            $this->_create_thumbnail($file_info['file_name']);
            $data = array('upload_data' => $this->upload->data());
            $titulo = $this->input->post('titulo');
            $imagen = $file_info['file_name'];
            $subir = $this->upload_model->subir($titulo,$imagen);      
            $data['titulo'] = $titulo;
            $data['imagen'] = $imagen;
            $this->load->view('interpretes_form_sugerir_view', $data);
        }
        }else{
        // SI EL FORMULARIO NO SE VÁLIDA LO MOSTRAMOS DE NUEVO CON LOS ERRORES
            $this->index();
        }
    }

// FUNCIÓN PARA CREAR LA MINIATURA A LA MEDIDA QUE LE DIGAMOS
public function _create_thumbnail($filename){
    $config['image_library']  = 'gd2';
    // CARPETA EN LA QUE ESTÁ LA IMAGEN A REDIMENSIONAR
    $config['source_image']   = './upload/interpretes/'.$filename;
    $config['create_thumb']   = TRUE;
    $config['maintain_ratio'] = TRUE;
    // CARPETA EN LA QUE GUARDAMOS LA MINIATURA
    $config['new_image']	= './upload/interpretes';
    $config['width']  		= 300;
    $config['height'] 		= 300;
    $this->load->library('image_lib', $config); 
    $this->image_lib->resize();
}

##############################################################
##
## 		Editar una Biografía
##

public function editar(){
	if (!$this->ion_auth->logged_in()){
		redirect('/auth/login/');
	} 
	else{
		if($this->tank_auth->get_user_profile() == 2){
			// Accion 
			}
			else{
				echo "<p>No tiene asignado ningun artista, contactese con el Administrador del sitio a traves del formulario de contacto</p>";
				}
	}
}

##############################################################
##
## 		Sugerir un Artista
##

public function soicitarAdministrarlo(){
	if (!$this->ion_auth->logged_in()){
		redirect('/auth/login/');
	} 
	else{
		
		if($this->tank_auth->get_user_profile() == 2){
			// Ya es ADMIN, Mensaje de que por el momento se puede administrar solo un interprete 
			$data['view'] 	= 'biografias_ya_es_admin_view';
			$this->load->view('layout', $data);
			}
			else{
				//var_dump($this->Biografias_model->solicitudesPendientes());die();
				// Si NO tiene ninguna solicitud pendiente
				if($this->Biografias_model->solicitudesPendientes() == 0){
					// Muestro el FORM o lo proceso
					$this->form_validation->set_rules('inte_id', 'inte_id', 'required');
					
					// Si no pasó la validacion muestro el formulario
					if($this->form_validation->run()==FALSE){	
						
						$this->load->model('interpretes/Interpretes_model');
						$data['interpretes'] 	= $this->Interpretes_model->getParaAdministrar($this->tank_auth->get_user_id());
						
						$data['view'] 	= 'biografias_form_solicitar_admin_view';
						$this->load->view('layout', $data);	
						}
					else{ // Guardo en la BDD la solicitud
						$solicitud['user_id'] 	= $this->tank_auth->get_user_id();
						$solicitud['inte_id'] 	= $this->input->post('inte_id');
						$solicitud['habilitado'] = 0;

						// Inserto la cancion en la BDD
						if ($this->Biografias_model->set('user_interprete',$solicitud))
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
					}
					else{
					// SINO, muestro mensaje de Solicitud en proceso
					$data['view'] 	= 'biografias_procesando_solicitud_view';
					$this->load->view('layout', $data);					
					}
				}
		}
}

############################################################
###
###		Retorna los interpretes sugeridos
###

public function sugeridos(){
	if (!$this->ion_auth->logged_in()){ 
		redirect('/auth/login/'); 
	} 
	else{ 
		$data['interpretes']   	= $this->Interpretes_model->getSugeridos();
		$data['title'] 		= "Solicitudes pendientes de aprobación";
		$data['view']       	= 'interpretes_sugeridos_view';
		$this->load->view('layout.php', $data);
	}
}



public function aprobar($inte_id){
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
	$data['interpretes']   	= $this->Interpretes_model->getSugeridos();
	$data['title'] 		= "Solicitudes pendientes de aprobación";		
	$data['view'] 	= 'interpretes_sugeridos_view';
	$this->load->view('layout', $data);		
	}
}




/* Este método lo podemos usar para direccionar el sistema a la vista donde se van a recolectar los datos(probablemente con un formulario) para después almacenarlos en un registro nuevo, usualmente redirige al index. */
public function create(){

}

/*Aquí podemos hacer una consulta de un elemento de la base de datos o de todos los elementos o registros por medio del modelo para realizar una descripción.*/
public function show(){

}

/*Este método es similar al de create porque lo podemos usar para mostrar una vista que recolecta los datos pero a diferencia de create es con el fin de actualizar un registro.*/
public function edit(){

}

/*Aquí es donde se guarda un registro que proviene del método create y normalmente redirige al index.*/
public function store(){

} 

/*Al igual que el store, solo que en vez de provenir de create proviene de edit y en vez de crear un nuevo registro, busca un existente y lo modifica, tambien suele redirigir al index.*/
public function update(){

}

/*En este método usualmente se destruye o elimina un registro y la petición puede provenir de donde sea siempre y cuando sea llamado con el método DELETE, después puede redirigir al index o a otro sitio dependiendo si logro eliminar o no.*/
public function destroy(){

}

}

/* End of file interpretes.php */
/* Location: ./application/modules/welcome.php */