<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Videos extends MX_Controller {

function __construct(){
	parent::__construct();
	$this->load->model('Videos_model');
	$_SESSION['seccion'] = "Videos";
		if (ENVIRONMENT == 'development') {
			$this->output->enable_profiler(TRUE);
		}
}
##############################################################
function index(){

	$data['title']      	= "Videos de Autores, Compositores, Interpretes";
	$data['description']	= "Videos de autores, compositores, grupos y solistas del Folklore Argentino";
    $data['keywords']   	= "interpretes,grupos,solistas,folklore,argentino,musica,cantores,payadores";
    
    //$this->load->model('biografias/Biografias_model');    
	//$data['interpretes'] 	= $this->Biografias_model->get_todos('interprete','inte_nombre');
	$data['interpretes'] 	= $this->Videos_model->getInterpretesConVideos(0);
	$data['redirigir']     	= "videos-de-";
	$data['breadcrumb'] = array(
						'Inicio' => base_url()
					);	
	$data['view']       	= 'videos_home_view';
	$data['sidebar']       	= 'videos_sidebar_view';

	$this->load->view('layout.php', $data);
}

##############################################################
function artista($alias){
	//echo $alias;
	$interprete       		= $this->Videos_model->getOneBy('interprete','inte_alias',$alias);
	$data['fila']			= $interprete;
	$data['filas']			= $this->Videos_model->videos_x_interprete($interprete->inte_id);
	$data['title']      	= "Videos de " . $interprete->inte_nombre ;
	$data['description']	= "Videos de " . $interprete->inte_nombre . ". Tambien encontrara otras de Autores, Compositores, Grupos y Solistas";
	$data['keywords']   	= "videos,videoclips,filmaciones,interpretes,grupos,solistas,folklore,argentino,musica,cantores,payadores,biografias,artistas".$interprete->inte_nombre;
    
    $this->load->model('interpretes/Interpretes_model');  
	$data['interpretes'] 	= $this->Interpretes_model->get_todos('interprete','inte_nombre');
	$data['redirigir']     	= "videos-de-";
	$data['breadcrumb'] = array(
						'Inicio' => base_url()
					);
	$data['view']       	= "videos_por_interprete_view";
	$data['sidebar']       	= 'videos_sidebar_view';

	$this->load->view('layout', $data);
}
##############################################################
function mostrar($inte_alias , $vide_alias){

	$data['video'] 			= $this->Videos_model->get_video($inte_alias , $vide_alias);
	$interprete       		= $this->Videos_model->getOneBy('interprete','inte_alias',$inte_alias);
	$data['fila']			= $interprete;
	
	$data['filas']			= $this->Videos_model->get_videos_recomendados($interprete->inte_id, $data['video']->vide_id);
	
	$data['title'] 			= "Videos de " . $interprete->inte_nombre . " | " . $data['video']->canc_titulo;
	$data['description']	= "Videos de " . $interprete->inte_nombre . " | " . $data['video']->canc_titulo;
	$data['keywords']		= "videos, folklore, letras, canciones, cancionero, popular, musica, folklorica, " . $interprete->inte_nombre;	
			
	// Artistas que estan relacionados con esta cancion
	$data['artistas']	= ""; 
	
	// Albunes en donde se encuentra esta cancion
	$data['discos']			= "";
	$data['breadcrumb'] = array(
						'Inicio' => base_url(),
						'Videos de ' . $interprete->inte_nombre => base_url() . 'videos-de-' . $interprete->inte_alias,
					);	
	$data['view'] 			= "videos_mostrar_view";
	$data['sidebar']       	= 'videos_sidebar_view';
	
	$data['interpretes'] 	= $this->Videos_model->get_todos('interprete','inte_nombre');
	$data['redirigir']     	= "videos-de-";

	$this->load->view('layout', $data);
}

###################################################
###
###		Devuelve una vista con los ultimos X videos

function ultimos($cant){
	$data['filas']  = $this->Videos_model->getUltimosVideos($cant);
	$data['titulo'] = "Ultimos " . $cant ." videos"; 
	$this->load->view('videos_ultimos_view', $data);	
}

###################################################
###
###		Devuelve una vista con los videos + vistos

function vistos($cant){
	$data['filas']  = $this->Videos_model->getMasVistos($cant);
	$data['titulo'] = "Los " . $cant ." videos mas vistos"; 
	$this->load->view('videos_ultimos_view', $data);	
}

###################################################
###
###		Formulario para sugerir videos

function sugerir(){
if (!$this->ion_auth->logged_in()){
		redirect('/auth/login/');
	} 
	else{
		// Formuario o insercion de sugerencia + mail
		$this->form_validation->set_rules('codigo', 'codigo', 'required|trim|min_length[10]|max_length[10]');
		$this->form_validation->set_rules('interprete', 'interprete', 'required|trim');
		
		$this->form_validation->set_message('required', 'Debe introducir el campo "%s"');
		$this->form_validation->set_message('min_length', 'El campo "%s" debe ser de al menos %s carcteres');
		
		if($this->form_validation->run()==FALSE){
			
			$this->load->model('interprete/Interpretes_model');
			$data['interpretes'] 	= $this->Interpretes_model->getToSelectForm();
			
			$this->load->model('cancion/Canciones_model');
			$data['cancion'] 		= $this->Canciones_model->getToSelectForm();			

			// Agregar en tabla videos (user_id, )
			$data['breadcrumb'] = array(
								'Inicio' => base_url()
							);
			
			$data['view'] 	= "videos_form_new_view";
			$data['accion'] = "videos/sugerir";
			$this->load->view('layout', $data);			
		}
		else{

			$video['codigo'] 		= $this->input->post('codigo');
			$video['interprete'] 	= $this->input->post('interprete');
			$video['cancion'] 		= $this->input->post('cancion');
			$video['user_id'] 		= $this->tank_auth->get_user_id();
			$video['cancion_new'] 	= $this->input->post('cancion_new');

			// inserto en tabla de sugerencias
			$this->Videos_model->insert('videos_sugeridos',$video);

			// Envio correo al Admin y al Colaborador

			$redirecta = base_url() . "videos/gracias";
			Header("Location: $redirecta"); 
			
		}		
	}	
}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */