<?php

class Noticias_model extends MY_Model
{


    function __construct()
    {
        parent::__construct();
        $this->table = 'noticia';
    }

    ######################################################		  
    ##
    ##   Devuelve las ultimas noticias o gacetillas
    ##
    function getUltimas($cantidad)
    {
        $this->db->select('noti_titulo, noti_alias, noti_foto, noti_fecha');
        $this->db->where('noti_habilitado', 1);
        $this->db->where('noti_fecha <=', date('Y-m-d', time()));
        $this->db->order_by('noti_id', 'desc');
        //$this->db->from('noticia');
        $this->db->limit($cantidad);
        $query = $this->db->get('noticia');
        return $query->result();
    }

    ######################################################
    ##
    ##   Devuelve todas las noticias de un Interprete
    ##
    function getPorInterprete($inte_alias)
    {
        $sql = "SELECT
			noticia.noti_titulo,
			noticia.noti_alias,
			noticia.noti_foto,
            noticia.noti_fecha,
			noticia.noti_detalle,
			interprete.inte_nombre,
			interprete.inte_alias,
			interprete.inte_foto
			FROM
			noticia
			INNER JOIN interprete ON noticia.inte_id = interprete.inte_id
			WHERE
			interprete.inte_alias = '$inte_alias'
			ORDER BY
			noticia.noti_id DESC";

        $query = $this->db->query($sql);
        return $query->result();
    }



    function getUltimasPorArtista($inte_id, $campoVisitas, $cantidad, $tabla)
    {
        //$this->db->join('album_interprete', 'album_interprete.albu_id = album.albu_id');
        $this->db->from($tabla);
        $this->db->join('interprete', 'noticia.inte_id = interprete.inte_id');
        $this->db->where('noticia.inte_id', $inte_id);
        $this->db->order_by('noticia.noti_fecha', 'DESC');
        $this->db->limit($cantidad);
        $query = $this->db->get();
        return $query->result();
    }




    #############################################################
    ###
    ###	Funciones del BACKEND
    ###

    function getMisNoticias($inte_id)
    {
        //$this->db->select('categorias_id as id','categorias.nombre as nombre');
        $this->db->where('inte_id', $inte_id);
        //$this->db->group_by("categorias.id");
        $this->db->order_by("noti_fecha", "desc");
        $this->db->from('noticia');
        //$this->db->join('productos_has_divisiones', 'productos_has_divisiones.productos_id = productos.id');
        //$this->db->join('categorias', 'categorias.id = productos.categorias_id');
        $query = $this->db->get();


        if ($query->num_rows > 0) {
            foreach ($query->result() as $fila) {
                $data[] = $fila;
            }
            return $data;
        }
    }


    function getMiNoticia($noti_id, $inte_id)
    {
        $this->db->where('noti_id', $noti_id);
        $this->db->where('inte_id', $inte_id);
        $this->db->from('noticia');
        $query = $this->db->get();
        return $query->row();
    }



    function getNoticia($slugNoticia)
    {
        $this->db->where('noti_alias', $slugNoticia);
        $this->db->set('noti_visitas', '`noti_visitas`+ 1', FALSE);
        $this->db->update('noticia');

        $this->db->where('noti_alias', $slugNoticia);
        $query = $this->db->get('noticia');
        return $query->row();
    }
}
