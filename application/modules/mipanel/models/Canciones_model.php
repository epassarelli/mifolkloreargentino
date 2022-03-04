<?php 

class Canciones_model extends MY_Model { 
   
	function __construct() { 
	  parent::__construct(); 
		$this->table = 'canciones'; 
	} 

	public function getAllBackend($value=''){
		$this->db->select('c.canc_id, c.canc_titulo, i.inte_nombre');
		$this->db->from('canciones c');
		$this->db->join('interprete i', 'c.inte_id = i.inte_id');
		// $this->db->where('i.user_id', $this->tank_auth->get_user_id());
		$query = $this->db->get();
	  return $query->result();
	}

	public function getCancionesDeMisAdministrados(){		
		$this->db->from('canciones c');
		$this->db->join('interprete i', 'c.inte_id = i.inte_id');
		$this->db->where('i.user_id', $this->tank_auth->get_user_id());
		$query = $this->db->get();
    return $query->result();
	}

	public function get_all(){
		$this->db->select('c.canc_id, c.canc_titulo, i.inte_nombre')
					->from('canciones c')
					->join('interprete i', 'c.inte_id = i.inte_id')
					->where('c.canc_habilitado', 1);
		$query = $this->db->get();
    return $query->result();
	}

}