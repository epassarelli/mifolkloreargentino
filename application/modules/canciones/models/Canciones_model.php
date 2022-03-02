<?php 
class Canciones_model extends MY_Model { 

	public $canc_titulo;
	public $canc_alias;
	public $canc_contenido;
	public $canc_visitas;
	public $canc_habilitado;

	function __construct() { 
	    parent::__construct(); 
		$this->table = 'canciones'; 
	}


######################################################		  
##   Devuelve todas las canciones de un Album
#

function getByAlbum($albu_id){
	$sql = "SELECT * FROM album a INNER JOIN album_cancion ac ON (a.albu_id = ac.albu_id) INNER JOIN canciones c ON (ac.canc_id = c.canc_id) Where a.albu_id = " . $albu_id;
	$query = $this->db->query($sql);	
    return $query->result();
}

######################################################
##   Devuelve las canciones habilitadas de un Interprete x ID
##   Actualizada 30-11-2018

function getPorInterprete($inte_id){
	$this->db->select('i.inte_nombre, i.inte_alias, c.canc_titulo, c.canc_alias, c.canc_contenido');
	$this->db->from('canciones c');
	$this->db->join('interprete i','c.inte_id = i.inte_id');
	$this->db->where('c.inte_id', $inte_id);
	$this->db->where('c.canc_habilitado', 1);
	$this->db->order_by('c.canc_titulo', 'ASC');	
	$query = $this->db->get();	
    return $query->result();
}


#############################################################
###
###
###

function get_Cancion($inte_id,$canc_alias){

	$sql = "SELECT
		interprete.inte_id,
		interprete.inte_nombre,
		interprete.inte_alias,
		interprete.inte_foto,
		canciones.canc_id,
		canciones.canc_titulo,
		canciones.canc_alias,
		canciones.canc_contenido,
		canciones.canc_youtube,
		canciones.canc_spotify,
		canciones.canc_visitas
		FROM
		interprete
		INNER JOIN canciones ON interprete.inte_id = canciones.inte_id
		WHERE interprete.inte_id = '$inte_id'
		AND canciones.canc_alias = '$canc_alias' limit 1";		
	$sql2 = "UPDATE canciones SET canc_visitas = canc_visitas + 1 WHERE canc_alias = '$canc_alias' AND inte_id = '$inte_id'";
    $this->db->query($sql2);
    $query = $this->db->query($sql);
    return $query->row();	
}

#############################################################
###
###
###

function buscarCancion($aBuscar){
	$this->db->select('i.inte_nombre,i.inte_alias,c.canc_titulo,c.canc_alias');
	$this->db->from('canciones c');
	$this->db->join('interprete i','c.inte_id = i.inte_id');
	$this->db->like('canc_titulo', $aBuscar);
	$query = $this->db->get();	
    return $query->result();	
}

###############################################################
##
##
##

function get_Ultimas($cantidad){
	$this->db->select('i.inte_nombre,i.inte_alias,c.canc_titulo,c.canc_alias,i.inte_foto');
	$this->db->from('canciones c');
	$this->db->join('interprete i','c.inte_id = i.inte_id');
	$this->db->where('c.canc_habilitado', 1);	
	$this->db->where('LENGTH(c.canc_contenido)>', 20);
	$this->db->order_by('c.canc_id', 'desc');	
	$this->db->limit($cantidad);
	$query = $this->db->get();	
    return $query->result();
}

###############################################################
##
##
##


function get_Ranking_Canciones($cantidad){
	$this->db->select('i.inte_nombre,i.inte_alias,c.canc_titulo,c.canc_alias,c.canc_visitas,i.inte_foto');
	$this->db->from('canciones c');
	$this->db->join('interprete i','c.inte_id = i.inte_id');	
	$this->db->order_by('c.canc_visitas', 'desc');
	$this->db->limit($cantidad);	
	$query = $this->db->get();	
    return $query->result();
}


###############################################################
##
##
##

function agregar($cancion, $inte_id){
	// Inserto la cancion
    $this->db->insert('cancion', $cancion);    
	// Obtengo el id insertado
	$data['inte_id']		= $inte_id;
	$data['canc_id']		= $this->db->insert_id();	
	// Inserto la relacion de cancion con interprete
	$this->db->insert('interprete_cancion', $data);
}




#### Devuelve las N canciones mas vistas de X artista
#### Tabla = cancion, disco, video, noticia, etc
#### 2018-01-30 

