<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/*
 */

/**
 * Description of tags_novedades
 *
 * @author Rodrigo Santellan
 */
class tags_novedades extends MY_Model{
  
  function __construct()
  {
    parent::__construct();
    $this->setTablename('tags_novedades');
  }
    
  public function retrieveTableName()
  {
    return $this->getTablename();
  }
  
  public function save($novedadId, $tagId)
  {
    $data = array();
    $data["id_novedad"] = $novedadId;
    $data["id_tag"] = $tagId;
    $this->db->insert($this->getTablename(), $data);
  }
  
  public function remove($novedadId, $tagId)
  {
    $data = array();
    $data["id_novedad"] = $novedadId;
    $data["id_tag"] = $tagId;
    $this->db->delete($this->getTablename(), $data);
  }  
}
