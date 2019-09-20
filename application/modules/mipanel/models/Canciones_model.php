<?php 

class Canciones_model extends MY_Model { 

   
function __construct() { 
    parent::__construct(); 
	$this->table = 'canciones'; 
} 

	public function getCancionesDeMisAdministrados(){
		
		$this->db->from('canciones c');
		$this->db->join('interprete i', 'c.inte_id = i.inte_id');
		$this->db->where('i.user_id', $this->tank_auth->get_user_id());
		$query = $this->db->get();
    	return $query->result();
	}


}