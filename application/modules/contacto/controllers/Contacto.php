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
	
	$this->form_validation->set_rules('name', 'Nombre', 'trim|required');
	$this->form_validation->set_rules('email', 'Email', 'required|valid_email');	
	$this->form_validation->set_rules('subject', 'Asunto', 'required');
	$this->form_validation->set_rules('message', 'Mensaje', 'required');	

	if($this->form_validation->run()){

		$this->load->library('email');
		$this->email->from('info@mifolkloreargentino.com.ar', 'Contacto desde MFA');
		$this->email->to('info@mifolkloreargentino.com.ar');
			
		$this->email->subject($_POST['subject']);
		

		$this->email->message($_POST['name']. " con mail " . $_POST['email'] . ", se ha puesto en contacto contigo y te ha dicho: ".$_POST['message']);
				    
	    // Send email
	    if($this->email->send())
	    {
			$data['breadcrumb'] = array(
							'Inicio' => base_url()
						);		
			redirect('contacto/exitoso');
	    }
	    else
	    	{
			$data['breadcrumb'] = array(
							'Inicio' => base_url()
						);		
			redirect('contacto');

	    	}

		
		// Insertamos el mensaje en la Base de Datos
		//$this->Contacto_model->insertar($nombre,$email,$asunto,$mensaje);

		
	}
	else{
		$data['title'] 				= "Contactarnos";
		$data['description'] 		= "Puede contactarse con nosotros para saludarnos, pedirnos algo, sugerir nuevos contenidos y hacer criticas constructivas. Su opinion nos interesa";
		$data['keywords']			= "contacto";
		$data['view']	= "contacto_view";

		$data['breadcrumb'] = array(
						'Inicio' => base_url()
					);
		$this->load->view('layout_view', $data);
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


public function enviar()
{
	# code...
    // $config = Array(
    //     'protocol' => 'smtp',
    //     'smtp_host' => 'lalo0471.ferozo.com',
    //     'smtp_port' => 465,
    //     'smtp_user' => 'info@mifolkloreargentino.com.ar',
    //     'smtp_pass' => 'Flor12Pitu19',
    //     'charset' => 'utf-8',
    //     'priority' => 1
    // );
    
    $this->load->library('email');

	// $this->email->initialize($config);

	$this->email->from('info@mifolkloreargentino.com.ar', 'Notificación desde Mi Folklore Argentino');
	$this->email->to('info@mifolkloreargentino.com.ar');
	$this->email->cc('epassarelli@gmail.com');
	 
	$this->email->subject('TEST');
	$this->email->message('Insert product');

	$this->email->send();

	var_dump($this->email->print_debugger());die();

}


}
?>