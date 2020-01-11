<?php 

class Noticias_model extends MY_Model { 
 
	public function __construct() { 
	    parent::__construct(); 
		$this->table = 'noticia'; 
	} 

	public function getNoticiasDeMisAdministrados(){
		
		$this->db->from('noticia n');
		$this->db->join('interprete i', 'n.inte_id = i.inte_id');
		$this->db->where('i.user_id', $this->tank_auth->get_user_id());
		$query = $this->db->get();
    	return $query->result();
	}

	public function setNoticia($data,$interpretes)
	{
		/////////// Inicio de Transaccion
		$this->db->trans_begin(); 

			//insertamos el show
			$this->db->insert($this->table, $data);
			//tomamos el id del insertado
			$id = $this->db->insert_id();
			//insertamos en la transpuesta
			$datos['even_id'] = $id;
			foreach ($interpretes as $int) {
				$datos['inte_id'] = $int;
				$this->db->insert('evento_interprete', $datos);	
			}

		/////////// Cierre de Transaccion
		if ($this->db->trans_status() === FALSE){      
			//Hubo errores en la consulta, entonces se cancela la transacción.   
				$this->db->trans_rollback();  
				return FALSE;    
		}else{      
			//Todas las consultas se hicieron correctamente.  
				$this->db->trans_commit();   
				return TRUE;
		}//Endif
	}


}