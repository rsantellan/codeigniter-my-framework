<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/*
 */

/**
 * Description of tags_actas
 *
 * @author Rodrigo Santellan
 */
class tags_actas extends MY_Model{
  
  function __construct()
  {
    parent::__construct();
    $this->setTablename('tags_actas');
  }
    
  public function retrieveTableName()
  {
    return $this->getTablename();
  }
  
  public function save($actaId, $tagId)
  {
    $data = array();
    $data["id_acta"] = $actaId;
    $data["id_tag"] = $tagId;
    $this->db->insert($this->getTablename(), $data);
  }
  
  public function remove($actaId, $tagId)
  {
    $data = array();
    $data["id_acta"] = $actaId;
    $data["id_tag"] = $tagId;
    $this->db->delete($this->getTablename(), $data);
  }  
}
