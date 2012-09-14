<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/*
 */

/**
 * Description of album
 *
 * @author Rodrigo Santellan <rodrigo.santellan at inswitch.us>
 */
class album extends MY_Model{
  

  private $id;
  private $obj_id;
  private $obj_class;
  private $name;
  
  function __construct()
  {
    parent::__construct();
    $this->setTablename('albums');
  }
    
  
  public function getId() {
    return $this->id;
  }

  public function setId($id) {
    $this->id = $id;
  }

  public function getObjId() {
    return $this->obj_id;
  }

  public function setObjId($obj_id) {
    $this->obj_id = $obj_id;
  }

  public function getObjClass() {
    return $this->obj_class;
  }

  public function setObjClass($obj_class) {
    $this->obj_class = $obj_class;
  }

  public function getName() {
    return $this->name;
  }

  public function setName($name) {
    $this->name = $name;
  }

  public function deleteAllOf($objectId, $objectClass)
  {
    $albums = $this->retrieveAllObjectAlbums($objectId, $objectClass);
    foreach($albums as $album)
    {
      
      $ci = &get_instance();
      $ci->load->model("upload/images");
      $images = $ci->images->retrieveAlbumImages($album["id"]);
      foreach($images as $image)
      {
        $ci->images->deleteFile($image->id);
      }
      $this->db->where('id', $album["id"]);
      $this->db->delete($this->getTablename());
    }
  }
  
  public function retrieveAllObjectAlbums($objectId, $objectClass)
  {
    $this->db->where('obj_id', $objectId);
    $this->db->where('obj_class', $objectClass);
    $query = $this->db->get($this->getTablename());
    return $query->result_array();
  }

  public function retrieveObjectAlbum($objectId, $objectClass, $albumName)
  {
    $this->db->where('obj_id', $objectId);
    $this->db->where('obj_class', $objectClass);
    $this->db->where('name', $albumName);
    $this->db->limit('1');
    $query = $this->db->get($this->getTablename());
    return $query->row();
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
        $aux = new album();
        $aux->setId($obj->id);
        $aux->setName($obj->name);
        $aux->setObjClass($obj->obj_class);
        $aux->setObjId($obj->obj_id);
        return $aux;
      }
      return $obj;
    } else {
      // None
      return NULL;
    }
  }
    
  public function createAlbum($objectId, $objectClass, $albumName = "default")
  {
    
    $data = array(
        'obj_id' => $objectId,
        'obj_class' => $objectClass,
        'name' => $albumName,
    );
    $this->db->insert($this->getTablename(), $data);
    return $this->db->insert_id(); 
  }
  
  
  public function albumHasAvatar($objectId, $objectClass, $albumName = "default")
  {
    $album = $this->retrieveObjectAlbum($objectId, $objectClass, $albumName);
    
    $ci = &get_instance();
    $ci->load->model("upload/images");
    
	if(is_null($album) || count($album) == 0)
	{
	  return 0;
	}
    $quantity = $ci->images->retrieveQuantity($album->id);
    
    if($quantity == 0)
    {
      return false;
    }
    return true;
  }
  
  public function retrieveAlbumAvatar($objectId, $objectClass, $albumName = "default")
  {
    $album = $this->retrieveObjectAlbum($objectId, $objectClass, $albumName);
    
    $ci = &get_instance();
    $ci->load->model("upload/images");
    
    return $ci->images->retrieveAvatar($album->id);
  }
  
  public function getObjectClass()
  {
    return get_class($this);
  }
}
