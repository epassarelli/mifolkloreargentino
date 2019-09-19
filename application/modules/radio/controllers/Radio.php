<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Radio extends MX_Controller {

function __construct(){
	parent::__construct();
	$this->load->model('Radios_model');
	$_SESSION['seccion'] = "Radios";
		if (ENVIRONMENT == 'development') {
			$this->output->enable_profiler(TRUE);
		}
}

/*Es el método inicial de las rutas resource, usualmente lo usamos para mostrar una vista como página principal que puede contener un catalogo o resumen de la información del modelo al cual pertenece o bien no mostrar información y solo tener la función de página de inicio.*/
function index(){
	$data['radios']			= $this->Radios_model->getUltimos('radios', 'id', 10);
	$data['title']      	= "Radios para escuchar folklore Argentino";
	$data['description']	= "Todas las radios para escuchar Folklore Argentino ya sea por internet o por aire";
	$data['breadcrumb'] = array(
						'Inicio' => base_url(),
						'Radios' => ''
					);
	$data['sidebar']       	= 'radios_sidebar_view';
	$data['view']       	= 'radios_home_view';
	$this->load->view('layout.php', $data);	
}

/* Este método lo podemos usar para direccionar el sistema a la vista donde se van a recolectar los datos(probablemente con un formulario) para después almacenarlos en un registro nuevo, usualmente redirige al index. */
function create(){
	$data['title']      	= "Radios para escuchar folklore Argentino";

	$data['breadcrumb'] = array(
						'Inicio' => base_url(),
						'Radios Folkloricas' => base_url().'radios-para-escuchar-folklore-argentino'
					);
	$data['sidebar']       	= 'radios_sidebar_view';
	$data['view']       	= 'radios_sugerir_form_view';
	$this->load->view('layout.php', $data);	
}

/*Aquí podemos hacer una consulta de un elemento de la base de datos o de todos los elementos o registros por medio del modelo para realizar una descripción.*/
function show(){

}

/*Este método es similar al de create porque lo podemos usar para mostrar una vista que recolecta los datos pero a diferencia de create es con el fin de actualizar un registro.*/
function edit(){

}

/*Aquí es donde se guarda un registro que proviene del método create y normalmente redirige al index.*/
function store(){

} 

/*Al igual que el store, solo que en vez de provenir de create proviene de edit y en vez de crear un nuevo registro, busca un existente y lo modifica, tambien suele redirigir al index.*/
function update(){

}

/*En este método usualmente se destruye o elimina un registro y la petición puede provenir de donde sea siempre y cuando sea llamado con el método DELETE, después puede redirigir al index o a otro sitio dependiendo si logro eliminar o no.*/
function destroy(){

}


function sugerir(){
	$data['title']      	= "Radios para escuchar folklore Argentino";

	$data['breadcrumb'] = array(
						'Inicio' => base_url(),
						'Radios Folkloricas' => base_url().'radios-para-escuchar-folklore-argentino'
					);
	$data['sidebar']       	= 'radios_sidebar_view';
	$data['view']       	= 'radios_sugerir_form_view';
	$this->load->view('layout.php', $data);	
}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */