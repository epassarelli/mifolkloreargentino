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
		$query = $this->db
						->select('i.inte_id,i.inte_nombre, i.inte_visitas, i.inte_habilitado')
						->from('interprete i')
		        ->join('users_interpretes ui', 'i.inte_id = ui.inte_id')
                ->where("ui.user_id", $user_id)
                ->get();
    	
    	return $query->result(); 
	}

	#############################################################
	###
	###		Devuelve los artistas activos que no sean ya administrados
	###		por el solicitante ni tengan un pedido en trámite

	public function getParaAdministrar(){
		$user_id = $this->session->userdata('user_id');
		$sql = "SELECT
					i.inte_nombre,
					i.inte_id
				FROM
					interprete i
				LEFT OUTER JOIN
					users_interpretes ui ON ui.inte_id = i.inte_id
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

	#########################################################
	####
	#### Devuelve mis administrados para un Combo
	#### 

	public function getMisAdministradosCbox(){
		$query = $this->db
				->select('i.inte_id, i.inte_nombre')
				->from('interprete i')
		        ->join('users_interpretes ui', 'i.inte_id = ui.inte_id')
                ->where("ui.user_id", $this->session->userdata('user_id'))
                ->get();
    	
    	return $query->result(); 
	}

  function get_all(){
    $query = $this->db
    	->select('inte_id, inte_nombre, inte_visitas, inte_habilitado')
    	->get($this->table);    
    return $query->result();
  }


  public function deleteAdjunto($id)
    {
      $data['inte_foto'] = NULL;		
      $this->db->where('inte_id', $id)
        ->update('interprete', $data);
    }


function aprobar($id){
    $data = array('inte_habilitado' => '1');
    $this->db->where('inte_id', $id);
    $this->db->update($this->table, $data);
    // Retorna TRUE si se actualizo o FALSE en caso contrario
    return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
}


}