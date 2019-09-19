<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends MX_Controller {

	function __construct(){
		if (!$this->tank_auth->is_logged_in() AND !$this->facebook->is_authenticated()){
			redirect('/auth/login/');
		} 
		else{
			parent::__construct();
			//$this->load->database();
			$this->load->library('Grocery_crud');
			
			if ($this->tank_auth->is_logged_in())
			{
				$_SESSION['email'] = $this->session->userdata('email');
			}
			else{								
                $usuario = $this->session->userdata('userData');
                $_SESSION['email'] = $usuario['email'];
				}

			if(($_SESSION['email'] == 'epassarelli@gmail.com') or ($_SESSION['email'] == 'mifolkloreargentino@gmail.com')){
				$_SESSION['admin'] = TRUE;
			}
		}
	}
	
	###################################################
	
	public function _example_output($output = null)	{
		$this->load->view('back/layout_back',(array)$output);
	}

	###################################################
	
	public function index()	{
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
	
	function interpretes(){
		$crud = new Grocery_crud();
		$crud->set_table('interprete');
		$crud->set_subject('Interprete');
		$crud->display_as('inte_nombre','Artista')
			->display_as('inte_alias','Alias')
			->display_as('inte_foto','Foto')
			->display_as('inte_biografia','Biografia')

			->display_as('inte_youtube','Youtube')
			->display_as('inte_twitter','Twitter')
			->display_as('inte_telefono','Telefono')
			->display_as('inte_correo','Email')
			->display_as('inte_instagram','Instagram')
			->display_as('inte_facebook','Facebook')

			->display_as('inte_habilitado','Estado');
		    
	    $crud->required_fields('inte_nombre','inte_biografia');
		$crud->set_field_upload('inte_foto','assets/upload/interpretes');

		if(!$_SESSION['admin']){
			
			$crud->columns('inte_foto','inte_nombre');
			$crud->fields('inte_nombre','inte_foto','inte_biografia');

			$crud->unset_delete();
			$crud->unset_edit();
			$crud->unset_export();
			$crud->unset_print();
			$crud->unset_read();
		}
		else{
			$crud->columns('inte_foto','inte_nombre','inte_correo','inte_facebook','inte_twitter','inte_instagram');
		}

		$output = $crud->render();
		$output->seccion = "Interpretes";

		//var_dump($output);die();
		$this->_example_output($output);
	}

	###################################################

	function canciones(){
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
		
		//$crud->set_relation_n_n('interpretes', 'interprete_cancion', 'interprete', 'canc_id', 'inte_id', 'inte_nombre');
		//$crud->set_relation('inte_id','interprete','inte_nombre');
		//$crud->set_relation_n_n('discos', 'album_interprete', 'interprete', 'albu_id', 'albu_id', 'albu_nombre');
		//$crud->set_relation_n_n('discos', 'album_cancion', 'canciones', 'albu_id', 'canc_id', 'canc_titulo');
		$crud->set_relation_n_n('discos', 'album_cancion', 'album', 'canc_id', 'albu_id', 'albu_titulo');
		
		if ( !$_SESSION['admin'] ) {
			
			$crud->columns('inte_id','canc_titulo','canc_contenido');
			$crud->fields('canc_titulo','inte_id','canc_contenido');			
			$crud->unset_delete();
			$crud->unset_edit();
			$crud->unset_export();
			$crud->unset_print();
			$crud->unset_read();
		}
		else{
			$crud->columns('inte_id','canc_titulo','canc_contenido','canc_youtube','discos','canc_visitas');
			$crud->fields('inte_id','canc_titulo','canc_alias', 'discos', 'canc_contenido','canc_youtube','canc_spotify','canc_habilitado');
		}

		$output = $crud->render();
		$this->_example_output($output);
	}

	###################################################

	function shows(){
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
		
		//$inte_id = $this->tank_auth->get_user_inte_id();
		//$crud->callback_before_insert(function($post_array) use ($inte_id){
		//      $post_array['inte_id'] = $inte_id;
		//      return $post_array;
		//});

		if(!$_SESSION['admin']){
			
			$crud->columns('even_fecha','inte_id','even_titulo','even_lugar');
			$crud->fields('inte_id','even_fecha','even_hora','even_titulo','even_lugar','even_direccion','prov_id','loca_id','even_detalle');

			//$crud->unset_texteditor('even_detalle','full_text');

			$crud->unset_delete();
			$crud->unset_edit();
			$crud->unset_export();
			$crud->unset_print();
			$crud->unset_read();
		}
		else{
			$crud->columns('even_fecha','inte_id','even_titulo','even_lugar','even_estado');
			$crud->fields('inte_id','even_fecha','even_hora','even_titulo','even_lugar','even_direccion','prov_id','loca_id','even_detalle','even_estado');			
		}

		$crud->set_field_upload('even_foto','assets/upload/eventos');

		$output = $crud->render();
		$this->_example_output($output);
	}

	###################################################

	function comidas(){
		$crud = new Grocery_crud();
		$crud->set_table('comidas');
		$crud->set_subject('Comida');
	    $crud->required_fields('titulo','contenido');
		$crud->set_field_upload('comi_foto','assets/upload/comidas');

		$crud->field_type('comi_alias','invisible');
		$crud->field_type('habilitado','invisible');



		if(!$_SESSION['admin']){
			
			$crud->columns('titulo','contenido');
			$crud->fields('titulo','contenido','comi_alias','habilitado');

			//$crud->unset_texteditor('contenido','full_text');

			$crud->unset_delete();
			$crud->unset_edit();
			$crud->unset_export();
			$crud->unset_print();
			$crud->unset_read();
		}

		$output = $crud->render();
		$this->_example_output($output);
	}

	###################################################
	
	function discos(){
		$crud = new Grocery_crud();
		$crud->set_table('album');
		$crud->set_subject('Album');

		$crud->display_as('albu_titulo','Titulo')
			->display_as('albu_anio','Año')
			->display_as('albu_foto','Foto')
			->display_as('albu_alias','Alias')
			->display_as('albu_habilitado','Estado');


		$crud->set_relation('inte_id','interprete','inte_nombre');
		$crud->set_relation_n_n('interpretes', 'album_interprete', 'interprete', 'albu_id', 'inte_id', 'inte_nombre');
		$crud->set_relation_n_n('canciones', 'album_cancion', 'canciones', 'albu_id', 'canc_id', 'canc_titulo');
	    $crud->required_fields('albu_titulo','albu_anio');
		$crud->set_field_upload('albu_foto','assets/upload/albunes');

		if(!$_SESSION['admin']){
			
			$crud->columns('albu_foto','albu_anio','interpretes','albu_titulo');
			$crud->fields('interpretes','albu_foto','albu_anio','albu_titulo','canciones');

			$crud->unset_delete();
			$crud->unset_edit();
			$crud->unset_export();
			$crud->unset_print();
			$crud->unset_read();
		}
		else{
			$crud->columns('albu_foto','albu_anio','interpretes','albu_titulo','canciones','albu_visitas','albu_habilitado');
			$crud->fields('interpretes','albu_foto','albu_anio','albu_titulo','albu_alias','canciones','albu_habilitado');
		}


		$output = $crud->render();
		$this->_example_output($output);
	}
	###################################################
	
	function efemerides(){
		$crud = new Grocery_crud();
		$crud->set_table('efemeride');
		$crud->set_subject('efemeride');	

		if(!$_SESSION['admin']){
			
			$crud->columns('efem_fecha','efem_contenido');		
			$crud->fields('efem_fecha','efem_contenido');

			$crud->unset_delete();
			$crud->unset_edit();
			$crud->unset_export();
			$crud->unset_print();
			$crud->unset_read();
		}

		$output = $crud->render();
		$this->_example_output($output);
	}

	###################################################
	
	function festivales(){
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

		if(!$_SESSION['admin']){
			
			$crud->columns('fies_foto','fies_provincia','fies_mes','fies_nombre','fies_habilitado');
			$crud->fields('fies_nombre','fies_detalle','fies_foto','fies_provincia','fies_mes');

			$crud->unset_delete();
			$crud->unset_edit();
			$crud->unset_export();
			$crud->unset_print();
			$crud->unset_read();
		}
		else{
			$crud->columns('fies_foto','fies_nombre','fies_provincia','fies_mes','fies_visitas','fies_habilitado');
			$crud->fields('fies_nombre','fies_alias','fies_foto','fies_detalle','fies_provincia','fies_mes','fies_habilitado');
		}
		$crud->set_field_upload('fies_foto','assets/upload/fiestas');
		$output = $crud->render();
		$this->_example_output($output);
	}

	###################################################
	
	function mitos(){
		$crud = new Grocery_crud();
		$crud->set_table('mitos');
		$crud->set_subject('Mito');

	    $crud->required_fields('titulo','contenido');
		$crud->set_field_upload('mito_foto','assets/upload/mitos');

		if(!$_SESSION['admin']){
			
			$crud->columns('titulo','contenido');
			$crud->fields('titulo','contenido');   

			//$crud->unset_texteditor('contenido','full_text');

			$crud->unset_delete();
			$crud->unset_edit();
			$crud->unset_export();
			$crud->unset_print();
			$crud->unset_read();
		}

		$output = $crud->render();
		$this->_example_output($output);
	}
	
	###################################################

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

		if(!$_SESSION['admin']){
			
			$crud->columns('inte_id','noti_titulo');
			$crud->fields('inte_id','noti_titulo','noti_detalle');   

			$crud->unset_delete();
			$crud->unset_edit();
			$crud->unset_export();
			$crud->unset_print();
			$crud->unset_read();
		}
		else{
			$crud->columns('noti_foto','noti_fecha','inte_id','noti_titulo','noti_visitas','noti_habilitado');
			$crud->fields('inte_id','noti_fecha','noti_titulo','noti_alias','noti_foto','noti_detalle','noti_habilitado'); 
		}

		
		$crud->set_field_upload('noti_foto','assets/upload/noticias');

		$output = $crud->render();
		$this->_example_output($output);		
	}

	###################################################
	
	function penias(){
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

		if(!$_SESSION['admin']){
			
			$crud->columns('peni_nombre','prov_id','loca_id');
			$crud->fields('peni_nombre','peni_direccion','prov_id','loca_id','peni_telefono','peni_foto','peni_descripcion','peni_longitud','peni_latitud');

			$crud->unset_delete();
			$crud->unset_edit();
			$crud->unset_export();
			$crud->unset_print();
			$crud->unset_read();
		}

		$output = $crud->render();
		$this->_example_output($output);
	}

	###################################################
	
	function radios(){
		$crud = new Grocery_crud();
		$crud->set_table('radios');
		$crud->set_subject('Radio');

		$crud->set_relation('loca_id','localidad','loca_nombre');
		$crud->set_relation('prov_id','provincia','prov_nombre');
 
		if(!$_SESSION['admin']){
			
			$crud->columns('nombre','amdial','fmdial');
			//$crud->fields('peni_nombre','peni_direccion','prov_id','loca_id','peni_telefono','peni_foto','peni_descripcion','peni_longitud','peni_latitud');
			
			$crud->unset_columns(array('habilitado'));
			$crud->unset_add_fields('habilitado');
			$crud->unset_texteditor('observaciones','full_text'); 
			
			$crud->unset_delete();
			$crud->unset_edit();
			$crud->unset_export();
			$crud->unset_print();
			$crud->unset_read();
		}
		
		$output = $crud->render();
		$this->_example_output($output);
	}

	###################################################
	
	function videos(){
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

		if(!$_SESSION['admin']){
			
			$crud->unset_columns(array('vide_habilitado'));
			$crud->fields('inte_id','canc_id','vide_codigo');
			
			$crud->unset_delete();
			$crud->unset_edit();
			$crud->unset_export();
			$crud->unset_print();
			$crud->unset_read();
		}

		$output = $crud->render();
		$this->_example_output($output);
	}



	function viscanint(){
		$crud = new Grocery_crud();
		//$crud->set_table('vi_visitasCancionesPorInterpretes');
		$crud->set_table('canciones');

		$crud->unset_add();
		$crud->unset_delete();
		$crud->unset_edit();

		$output = $crud->render();
		$this->_example_output($output);

	}

##########################################################################
###
###		NUEVO PANEL DE ADMINISTRACION
###

#### 	CANCIONES

public function canciones2($value='')
	{
		# code...
		$this->load->model('canciones/Canciones_model');
		$data['filas'] = $this->Canciones_model->get_By('canciones' , 'user_id' , $this->tank_auth->get_user_id());
		$data['view'] = 'miscanciones_view';
		$this->load->view('back/layout_back',$data);
	}	

}