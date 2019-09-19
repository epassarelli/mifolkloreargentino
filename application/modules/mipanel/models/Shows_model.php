<?php 

class Shows_model extends MY_Model { 

	public function __construct() { 
	    parent::__construct(); 
		$this->table = 'evento'; 
	} 

	public function getShowsDeMisAdministrados(){
		
		$this->db->from('evento e');
		$this->db->join('interprete i', 'e.inte_id = i.inte_id');
		$this->db->where('i.user_id', $this->tank_auth->get_user_id());
		$query = $this->db->get();
    	return $query->result();
	}


}