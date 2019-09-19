<?php 

class Interpretes_model extends MY_Model { 
   
	public function __construct() { 
	    parent::__construct(); 
		$this->table = 'interprete'; 
	} 

	public function getMisAdministrados($user_id){
		$this->db->where('user_id', $user_id);
		$query = $this->db->get('interprete');
    	return $query->result();
	}


}