  function getMasVistoPorArtista($inte_id, $campoVisitas, $cantidad, $tabla){
    $this->db->join('interprete_cancion', 'cancion.canc_id = interprete_cancion.canc_id');
    $this->db->join('interprete', 'interprete.inte_id = interprete_cancion.inte_id');
    $this->db->where('interprete.inte_id', $inte_id);
    $this->db->order_by($campoVisitas, 'DESC');
    $this->db->limit($cantidad);
    $query = $this->db->get($tabla);
    return $query->result();
  }


######################################################
###
###		Devuelve los interpretes con canciones ordenados
###		x cantidad descendente

function getInterpretesConCanciones(){
	$sql = "SELECT
			interprete.inte_id,
			interprete.inte_nombre,
			interprete.inte_alias,
			interprete.inte_foto,
			count(*) as cantidad
			FROM
			interprete
			INNER JOIN interprete_cancion ON interprete_cancion.inte_id = interprete.inte_id
			INNER JOIN cancion ON interprete_cancion.canc_id = cancion.canc_id
			GROUP BY interprete.inte_id,
			interprete.inte_nombre,
			interprete.inte_alias,
			interprete.inte_foto
			ORDER BY interprete.inte_nombre";

	$query = $this->db->query($sql);	
	return $query->result();
	
}

###############################################################
##
##
##

function getCancionesMasVistasPorArtista($inte_id, $cantidad){

	$this->db->select('i.inte_nombre,i.inte_alias,i.inte_foto,c.canc_titulo,c.canc_alias,c.canc_visitas');
	$this->db->from('canciones c');
	$this->db->join('interprete i','c.inte_id = i.inte_id');
	$this->db->where('c.inte_id', $inte_id); 	
	$this->db->order_by('c.canc_visitas', 'desc');
	$this->db->limit($cantidad);


    //$this->db->where('inte_id', $inte_id);  
    //$this->db->order_by('canc_visitas', 'DESC');
    //$this->db->limit($cantidad);
    $query = $this->db->get();
    return $query->result();
}

##################################################################
##################################################################
###
###		Funciones del BACKEND


function getMisCanciones($inte_id){
	$this->db->select('c.canc_titulo, c.canc_alias, c.canc_contenido');
	$this->db->from('canciones c');
	$this->db->where('c.inte_id', $inte_id);
	$this->db->order_by('c.canc_titulo', 'ASC');	
	$query = $this->db->get();	
    return $query->result();
}



###################################################################
###################################################################
###
### Nuevas funciones 
###
###################################################################
###################################################################

	

	public function getCancion($inte_id, $canc_alias){
        $this->db->where('canc_alias', $canc_alias);
        $this->db->where('inte_id', $inte_id);
        $this->db->set('canc_visitas', '`canc_visitas`+ 1', FALSE);
        $this->db->update('canciones');

        $this->db->where('canc_alias', $canc_alias);
        $this->db->where('inte_id', $inte_id);   
        $query = $this->db->get('canciones');
        return $query->row();
	}

	////////////////////////////////////////////////////////////////////////
	//
	// Devuelve otras canciones del interprete menos la pasada por parametro
	//

	public function getOtrasCanciones($inte_id, $canc_id){
		# code...
        $this->db->select('canc_titulo, canc_alias');
        $this->db->where('inte_id', $inte_id);   
		$ignore = array($canc_id);
		$this->db->where_not_in('canc_id', $ignore);
		$this->db->order_by('canc_titulo', 'asc');
        $query = $this->db->get('canciones');
        return $query->result();
	}	

}