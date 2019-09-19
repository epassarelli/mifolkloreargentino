<?php 
class Comidas_model extends MY_Model { 
##########################################################  
function __construct() { 
	parent::__construct(); 
	$this->table = 'comidas';
} 
##########################################################
function todos(){
	$sql = "SELECT titulo, contenido, LENGTH(contenido) as letras FROM comidas ORDER BY LENGTH(contenido) asc";
	$query = $this->db->query($sql);	
    return $query->result();
}

	function getComida($idComida){
	    $this->db->where('id', $idComida);
	    $this->db->set('visitas', '`visitas`+ 1', FALSE);
	    $this->db->update('comidas');
	    $this->db->where('id', $idComida);   
	    $query = $this->db->get('comidas');
	    return $query->row();	
	}

	function getMasVisitadas(){
	    //$this->db->where('habilitado', 1);
		$this->db->order_by('visitas', 'DESC');
	   	$this->db->limit(15);
	    $query = $this->db->get('comidas');
	    return $query->result();
	}

}