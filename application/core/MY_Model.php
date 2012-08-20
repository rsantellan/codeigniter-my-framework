<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/*
 */

/**
 * Description of MY_Model
 *
 * @author Rodrigo Santellan <rodrigo.santellan at inswitch.us>
 */
class MY_Model extends CI_Model{
  
  private $table_name;
  
  function __construct()
  {
      parent::__construct();
  }
  
  protected function getTablename() {
    return $this->table_name;
  }
  
  protected function setTablename($tablename)
  {
    $this->table_name = $tablename;
  }

  public function deleteById($id)
  {
    $ci = &get_instance();
    $ci->load->model("upload/album");
    $ci->album->deleteAllOf($id, $this->getObjectClass());
    //die;
    $this->db->where('id', $id);
    return $this->db->delete($this->getTablename());
  }
  
  public function countAllRecords()
  {
    return $this->db->count_all($this->getTablename());
  }

}
