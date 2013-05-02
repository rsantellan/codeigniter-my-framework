<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/*
 */

/**
 * Description of images
 *
 * @author Rodrigo Santellan <rodrigo.santellan at inswitch.us>
 */
class images extends MY_Model{
  
  private $id;
  private $path;
  private $name;
  private $type;
  private $album_id;
    
  function __construct()
  {
    parent::__construct();
    $this->setTablename('images');
  }
  
  public function getId() {
    return $this->id;
  }
  
  public function getPath() {
    return $this->path;
  }
  
  public function getName() {
    return $this->name;
  }
  
  public function getType() {
    return $this->type;
  }
  
  public function getAlbumId() {
    return $this->album_id;
  }
  
  public function setId($id) {
    $this->id = $id;
  }
  
  public function setPath($path) {
    $this->path = $path;
  }
  
  public function setName($name) {
    $this->name = $name;
  }
  
  public function setType($type) {
    $this->type = $type;
  }
  
  public function setAlbumId($album_id) {
    $this->album_id = $album_id;
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
    $data["path"] = $this->getPath();
    $data["name"] = $this->getName();
    $data["type"] = $this->getType();
    $data["album_id"] = $this->getAlbumId();
    $data["ordinal"] = $this->retrieveOrdinal();
    $this->db->insert($this->getTablename(), $data);
    $id = $this->db->insert_id(); 
    return $id;
  }
  
  
  private function retrieveOrdinal()
  {
    $this->db->select_max('ordinal');
    $this->db->where('album_id', $this->getAlbumId());
    $query = $this->db->get($this->getTablename());
    $result = $query->result('array');
    return ((int)$result[0]['ordinal'] + 1);
  }
  
  private function edit()
  {
    //edit
  }
  
  public function retrieveAlbumImages($albumId)
  {
    $this->db->where('album_id', $albumId);
    $this->db->order_by("ordinal", "asc");
    $query = $this->db->get($this->getTablename());
    return $query->result_object();
  }
  
  public function retrieveQuantity($albumId)
  {
    $this->db->where('album_id', $albumId);
    $this->db->limit(1);
    $query = $this->db->get($this->getTablename());
    return $query->num_rows();
  }

  public function retrieveAvatar($albumId)
  {
    $this->db->where('album_id', $albumId);
    $this->db->order_by("ordinal", "asc");
    $this->db->limit(1);
    $query = $this->db->get($this->getTablename());
    if( $query->num_rows() == 1 ){
      // One row, match!
      $obj = $query->row();        
      $aux = new images();
      $aux->setId($obj->id);
      $aux->setName($obj->name);
      $aux->setPath($obj->path);
      $aux->setAlbumId($albumId);
      $aux->setType($obj->type);
      return $aux;
    } else {
      // None
      return NULL;
    }
  }
  
  public function getFile($id)
  {
    $this->db->where('id', $id);
    $this->db->limit(1);
    $query = $this->db->get($this->getTablename());
    return $query->result_object();
  }
  
  public function deleteFile($id)
  {
    log_message("debug", "Deleting images : ".$id);
    $file = $this->getFile($id);
    $file = $file[0];
    $ci = &get_instance();
    log_message("debug", "Deleting cache images of : ".$id);
    $ci->load->library("upload/mupload");
    $ci->mupload->deleteImageCache($file->path);
    log_message("debug", "Deleting actual file of image : ".$id);
    unlink($file->path);
    log_message("debug", "Deleting db of image : ".$id);
    $this->db->where('id', $id);
    $this->db->delete($this->getTablename());
  }
  
  
  function updateOrder($file_id, $order)
  {
    $data = array(
              'ordinal' => $order
           );
    $this->db->where('id', $file_id);
    $this->db->update($this->getTablename(), $data);
  }
}
