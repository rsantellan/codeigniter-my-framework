<?php
if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/**
 * Description of proyectos_model
 *
 * @author rodrigo santellan
 */
class proyectos_model extends MY_Model{
  
  private $id;
  private $nombre;
  private $cliente;
  private $tipo_trabajo;
  private $descripcion;
  private $category_id;
  private $orden;
  private $created_at;
  private $updated_at;
  
  function __construct()
  {
      parent::__construct();
      $this->setTablename('proyectos');
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

  public function getCliente() {
    return $this->cliente;
  }

  public function setCliente($cliente) {
    $this->cliente = $cliente;
  }

  public function getTipo_trabajo() {
    return $this->tipo_trabajo;
  }

  public function setTipo_trabajo($tipo_trabajo) {
    $this->tipo_trabajo = $tipo_trabajo;
  }

  public function getDescripcion() {
    return $this->descripcion;
  }

  public function setDescripcion($descripcion) {
    $this->descripcion = $descripcion;
  }

  public function getCreatedAt() {
    return $this->created_at;
  }

  public function setCreatedAt($created_at) {
    $this->created_at = $created_at;
  }

  public function getUpdatedAt() {
    return $this->updated_at;
  }

  public function setUpdatedAt($updated_at) {
    $this->updated_at = $updated_at;
  }

  public function getCategoryId() {
    return $this->category_id;
  }

  public function setCategoryId($category_id) {
    $this->category_id = $category_id;
  }

  public function getOrden() {
    return $this->orden;
  }

  public function setOrden($orden) {
    $this->orden = $orden;
  }

  public function getObjectClass()
  {
    return get_class($this);
  }
  
  public function retrieveAll($order_by = null, $order_type = "desc", $limit = null)
  {
    if(is_null($order_by))
    {
      $this->db->order_by("orden", "desc"); 
    }
    else
    {
      $this->db->order_by($order_by, $order_type);
    }
    if(!is_null($limit))
    {
      $limit_number = (int) $limit;
      if($limit_number > 0)
      {
        $this->db->limit($limit);
      }
      
    }
    $this->db->join('categorias', 'categorias.id = '.$this->getTablename().'.categoria_id');
    $select_string = $this->getTablename().".id, ".$this->getTablename().".nombre, ".$this->getTablename().".cliente, ".$this->getTablename().".tipo_de_trabajo, ".$this->getTablename().".descripcion, ".$this->getTablename().".created_at, categorias.name ";
    $this->db->select($select_string);
    $query = $this->db->get($this->getTablename());
    $data = array();
    //var_dump($query->result());
    if($query->num_rows() > 0)
    {
      foreach($query->result() as $row)
      {
        $data[] = $row;
      }
    }
    return $data;
  }

  public function retrieveAllByCategory($category_id, $order_by = null, $order_type = "desc")
  {
    if(is_null($order_by))
    {
      $this->db->order_by("orden", "desc"); 
    }
    else
    {
      $this->db->order_by($order_by, $order_type);
    }
    $this->db->where('categoria_id', $category_id);
    $query = $this->db->get($this->getTablename());
    $data = array();
    if($query->num_rows() > 0)
    {
      foreach($query->result() as $row)
      {
        $row->avatar = $this->retrieveAvatar("default", $row->id);
        $data[] = $row;
      }
    }
    return $data;
  }
  
  public function retrieveAllWithImage($limit = 3, $order_by = null, $order_type = "desc")
  {
    if(is_null($order_by))
    {
      $this->db->order_by("orden", "desc"); 
    }
    else
    {
      $this->db->order_by($order_by, $order_type);
    }
    if(!is_null($limit))
    {
      $limit_number = (int) $limit;
      if($limit_number > 0)
      {
        $this->db->limit($limit);
      }
    }
    $query = $this->db->get($this->getTablename());
    $data = array();
    if($query->num_rows() > 0)
    {
      foreach($query->result() as $row)
      {
        $row->avatar = $this->retrieveAvatar("default", $row->id);
        $data[] = $row;
      }
    }
    return $data;
  }
  
  public function isNew()
  {
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
    $data["cliente"] = $this->getCliente();
    $data["tipo_de_trabajo"] = $this->getTipo_trabajo();
    $data["descripcion"] = $this->getDescripcion();
    $data["categoria_id"] = $this->getCategoryId();
    $data["created_at"] =  date('Y-m-d H:i:s');
    $data["updated_at"] =  date('Y-m-d H:i:s');
    $data['orden'] = $this->retrieveLastOrder();
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
  
  private function retrieveLastOrder()
  {
    $sql = "SELECT max( `orden` ) +1 AS MAXIMUN FROM proyectos";
    $query = $this->db->query($sql);

    $row = $query->row();
    return $row->MAXIMUN;
  }
  
  private function edit()
  {
    $data = array();
    $data["nombre"] = $this->getNombre();
    $data["cliente"] = $this->getCliente();
    $data["tipo_de_trabajo"] = $this->getTipo_trabajo();
    $data["descripcion"] = $this->getDescripcion();
    $data["updated_at"] =  date('Y-m-d H:i:s');
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
        $aux = new proyectos_model();
        $aux->setId($obj->id);
        $aux->setNombre($obj->nombre);
        $aux->setCliente($obj->cliente);
        $aux->setTipo_trabajo($obj->tipo_de_trabajo);
        $aux->setDescripcion($obj->descripcion);
        $aux->setCreatedAt($obj->created_at);
        $aux->setUpdatedAt($obj->updated_at);
        return $aux;
      }
      return $obj;
    } else {
      // None
      return NULL;
    }
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
  
  function retrieveForSort()
  {
    $this->db->select(array('id', 'nombre', 'orden'));
    $this->db->order_by("orden", "desc");
    $query = $this->db->get($this->getTablename());

    return $query->result();
  }
  
  function updateOrder($id, $order)
  {
    $data = array(
              'orden' => $order
           );
    $this->db->where('id', $id);
    $this->db->update($this->getTablename(), $data);
  }
}


