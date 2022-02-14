<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends MX_Controller {

	function __construct(){
		
		// print_r($this->session->userdata()); die;
		
		if (!$this->ion_auth->logged_in()){
			
			redirect('/auth/login/');
		} 
		else{ 
			parent::__construct();
			$this->load->library('Grocery_crud', 'recaptcha');
			$this->load->helper('url');

		}

		if (ENVIRONMENT == 'development') {
			$this->output->enable_profiler(TRUE);
		}
	}
	

	###################################################
	
	public function _example_output($output = null)	{
		
		$this->load->view('layout',(array)$output);
	}

	###################################################
	#
	# DASHBOARD
	#
	
	public function index(){
		$this->load->model('Admin_model');
		$data['title'] = 'Mi panel de administración';		
		if (!$this->ion_auth->is_admin())
		{
			$data['view'] = 'admin_home_view';
		}
		else
		{
			$data['usuarios'] 		= $this->Admin_model->get_usuarios_facebook();
			$data['interpretes'] 	= $this->Admin_model->get_interpretes_sugeridos();
			$data['discos'] 		= $this->Admin_model->get_discos_sugeridos();
			$data['canciones'] 		= $this->Admin_model->get_canciones_sugeridas();
			$data['fotos'] 			= $this->Admin_model->get_fotos_sugeridas();
			$data['noticias'] 		= $this->Admin_model->get_noticias_sugeridas();
			$data['shows'] 			= $this->Admin_model->get_shows_sugeridas();
			$data['comidas'] 		= $this->Admin_model->get_comidas_sugeridas();
			$data['mitos'] 			= $this->Admin_model->get_mitos_sugeridos();
			$data['videos'] 		= $this->Admin_model->get_videos_sugeridas();
			$data['penias'] 		= $this->Admin_model->get_penias_sugeridas();
			$data['radios'] 		= $this->Admin_model->get_radios_sugeridas();
			$data['festivales'] 	= $this->Admin_model->get_festivales_sugeridas();
			$data['festivales'] 	= $this->Admin_model->get_efemerides_sugeridas();			
			$data['view'] = 'admin_home_pendientes_view';
		}

		$data['view'] = 'admin_home_view';
		$this->load->view('layout',$data);
	}

	###################################################
	#
	# FAQS
	#

	public function faqs(){

		$crud = new Grocery_crud();
		$crud->set_table('faqs');
		$crud->set_subject('FAQ');
		$crud->set_theme('flexigrid');

		$crud->display_as('faqscategoria_id','Categoria');

		$crud->set_relation('faqscategoria_id','faqscategorias','nombre');

		$output = $crud->render();
		$this->_example_output($output);
	}

	###################################################
	#
	# Categorias / Secciones de FAQS
	#

	public function faqscategorias(){

		$crud = new Grocery_crud();
		$crud->set_table('faqscategorias');
		$crud->set_subject('Categoria');
		$crud->set_theme('flexigrid');
		$output = $crud->render();
		$this->_example_output($output);
	}

	###################################################
	#
	# FAQS
	#

	public function provincias(){

		$crud = new Grocery_crud();
		$crud->set_table('provincia');
		$crud->set_subject('provincia');
		$crud->set_theme('flexigrid');

		$crud->display_as('pais_id','Pais');

		$output = $crud->render();
		$this->_example_output($output);
	}

	###################################################
	#
	# FAQS
	#

	public function localidad(){

		$crud = new Grocery_crud();
		$crud->set_table('localidad');
		$crud->set_subject('localidad');
		$crud->set_theme('flexigrid');

		$crud->display_as('prov_id','Provincia');

		$crud->set_relation('prov_id','provincia','prov_nombre');

		$output = $crud->render();
		$this->_example_output($output);
	}

	###################################################
	#
	# FAQS
	#

	public function guias(){

		$crud = new Grocery_crud();
		$crud->set_table('guias');
		$crud->set_subject('FAQ');
		$crud->set_theme('flexigrid');

		$crud->display_as('faqscategoria_id','Categoria');

		$output = $crud->render();
		$this->_example_output($output);
	}

	###################################################
	#
	# FAQS
	#

	public function rubros(){

		$crud = new Grocery_crud();
		$crud->set_table('rubros');
		$crud->set_subject('FAQ');
		$crud->set_theme('flexigrid');

		$crud->display_as('faqscategoria_id','Categoria');

		$output = $crud->render();
		$this->_example_output($output);
	}


	public function cancionesadmin(){
		$crud = new Grocery_crud();
		$crud->set_table('canciones');
		$crud->set_subject('Canciones');
		$crud->set_theme('flexigrid');

		$crud->display_as('canc_titulo','Titulo')
			->display_as('canc_alias','Alias')
			->display_as('inte_id','Interprete')
			->display_as('canc_youtube','Youtube')
			->display_as('canc_spotify','Spotify')
			->display_as('canc_visitas','Visitas')
			->display_as('canc_habilitado','Estado')
			->display_as('canc_contenido','Contenido');

		$crud->required_fields('inte_id','canc_titulo','canc_contenido');
		$crud->set_relation('inte_id','interprete','inte_nombre');
		$crud->set_relation_n_n('discos', 'album_cancion', 'album', 'canc_id', 'albu_id', 'albu_titulo');

		$crud->unset_clone();
		$crud->unset_print();
		$crud->unset_export();


		$output = $crud->render();
		$this->_example_output($output);
	}

	###################################################
	#
	# Categorias / Secciones de FAQS
	#

	public function cancionessugeridas(){

		$crud = new Grocery_crud();
		$crud->set_table('cancionessugeridas');
		$crud->set_subject('cancion');
		$crud->set_theme('flexigrid');
		$output = $crud->render();
		$this->_example_output($output);
	}

}