<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Discografias extends MX_Controller {

function __construct(){
	parent::__construct();
	$this->load->model('Discografias_model');
	$_SESSION['seccion'] = "Discografias";
	if (ENVIRONMENT == 'development') {
		$this->output->enable_profiler(TRUE);
	}
	if(!isset($_SESSION['interpretes'])){
		$this->load->model('interpretes/Interpretes_model');
		$_SESSION['interpretes'] 	= $this->Interpretes_model->get_InterpretesCBox('interprete','inte_nombre');
	}
}

##############################################################
function index(){
	//$data['interpretes']      = $this->Discografias_model->getInterpretesConAlbunes();
	$data['ultimos']  = $this->Discografias_model->getUltimosDiscos(12);
	$data['populares']  = $this->Discografias_model->getMasVisitados(12);
	
	$data['title']      = "Discografias de Interpretes";
	$data['description']= "Discografias de autores, compositores, grupos y solistas del Folklore Argentino";
    $data['keywords']   = "interpretes,grupos,solistas,folklore,argentino,musica,cantores,payadores,albunes,discos,cds,discografia";

	$data['interpretes'] 	= $_SESSION['interpretes'];
	$data['redirigir']     	= "discografia-de-";
	$data['breadcrumb'] = array(
						'Inicio' => base_url(),
						'Discografías' => ''
					);
	$data['view']       = 'discografias_home_view';
	$data['sidebar']       	= 'discografias_sidebar_view';
	$this->load->view('layout.php', $data);
}

##############################################################

function mostrar($inte_alias,$albu_alias){

	// Traigo los datos del interprete
	$data['fila']			= $this->Discografias_model->getOneBy('interprete','inte_alias',$inte_alias);
	
	// Traigo el disco
	$data['disco'] 			= $this->Discografias_model->getAlbum($inte_alias , $albu_alias);
	
	// Traigo todas las canciones asociadas a ese disco
	$this->load->model('canciones/Canciones_model');
	$canciones  	= $this->Canciones_model->getByAlbum($data['disco']->albu_id);
	if(count($canciones) > 0){
		$data['canciones'] = $canciones;
	}

	$data['title']      	= "Disco de " . $data['fila']->inte_nombre . " | " . $data['disco']->albu_titulo;
	$data['description']	= "Discografia de " . $data['fila']->inte_nombre . " | " . $data['disco']->albu_titulo;
	$data['keywords']   	= "folklore,argentino,musica,discografias";	

	$data['interpretes'] 	= $this->Discografias_model->getInterpretesConAlbunes();
	$data['redirigir']     	= "discografia-de-";

	$data['breadcrumb'] = array(
						'Inicio' => base_url(),
						'Discografías' => site_url('discografias'),
						$data['fila']->inte_nombre => site_url('discografia-de-'. $inte_alias),
						substr($data['disco']->albu_titulo, 0, 25).'...' => ''
					);

	//echo $data['fila']->inte_id .' - '. $data['disco']->albu_id ;
	// Traigo si existen otros discos del mismo interprete menos el disco actual pasado por parametro
	$relacionados		= $this->Discografias_model->getOtrosAlbunes($data['fila']->inte_id, $data['disco']->albu_id);
	if(count($relacionados) > 0){
		$data['relacionados']	= $relacionados;
	}

	//var_dump($data['relacionados']);die();

	$data['view']       	= "discografias_mostrar_disco_view";
	$data['sidebar']       	= 'discografias_sidebar_view';

	$this->load->view('layout', $data);
}

##############################################################
function artista($alias){
	$interprete       		= $this->Discografias_model->getOneBy('interprete','inte_alias',$alias);
	$_SESSION['interprete'] = $interprete;
	$data['fila']			= $interprete;
	
	$data['filas']      	= $this->Discografias_model->getAlbunesPorInterprete($interprete->inte_id);
	
	$data['title']      	= "Discografias de " . $interprete->inte_nombre ;
	$data['description']	= "Discografias de " . $interprete->inte_nombre . ". Tambien encontrara otras de Autores, Compositores, Grupos y Solistas";
	$data['keywords']   	= "interpretes,grupos,solistas,folklore,argentino,musica,cantores,payadores,biografias,artistas".$interprete->inte_nombre;

	$data['interpretes'] 	= $this->Discografias_model->getInterpretesConAlbunes();
	$data['redirigir']     	= "discografia-de-";
	$data['breadcrumb'] = array(
						'Inicio' => base_url(),
						'Discografías' => site_url('discografias'),
						$interprete->inte_nombre => ''
					);	
	$data['view']       	= "discografias_por_interprete_view";
	$data['sidebar']       	= 'discografias_sidebar_view';

	$this->load->view('layout', $data);
}



#############################################################
####	2018-01-31
####	Los N mas vistos de X artista

function masVistoPorArtista($inte_id, $campoVisitas, $cantidad, $tabla){
	$data['discos']	= $this->Discografias_model->getMasVistoPorArtista($inte_id,$campoVisitas,$cantidad,$tabla);
	$this->load->view('discos_partial_view', $data);
}



}
/* End of file discografias.php */
/* Location: ./application/modules/discografias/controllers/discografias.php */