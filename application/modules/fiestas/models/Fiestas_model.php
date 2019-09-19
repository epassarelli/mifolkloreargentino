<?php 
class Fiestas_model extends MY_Model { 

function __construct() { 
    parent::__construct(); 
	$this->table = 'fiestas'; 
} 

function generica(){
    $this->db->select('campo1, campo2, campo3');
    $this->db->where('fies_habilitado', 1);
    $this->db->like('title', 'match');
    $this->db->join('comments', 'comments.id = blogs.id');
    $this->db->order_by('fies_visitas', 'DESC');
    $this->db->limit(6);
    $query = $this->db->get('tabla-o-vista');
    return $query->result();
}


function getFiestas(){
    $this->db->where('fies_habilitado', 1);
    $query = $this->db->get('fiestas');
    return $query->result();
}		  

function getFiestasMasVisitadas($cantidad){
    $this->db->where('fies_habilitado', 1);
    $this->db->order_by('fies_visitas', 'DESC');
    $this->db->limit($cantidad);
    $query = $this->db->get('fiestas');
    return $query->result();
}
	



function getFiesta($fiesta){
    $this->db->where('fies_alias', $fiesta);
    $this->db->set('fies_visitas', '`fies_visitas`+ 1', FALSE);

    $this->db->update('fiestas');
    $this->db->where('fies_alias', $fiesta);    
    $query = $this->db->get('fiestas');
    return $query->row();	
}
	
function getEdicion($fiesta,$edicion){
    $this->db->where('edic_alias', $edicion);
    $query = $this->db->get('ediciones');
    return $query->row();
}
	
function getPorProvincia($provincia){
    $this->db->where('fies_provincia', $provincia);
    $this->db->where('fies_habilitado', 1);
    $query = $this->db->get('fiestas');
    return $query->result();
}
	
function getPorMes($mes){
    $this->db->where('fies_mes', $mes);
    $this->db->where('fies_habilitado', 1);
    $query = $this->db->get('fiestas');
    return $query->result();
}

function getNFiestasMesActual($mes, $cantidad){
    $this->db->where('fies_mes', $mes);
    $this->db->where('fies_habilitado', 1);
    $this->db->limit($cantidad);    
    $query = $this->db->get('fiestas');
    return $query->result();
}

function getUltimasFiestas($cantidad){    
    $this->db->where('fies_habilitado', 1);
    $this->db->order_by('fies_id', 'DESC');
    $this->db->limit($cantidad);
    $query = $this->db->get('fiestas');
    return $query->result();
}


function getEdicionesDelFestival($festival){
    $this->db->where('fies_alias', $festival);
    $this->db->where('fies_habilitado', 1);
    $this->db->order_by('edic_orden', 'ASC');
    $query = $this->db->get('fiestas');
    return $query->result();
}

}