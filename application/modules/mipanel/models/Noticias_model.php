<?php 

class Noticias_model extends MY_Model { 
 
	public function __construct() { 
	    parent::__construct(); 
		$this->table = 'noticia'; 
	} 

	#########################################################
	####
	#### Devuelve noticias de mis administrados en orden descendente
	#### de fecha y con estado de aprobacion
	#### 	

	public function getNoticiasDeMisAdministrados(){
	
		$query = $this->db
				->select('n.noti_fecha, n.noti_id, n.noti_titulo, n.inte_id, n.noti_habilitado, i.inte_nombre')
				->from('noticia n')
				->join('user_interprete ui', 'n.inte_id = ui.inte_id')
		        ->join('interprete i', 'ui.inte_id = i.inte_id')	        
                ->where("ui.user_id", $this->tank_auth->get_user_id())
                ->order_by('n.noti_fecha', 'desc')
                ->get();
    	
    	return $query->result(); 
	}


	#########################################################
	####
	#### Devuelve noticias de mis administrados en orden descendente
	#### de fecha y con estado de aprobacion
	#### 	

	public function cambiarEstado($id){
		
		$sql = "UPDATE noticia 
				SET noti_habilitado = noti_habilitado * (-1) 
				WHERE noti_id = " . $id;
    	
    	$this->db->query($sql);

	}

}