<?php

/**
 * Description of inscripcion
 *
 * @author rodrigo
 */
class inscripcion extends MY_Model{
  
  private $id;
  
  function __construct() {
    parent::__construct();
    $this->setTablename('inscripcion');
  }
  
  public function getId() {
    return $this->id;
  }

  public function setId($id) {
    $this->id = $id;
  }

  public function save($data)
  {
    $this->db->insert($this->getTablename(), $data);
    if ($this->db->affected_rows() == '1')
    {
        return $this->db->insert_id();
    }
    return 0;
  }
  
  public function retrieveAll()
  {
    $query = $this->db->get($this->getTablename());
    return $query->result();
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
        $aux = new inscripcion();
        $aux->setId($obj->id);

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
}


