<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/*
 */

/**
 * Description of actas
 *
 * @author Rodrigo Santellan <rodrigo.santellan at inswitch.us>
 */
class novedad extends MY_Model{
  
    //private $table_name			= 'actas';
  
    private $id;
    private $nombre;
    private $descripcion;
    
    function __construct()
	{
		parent::__construct();
        $this->setTablename('novedades');
    }

    public function getId() {
      return $this->id;
    }

    public function setId($id) {
      $this->id = $id;
    }

    public function getNombre() {
      return $this->nombre;
    }

    public function setNombre($nombre) {
      $this->nombre = $nombre;
    }    
    
    public function getDescripcion($decode = true) {
      if(!$decode)
      {
        return $this->descripcion;
      }
      return html_entity_decode($this->descripcion, ENT_COMPAT | 0, 'UTF-8');
    }

    public function setDescripcion($descripcion) {
      $this->descripcion = $descripcion;
    }

    function retrieveNovedades($number = NULL, $offset = NULL, $returnObjects = FALSE, $retrieveAvatar = FALSE)
    {
      $this->db->order_by("ordinal", "desc");
      $query = null;
      if(is_null($number))
      {
        $query = $this->db->get($this->getTablename());
      }
      else
      {
        $query = $this->db->get($this->getTablename(), $number, $offset);
      }
      if(!$returnObjects)
      {
        if(!$retrieveAvatar)
        {
          return $query->result();
        }
        $data = array();
        foreach($query->result() as $row)
        {

          $row->avatar = $this->retrieveAvatar("default", $row->id);
          $data[] = $row;
        }
        return $data;
      }
      else
      {
        $salida = array();
        foreach($query->result() as $obj)
        {
          $aux = new novedad();
          $aux->setId($obj->id);
          $aux->setNombre($obj->nombre);
          $aux->setDescripcion($obj->descripcion);
          $salida[] = $aux;
        }
        return $salida;
      }
    }

    function retrieveNovedadesForSort()
    {
      $this->db->select(array('id', 'nombre', 'ordinal'));
      $this->db->order_by("ordinal", "desc");
      $query = $this->db->get($this->getTablename());
      
      return $query->result();
    }
    
    function updateOrder($id, $order)
    {
      $data = array(
                'ordinal' => $order
             );
      $this->db->where('id', $id);
      $this->db->update($this->getTablename(), $data);
    }
    
    
    function retrieveLastOrder()
    {
      $this->db->select_max('ordinal');
      $query = $this->db->get($this->getTablename());
      $result = $query->result('array');
      return ((int)$result[0]['ordinal'] + 1);
    }
    
    public function isNew(){
      if($this->getId() == "" || is_null($this->getId()))
      {
        return true;
      }
    }
    
    public function save()
    {
      if($this->isNew())
      {
        return $this->saveNew();
      }
      else
      {
        return $this->edit();
      }
    }
    
    private function saveNew()
    {
      $data = array();
      $data["nombre"] = $this->getNombre();
      $data["ordinal"] = $this->retrieveLastOrder();
      $data["descripcion"] = $this->getDescripcion();
      $this->db->insert($this->getTablename(), $data);
      $id = $this->db->insert_id(); 
      if(!is_null($id) && $id != 0)
      {
        $ci =& get_instance();
        $ci->load->model('upload/album');
        $ci->album->createAlbum($id, $this->getObjectClass()); 
      }
      return $id;
    }
    
    private function edit()
    {
      $data = array(
          'nombre' => $this->getNombre(),
          "descripcion" => $this->getDescripcion()
       );
      $this->db->where('id', $this->getId());
      $this->db->update($this->getTablename(), $data);
      
      return $this->getId();
    }
    
    public function getById($id, $return_obj = true)
    {
      $this->db->where('id', $id);
      $this->db->limit('1');
      $query = $this->db->get($this->getTablename());
      if( $query->num_rows() == 1 ){
        // One row, match!
        $obj = $query->row();        
        if($return_obj)
        {
          $aux = new novedad();
          $aux->setId($obj->id);
          $aux->setNombre($obj->nombre);
          $aux->setDescripcion($obj->descripcion);
          return $aux;
        }
        return $obj;
      } else {
        // None
        return NULL;
      }
    }
    
    public function getObjectClass()
    {
      return get_class($this);
    }
    
    public function hasAvatar($albumName = "default")
    {
      if(!is_null($this->getId()) && $this->getId() != "")
      {
        $ci = &get_instance();
        $ci->load->model("upload/album");
        return $ci->album->albumHasAvatar($this->getId(), $this->getObjectClass(), $albumName);
      }
      return false;
    }
    
    public function retrieveAvatar($albumName = "default", $id = NULL)
    {
      if(!is_null($id)) $this->setId($id);
      
      if(!is_null($this->getId()) && $this->getId() != "")
      {
        $ci = &get_instance();
        $ci->load->model("upload/album");
        return $ci->album->retrieveAlbumAvatar($this->getId(), $this->getObjectClass(), $albumName);
      }
      return NULL;      
    }
    
    public function retrieveSearchNovedades($text)
    {
      $this->db->like('nombre', $text);
      $this->db->or_like('descripcion', $text);
      $query = $this->db->get($this->getTablename());

      $salida = array();
      foreach($query->result() as $obj)
      {
        $aux = new novedad();
        $aux->setId($obj->id);
        $aux->setNombre($obj->nombre);
        $aux->setDescripcion($obj->descripcion);
        $salida[$obj->id] = $aux;
      }
      return $salida;
    }
    
    public function retrieveSearchNovedadesTags($text)
    {
      //SELECT n.id, n.nombre, n.descripcion FROM novedades n where n.id IN (SELECT tn.id_novedad FROM tags_novedades tn where tn.id_tag IN (SELECT t.id FROM tags t where t.name LIKE '%at%'))
      $sql = "SELECT n.id, n.nombre, n.descripcion FROM novedades n ";
      $sql.= "where n.id IN (SELECT tn.id_novedad FROM tags_novedades tn ";
      $sql.= "where tn.id_tag IN (SELECT t.id FROM tags t where t.name LIKE '%".$this->db->escape_like_str($text)."%'))";
      $query = $this->db->query($sql);
      
      $salida = array();
      foreach($query->result() as $obj)
      {
        $aux = new novedad();
        $aux->setId($obj->id);
        $aux->setNombre($obj->nombre);
        $aux->setDescripcion($obj->descripcion);
        $salida[$obj->id] = $aux;
      }
      return $salida;
    }    
}
