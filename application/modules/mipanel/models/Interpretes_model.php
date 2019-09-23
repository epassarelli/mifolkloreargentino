<?php 

class Interpretes_model extends MY_Model { 
   
	public function __construct() { 
	    parent::__construct(); 
		$this->table = 'interprete'; 
	}
	 
	#############################################################
	###
	###		Devuelve los artistas activos que no sean ya administrados
	###		por el solicitante ni tengan un pedido en trámite

	public function getMisAdministrados($user_id){
		$this->db->where('user_id', $user_id);
		$query = $this->db->get('interprete');
    	return $query->result();
	}

	#############################################################
	###
	###		Devuelve los artistas activos que no sean ya administrados
	###		por el solicitante ni tengan un pedido en trámite

	public function getParaAdministrar(){
		$user_id = $this->tank_auth->get_user_id();
		$sql = "SELECT
					i.inte_nombre,
					i.inte_id
				FROM
					interprete i
				LEFT OUTER JOIN
					user_interprete ui ON ui.inte_id = i.inte_id
				WHERE
					i.inte_habilitado = 1 AND IFNULL(ui.user_id, 0) NOT IN ($user_id)
				ORDER BY
					i.inte_nombre";

		$query = $this->db->query($sql);
	    return $query->result();
	}


	#########################################################
	####
	#### Devuelve el Interprete 
	#### 

	public function getMiAdministrado($id){
	    $this->db->where('inte_id', $id);    
	    $query = $this->db->get('interprete');
	    return $query->row();	
	}


}