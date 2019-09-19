<?php 
class Videos_model extends MY_Model { 
########################################################## 
function __construct() { 
    parent::__construct(); 
	$this->table = 'video'; 
} 
########################################################## 
function videos_x_interprete($inte_id){	
	$sql = "SELECT
		video.vide_id,
		video.vide_codigo,
		canciones.canc_titulo,
		canciones.canc_alias
		FROM
		video
		INNER JOIN canciones ON video.canc_id = canciones.canc_id
		WHERE
		video.inte_id = " . $inte_id;

	$query = $this->db->query($sql);
    return $query->result();
}
########################################################## 
function get_video($inte_alias , $vide_alias){
	$sql = "SELECT
		video.vide_id,
		video.vide_codigo,
		canciones.canc_titulo,
		canciones.canc_alias,
		interprete.inte_alias
		FROM
		video
		INNER JOIN canciones ON video.canc_id = canciones.canc_id
		INNER JOIN interprete ON video.inte_id = interprete.inte_id
		WHERE
		canciones.canc_alias = '".$vide_alias."' AND
		interprete.inte_alias = '".$inte_alias."'";
	$query = $this->db->query($sql);

	return $query->row();
}
########################################################## 
function get_videos_recomendados($inte_id, $vide_id){	
	$sql = "SELECT
		video.vide_id,
		video.vide_codigo,
		canciones.canc_titulo,
		canciones.canc_alias
		FROM
		video
		INNER JOIN canciones ON video.canc_id = canciones.canc_id
		WHERE
		video.inte_id = " . $inte_id . " AND
		video.vide_id != " . $vide_id ;

	$query = $this->db->query($sql);
    return $query->result();
}
########################################################## 
function getUltimosVideos($cantidad){
	$sql = "SELECT
		video.vide_id,
		video.vide_codigo,
		canciones.canc_titulo,
		canciones.canc_alias,
		interprete.inte_alias,
		interprete.inte_nombre,
		interprete.inte_foto
		FROM
		video
		INNER JOIN canciones ON video.canc_id = canciones.canc_id
		INNER JOIN interprete ON video.inte_id = interprete.inte_id		
		WHERE
		video.vide_habilitado = 1
		ORDER BY video.vide_id DESC
		LIMIT " . $cantidad ;

	$query = $this->db->query($sql);
    return $query->result();
}

########################################################## 
function getMasVistos($cantidad){
	$sql = "SELECT
		video.vide_id,
		video.vide_codigo,
		canciones.canc_titulo,
		canciones.canc_alias,
		interprete.inte_alias,
		interprete.inte_foto
		FROM
		video
		INNER JOIN canciones ON video.canc_id = canciones.canc_id
		INNER JOIN interprete ON video.inte_id = interprete.inte_id		
		WHERE
		video.vide_habilitado = 1
		ORDER BY video.vide_visitas DESC
		LIMIT " . $cantidad ;

	$query = $this->db->query($sql);
    return $query->result();
}

########################################################## 
###
###		Devuelve solo aquellos interpretes que tiene videos
###

function getInterpretesConVideos($cantidad){
	if($cantidad == 0){
	$limite = "";
	}
	else{	
		$limite = $cantidad;
	}

$sql = "SELECT 
	i.inte_id, 
	i.inte_alias, 
	i.inte_nombre, 
	i.inte_foto, 
	count(*) 
	From interprete i 
	JOIN video v ON i.inte_id = v.inte_id
	Group By i.inte_id, i.inte_alias, i.inte_nombre, i.inte_foto
	Order By count(*) desc ";


	$query = $this->db->query($sql);
    return $query->result();
}


}