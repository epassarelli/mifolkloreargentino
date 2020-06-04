<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Noticias extends MX_Controller {

public function __construct(){
	parent::__construct();
	$this->load->model('Noticias_model');
	$this->load->model('interpretes/Interpretes_model');
	$_SESSION['seccion'] = "Noticias";
	if (ENVIRONMENT == 'development') {
		$this->output->enable_profiler(TRUE);
	}
	if(!isset($_SESSION['interpretes'])){
		$_SESSION['interpretes'] 	= $this->Noticias_model->get_InterpretesCBox('interprete','inte_nombre');
	}
}

##############################################################

public function index(){
	$data['filas']      	= $this->Noticias_model->getUltimas(15);
	$data['title']      	= "Noticias del Folklore Argentino";
	$data['description']	= "Noticias, prensa y gacetillas de los artistas de nuestro Folklore Argentino. Shows y festivales folkloricos de tus musicos favoritos";
    $data['keywords']   	= "interpretes,grupos,solistas,folklore,argentino,musica,cantores,payadores";
	$data['interpretes'] 	= $_SESSION['interpretes'];
	$data['redirigir']     	= "noticias-de-";
	
	$data['view']       	= 'noticias_home_view';
	$data['breadcrumb'] = array(
						'Inicio' => base_url(),
						'Noticias' => ''
					);
	$data['sidebar']       	= 'noticias_sidebar_view';

	$this->load->view('layout.php', $data);
}

##############################################################
public function mostrar($slugArtista, $slugNoticia){
	$interprete       		= $this->Noticias_model->getByID('interprete','inte_id',$id);
	$data['fila']			= $interprete;
	$data['title']      	= "Noticias de " . $interprete->inte_nombre ;
	$data['description']	= "Noticias de " . $interprete->inte_nombre . ". Tambien encontrara otras de Autores, Compositores, Grupos y Solistas de nuestro folklore argentino";
	$data['keywords']   	= "interpretes,grupos,solistas,folklore,argentino,musica,cantores,payadores,biografias,artistas".$interprete->inte_nombre;
	
	$data['interpretes'] 	= $_SESSION['interpretes'];
	$data['redirigir']     	= "noticias-de-";		
	$data['view']       	= "noticias_mostrar_view";
	$data['breadcrumb'] = array(
						'Inicio' => base_url()
					);
	$data['sidebar']       	= 'noticias_sidebar_view';

	$this->load->view('layout', $data);
}
##############################################################
public function artista($alias){
	$interprete       		= $this->Noticias_model->getOneBy('interprete','inte_alias',$alias);
	$data['filas'] 			= $this->Noticias_model->getPorInterprete($alias);
	$data['fila']			= $interprete;
	
	$data['title']      	= "Noticias de " . $interprete->inte_nombre ;
	$data['description']	= "Noticias y gacetillas de " . $interprete->inte_nombre . ". Actualidad del Folklore Argentino. Sus shows y festivales";
	$data['keywords']   	= "interpretes,grupos, solistas, folklore, argentino, musica, cantores,payadores, biografias,artistas".$interprete->inte_nombre;

	$data['interpretes'] 	= $_SESSION['interpretes'];
	$data['redirigir']     	= "noticias-de-";

	$_SESSION['interprete'] = $interprete;
	
	$data['slugArtista']     = $alias;
	$data['view']       	= "noticias_por_interprete_view";
	$data['breadcrumb'] = array(
						'Inicio' => base_url(),
						'Noticias' => site_url('noticias'),
						'Noticias de ' . $data['fila']->inte_nombre => ''
					);
	$data['sidebar']       	= 'noticias_sidebar_view';

	$this->load->view('layout', $data);
}

public function limpiarCaracteresEspeciales($string ){
	$string = htmlentities($string);
	$string = preg_replace('/\&(.)[^;]*;/', '\\1', $string);
	return $string;
}

##############################################################
public function ver($slugNoticia){
	$data['noticia']		= $this->Noticias_model->getNoticia($slugNoticia);
	
	$data['title']      	= $data['noticia']->noti_titulo;
	$data['description'] 	= substr($data['noticia']->noti_detalle,0,150);
	$data['keywords']   	= "interpretes, grupos, solistas, folklore, argentino, musica, cantores, payadores,biografias, artistas";
	
	$data['noticias']      	= $this->Noticias_model->getUltimas(5);
	$data['interpretes'] 	= $_SESSION['interpretes'];
	
	$data['redirigir']     	= "noticias-de-";		
	$data['view']       	= "noticias_mostrar_view";
	$data['breadcrumb'] = array(
						'Inicio' => base_url(),
						'Noticias' => site_url('noticias'),
						substr($data['noticia']->noti_titulo, 0, 25).'...' => ''
					);
	$data['sidebar']       	= 'noticias_sidebar_view';
	
	
	$this->load->view('layout', $data);
}
#############################################################
##
##		Funciones privadas de las noticias
##

####################################################
###			Listado de Noticias del Artista
####################################################	

function misnoticias(){
	$inte_id 		= $this->tank_auth->get_user_inte_id();
	$data['filas']	= $this->Noticias_model->getMisNoticias($inte_id);

	$data['view'] 	= "misnoticias_view";
	$this->load->view('layout', $data);		
}

####################################################
###			Nueva Gacetilla del Artista
####################################################

function nueva(){
	
	$this->form_validation->set_rules('titulo', 'titulo', 'required|trim|min_length[5]');
	$this->form_validation->set_rules('detalle', 'detalle', 'required|trim|min_length[5]');
		
	$this->form_validation->set_message('required', 'Debe introducir el campo "%s"');
	$this->form_validation->set_message('min_length', 'El campo "%s" debe ser de al menos %s carcteres');	
	
	// Si no pasó la validacion
	if($this->form_validation->run()==FALSE)
	{				
			$data['view'] 			= "misnoticias_form_view";
			$data['accion'] 		= "cartelera/evento/nuevo";
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
					$this->email->subject('Show actualizado');
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



#############################################################
####	2018-01-31
####	Los N ultimas de X artista

function ultimasPorArtista($inte_id, $campoVisitas, $cantidad, $tabla){
	$data['noticias']	= $this->Noticias_model->getUltimasPorArtista($inte_id,$campoVisitas,$cantidad,$tabla);
	$this->load->view('noticias_partial_view', $data);
}

}

/* End of file noticias.php */
/* Location: ./application/modules/noticias/ */