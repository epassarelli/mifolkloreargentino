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


}