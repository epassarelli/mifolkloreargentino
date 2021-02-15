<?php 

class Shows_model extends MY_Model { 

	public function __construct() { 
	    parent::__construct(); 
		$this->table = 'evento'; 
	} 

	public function getShowsDeMisAdministrados(){
		
		$this->db->from('evento e');
		$this->db->join('evento_interprete ei', 'ei.even_id = e.even_id');
		$this->db->join('interprete i', 'e.inte_id = i.inte_id');
		$this->db->join('user_interprete ui', 'i.inte_id = ui.inte_id');
		$this->db->where('ui.user_id', $this->tank_auth->get_user_id());
		$query = $this->db->get();
		
    	return $query->result();
	}

	public function setShow($data)
	{
		
		/////////// Inicio de Transaccion
		$this->db->trans_begin(); 

		//insertamos el show
		$this->db->insert($this->table, $data);
		//tomamos el id del insertado
		$id = $this->db->insert_id();
		//insertamos en la transpuesta
		$datos['even_id'] = $id;
		$datos['inte_id'] = $data['inte_id'];
		$this->db->insert('evento_interprete', $datos);

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

	public function updateShow($id,$data)
	{
		/////////// Inicio de Transaccion
		$this->db->trans_begin(); 

		// actualizamos en la tabla de eventos
		$this->db->where('even_id', $id);
		$this->db->update($this->table, $data);
		//Eliminamos los interpretes anteriormente relacionados en la transpuesta
		$this->db->where('even_id', $id);
		$this->db->delete('evento_interprete');
		//insertamos nuevos interpretes en la transpuesta
		$datos['even_id'] = $id;
		$datos['inte_id'] = $data['inte_id'];
		$this->db->insert('evento_interprete', $datos);

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

	public function deleteShow($id)
	{
		/////////// Inicio de Transaccion
		$this->db->trans_begin(); 

		// actualizamos en la tabla de eventos
		$this->db->where('even_id', $id);
		$this->db->delete($this->table);
		//Eliminamos los interpretes anteriormente relacionados en la transpuesta
		$this->db->where('even_id', $id);
		$this->db->delete('evento_interprete');

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