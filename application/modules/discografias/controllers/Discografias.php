<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Discografias extends MX_Controller {

function __construct(){
	parent::__construct();
	$this->load->model('Discografias_model');
	$_SESSION['seccion'] = "Discografias";
	if (ENVIRONMENT == 'development') {
		$this->output->enable_profiler(TRUE);
	}
}

##############################################################
function index(){
	$data['interpretes']      = $this->Discografias_model->getInterpretesConAlbunes();
	
	$data['title']      = "Discografias de Interpretes";
	$data['description']= "Discografias de autores, compositores, grupos y solistas del Folklore Argentino";
    $data['keywords']   = "interpretes,grupos,solistas,folklore,argentino,musica,cantores,payadores,albunes,discos,cds,discografia";

	//$data['interpretes'] 	= $this->Discografias_model->getInterpretesConAlbunes();
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

##############################################################
##
##
##

function sugerir(){

	$data['title']      = "Sugerir un Disco";

	$this->form_validation->set_rules('titulo', 'titulo', 'required|trim|min_length[5]');
	$this->form_validation->set_rules('detalle', 'detalle', 'required|trim|min_length[5]');
	$this->form_validation->set_rules('lugar', 'lugar', 'required|trim|min_length[5]');
	$this->form_validation->set_rules('direccion', 'direccion', 'required|trim|min_length[5]');
	
	$this->form_validation->set_rules('provincia', 'provincia', 'required');
	$this->form_validation->set_rules('localidad', 'localidad', 'required');
	$this->form_validation->set_rules('fecha', 'fecha', 'required');
	$this->form_validation->set_rules('hora', 'hora', 'required');
		
	$this->form_validation->set_message('required', 'Debe introducir el campo "%s"');
	$this->form_validation->set_message('min_length', 'El campo "%s" debe ser de al menos %s carcteres');	
	
	// Si no pasó la validacion
	if($this->form_validation->run()==FALSE)
	{	
			$this->load->model('admin/Provincias_model');
			$data['provincias'] 	= $this->Provincias_model->get_all();
			$data['breadcrumb'] = array(
								'Inicio' => base_url()
							);			
			$data['view'] 			= "discografias_sugerir_form_view";
			$data['accion'] 		= "cartelera/sugerir";
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
			
			// inserto el articulo nuestro	
			$this->Discografias_model->set('evento',$evento);	
			
			$relacion['even_id'] 		= $this->db->insert_id();
			$relacion['inte_id'] 			= $this->tank_auth->get_user_id();
			
			// inserto la relacion entre evento e interprete	
			$this->Discografias_model->set('evento_interprete',$relacion);	

			// Mando un correo a los administradores
			$this->load->library('email');
			$this->email->from('info@mifolkloreargentino.com.ar', 'Mi Folklore Argentino');
			$this->email->to('epassarelli@gmail.com', 'aruffo73@gmail.com');
			$this->email->subject('Evento sugerido');
			$mensaje = "Sugirieron un evento: " . $this->input->post('titulo') . "<br />";
			$mensaje .= "para el dia: " . $this->input->post('fecha') . "<br /><br />";
			$mensaje .= nl2br($this->input->post('detalle'));
			$this->email->message($mensaje);
			$this->email->send();

			$redirecta = base_url() . "cartelera/evento";
			Header("Location: $redirecta"); 
		}
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