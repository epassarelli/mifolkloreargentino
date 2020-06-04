<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Model extends CI_Model{

  function __construct() {
    parent::__construct();
    $this->load->database();
  }

  function get_all(){
    $query = $this->db->get($this->table);    
    return $query->result();
  }

  function get($id){
    $this->db->where('id', $id);
    $query = $this->db->get($this->table);
    return $query->row();
  }

  function get_by($tabla,$campo,$valor){
    $this->db->where($campo, $valor);
    $query = $this->db->get($tabla);
    return $query->result();
  }

  function getByLetra($tabla,$campo,$letra,$orden){
    $sql =  "SELECT * FROM " . $tabla . " WHERE " . $campo . " LIKE '" . $letra . "%' ORDER BY " . $orden;
    $query = $this->db->query($sql);
    return $query->result();
  }

  function getByID($tabla, $campo, $id){
      $this->db->where($campo, $id);
      $query = $this->db->get($tabla);
      return $query->row();
  } 

  function getAndIncrement($tabla, $aIncrementar, $donde, $valor){
    $this->db->where($donde, $valor);
    $this->db->set($aIncrementar, '`'.$aIncrementar.'`+ 1', FALSE);
    $this->db->update($tabla);
    $query = $this->db->get($tabla);
    return $query->row(); 
  }

  function getUltimos($tabla, $campo, $cantidad){
    $this->db->order_by($campo, 'desc');
    $this->db->limit($cantidad);
    $query = $this->db->get($tabla);
    return $query->result();
  } 

  function get_todos($tabla, $orden){
      $this->db->order_by($orden);    
      $query = $this->db->get($tabla);
    return $query->result();
  }  
    
  function getOneBy($tabla, $campo, $valor){
      $this->db->where($campo, $valor);
      $query = $this->db->get($tabla);
      return $query->row();
  }  

  function get_like($tabla,$campo,$valor){
      $this->db->like($campo, $valor);
      $query = $this->db->get($tabla);
      return $query->result();
    }  

  function get_activados($tabla){
    $this->db->where("estado", "1");
    $query = $this->db->get($tabla);
  return $query->result();
  }

  function get_desactivados($tabla){
    $this->db->where("estado", "0");
    $query = $this->db->get($tabla);
  return $query->result();
  }

  function get_InterpretesCBox($tabla, $orden){
      $this->db->select('inte_nombre, inte_alias');
      $this->db->order_by($orden);    
      $query = $this->db->get($tabla);
    return $query->result();
  } 






##########################################################
  function insertar($data) {
    $this->db->insert($this->table, $data);
    return $this->db->insert_id();
  }
##########################################################
  function set($tabla, $data) {
    $this->db->insert($tabla, $data);
    return $this->db->insert_id();
  }

##########################################################   
  function activar($id){
    $data = array('estado' => '1');
    $this->db->where('id', $id);
    $this->db->update($this->table, $data);
  }
##########################################################    
  function suspender($id){
    $data = array('estado' => '0');
    $this->db->where('id', $id);
    $this->db->update($this->table, $data); 
  }
##########################################################
  function actualizar($id, $data) {
    $this->db->where('id', $id);
    $this->db->update($this->table, $data);
    return TRUE;
  }
##########################################################
  function update($tabla, $campo, $id, $data) {
    $this->db->where($campo, $id);
    $this->db->update($tabla, $data);
    return TRUE;
  }
##########################################################
  function eliminar($id) {
  $this->db->where('id', $id);
  $this->db->delete($this->table);
  }
##########################################################
  function delete($tabla, $id) {
  $this->db->where('id', $id);
  $this->db->delete($tabla);
  }  
##########################################################
  function find_id($id) {
    if ($id == NULL) {
      return NULL;
    }

    $this->db->where('id', $id);
    $query = $this->db->get($this->table);

    $result = $query->result_array();
    return (count($result) > 0 ? $result[0] : NULL);
  }
##########################################################
  function find_all($sort = 'id', $order = 'asc') {
    $this->db->order_by($sort, $order);
    $query = $this->db->get($this->table);
    return $query->result_array();
  }
##########################################################
  function buscar($array,$orden='',$limite='1',$tabla='') {
    if ($array == NULL) {
      return NULL;
    }
    if($tabla=='') $tabla= $this->table;

    $this->db->where($array);
    if($orden !='') $this->db->order_by($orden);
    if($limite != ''){
      if(is_array($limite)) {
        $this->db->limit($limite[1], $limite[0]);
      }else{
        $this->db->limit($limite);
      }
    }
    $consulta = $this->db->get($tabla);

  return $query->result();
  }

#########################################################
###
###   Devuelve solo los interpretes con contenido en dicha
###   seccion y ordenados descendiente por cantidad
###

function get_interpretes_por($seccion){
    // dependiendo de la seccion debo armar distintas consultas


  return $query->result();
}



#### Devuelve las N entidades mas vistas de X artista
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

  
}

/* End of file MY_Model.php */
/* Location: ./core/MY_Model.php */