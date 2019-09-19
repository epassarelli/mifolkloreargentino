<?php 
class Discografias_model extends MY_Model { 
########################################################## 
function __construct() { 
    parent::__construct(); 
	$this->table = 'album'; 
	// albu_id, albu_titulo, albu_foto, albu_habilitado
} 

########################################################## 
###
###		Devuelve solo aquellos interpretes con albunes
###

function getInterpretesConAlbunes(){
	$sql = "SELECT
		interprete.inte_nombre,
		interprete.inte_alias,
		interprete.inte_foto,
		count(*) as discos
		FROM
		interprete
		INNER JOIN album_interprete ON album_interprete.inte_id = interprete.inte_id
		GROUP BY
		interprete.inte_nombre,
		interprete.inte_alias,
		interprete.inte_foto
		HAVING
		count(*) > 0
		ORDER BY
		count(*) DESC";
	$query = $this->db->query($sql);
    return $query->result();
}

##########################################################
function getAlbunesPorInterprete($inte_id){
	$sql = "SELECT 
			a.albu_id, 
			a.albu_titulo, 
			a.albu_alias, 
			a.albu_anio, 
			a.albu_foto, 
			i.inte_nombre, 
			i.inte_alias   
			FROM album a 
			INNER JOIN album_interprete ai ON (a.albu_id = ai.albu_id)
			INNER JOIN interprete i ON (ai.inte_id = i.inte_id)
			WHERE a.albu_habilitado = 1 and
			i.inte_id = " . $inte_id . " ORDER BY a.albu_anio desc";
	$query = $this->db->query($sql);	
    return $query->result();
}

##########################################################
function getAlbumParticular($albu_id){
    $sql = "SELECT
			album.albu_id,
			album.albu_titulo,
			album.albu_anio,
			album.albu_foto,
			interprete.inte_id,
			interprete.inte_nombre
			FROM
			album
			INNER JOIN album_interprete ON album_interprete.albu_id = album.albu_id
			INNER JOIN interprete ON album_interprete.inte_id = interprete.inte_id
			WHERE album.albu_id = " . $albu_id;
    
    $query = $this->db->query($sql);
    return $query->row();
}

##########################################################
function getUltimosAlbunes($cantidad){
    $sql = "SELECT
			album.albu_id,
			album.albu_titulo,
			album.albu_anio,
			album.albu_foto,
			interprete.inte_id,
			interprete.inte_nombre
			FROM
			album
			INNER JOIN album_interprete ON album_interprete.albu_id = album.albu_id
			INNER JOIN interprete ON album_interprete.inte_id = interprete.inte_id
			ORDER BY album.albu_id desc 
			LIMIT " . $cantidad;
	$query = $this->db->query($sql);	
    return $query->result();
}

##########################################################
###
###		Trae el album del interprete en cuestion
###

function get_Album($inte_alias , $albu_alias){
    $sql = "SELECT
			album.albu_id,
			album.albu_titulo,
			album.albu_anio,
			album.albu_foto,
			interprete.inte_id,
			interprete.inte_nombre,
			interprete.inte_alias,
			interprete.inte_foto
			FROM
			album
			INNER JOIN album_interprete ON album_interprete.albu_id = album.albu_id
			INNER JOIN interprete ON album_interprete.inte_id = interprete.inte_id
			WHERE 
			album.albu_alias = '$albu_alias'  
			AND interprete.inte_alias = '$inte_alias' ";


    $query = $this->db->query($sql);
    return $query->row();
}


#########################################################
####
#### Devuelve los N discos mas vistos de X artista
#### 2018-01-31 

  function getMasVistoPorArtista($inte_id, $campoVisitas, $cantidad, $tabla){
    $this->db->join('album_interprete', 'album_interprete.albu_id = album.albu_id');
    $this->db->join('interprete', 'album_interprete.inte_id = interprete.inte_id');
    $this->db->where('interprete.inte_id', $inte_id);
    $this->db->order_by($campoVisitas, 'DESC');
    $this->db->limit($cantidad);
    $query = $this->db->get($tabla);
    return $query->result();
  }

#########################################################
####
#### Nuevas funciones
#### 2018-08-25 

	public function getAlbum($inte_alias , $albu_alias){
        
        $this->db->where('albu_alias', $albu_alias);
        $this->db->set('albu_visitas', '`albu_visitas`+ 1', FALSE);
        $this->db->update('album');

        $this->db->where('albu_alias', $albu_alias);    
        $query = $this->db->get('album');
        return $query->row();
	}


	public function getOtrosAlbunes($inte_id, $albu_id){
		# code...
    	//$this->db->select('a.albu_id, a.albu_titulo');
    	$this->db->join('album_interprete ai', 'ai.albu_id = a.albu_id');

		$this->db->where('ai.inte_id', $inte_id);
		$ignore = array($albu_id);		
		$this->db->where_not_in('ai.albu_id', $ignore);
    	
    	$query = $this->db->get('album a');
    	return $query->result();		
	}




}