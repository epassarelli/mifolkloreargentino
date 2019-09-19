<?php 
class Biografias_model extends MY_Model { 

##########################################################
 
function __construct() { 
    parent::__construct(); 
	$this->table = 'interprete'; 
} 

########################################################## 
	
function getBiografia($inte_id){
    $this->db->where('inte_id', $inte_id);
    $query = $this->db->get('interprete');
    return $query->row();
}		  

}