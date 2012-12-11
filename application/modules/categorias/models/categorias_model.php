<?php
if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/**
 * Description of proyectos_model
 *
 * @author rodrigo santellan
 */
class categorias_model extends MY_Model{
  
  private $id;
  private $name;
  private $description;
  private $order = 0;
  
  function __construct()
  {
      parent::__construct();
      $this->setTablename('categorias');
  }
  
  public function getId() {
    return $this->id;
  }

  public function setId($id) {
    $this->id = $id;
  }

  public function getName() {
    return $this->name;
  }

  public function setName($name) {
    $this->name = $name;
  }

  public function getDescription($raw_html = false) {
    if($raw_html)
    {
      return html_entity_decode($this->description);
    }
    return $this->description;
  }

  public function setDescription($description) {
    $this->description = $description;
  }

  public function getOrder() {
    return $this->order;
  }

  public function setOrder($order) {
    $this->order = $order;
  }

    
  public function retrieveAll($order_by = null, $order_type = "desc")
  {
    if(is_null($order_by))
    {
      $this->db->order_by("order", "asc"); 
    }
    else
    {
      $this->db->order_by($order_by, $order_type);
    }
    $query = $this->db->get($this->getTablename());
    $data = array();
    if($query->num_rows() > 0)
    {
      foreach($query->result() as $row)
      {
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
  
  private function retrieveLastOrder()
  {
    $sql = "SELECT max( `order` ) +1 AS MAXIMUN FROM categorias";
    $query = $this->db->query($sql);

    $row = $query->row();
    return $row->MAXIMUN;
  }
  
  private function saveNew()
  {
    $data = array();
    $data["name"] = $this->getName();
    $data["description"] = $this->getDescription();
    $data["order"] = $this->retrieveLastOrder();
    $this->db->insert($this->getTablename(), $data);
    $id = $this->db->insert_id(); 
    return $id;
  }
  
  private function edit()
  {
    $data = array();
    $data["name"] = $this->getName();
    $data["description"] = $this->getDescription();
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
        $aux = new categorias_model();
        $aux->setId($obj->id);
        $aux->setName($obj->name);
        $aux->setDescription($obj->description);
        return $aux;
      }
      return $obj;
    } else {
      // None
      return NULL;
    }
  }
  
  
  function retrieveForSort()
  {
    $this->db->select(array('id', 'name', 'order'));
    $this->db->order_by("order", "asc");
    $query = $this->db->get($this->getTablename());

    return $query->result();
  }
  
  function updateOrder($id, $order)
  {
    $data = array(
              'order' => $order
           );
    $this->db->where('id', $id);
    $this->db->update($this->getTablename(), $data);
  }
  
  public function getObjectClass()
  {
    return get_class($this);
  }
}


