<?php 

class Discos_model extends MY_Model { 
  
	public function __construct() { 
	    parent::__construct(); 
		$this->table = 'album'; 
	} 

	public function getAllBackend($value=''){
		$this->db->select('a.albu_id, a.albu_anio, a.albu_titulo, i.inte_nombre');
		$this->db->from('album a');
		$this->db->join('interprete i', 'a.inte_id = i.inte_id');
		//$this->db->where('i.user_id', $this->tank_auth->get_user_id());
		$query = $this->db->get();
	  return $query->result();
	}

	public function getDiscosDeMisAdministrados(){		
		$this->db->from('album a');
		$this->db->join('album_interprete ai', 'a.albu_id = ai.albu_id');
		$this->db->join('interprete i', 'ai.inte_id = i.inte_id');
		$this->db->where('i.user_id', $this->session->userdata('user_id'));
		$query = $this->db->get();
    	return $query->result();
	}


}