<?php
class Interpretes_model extends MY_Model
{

	function __construct()
	{
		parent::__construct();
		$this->table = 'interprete';
	}

	function aprobar($id)
	{
		$data = array('inte_habilitado' => '1');
		$this->db->where('inte_id', $id);
		$this->db->update($this->table, $data);
		// Retorna TRUE si se actualizo o FALSE en caso contrario
		return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
	}

	function getActivados()
	{
		$this->db->where("inte_habilitado", "1");
		$this->db->order_by('inte_nombre', 'ASC');
		$query = $this->db->get($this->table);
		return $query->result();
	}

	function get_Ultimos($cant)
	{
		$this->db->where("inte_habilitado", "1");
		$this->db->where('inte_publicar <=', date('Y-m-d', time()));
		$this->db->order_by('inte_nombre', 'ASC');
		$this->db->limit($cant);
		$query = $this->db->get($this->table);
		return $query->result();
	}

	function getConMasContenido()
	{
		$sql = "SELECT
			interprete.inte_id,
			interprete.inte_nombre,
			interprete.inte_foto,
			Count(interprete_cancion.canc_id) as canciones,
			(SELECT count(*) FROM album_interprete WHERE album_interprete.inte_id = interprete.inte_id) as albunes
			FROM
			interprete
			LEFT OUTER JOIN interprete_cancion ON interprete_cancion.inte_id = interprete.inte_id
			GROUP BY
			interprete.inte_id,
			interprete.inte_nombre,
			interprete.inte_foto
			ORDER BY canciones DESC";
		$query = $this->db->query($sql);
		return $query->result();
	}
	########################################################## 
	###
	###		Devuelve solo aquellos interpretes que tiene videos
	###

	function getInterpretesConVideos($cantidad)
	{
		if ($cantidad == 0) {
			$limite = "";
		} else {
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
	Order By count(*) desc
	Limit 20";

		$query = $this->db->query($sql);

		return $query->result();
	}
	########################################################## 
	###
	###		Devuelve solo aquellos interpretes que tiene fotos
	###

	function getInterpretesConFotos($cantidad)
	{
		if ($cantidad == 0) {
			$limite = "";
		} else {
			$limite = $cantidad;
		}

		$sql = "SELECT 
	i.inte_id, 
	i.inte_alias, 
	i.inte_nombre, 
	i.inte_foto, 
	count(*) 
	From interprete i 
	JOIN foto f ON i.inte_id = f.inte_id
	Group By i.inte_id, i.inte_alias, i.inte_nombre, i.inte_foto
	Order By count(*) desc";

		$query = $this->db->query($sql);
		return $query->result();
	}




	function getInterpretesConAlbunes()
	{
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
		ORDER BY
		count(*) DESC";
		$query = $this->db->query($sql);
		return $query->result();
	}



	#############################################################
	###
	###		Devuelve los artistas activos que no sean ya administrados
	###		por el solicitante ni tengan un pedido en trámite

	function getAdministrados($user_id)
	{
		$sql = "SELECT
				i.inte_nombre,
				i.inte_id
			FROM
				interprete i
			JOIN
				user_interprete ui ON ui.inte_id = i.inte_id
			WHERE
				i.inte_habilitado = 1 AND ui.user_id = $user_id
			ORDER BY
				inte_nombre";
		$query = $this->db->query($sql);
		return $query->result();
	}

	#############################################################
	###
	###		Devuelve los Artistas sugeridos
	###

	function getSugeridos()
	{

		$sql = "SELECT
				*
			FROM
				interprete
			WHERE
				inte_habilitado=0";

		$query = $this->db->query($sql);
		return $query->result();
	}

	#############################################################
	###
	###		Devuelve los ultimos N Artistas
	###

	function getUltimosActivos($cantidad)
	{

		$sql = "SELECT
			inte_nombre,
			inte_alias,
			inte_foto,
			inte_visitas
			FROM
			interprete
			WHERE
			inte_habilitado=1 
			ORDER BY inte_id DESC
			LIMIT $cantidad";

		$query = $this->db->query($sql);
		return $query->result();
	}

	function getVisitados($cantidad)
	{

		$sql = "SELECT
			inte_nombre,
			inte_alias,
			inte_foto,
			inte_visitas
			FROM
			interprete
			WHERE inte_habilitado = 1
			ORDER BY inte_visitas DESC
			LIMIT $cantidad";

		$query = $this->db->query($sql);
		return $query->result();
	}


	function getInterpretesPorLetra($tabla, $campo, $letra, $orden)
	{
		$sql =  "SELECT * FROM " . $tabla . " WHERE inte_habilitado=1 and " . $campo . " LIKE '" . $letra . "%' ORDER BY " . $orden;
		$query = $this->db->query($sql);
		return $query->result();
	}

	#########################################################
	####
	#### Devuelve el Interprete y cuenta una visita
	#### 2018-01-31 

	function getInterprete($alias)
	{
		$this->db->where('inte_alias', $alias);
		$this->db->set('inte_visitas', '`inte_visitas`+ 1', FALSE);

		$this->db->update('interprete');
		$this->db->where('inte_alias', $alias);
		$query = $this->db->get('interprete');
		return $query->row();
	}
}
