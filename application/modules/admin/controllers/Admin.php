<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends MX_Controller {

	function __construct(){
		if (!$this->ion_auth->logged_in() AND !$this->facebook->is_authenticated()){
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

		$data['view'] = 'admin_home_view';
		$this->load->view('back/layout_back',$data);
	}



	###################################################
	#
	# CANCIONES
	#

	public function canciones(){
		$crud = new Grocery_crud();
		$crud->set_table('canciones');
		$crud->set_subject('Canciones');

		$crud->display_as('canc_titulo','Titulo')
			->display_as('canc_alias','Alias')
			->display_as('inte_id','Interprete')
			->display_as('canc_youtube','Youtube')
			->display_as('canc_spotify','Spotify')
			->display_as('canc_visitas','Visitas')
			->display_as('canc_contenido','Contenido');

		$crud->required_fields('canc_titulo','canc_contenido');
		$crud->set_relation('inte_id','interprete','inte_nombre');

		switch ($this->session->userdata('user_profile')) {
			case 1: 
				// Usuario
				$crud->where('canciones.user_id', $this->session->userdata('user_id'));
				$crud->columns('inte_id','canc_titulo','canc_youtube','canc_habilitado');
				$crud->fields('user_id','canc_titulo','canc_alias', 'inte_id','canc_contenido','canc_youtube');
				
								
				$crud->unset_clone();
				$crud->unset_delete();
				break;

			case 2: 
				// Prensa
				$crud->unset_clone();
				break;

			case 3:
				// Admin MFA
				$crud->columns('inte_foto','inte_nombre','inte_correo','canc_habilitado');
				break;

			default:
				// Sin loguearse
				break;
		}

		$crud->set_relation_n_n('discos', 'album_cancion', 'album', 'canc_id', 'albu_id', 'albu_titulo');
		
		$crud->change_field_type('user_id','invisible');
		$crud->change_field_type('canc_alias','invisible');		

		$crud->callback_before_insert(array($this,'canciones_before_insert'));
		
		$output = $crud->render();
		$this->_example_output($output);
	}


	public function canciones_before_insert($post_array) {

	    $post_array['user_id'] = $this->session->userdata('user_id');
	    $post_array['canc_alias'] = strtolower(url_title($post_array['canc_titulo']));
	 	
	    return $post_array;
	} 



	###################################################
	#
	# SHOWS
	#
	
	public function shows(){
		$crud = new Grocery_crud();
		$crud->set_table('evento');
		$crud->set_subject('Show');
		$crud->display_as('even_titulo','Titulo')
			->display_as('even_fecha','Fecha')
			->display_as('even_estado','Estado')
			->display_as('even_hora','Hora')
			->display_as('even_lugar','Lugar / Club / Teatro')
			->display_as('even_direccion','Direccion')
			->display_as('prov_id','Provincia')
			->display_as('loca_id','Localidad')
			->display_as('even_foto','Cartel / Banner / Afiche');
		$crud->set_relation('loca_id','localidad','loca_nombre');
		$crud->set_relation('prov_id','provincia','prov_nombre');
		$crud->set_relation('inte_id','interprete','inte_nombre');		
			
		$crud->required_fields('even_fecha','even_titulo');

		switch ($this->session->userdata('user_profile')) {
			case 1: 
				// Usuario
				$crud->where('evento.user_id', $this->session->userdata('user_id'));
				$crud->columns('even_fecha','inte_id','even_titulo','even_lugar');
				$crud->fields('inte_id','even_fecha','even_hora','even_titulo','even_lugar','even_direccion','prov_id','loca_id','even_detalle');
											
				$crud->unset_clone();
				$crud->unset_delete();
				break;

			case 2: 
				// Prensa
				$crud->unset_clone();
				break;

			case 3:
				// Admin MFA
				$crud->columns('even_fecha','inte_id','even_titulo','even_lugar','even_estado');
				$crud->fields('inte_id','even_fecha','even_hora','even_titulo','even_lugar','even_direccion','prov_id','loca_id','even_detalle','even_estado');	
				break;

			default:
				// Sin loguearse
				break;
		}

		$crud->set_field_upload('even_foto','assets/upload/eventos');

		$output = $crud->render();
		$this->_example_output($output);
	}



	###################################################
	#
	# COMIDAS
	#

	public function comidas(){
		$crud = new Grocery_crud();
		$crud->set_table('comidas');
		$crud->set_subject('Comida');
	    $crud->required_fields('titulo','contenido');
		$crud->set_field_upload('comi_foto','assets/upload/comidas');

		$crud->field_type('comi_alias','invisible');
		$crud->field_type('habilitado','invisible');

		switch ($this->session->userdata('user_profile')) {
			case 1: 
				// Usuario
				$crud->where('canciones.user_id', $this->session->userdata('user_id'));
				$crud->columns('titulo','contenido');
				$crud->fields('titulo','contenido','comi_alias','habilitado');
											
				$crud->unset_clone();
				$crud->unset_delete();
				break;

			case 2: 
				// Prensa
				$crud->unset_clone();
				break;

			case 3:
				// Admin MFA
				$crud->columns('titulo','contenido');
				$crud->fields('titulo','contenido','comi_alias','habilitado');
				break;

			default:
				// Sin loguearse
				break;
		}


		$output = $crud->render();
		$this->_example_output($output);
	}



	###################################################
	#
	# DISCOS
	#
	
	public function discos(){
		$crud = new Grocery_crud();
		$crud->set_table('album');
		$crud->set_subject('Album');

		$crud->display_as('albu_titulo','Titulo')
			->display_as('albu_anio','Año')
			->display_as('albu_foto','Portada')
			->display_as('albu_alias','Alias')
			->display_as('albu_habilitado','Estado');

		$crud->set_relation('inte_id','interprete','inte_nombre');
		$crud->set_relation_n_n('interpretes', 'album_interprete', 'interprete', 'albu_id', 'inte_id', 'inte_nombre');
		$crud->set_relation_n_n('canciones', 'album_cancion', 'canciones', 'albu_id', 'canc_id', 'canc_titulo');
	    $crud->required_fields('albu_titulo','albu_anio');
		$crud->set_field_upload('albu_foto','assets/upload/albunes');

		switch ($this->session->userdata('user_profile')) {
			case 1: 
				// Usuario
				$crud->where('album.user_id', $this->session->userdata('user_id'));
				$crud->columns('albu_foto','albu_anio','interpretes','albu_titulo','albu_habilitado');
				$crud->fields('interpretes','albu_foto','albu_anio','albu_titulo','canciones','albu_alias','user_id');
											
				$crud->unset_clone();
				$crud->unset_delete();
				break;

			case 2: 
				// Prensa
				$crud->unset_clone();
				break;

			case 3:
				// Admin MFA
				$crud->columns('albu_foto','albu_anio','interpretes','albu_titulo','canciones','albu_visitas','albu_habilitado');
				$crud->fields('interpretes','albu_foto','albu_anio','albu_titulo','albu_alias','canciones','albu_habilitado');
				break;

			default:
				// Sin loguearse
				break;
		}

		$crud->change_field_type('user_id','invisible');
		$crud->change_field_type('albu_alias','invisible');	

		$crud->callback_before_insert(array($this,'discos_before_insert'));

		$output = $crud->render();
		$this->_example_output($output);
	}


	public function discos_before_insert($post_array) {

	    $post_array['user_id'] = $this->session->userdata('user_id');
	    $post_array['albu_alias'] = strtolower(url_title($post_array['albu_titulo']));
	 	
		return $post_array;

	}  

	###################################################
	#
	# EFEMERIDES
	#
			
	public function efemerides(){
		$crud = new Grocery_crud();
		$crud->set_table('efemeride');
		$crud->set_subject('efemeride');	

		switch ($this->session->userdata('user_profile')) {
			case 1: 
				// Usuario
				$crud->where('canciones.user_id', $this->session->userdata('user_id'));
				$crud->columns('efem_fecha','efem_contenido');		
				$crud->fields('efem_fecha','efem_contenido');
											
				$crud->unset_clone();
				$crud->unset_delete();
				break;

			case 2: 
				// Prensa
				$crud->unset_clone();
				break;

			case 3:
				// Admin MFA
				$crud->columns('efem_fecha','efem_contenido','efem_habilitado');		
				$crud->fields('efem_fecha','efem_contenido','efem_habilitado');
				break;

			default:
				// Sin loguearse
				break;
		}

		$output = $crud->render();
		$this->_example_output($output);
	}



	###################################################
	#
	# FESTIVALES
	#
	
	public function festivales(){
		$crud = new Grocery_crud();
		$crud->set_table('fiestas');
		$crud->set_subject('Fiesta');
		$crud->display_as('fies_nombre','Fiesta')
			->display_as('fies_alias','Alias')
			->display_as('fies_foto','Foto')
			->display_as('fies_provincia','Provincia')
			->display_as('fies_detalle','Detalle')
			->display_as('fies_mes','Mes')
			->display_as('fies_visitas','Visitas')
			->display_as('fies_habilitado','Estado');

		$crud->set_relation('fies_provincia','provincia','prov_nombre');

		switch ($this->session->userdata('user_profile')) {
			case 1: 
				// Usuario
				$crud->where('canciones.user_id', $this->session->userdata('user_id'));
				$crud->columns('fies_foto','fies_provincia','fies_mes','fies_nombre','fies_habilitado');
				$crud->fields('fies_nombre','fies_detalle','fies_foto','fies_provincia','fies_mes');
											
				$crud->unset_clone();
				$crud->unset_delete();
				break;

			case 2: 
				// Prensa
				$crud->unset_clone();
				break;

			case 3:
				// Admin MFA
				$crud->columns('fies_foto','fies_nombre','fies_provincia','fies_mes','fies_visitas','fies_habilitado');
				$crud->fields('fies_nombre','fies_alias','fies_foto','fies_detalle','fies_provincia','fies_mes','fies_habilitado');
				break;

			default:
				// Sin loguearse
				break;
		}

		$crud->set_field_upload('fies_foto','assets/upload/fiestas');
		$output = $crud->render();
		$this->_example_output($output);
	}



	###################################################
	#
	# MITOS
	#

	public function mitos(){
		$crud = new Grocery_crud();
		$crud->set_table('mitos');
		$crud->set_subject('Mito');

	    $crud->required_fields('titulo','contenido');
		$crud->set_field_upload('mito_foto','assets/upload/mitos');

		switch ($this->session->userdata('user_profile')) {
			case 1: 
				// Usuario
				$crud->where('canciones.user_id', $this->session->userdata('user_id'));
				$crud->columns('titulo','contenido');
				$crud->fields('titulo','contenido');   
											
				$crud->unset_clone();
				$crud->unset_delete();
				break;

			case 2: 
				// Prensa
				$crud->unset_clone();
				break;

			case 3:
				// Admin MFA
				$crud->columns('titulo','contenido');
				$crud->fields('titulo','contenido');   
				break;

			default:
				// Sin loguearse
				break;
		}

		$output = $crud->render();
		$this->_example_output($output);
	}


	
	###################################################
	#
	# NOTICIAS
	#

	public function noticias(){
		
		$crud = new Grocery_crud();
		$crud->set_table('noticia');
		$crud->set_subject('Noticia');

		$crud->display_as('noti_titulo','Titulo')
			->display_as('noti_foto','Foto')
			->display_as('noti_fecha','Fecha')
			->display_as('noti_alias','Alias')
			->display_as('noti_visitas','Visitas')
			->display_as('inte_id','Artista')	
			->display_as('noti_habilitado','Estado');

		$crud->set_relation('inte_id','interprete','inte_nombre');

		switch ($this->session->userdata('user_profile')) {
			case 1: 
				// Usuario
				$crud->where('noticia.user_id', $this->session->userdata('user_id'));
				$crud->columns('inte_id','noti_titulo');
				$crud->fields('inte_id','noti_titulo','noti_detalle');   
											
				$crud->unset_clone();
				$crud->unset_delete();
				break;

			case 2: 
				// Prensa
				$crud->unset_clone();
				break;

			case 3:
				// Admin MFA
				$crud->columns('noti_foto','noti_fecha','inte_id','noti_titulo','noti_visitas','noti_habilitado');
				$crud->fields('inte_id','noti_fecha','noti_titulo','noti_alias','noti_foto','noti_detalle','noti_habilitado');  
				break;

			default:
				// Sin loguearse
				break;
		}
		
		$crud->set_field_upload('noti_foto','assets/upload/noticias');

		$output = $crud->render();
		$this->_example_output($output);		
	}



	###################################################
	#
	# PEÑAS
	#
	
	public function penias(){
		$crud = new Grocery_crud();
		$crud->set_table('penia');
		$crud->set_subject('penia');

		$crud->display_as('peni_nombre','Nombre')
			->display_as('prov_id','Provincia')
			->display_as('loca_id','Ciudad')
			->display_as('peni_telefono','Telefono')	
			->display_as('peni_descripcion','Descripcion')
			->display_as('peni_foto','Foto')
			->display_as('peni_longitud','Longitud')
			->display_as('peni_latitud','Latitud')
			->display_as('peni_direccion','Direccion');

		$crud->set_relation('loca_id','localidad','loca_nombre');
		$crud->set_relation('prov_id','provincia','prov_nombre');
		$crud->set_field_upload('peni_foto','assets/upload/penias');

		$crud->columns('peni_nombre','prov_id','loca_id');
		$crud->fields('peni_nombre','peni_direccion','prov_id','loca_id','peni_telefono','peni_foto','peni_descripcion','peni_longitud','peni_latitud');  

		switch ($this->session->userdata('user_profile')) {
			case 1: 
				// Usuario
				$crud->where('canciones.user_id', $this->session->userdata('user_id'));
				$crud->columns('peni_nombre','prov_id','loca_id');
				$crud->fields('peni_nombre','peni_direccion','prov_id','loca_id','peni_telefono','peni_foto','peni_descripcion','peni_longitud','peni_latitud'); 
											
				$crud->unset_clone();
				$crud->unset_delete();
				break;

			case 2: 
				// Prensa
				$crud->unset_clone();
				break;

			case 3:
				// Admin MFA
				$crud->columns('noti_foto','noti_fecha','inte_id','noti_titulo','noti_visitas','noti_habilitado');
				$crud->fields('inte_id','noti_fecha','noti_titulo','noti_alias','noti_foto','noti_detalle','noti_habilitado');  
				break;

			default:
				// Sin loguearse
				break;
		}

		$output = $crud->render();
		$this->_example_output($output);
	}



	###################################################
	#
	# RADIOS
	#
	
	public function radios(){
		$crud = new Grocery_crud();
		$crud->set_table('radios');
		$crud->set_subject('Radio');

		$crud->set_relation('loca_id','localidad','loca_nombre');
		$crud->set_relation('prov_id','provincia','prov_nombre');

		switch ($this->session->userdata('user_profile')) {
			case 1: 
				// Usuario
				$crud->where('canciones.user_id', $this->session->userdata('user_id'));
				$crud->columns('nombre','amdial','fmdial');
											
				$crud->unset_clone();
				$crud->unset_delete();
				break;

			case 2: 
				// Prensa
				$crud->unset_clone();
				break;

			case 3:
				// Admin MFA
				$crud->columns('nombre','amdial','fmdial'); 
				break;

			default:
				// Sin loguearse
				break;
		}
		
		$output = $crud->render();
		$this->_example_output($output);
	}



	###################################################
	#
	# VIDEOS
	#		
		
	public function videos(){
		$crud = new Grocery_crud();
		$crud->set_table('video');
		$crud->set_subject('Video');

		$crud->display_as('inte_id','Interprete')
			->display_as('canc_id','Canciones')
			->display_as('vide_habilitado','Estado')
			->display_as('vide_codigo','Codigo');

		$crud->set_relation('inte_id','interprete','inte_nombre');
		$crud->set_relation('canc_id','canciones','canc_titulo');
	    $crud->required_fields('vide_titulo','vide_codigo','canc_id');

		switch ($this->session->userdata('user_profile')) {
			case 1: 
				// Usuario
				$crud->where('canciones.user_id', $this->session->userdata('user_id'));
											
				$crud->unset_clone();
				$crud->unset_delete();
				break;

			case 2: 
				// Prensa
				$crud->unset_clone();
				break;

			case 3:
				// Admin MFA
				
				break;

			default:
				// Sin loguearse
				break;
		}

		$output = $crud->render();
		$this->_example_output($output);
	}




}