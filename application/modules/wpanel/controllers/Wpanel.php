<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Wpanel extends MX_Controller {

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
		$this->load->model('admin/Admin_model');
		
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

		$data['view'] = 'admin/admin_home_view';
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

	public function localidades(){

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

	###################################################
	#
	# FAQS
	#


	public function avisos(){

		$crud = new Grocery_crud();
		$crud->set_table('avisos');
		$crud->set_subject('Aviso');
		$crud->set_theme('flexigrid');

		$crud->display_as('faqscategoria_id','Categoria');

		$output = $crud->render();
		$this->_example_output($output);
	}

	###################################################
	#
	# FAQS
	#

	public function canciones(){
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

		
		$crud->set_relation('inte_id','interprete','inte_nombre');
		$crud->set_relation('user_id','users','{first_name}, {last_name} | {email} | {oauth_provider}');
		$crud->set_relation_n_n('discos', 'album_cancion', 'album', 'canc_id', 'albu_id', 'albu_titulo');

		$crud->unset_clone();
		$crud->unset_print();
		$crud->unset_export();

		//$crud->columns('inte_id','canc_titulo','canc_youtube','canc_habilitado');
		//$crud->fields('user_id', 'inte_id','canc_titulo','canc_alias','canc_contenido','canc_youtube');
		
		$crud->required_fields('inte_id','canc_titulo','canc_contenido');
		
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
		$crud->set_relation('cancion_id','canciones','canc_titulo');
		$output = $crud->render();
		$this->_example_output($output);
	}

	###################################################
	#
	# Interpretes
	#
	
	public function interpretes(){

		$crud = new Grocery_crud();
		$crud->set_table('interprete');
		$crud->set_subject('Artista');
		$crud->set_theme('flexigrid');
		$crud->display_as('inte_nombre','Artista')
			->display_as('inte_alias','Alias')
			->display_as('inte_foto','Foto')
			->display_as('inte_biografia','Biografia')

			->display_as('inte_youtube','Youtube')
			->display_as('inte_twitter','Twitter')
			->display_as('inte_telefono','Tel. contrataciones')
			->display_as('inte_correo','Email de prensa')
			->display_as('inte_instagram','Instagram')
			->display_as('inte_facebook','Facebook')
			->display_as('inte_visitas','Visitas')
			->display_as('inte_habilitado','Estado');
		$crud->columns('inte_foto','inte_nombre','user_id','inte_correo','inte_visitas','inte_habilitado');
		$crud->order_by('inte_id','desc');
		$crud->set_relation('user_id','users','{first_name}, {last_name} | {email} | {oauth_provider}');
		$crud->set_field_upload('inte_foto','assets/upload/interpretes');
		$output = $crud->render();
		$this->_example_output($output);
	}

	###################################################
	#
	# Interpretes
	#

	public function gacetillas(){

		$crud = new Grocery_crud();
		$crud->set_table('noticia');
		$crud->set_subject('Gacetilla');
		$crud->set_theme('flexigrid');
		$crud->display_as('noti_titulo','Titulo')
			->display_as('noti_foto','Foto')
			->display_as('noti_fecha','Fecha')
			->display_as('noti_alias','Alias')
			->display_as('noti_visitas','Visitas')
			->display_as('inte_id','Artista')	
			->display_as('noti_habilitado','Estado');
		$crud->columns('noti_foto','noti_fecha','inte_id','noti_titulo','user_id','noti_visitas','noti_habilitado');
		$crud->order_by('noti_id','desc');
		$crud->set_relation('inte_id','interprete','inte_nombre');
		$crud->set_relation('user_id','users','{first_name}, {last_name} | {email} | {oauth_provider}');			
		$crud->set_field_upload('noti_foto','assets/upload/noticias');
		$output = $crud->render();
		$this->_example_output($output);
	}

	###################################################
	#
	# Interpretes
	#

	public function shows(){

		$crud = new Grocery_crud();
		$crud->set_table('evento');
		$crud->set_subject('Show');
		$crud->set_theme('flexigrid');
		$crud->set_relation('loca_id','localidad','loca_nombre');
		$crud->set_relation('prov_id','provincia','prov_nombre');
		$crud->set_relation('inte_id','interprete','inte_nombre');	
		$crud->set_relation('user_id','users','{first_name}, {last_name} | {email} | {oauth_provider}');	
		$output = $crud->render();
		$this->_example_output($output);
	}	

	###################################################
	#
	# Interpretes
	#

	public function discos(){

		$crud = new Grocery_crud();
		$crud->set_table('album');
		$crud->set_subject('Disco');
		$crud->set_theme('flexigrid');
		$crud->display_as('albu_titulo','Titulo')
			->display_as('albu_anio','Año')
			->display_as('inte_id','Interprete')
			->display_as('albu_foto','Portada')
			->display_as('albu_alias','Alias')
			->display_as('albu_visitas','Visitas')
			->display_as('albu_habilitado','Estado');		
		$crud->set_field_upload('albu_foto','assets/upload/albunes');		
		$crud->set_relation('inte_id','interprete','inte_nombre');
		$crud->set_relation('user_id','users','{first_name}, {last_name} | {email} | {oauth_provider}');
		$output = $crud->render();
		$this->_example_output($output);
	}

	###################################################
	#
	# Interpretes
	#

	public function festivales(){

		$crud = new Grocery_crud();
		$crud->set_table('fiestas');
		$crud->set_subject('Festival');
		$crud->set_theme('flexigrid');
		$output = $crud->render();
		$this->_example_output($output);
	}

	public function efemerides(){

		$crud = new Grocery_crud();
		$crud->set_table('efemeride');
		$crud->set_subject('Efemeride');
		$crud->set_theme('flexigrid');
		$output = $crud->render();
		$this->_example_output($output);
	}

	public function comidas(){

		$crud = new Grocery_crud();
		$crud->set_table('comidas');
		$crud->set_subject('Comida');
		$crud->set_theme('flexigrid');
		$output = $crud->render();
		$this->_example_output($output);
	}

	public function radios(){

		$crud = new Grocery_crud();
		$crud->set_table('radios');
		$crud->set_subject('Radio');
		$crud->set_theme('flexigrid');
		$output = $crud->render();
		$this->_example_output($output);
	}

	public function penias(){

		$crud = new Grocery_crud();
		$crud->set_table('penia');
		$crud->set_subject('Peña');
		$crud->set_theme('flexigrid');
		$output = $crud->render();
		$this->_example_output($output);
	}

	public function mitos(){

		$crud = new Grocery_crud();
		$crud->set_table('mitos');
		$crud->set_subject('Mito');
		$crud->set_theme('flexigrid');
		$output = $crud->render();
		$this->_example_output($output);
	}

	public function meses(){

		$crud = new Grocery_crud();
		$crud->set_table('meses');
		$crud->set_subject('Mes');
		$crud->set_theme('flexigrid');
		$output = $crud->render();
		$this->_example_output($output);
	}

	public function videos(){

		$crud = new Grocery_crud();
		$crud->set_table('video');
		$crud->set_subject('Video');
		$crud->set_theme('flexigrid');
		$crud->set_relation('inte_id','interprete','inte_nombre');
		$crud->set_relation('user_id','users','{first_name}, {last_name} | {email} | {oauth_provider}');

		$output = $crud->render();
		$this->_example_output($output);
	}

	public function contactos(){

		$crud = new Grocery_crud();
		$crud->set_table('contactos');
		$crud->set_subject('Mensaje');
		$crud->set_theme('flexigrid');
		$output = $crud->render();
		$this->_example_output($output);
	}

	public function usuarios(){

		$crud = new Grocery_crud();
		$crud->set_table('users');
		$crud->set_subject('Usuario');
		$crud->set_theme('flexigrid');
		$output = $crud->render();
		$this->_example_output($output);
	}

	###################################################
	#
	# FAQS
	#

	public function permisos(){

		$crud = new Grocery_crud();
		$crud->set_table('users_groups');
		$crud->set_subject('Permiso');
		$crud->set_theme('flexigrid');

		$crud->display_as('user_id','Usuario')
			->display_as('group_id','Permiso');

		$crud->set_relation('user_id','users','{first_name}, {last_name} | {email} | {oauth_provider}');
		$crud->set_relation('group_id','groups','name');

		$output = $crud->render();
		$this->_example_output($output);
	}


}