<?php 
class Ayuda_model extends MY_Model { 
  
	function __construct() { 
		parent::__construct(); 
		$this->table = 'faqs';
	} 

	public function getPorCategoria($value='')
	{
		$this->db->where('faqscategoria_id', $value);
		$this->db->where('habilitado', 1);
	    $query = $this->db->get($this->table);
	    return $query->result();
	}

}