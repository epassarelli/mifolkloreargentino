<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Canciones extends MX_Controller {

##############################################################

public function __construct(){
	parent::__construct();
	$this->load->model('Canciones_model');
	$_SESSION['seccion'] = "Canciones";
	if(ENVIRONMENT == 'development'){
		$this->output->enable_profiler(TRUE);
	}
	if(!isset($_SESSION['interpretes'])){
		$_SESSION['interpretes'] 	= $this->Canciones_model->get_InterpretesCBox('interprete','inte_nombre');
	}	
}

##############################################################

public function index(){
	$data['title'] 			= "Letras de canciones del Folklore Argentino";
	$data['description']	= "Letras de canciones Folklore Argentino, Abel Pintos, Horacio Guarany, chamame";
	$data['keywords']		= "letras, canciones, folkloricas, cancionero, musica, popular, abel,pintos, soledad, palavecino, galleguillo, guarany, pereyra, carabajal, sacheros, manseros";		
	$data['redirigir']     	= "letras-de-canciones-de-";
	$data['letras']       	= range('A', 'Z');
	$data['ultimas']   		= $this->Canciones_model->get_Ultimas(12);
	$data['xvisitas']   	= $this->Canciones_model->get_Ranking_Canciones(30);
	$data['interpretes'] 	= $_SESSION['interpretes'];
	$data['breadcrumb'] = array(
						'Inicio' => base_url(),
						'Letras de canciones' => site_url('letras-de-canciones')
					);
	$data['view']       	= 'canciones_home_view';
	$data['sidebar']       	= 'canciones_sidebar_view';
	$this->load->view('layout', $data);
}

##############################################################

public function artista($inte_alias){
	$data['fila']     		= $this->Canciones_model->getOneBy('interprete','inte_alias',$inte_alias);
	$inte_id				= $data['fila']->inte_id;
	$data['filas'] 			= $this->Canciones_model->getPorInterprete($inte_id);	
	$data['title']      	= $data['fila']->inte_nombre . ", Letras de canciones";
	$data['description']	= "Letras de canciones " . $data['fila']->inte_nombre . ". El Folklore Argentino a través de sus letras";
	$data['keywords']   	= "canciones, letras, folklore, argentino, musica, cantores, ".$data['fila']->inte_nombre;
	
	$data['interpretes'] 	= $_SESSION['interpretes'];
	$data['breadcrumb'] = array(
						'Inicio' => base_url(),
						'Letras de Canciones' => base_url().'letras-de-canciones',
						$data['fila']->inte_nombre => ''
					);
	
	$data['redirigir']     	= "letras-de-canciones-de-";
	$data['view']       	= "canciones_por_interprete_view";
	$data['sidebar']       	= 'canciones_sidebar_view';	
	$this->load->view('layout', $data);
}

##############################################################

public function porDisco($albu_id){
	$data['filas'] 			= $this->Canciones_model->getByLetra('cancion','canc_titulo',$letra);
	$data['title'] 			= "Letras de Canciones del Folklore Argentino";
	$data['description']	= "Letras de Canciones del Folklore Argentino";
	$data['keywords']		= "letras,canciones";
	$data['letra']			= $letra;	
	$data['interpretes'] 	= $_SESSION['interpretes'];
	$data['redirigir']     	= "letras-de-canciones-de-";
	$data['view'] 			= 'canciones_por_letra_view';
	$data['sidebar']       	= 'canciones_sidebar_view';
	$this->load->view('layout', $data);	
}

##############################################################

public function mostrar($inte_alias, $canc_alias){
	// Traigo todos los datos del interprete
	$data['fila']     = $this->Canciones_model->getOneBy('interprete','inte_alias',$inte_alias);
	$inte_id				= $data['fila']->inte_id;
	// Cancion para mostrar
	$data['cancion'] 			= $this->Canciones_model->getCancion($inte_id, $canc_alias);	
	// Canciones del interprete
	// Traigo otras canciones del interprete si es que tiene
	$otrasCanciones 		= $this->Canciones_model->getOtrasCanciones($inte_id, $data['cancion']->canc_id);
	if(count($otrasCanciones ) > 0){
		$data['relacionadas'] = $otrasCanciones;
	}	
	$data['title'] 			= $data['fila']->inte_nombre . ", letra de " . $data['cancion']->canc_titulo ;
	$inicioLetra = substr(strip_tags(preg_replace('/\&(.)[^;]*;/', '\\1',$data['cancion']->canc_contenido)),0,100);
	$data['description']	= "Letra de " . $data['cancion']->canc_titulo . ", ". $data['fila']->inte_nombre .", " . $inicioLetra;
	$data['keywords']		= "letras,canciones,cancionero,popular,musica,folklorica".$data['cancion']->canc_titulo;	
	// Tomo todos los interpretes para el SELECT
	//$data['interpretes'] 	= $this->Canciones_model->getInterpretesConCanciones();
	$data['interpretes'] 	= $_SESSION['interpretes'];
	$data['redirigir']     	= "letras-de-canciones-de-";

	$data['breadcrumb'] = array(
						'Inicio' => base_url(),
						'Letras de Canciones' => base_url().'letras-de-canciones',
						$data['fila']->inte_nombre => base_url() . 'letras-de-canciones-de-' . $data['fila']->inte_alias,
					);	
	$data['view'] 			= "canciones_mostrar_view";
	$data['sidebar']       	= 'canciones_sidebar_view';
	$this->load->view('layout', $data);
}

##############################################################

public function buscar(){
	$this->load->library('form_validation');
	$this->form_validation->set_rules('aBuscar', 'aBuscar', 'trim|required');
	if($this->form_validation->run()){
		$aBuscar = $this->input->post('aBuscar');
		$data['canciones'] 		= $this->Canciones_model->buscarCancion($aBuscar);
		}
		
		$data['title']      	= "Buscador de Letras de canciones de " ;
		$data['description']	= "Cancionero popular folklorico, letras de canciones del Folklore Argentino, Abel Pintos, Soledad, Los Nocheros, Chaqueño Palavecino";
		$data['keywords']   	= "interpretes,grupos,solistas,folklore,argentino,musica,cantores,payadores,biografias,artistas";
		$data['breadcrumb'] = array(
						'Inicio' => base_url(),
						'Letras de Canciones' => base_url().'letras-de-canciones'					
					);		
		$data['view']       	= "canciones_por_busqueda_view";
		$data['sidebar']      	= 'canciones_sidebar_view';	 
		$data['termino']      	= $aBuscar;	

		$this->load->view('layout', $data);		
}

##############################################################

public function _porLetra($letra){
	$data['filas'] 			= $this->Canciones_model->getByLetra('cancion','canc_titulo', $letra, 'canc_titulo');
	$data['title'] 			= "Letras de Canciones con " . $letra;
	$data['description']	= "Letras de Canciones con " . $letra . ", cancionero de musica folklorica y popular";
	$data['keywords']		= "letras,canciones,musica,folklorica,popular,cancionero,folklore,argentina";
	$data['interpretes'] 	= $_SESSION['interpretes'];
	$data['redirigir']     	= "letras-de-canciones-de-";	
	$data['letra']			= $letra;	
	$data['view'] 			= 'canciones_por_letra_view';
	$data['sidebar']       	= 'canciones_sidebar_view';
	$this->load->view('layout', $data);	
}

##############################################################

public function _deUnInterprete($canc_id){
	$data['cancion'] 		= $this->Canciones_model->getByID('cancion','canc_id',$canc_id);
	$data['interpretes'] 	= $this->Canciones_model->getInterpretesConCanciones();	
	$data['title'] 			= "Letras de Canciones del Folklore Argentino";
	$data['description']	= "Letras de Canciones del Folklore Argentino";
	$data['keywords']		= "letras,canciones";
	$data['letra']			= "A";	
	$data['pagina']     	= "letras-de-canciones";
	$data['view'] 			= 'canciones_mostrar_view';
	$data['sidebar']       	= 'canciones_sidebar_view';
	$this->load->view('layout', $data);	
}

##############################################################

public function _porInterprete($inte_alias){
	$data['filas'] 			= $this->Canciones_model->getPorInterprete($inte_alias);
	$data['fila'] 			= $this->Canciones_model->getByID('interprete', 'inte_id', $inte_id);
	$data['title'] 			= "Letras de Canciones de " . $data['fila']->inte_nombre;
	$data['description']	= "Letras de Canciones del Folklore Argentino" . $data['fila']->inte_nombre;
	$data['keywords']		= "letras,canciones" . $data['fila']->inte_nombre.",cancionero,popular";
	$data['interpretes'] 	= $this->Canciones_model->getInterpretesConCanciones();
	$data['redirigir']     	= "letras-de-canciones-de-";
	$data['view'] 			= 'canciones_por_interprete_view';
	$data['sidebar']       	= 'canciones_sidebar_view';
	$this->load->view('layout', $data);	
}






############################################################
############################################################
############################################################


############################################################

public function interpetesPorLetra($inte_letra){
	$this->load->model('interpretes/Interpretes_model');
	$data['filas'] 			= $this->Interpretes_model->getByLetra('interprete','inte_nombre',$inte_letra);

	$data['title'] 			= "Letras de Canciones del Folklore Argentino";
	$data['description']	= "Letras de Canciones del Folklore Argentino";
	$data['keywords']		= "letras,canciones";

	$data['interpretes'] 	= $_SESSION['interpretes'];
	$data['redirigir']     	= "letras-de-canciones-de-";

	$data['letra']			= $inte_letra;	
	$data['view'] 			= 'canciones_de_interpretes_por_letra_view';
	$this->load->view('layout', $data);	
}



############################################################################################################
###
###		Funciones para ejecutar desde cualquier modulo con vista partial
###
############################################################################################################

############################################################
###
###			Arma una vista parcial de las X ultimas canciones
###

public function ultimas($cant){
	$data['canciones']   	= $this->Canciones_model->get_Ultimas($cant);
	$data['titulo'] 		= "Ultimas " . $cant ." canciones";
	$this->load->view('canciones_partial_view', $data);
}





############################################################
public function sugerir_old(){

if (!$this->ion_auth->logged_in() AND !$this->facebook->is_authenticated()){
	redirect('/auth/login/');
} 
else{

	$data['title'] 			= "Letras de Canciones del Folklore Argentino";
	$data['description']	= "Letras de Canciones del Folklore Argentino";
	$data['keywords']		= "letras,canciones";

	//if( (isset($this->input->post('canc_id'))) and (isset($this->input->post('inte_id'))) ){
	$data['breadcrumb'] = array(
						'Inicio' => base_url(), 
						'Letras de canciones' => base_url().'letras-de-canciones'
					);	
	

	$this->form_validation->set_rules('canc_id', 'Cancion', 'required');
	$this->form_validation->set_rules('inte_id', 'Interprete', 'required');
	$this->form_validation->set_rules('canc_contenido', 'Letra', 'required|trim|min_length[50]');
		
	$this->form_validation->set_message('required', 'Debe introducir el campo "%s"');
	$this->form_validation->set_message('min_length', 'El campo "%s" debe ser de al menos %s carcteres');

	if($this->form_validation->run()==FALSE)
	{
		$this->load->model('interpretes/Interpretes_model');
		$data['interpretes'] 		= $this->Interpretes_model->get_all();
			
		$this->load->model('canciones/Canciones_model');
		$data['canciones'] 			= $this->Canciones_model->get_all();

		$data['canc_id']			= 	$this->input->post('canc_id');
		$data['inte_id']			= 	$this->input->post('inte_id');

		$data['view'] 				= 'canciones_sugerir_form_view';
		$this->load->view('layout', $data);
	}
	else
		{
		// Valido que venga del formulario
		$cancion['canc_id'] 			= $this->input->post('canc_id');
		$cancion['canc_contenido'] 		= nl2br($this->input->post('canc_contenido'));
		$cancion['canc_habilitado'] 	= 0;

		// Inserto la cancion en la BDD
		$this->Canciones_model->update('cancion', 'canc_id', $this->input->post('canc_id'), $cancion);
		//update($cancion,$this->input->post('canc_id'));

		// Mando un correo a los administradores
			$this->load->library('email');

			$this->email->from('info@mifolkloreargentino.com.ar', 'Mi Folklore Argentino - Cancion sugerida');
			$this->email->to('epassarelli@gmail.com','aruffo73@gmail.com','epassarelli@ambiente.gob.ar');
			
			$this->email->subject('Cancion sugerida');
			
			$mensaje = "Sugirieron la letra de la cancion: " . $this->input->post('canc_titulo') . "<br />";
			$mensaje .= "de " . $this->input->post('inte_nombre') . "<br /><br />";
			$mensaje .= nl2br($this->input->post('canc_contenido'));
			
			$this->email->message($mensaje);
			
			$this->email->send();
						
			
		//$redirecta = base_url() . "letras-de-canciones/sugerida";
		//Header("Location: $redirecta"); 
		redirect('letras-de-canciones/sugerida');
		}

	}
	// Verificar si ya existe la cancion con letra
	
}
############################################################
public function sugerida(){
	$data['title'] 			= "Letras de Canciones del Folklore Argentino";
	$data['description']	= "Letras de Canciones del Folklore Argentino";
	$data['keywords']		= "letras,canciones";

	$data['view'] 			= 'canciones_sugerida_exitosamente_view';
	$this->load->view('layout', $data);
}
############################################################
public function agregar(){
	$data['title'] 			= "Letras de Canciones del Folklore Argentino";
	$data['description']	= "Letras de Canciones del Folklore Argentino";
	$data['keywords']		= "letras,canciones";

	$this->form_validation->set_rules('canc_titulo', 'Cancion', 'required');
	$this->form_validation->set_rules('inte_id', 'Interprete', 'required');
	$this->form_validation->set_rules('canc_contenido', 'Letra', 'required|trim|min_length[50]');
		
	$this->form_validation->set_message('required', 'Debe introducir el campo "%s"');
	$this->form_validation->set_message('min_length', 'El campo "%s" debe ser de al menos %s carcteres');

	if($this->form_validation->run()==FALSE)
	{
		$this->load->model('interpretes/Interpretes_model');
		$data['interpretes'] 	= $this->Interpretes_model->getForSelect();
		$data['view'] 			= 'canciones_agregar_form_view';
		$this->load->view('layout', $data);
	}
	else
		{
		// Recolecto y aseguro los datos
		$cancion['user_id'] 			= $this->tank_auth->get_user_id();
		$cancion['canc_titulo'] 		= $this->input->post('canc_titulo');
		$cancion['canc_contenido'] 		= nl2br($this->input->post('canc_contenido'));
		$cancion['canc_habilitado'] 	= 0;
		
		$inte_id 			= $this->input->post('inte_id');
		
		// Inserto la cancion en la BDD
		$this->Canciones_model->agregar($cancion, $inte_id);

		// Mando un correo a los administradores
		$this->load->library('email');

		$this->email->from('info@mifolkloreargentino.com.ar', 'Mi Folklore Argentino - Cancion sugerida');
		$this->email->to('epassarelli@gmail.com','aruffo73@gmail.com','epassarelli@ambiente.gob.ar');
			
		$this->email->subject('Cancion agregada');
			
		$mensaje = "Agregaron la letra de la cancion: " . $this->input->post('canc_titulo') . "<br />";
		$mensaje .= nl2br($this->input->post('canc_contenido'));
			
		$this->email->message($mensaje);
			
		$this->email->send();

		redirect('letras-de-canciones/agregada');
		}
}
############################################################
public function agregada(){
	$data['title'] 			= "Letras de Canciones del Folklore Argentino";
	$data['description']	= "Letras de Canciones del Folklore Argentino";
	$data['keywords']		= "letras,canciones";

	$data['view'] 			= 'canciones_agregada_exitosamente_view';
	$this->load->view('layout', $data);
}
############################################################


#############################################################
####
####   Muestra un listado con todas mis uejas

public function miscanciones(){
	$data['title'] 			= "Letras de Canciones del Folklore Argentino";
	$data['description']	= "Letras de Canciones del Folklore Argentino";
	$data['keywords']		= "letras,canciones";
		
	if (!$this->ion_auth->logged_in()){
		redirect('/auth/login/');
	} 
	else{
		$data['filas'] 			= $this->Canciones_model->get_By('cancion' , 'user_id' , $this->tank_auth->get_user_id());
		$data['view'] 			= "mis_canciones_abm_view";
		$this->load->view('layout', $data);
	}	
}


#############################################################
####	2018-01-30
####	Muestra un listado con todas mis uejas

public function masVistoPorArtista($inte_id, $cantidad){
	$data['canciones']	= $this->Canciones_model->getCancionesMasVistasPorArtista($inte_id, $cantidad);
	$this->load->view('canciones_partial_view', $data);
}









############################################################
###
###  Sugerir cancion sin loguearse
###

public function sugerir2(){



	$data['title'] 			= "Letras de Canciones del Folklore Argentino";
	$data['description']	= "Letras de Canciones del Folklore Argentino";
	$data['keywords']		= "letras,canciones";

	//if( (isset($this->input->post('canc_id'))) and (isset($this->input->post('inte_id'))) ){
	$data['breadcrumb'] = array(
						'Inicio' => base_url(), 
						'Letras de canciones' => base_url().'letras-de-canciones'
					);	
	

	$this->form_validation->set_rules('canc_titulo', 'Titulo', 'required');
	$this->form_validation->set_rules('inte_id', 'Interprete', 'required');
	$this->form_validation->set_rules('canc_contenido', 'Letra', 'required|trim|min_length[50]');
		
	$this->form_validation->set_message('required', 'Debe introducir el campo "%s"');
	$this->form_validation->set_message('min_length', 'El campo "%s" debe ser de al menos %s carcteres');

	if($this->form_validation->run()==FALSE)
	{
		$this->load->model('interpretes/Interpretes_model');
		$data['interpretes'] 		= $this->Interpretes_model->get_all();
			
		//$this->load->model('canciones/Canciones_model');
		//$data['canciones'] 			= $this->Canciones_model->get_all();

		$data['canc_id']			= 	$this->input->post('canc_id');
		$data['inte_id']			= 	$this->input->post('inte_id');

		$data['view'] 				= 'canciones_sugerir_form_view';
		$this->load->view('layout', $data);
	}
	else
		{
		// Valido que venga del formulario
		$cancion['inte_id'] 			= $this->input->post('inte_id');
		$cancion['canc_titulo'] 		= $this->input->post('canc_titulo');
		$cancion['canc_youtube'] 		= $this->input->post('canc_youtube');
		$cancion['canc_spotify'] 		= $this->input->post('canc_spotify');
		$cancion['canc_contenido'] 		= nl2br($this->input->post('canc_contenido'));
		$cancion['canc_habilitado'] 	= 0;

		// Inserto la cancion en la BDD
		//$this->Canciones_model->update('cancion', 'canc_id', $this->input->post('canc_id'), $cancion);
		$this->Canciones_model->set('canciones', $cancion);
		//update($cancion,$this->input->post('canc_id'));

		// Mando un correo a los administradores
			$this->load->library('email');

			$this->email->from('info@mifolkloreargentino.com.ar', 'Mi Folklore Argentino - Cancion sugerida');
			$this->email->to('epassarelli@gmail.com','aruffo73@gmail.com','epassarelli@ambiente.gob.ar');
			
			$this->email->subject('Cancion sugerida');
			
			$mensaje = "Sugirieron la letra de la cancion: " . $this->input->post('canc_titulo') . "<br />";
			$mensaje .= "de " . $this->input->post('inte_nombre') . "<br /><br />";
			$mensaje .= nl2br($this->input->post('canc_contenido'));
			
			$this->email->message($mensaje);
			
			$this->email->send();
						
			
		//$redirecta = base_url() . "letras-de-canciones/sugerida";
		//Header("Location: $redirecta"); 
		redirect('letras-de-canciones/sugerida');
		}

	
	// Verificar si ya existe la cancion con letra
	
}




   public function ajaxRequestPost()
   {
      $data = array(
            'title' => $this->input->post('title'),
            'description' => $this->input->post('description')
        );
      $this->db->insert('items', $data);


      echo 'Added successfully.';  
   }
############################################################
###
###  Sugerir letra de cancion sin loguearse
###

public function sugerirLetra(){

    if(strlen($this->input->post('letra')) < 10)
	    {
	        //$message = "La letra está incompleta";
	        $mensaje = 0; 
	    }
	    else
	    {
	        $cancion['cancion_id'] = $this->input->post('cancion_id');
	        //$cancion['interprete_id'] = $this->input->post('interprete_id');
	        $cancion['letra'] = $this->input->post('letra');	        
	        $cancion['fecha'] = date('Y-m-d', time());
	        //$cancion['video'] = $this->input->post('video');		    
		    $this->db->insert('cancionessugeridas', $cancion);

		    if(ENVIRONMENT !== 'development'){
				// Mando un correo a los administradores
				$this->load->library('email');

				$this->email->from('info@mifolkloreargentino.com.ar', 'Mi Folklore Argentino - Cancion sugerida');
				$this->email->to('epassarelli@gmail.com','aruffo73@gmail.com','epassarelli@inti.gob.ar');
				
				$this->email->subject('Cancion sugerida');
				$correo = "Sugirieron la letra de la cancion ";
				// $correo = "Sugirieron la letra de la cancion: "; . $this->input->post('canc_titulo') . "<br />";
				// $correo .= "de " . $this->input->post('inte_nombre') . "<br /><br />";
				// $correo .= nl2br($this->input->post('canc_contenido'));
				
				$this->email->message($correo);			
				$this->email->send();
			}
			
			// Seteo el mensaje a ser devuelto		    	        
	        $mensaje = 1;
	        //redirect('letras-de-canciones/sugerida');
	    }

	echo $mensaje;
}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */