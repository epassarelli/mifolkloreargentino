<?php 

class Cartelera_model extends MY_Model { 

   
function __construct() { 
    parent::__construct(); 
	$this->table = 'cartelera'; 
} 

######################################################		  
##   Devuelve los eventos para la fecha solicitada
##

function getPorDia($even_fecha){
	$sql = "SELECT *
				FROM
				evento
				/*INNER JOIN evento_interprete ON evento.even_id = evento_interprete.even_id*/
				INNER JOIN interprete ON interprete.inte_id = evento.inte_id
				INNER JOIN provincia ON evento.prov_id = provincia.prov_id
				INNER JOIN localidad ON evento.loca_id = localidad.loca_id
				WHERE evento.even_fecha = '".$even_fecha."' AND evento.even_estado = 1 ";

	$query = $this->db->query($sql);	

    return $query->result();
}

######################################################		  
##   Devuelve la cantidad solicitada de proximos eventos activos
##

function getProximos($cantidad){
	$sql = "SELECT *
				FROM
				evento
				INNER JOIN interprete ON interprete.inte_id = evento.inte_id
				LEFT OUTER JOIN provincia ON evento.prov_id = provincia.prov_id
				LEFT OUTER JOIN localidad ON evento.loca_id = localidad.loca_id
			WHERE evento.even_fecha >= '" . date('Y-m-d',time()) . "'
			AND evento.even_estado = 1 
			ORDER BY evento.even_fecha
			LIMIT " . $cantidad ;

	$query = $this->db->query($sql);	

    return $query->result();
}

######################################################		  
##   Devuelve todas los dias del mes que tienen eventos
##

function getDiasConEventos(){
	$sql = "SELECT
				count(*),
				DAY(evento.even_fecha) as dia,
				evento.even_fecha
				FROM evento
				WHERE evento.even_fecha >= CURDATE()
				AND YEAR(evento.even_fecha) = YEAR(NOW())
				AND MONTH (evento.even_fecha) = MONTH (NOW())
				GROUP BY evento.even_fecha" ;

	$query = $this->db->query($sql);	

    return $query->result();
}



######################################################		  
##   Devuelve todas los dias del mes que tienen eventos
##
function getEventos(){
	$sql = "SELECT
				e.even_id,
				e.even_fecha,
				e.even_titulo,
				e.even_foto,
				e.even_detalle,
				i.inte_alias,
				i.inte_nombre
			FROM
				evento e
			INNER JOIN 
				evento_interprete ei ON e.even_id = ei.even_id
			INNER JOIN 
				interprete i ON i.inte_id = ei.inte_id
			WHERE
				e.even_fecha > '" . date('Y-m-d',time()) . "'";
				
	$query = $this->db->query($sql);	

    return $query->result();

}

######################################################		  
##   Devuelve todas los dias del mes que tienen eventos
##
function getEvento($id){
	$sql = "SELECT
				*
			FROM
				evento e
			INNER JOIN 
				evento_interprete ei ON e.even_id = ei.even_id
			INNER JOIN 
				interprete i ON i.inte_id = ei.inte_id
			WHERE
				e.even_id = " . $id;
				
	$query = $this->db->query($sql);	
	return $query->row();	
}

function isOwner($even_id, $inte_id){
	$sql = "SELECT * 
			FROM
				evento 
			WHERE
				even_id = " . $even_id .  "
			AND 
				inte_id = " . $inte_id ;
				
	$query = $this->db->query($sql);	
	return $query->row();	
}

######################################################		  
##   Devuelve todas los dias del mes que tienen eventos
##
function getPorInterprete($inte_alias){
	$sql = "SELECT *
			FROM evento
			INNER JOIN interprete ON interprete.inte_id = evento.inte_id
			INNER JOIN provincia ON evento.prov_id = provincia.prov_id
			INNER JOIN localidad ON evento.loca_id = localidad.loca_id
			WHERE interprete.inte_alias = '".$inte_alias."' AND evento.even_estado = 1 ";
				
	$query = $this->db->query($sql);	

    return $query->result();
}

######################################################	
###	  
###   Funciones para el Panel de Administracion
###
######################################################


function getMisEventos($inte_id){
	$sql = "SELECT
				e.even_id,
				e.even_fecha,
				e.even_titulo,
				e.even_lugar,
				e.even_direccion,
				e.even_foto,
				p.prov_nombre as even_prov,
				l.loca_nombre as even_loca
			FROM
				evento e
			INNER JOIN 
				provincia p ON p.prov_id = e.prov_id
			INNER JOIN 
				localidad l ON l.loca_id = e.loca_id				
			WHERE
				e.inte_id = " . $inte_id;
				
	$query = $this->db->query($sql);	

    return $query->result();	
}


function getMiEvento($even_id){
	$sql = "SELECT
				e.even_id,
				e.even_fecha,
				e.even_hora,
				e.even_titulo,
				e.even_lugar,
				e.even_direccion,
				e.even_foto,
				e.even_detalle,
				e.prov_id,
				e.loca_id,
				p.prov_nombre as even_prov,
				l.loca_nombre as even_loca
			FROM
				evento e
			INNER JOIN 
				provincia p ON p.prov_id = e.prov_id
			INNER JOIN 
				localidad l ON l.loca_id = e.loca_id				
			WHERE
				e.even_id = " . $even_id;
				
	$query = $this->db->query($sql);	
	return $query->row();
}


#########################################################
####
#### Devuelve los N discos mas vistos de X artista
#### 2018-01-31 

  function getUltimosPorArtista($inte_id, $campoVisitas, $cantidad, $tabla){
    $this->db->from($tabla);
    $this->db->join('interprete', 'evento.inte_id = interprete.inte_id');
    $this->db->join('provincia', 'evento.prov_id = provincia.prov_id');
    $this->db->join('localidad', 'evento.loca_id = localidad.loca_id');
    $this->db->where('evento.inte_id', $inte_id);
    $this->db->order_by($campoVisitas, 'DESC');
    $this->db->limit($cantidad);
    $query = $this->db->get();
    return $query->result();
  }



}