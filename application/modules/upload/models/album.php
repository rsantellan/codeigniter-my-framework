<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/*
 */

/**
 * Description of album
 *
 * @author Rodrigo Santellan
 */
class album extends MY_Model{
  
  const IMAGEALBUM='images';
  const MIXEDALBUM='mixed';  
  const YOUTUBEALBUM='youtube';

  private $id;
  private $obj_id;
  private $obj_class;
  private $name;
  private $type;
  
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

  public function getType() {
      return $this->type;
  }

  public function setType($type) {
      $this->type = $type;
  }

  public function deleteAllOf($objectId, $objectClass)
  {
    $albums = $this->retrieveAllObjectAlbums($objectId, $objectClass);
    log_message("debug", "Deleting albumcontent of albums - id : ".$objectId. " class : ".$objectClass);
    foreach($albums as $album)
    {
      log_message("debug", "Deleting albumcontent of albums - id : ".$album["id"]);
      $ci = &get_instance();
      $ci->load->model("upload/albumcontent");
      $albumcontent = $ci->albumcontent->retrieveAlbumImages($album["id"]);
      foreach($albumcontent as $image)
      {
        log_message("debug", "Deleting image by id : ".$image->id);
        $ci->albumcontent->deleteFile($image->id);
      }
      $dirPath = getcwd() . '' . DIRECTORY_SEPARATOR . 'assets' . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . '' . $album["id"];
      foreach(new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dirPath, FilesystemIterator::SKIP_DOTS), RecursiveIteratorIterator::CHILD_FIRST) as $path) {
        $path->isFile() ? unlink($path->getPathname()) : rmdir($path->getPathname());
      }
      rmdir($dirPath);
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
        $aux->setType($obj->atype);
        return $aux;
      }
      return $obj;
    } else {
      // None
      return NULL;
    }
  }
    
  public function createAlbum($objectId, $objectClass, $albumName = "default", $type = self::IMAGEALBUM)
  {
    
    $data = array(
        'obj_id' => $objectId,
        'obj_class' => $objectClass,
        'name' => $albumName,
        'atype' => $type,
    );
    $this->db->insert($this->getTablename(), $data);
    return $this->db->insert_id(); 
  }
  
  
  public function albumHasAvatar($objectId, $objectClass, $albumName = "default")
  {
    $album = $this->retrieveObjectAlbum($objectId, $objectClass, $albumName);
    
    $ci = &get_instance();
    $ci->load->model("upload/albumcontent");
    
	if(is_null($album) || count($album) == 0)
	{
	  return 0;
	}
    $quantity = $ci->albumcontent->retrieveQuantity($album->id);
    
    if($quantity == 0)
    {
      return false;
    }
    return true;
  }
  
  public function retrieveAlbumAvatar($objectId, $objectClass, $albumName = "default")
  {
    $album = $this->retrieveObjectAlbum($objectId, $objectClass, $albumName);
    if($album == NULL)
      return NULL;
    
    $ci = &get_instance();
    $ci->load->model("upload/albumcontent");
    
    return $ci->albumcontent->retrieveAvatar($album->id);
  }
  
  public function getObjectClass()
  {
    return get_class($this);
  }
}
