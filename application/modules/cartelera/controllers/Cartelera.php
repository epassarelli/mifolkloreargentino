<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cartelera extends MX_Controller {

public function __construct(){
	parent::__construct();
	$this->load->model('Cartelera_model');
	$this->load->library('calendar');
	$_SESSION['seccion'] = "Shows";
		if (ENVIRONMENT == 'development') {
			$this->output->enable_profiler(TRUE);
		}
}

######################################################		  
##   Devuelve todas los proximos eventos del mes en curso
##
public function index(){	
	$data['title'] 			= "Cartelera folklorica de Argentina";
	$data['description']	= "Agenda de eventos y shows del Folklore Argentino";
	$data['keywords']		= "agenda,cartelera,eventos,shows,cultural,folkloricas,musica,popular";	
	$data['filas'] 			= $this->Cartelera_model->getProximos(10);
	$data['view'] 			= 'cartelera_home_view';

	$data['breadcrumb'] = array(
					'Inicio' => base_url(),
					'Cartelera folklórica' => ''
				);

	$data['sidebar']       	= 'cartelera_sidebar_view';
	$this->load->view('layout', $data);	
}

######################################################		  
##   Devuelve el calendario del mes actual con los dias que tienen eventos
##

public function getCalendario(){
	$eventos			= $this->Cartelera_model->getDiasConEventos();
	$data = array();
	if($eventos){
	foreach ($eventos  as $e){	
		$data[$e->dia] = base_url() . "cartelera-folklorica/dia/" . date('Y/m',time()) . "/" . $e->dia;
		}
	}
	echo $this->calendar->generate(date('Y',time()), date('m',time()), $data); 
}

######################################################		  
##   Devuelve proximos eventos del artista solicitado
##

public function getPorInterprete($inte_alias){

	$this->load->model('interpretes/Interpretes_model');
	$interprete       		= $this->Interpretes_model->getOneBy('interprete','inte_alias',$inte_alias);
	$data['fila']			= $interprete;

	$data['title'] 			= "Agenda folklorica de " . $interprete->inte_nombre;
	$data['description']	= "Proximos shows de " . $interprete->inte_nombre . " - Encontrá otros artistas en nuestra cartelera folklorica";
	$data['keywords']		= "agenda,shows,folklorica,folclore,eventos,cartelera";

	$data['filas'] 			= $this->Cartelera_model->getPorInterprete($inte_alias);

	$data['interpretes'] 	= $this->Interpretes_model->get_todos('interprete','inte_nombre');
	$data['redirigir']     	= "shows-de-";
	$_SESSION['interprete'] = $interprete;

	$data['view'] 			= 'shows_por_interprete_view';

	$data['breadcrumb'] = array(
					'Inicio' => base_url(),
					'Catelera Folklorica' => site_url('cartelera-folklorica') 
				);

	$data['sidebar']       	= 'cartelera_sidebar_view';
	$this->load->view('layout', $data);	
}

######################################################		  
##   Devuelve los eventos del mes en curso
##

public function getPorMes($anio, $mes){

	$data['title'] 			= "Agenda folklorica argentina de " . $mes . " del " . $anio;
	$data['description']	= "Agenda de shows del folklore argentino para el mes de " . $mes . " de " . $anio . ". Cartelera folklorica";
	$data['keywords']		= "";

	$data['filas'] 			= $this->Cartelera_model->getPorDia($dia, $mes, $anio);

	$data['view'] 			= 'cartelera_listado_view';

	$data['sidebar']       	= 'cartelera_sidebar_view';
	$this->load->view('layout', $data);	
}

######################################################		  
##   Devuelve los eventos del dia solicitado
##

public function getPorDia($anio, $mes, $dia){

	$even_dia	= $anio ."-". $mes ."-". $dia;
	
	// Si la fecha es anterior a hoy redirijo a la home del modulo
	if (time() < $even_dia) {
		$redirecta = base_url() . "cartelera-folklorica";
		Header("Location: $redirecta"); 
	}
	else{	
		$data['title'] 			= "Cartelera folklórica para el " . $dia ."-". $mes ."-". $anio;
		$data['description']	= "La cartelera de eventos folkórica es cargada por los artistas populares de nuestro folklore argentino";
		$data['keywords']		= "shows,eventos,cartelera,agenda,peñas,recitales,abel,pintos,soledad";

		$data['filas'] 			= $this->Cartelera_model->getPorDia($even_dia);
		$data['dia'] 			= $dia ."-". $mes ."-". $anio;

		$data['breadcrumb'] = array(
						'Inicio' => base_url(),
						'Cartelera folklórica' => site_url('cartelera-folklorica'),
						$dia ."-". $mes ."-". $anio => ''
					);

		$data['view'] 			= 'cartelera_home_view';
		$data['sidebar']       	= 'cartelera_sidebar_view';

		$this->load->view('layout', $data);	
		}
}

######################################################		  
##   Devuelve los proximos N eventos solicitados
##

public function getProximos($cantidad){

	$data['title'] 			= "Agenda folklorica de Argentina, shows y eventos";
	$data['description']	= "Agenda de shows folkloricos de Argentina de los exponenentes de nuestro folclore";
	$data['keywords']		= "agenda,folklorica,argentina,show,eventos,folclore";

	$data['filas'] 			= $this->Cartelera_model->getPorDia($dia, $mes, $anio);

	$data['view'] 			= 'cartelera_listado_view';
	$data['sidebar_mid']    = 'cartelera_sidebar_mid_view';
	$data['sidebar']       	= 'cartelera_sidebar_view';
	$this->load->view('layout', $data);	
}

##################################################################################
####
####	Devuelven vistas parciales
####
####


######################################################		  
##   Devuelve un carrousel con los proximos N eventos
##
public function getProximosCarrousel($cantidad){	
	$data['filas'] 			= $this->Cartelera_model->getProximos($cantidad);
	$this->load->view('cartelera_carrousel_view', $data);
}







####################################################
###			Nuevo Show del Artista
####################################################		

public function sugerir(){
	$data['title'] 			= "Sugerir show folklorico";
	$this->load->model('cartelera/Cartelera_model');
	
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
								
			$data['view'] 			= "cartelera_sugerir_shows_form_view";
			$data['accion'] 		= "cartelera/evento/nuevo";
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
			$evento['inte_id'] 			= $this->tank_auth->get_user_inte_id();
			
			// inserto el show	
				
						
			if ($this->Cartelera_model->set('evento',$evento)){	
			
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

			$redirecta = base_url() . "mipanel/misshows";
			Header("Location: $redirecta"); 
		}
}



#############################################################
####	2018-01-31
####	Los N mas vistos de X artista

public function ultimosPorArtista($inte_id, $campoVisitas, $cantidad, $tabla){
	$data['shows']	= $this->Cartelera_model->getUltimosPorArtista($inte_id,$campoVisitas,$cantidad,$tabla);
	$this->load->view('shows_partial_view', $data);
}

}

/* End of file welcome.php */
/* Location: ./application/modules/cartelera/controllers/cartelera.php */