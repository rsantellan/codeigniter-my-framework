<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/*
 */

/**
 * Description of albumcontent
 *
 * @author Rodrigo Santellan
 */
class albumcontent extends MY_Model{
    
    private $id;
    private $path;
    private $name;
    private $type;
    private $album_id;
    private $contenttype;
    private $url;
    private $code;
    private $description;
    private $extradata;
    
    const ISIMAGE = 'content-image';
    const ISYOUTUBE = 'content-youtube';
    
    function __construct()
    {
      parent::__construct();
      $this->setTablename('albumcontent');
    }
    
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getPath() {
        return $this->path;
    }

    public function setPath($path) {
        $this->path = $path;
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

    public function getAlbum_id() {
        return $this->album_id;
    }

    public function setAlbum_id($album_id) {
        $this->album_id = $album_id;
    }

    public function getContenttype() {
        return $this->contenttype;
    }

    public function setContenttype($contenttype) {
        $this->contenttype = $contenttype;
    }

    public function getUrl() {
        return $this->url;
    }

    public function setUrl($url) {
        $this->url = $url;
    }

    public function getCode() {
        return $this->code;
    }

    public function setCode($code) {
        $this->code = $code;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function getExtradata() {
        return $this->extradata;
    }

    public function setExtradata($extradata) {
        $this->extradata = $extradata;
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
    $data["contenttype"] = $this->getContenttype();
    $data["url"] = $this->getUrl();
    $data["code"] = $this->getCode();
    $data["description"] = $this->getDescription();
    $data["extradata"] = $this->getExtradata();
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
      $aux = new albumcontent();
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