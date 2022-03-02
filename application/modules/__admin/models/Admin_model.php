<?php 

class Admin_model extends MY_Model { 

	function __construct() { 
	    parent::__construct();  
	} 

	function get_canciones_sugeridas(){
		$sql = "SELECT * FROM canciones Where canc_habilitado = 0";
		$query = $this->db->query($sql);	
	    return $query->num_rows();
	}	

	function get_comidas_sugeridas(){
		$sql = "SELECT * FROM radios Where habilitado = 0";
		$query = $this->db->query($sql);	
	    return $query->num_rows();
	}

	function get_discos_sugeridos(){
		$sql = "SELECT * FROM album Where albu_habilitado = 0";
		$query = $this->db->query($sql);	
	    return $query->num_rows();
	}

	function get_efemerides_sugeridas(){
		$sql = "SELECT * FROM efemeride Where efem_habilitado = 0";
		$query = $this->db->query($sql);	
	    return $query->num_rows();
	}

	function get_festivales_sugeridas(){
		$sql = "SELECT * FROM fiestas Where fies_habilitado = 0";
		$query = $this->db->query($sql);	
	    return $query->num_rows();
	}

	function get_fotos_sugeridas(){
		$sql = "SELECT * FROM foto Where foto_habilitado = 0";
		$query = $this->db->query($sql);	
	    return $query->num_rows();
	}

	function get_interpretes_sugeridos(){
		$sql = "SELECT * FROM interprete Where inte_habilitado = 0";
		$query = $this->db->query($sql);	
	    return $query->num_rows();
	}	

	function get_mitos_sugeridos(){
		$sql = "SELECT * FROM mitos Where habilitado = 0";
		$query = $this->db->query($sql);	
	    return $query->num_rows();
	}

	function get_noticias_sugeridas(){
		$sql = "SELECT * FROM noticia Where noti_habilitado = 0";
		$query = $this->db->query($sql);	
	    return $query->num_rows();
	}

	function get_penias_sugeridas(){
		$sql = "SELECT * FROM penia Where peni_habilitado = 0";
		$query = $this->db->query($sql);	
	    return $query->num_rows();
	}

	function get_radios_sugeridas(){
		$sql = "SELECT * FROM radios Where habilitado = 0";
		$query = $this->db->query($sql);	
	    return $query->num_rows();
	}

	function get_shows_sugeridas(){
		$sql = "SELECT * FROM radios Where habilitado = 0";
		$query = $this->db->query($sql);	
	    return $query->num_rows();
	}

	function get_usuarios_facebook(){
		$sql = "SELECT * FROM users Where oauth_provider = 'facebook'";
		$query = $this->db->query($sql);	
	    return $query->num_rows();
	}

	function get_videos_sugeridas(){
		$sql = "SELECT * FROM video Where vide_habilitado = 0";
		$query = $this->db->query($sql);	
	    return $query->num_rows();
	}




}