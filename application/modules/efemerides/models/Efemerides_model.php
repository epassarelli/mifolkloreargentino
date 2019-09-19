<?php 
class Efemerides_model extends MY_Model { 
########################################################## 
function __construct() { 
    parent::__construct(); 
	$this->table = 'efemeride'; 
} 
########################################################## 
function getEfemerides(){
	$sql = "SELECT * FROM efemeride e WHERE Month(efem_fecha) = Month(Now()) AND Year(efem_fecha) = Year(Now())";
	$query = $this->db->query($sql);	
	if($query->num_rows>0){
		foreach ($query->result() as $fila) {
				$data[] = $fila;
		}
		return $data;
	}	
}		
		  
}