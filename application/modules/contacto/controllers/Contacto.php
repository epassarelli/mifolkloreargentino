<?php 
if(!defined('BASEPATH'))
	exit('No direct script access allowed');

class Contacto extends MX_Controller{

public function __construct(){
		parent::__construct();
		//$this->output->enable_profiler(FALSE);
	}

public function index(){

	//var_dump("algo");die();

	$this->load->library('form_validation');
	
	$this->form_validation->set_rules('name', 'Nombre', 'trim|required|xss_clean');
	$this->form_validation->set_rules('email', 'Email', 'required|valid_email');	
	$this->form_validation->set_rules('subject', 'Asunto', 'required|xss_clean');
	$this->form_validation->set_rules('message', 'Mensaje', 'required|xss_clean');	

	if($this->form_validation->run()){
		
		$this->load->library('email');

		$this->email->from('info@mifolkloreargentino.com.ar', 'Mi Folklore Argentino');
		$this->email->to($_POST['email'],'epassarelli@gmail.com', 'aruffo73@gmail.com');
		
		$this->email->subject($_POST['subject']);
		$this->email->message($_POST['name']. ", se ha puesto en contacto contigo y te ha dicho: ".$_POST['message']);
		
		$this->email->send();
		
		// Insertamos el mensaje en la Base de Datos
		//$this->Contacto_model->insertar($nombre,$email,$asunto,$mensaje);
		$data['breadcrumb'] = array(
						'Inicio' => base_url()
					);		
		redirect('contacto/exitoso');
		
	}
	else{
		$data['title'] 				= "Contactarnos";
		$data['description'] 		= "Puede contactarse con nosotros para saludarnos, pedirnos algo, sugerir nuevos contenidos y hacer criticas constructivas. Su opinion nos interesa";
		$data['keywords']			= "contacto";
		//$data['view']	= "contacto_view";

		$data['breadcrumb'] = array(
						'Inicio' => base_url()
					);
		$this->load->view('contacto_view', $data);
	}		
}


public function exitoso(){
	$data['title'] 				= "Contactarnos";
	$data['description'] 		= "Puede contactarse con nosotros para saludarnos, pedirnos algo, sugerir nuevos contenidos y hacer criticas constructivas. Su opinion nos interesa";
	$data['keywords']			= "contacto";
	$data['titulo']	= "Contacto Exitoso";
	$data['view']	= "contacto_exitoso_view";
	$data['sidebar_mid']    = 'contacto_sidebar_mid_view';
	$data['sidebar']       	= 'contacto_sidebar_view';
	$this->load->view('layout', $data);
}


}
?>