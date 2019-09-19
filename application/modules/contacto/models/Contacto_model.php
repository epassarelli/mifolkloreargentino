<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Contacto_model extends MY_Model{

public function construct()
    {
        parent::__construct();
    }

function insertar($nombre,$email,$asunto,$mensaje){
        $hora = date("H:i:s");
 
        $fecha = date('Y-m-d');
        
         $data = array(
            'nombre' => $nombre,
            'email' => $email,
            'asunto' => $asunto,
            'mensaje' => $mensaje,
            'hora' => $hora,
            'fecha' => $fecha
        );
        return $this->db->insert('mensajes', $data);
    }
}