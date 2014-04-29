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
    private $basepath;
    private $path;
    private $name;
    private $type;
    private $album_id;
    private $contenttype;
    private $url;
    private $code;
    private $description;
    private $extradata;
    private $_metadata = NULL; 
    
    const ISIMAGE = 'content-image';
    const ISYOUTUBE = 'content-youtube';
    const ISDOCUMENT = 'content-document';
    
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

    public function getBasepath() {
      return $this->basepath;
    }

    public function setBasepath($basepath) {
      $this->basepath = $basepath;
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
    
    public function setAlbumId($album_id) {
        $this->album_id = $album_id;
    }
    
    public function getAlbumId() {
        return $this->album_id;
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
    $data["basepath"] = $this->getBasepath();
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
      $aux->setBasepath($obj->basepath);
      $aux->setPath($obj->path);
      $aux->setAlbumId($albumId);
      $aux->setType($obj->type);
      return $aux;
    } else {
      // None
      return NULL;
    }
  }
  
  public function getFile($id, $object = false)
  {
    $this->db->where('id', $id);
    $this->db->limit(1);
    $query = $this->db->get($this->getTablename());
    $obj = $query->first_row();
    if(!$object)
    {
        return $obj;
    }
    else
    {
        $aux = new albumcontent();
        $aux->setId($obj->id);
        $aux->setName($obj->name);
        $aux->setBasepath($obj->basepath);
        $aux->setPath($obj->path);
        $aux->setAlbumId($obj->album_id);
        $aux->setType($obj->type);
        $aux->setContenttype($obj->contenttype);
        $aux->setUrl($obj->url);
        $aux->setCode($obj->code);
        $aux->setDescription($obj->description);
        $aux->setExtradata($obj->extradata);
   
        return $aux;
    }
  }
  
  public function retrieveAll()
  {
    $query = $this->db->get($this->getTablename());
    return $query->result();
  }
  
  public function changePathOfId($path, $id)
  {
    $data = array(
        'path' => $path,
     );
    $this->db->where('id', $id);
    $this->db->update($this->getTablename(), $data);
  }
  
  public function deleteFile($id)
  {
    log_message("debug", "Deleting images : ".$id);
    $file = $this->getFile($id);
    //$file = $file[0];
    $ci = &get_instance();
    log_message("debug", "Deleting cache images of : ".$id);
    $ci->load->library("upload/mupload");
    $ci->mupload->deleteImageCache($file->basepath.$file->path);
    log_message("debug", "Deleting actual file of image : ".$id);
    unlink($file->basepath.$file->path);
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
  
  function updateDescription()
  {
    $data = array(
              'description' => $this->getDescription()
           );
    $this->db->where('id', $this->getId());
    $this->db->update($this->getTablename(), $data);
  }
  
  /***
   * 
   * Youtube functions
   * 
   ***/
  
  public function youtubePopulateDataByUrl()
  {
      $this->setCode($this->retrieveYoutubeId());
      $this->retrieveYoutubeMetaData();
      $this->setName($this->_metadata->title);
      $this->setDescription($this->_metadata->content);
      $this->setExtradata($this->_metadata->author);
      $this->setPath($this->saveToDiskYoutubeImage());
      $this->setContenttype(albumcontent::ISYOUTUBE);
      $this->setType("youtube");
      
      
  }

  public function saveToDiskYoutubeImage()
  {
      $url = $this->youtubeGetImageUrl();
      $save_path = FCPATH . '' . DIRECTORY_SEPARATOR . 'assets' . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . '' . $this->getAlbumId();
      $fileName = $this->getCode().".jpg";
      $ci = &get_instance();
      $ci->load->library("upload/mupload");
      $ci->mupload->checkDirectory($save_path);

      if (file_exists($save_path . DIRECTORY_SEPARATOR . $fileName)) {
        $ext = strrpos($fileName, '.');
        $fileName_a = substr($fileName, 0, $ext);
        $fileName_b = substr($fileName, $ext);

        $count = 1;
        while (file_exists($save_path . DIRECTORY_SEPARATOR . $fileName_a . '_' . $count . $fileName_b))
          $count++;

        $fileName = $fileName_a . '_' . $count . $fileName_b;
      }
      $img = $save_path . DIRECTORY_SEPARATOR . $fileName;
      if( ini_get('allow_url_fopen') ) {
          file_put_contents($img, file_get_contents($url));
          return $img;
      }else{
          if(function_exists('curl_version'))
          {
              $ch = curl_init($url);
              $fp = fopen($img, 'wb');
              curl_setopt($ch, CURLOPT_FILE, $fp);
              curl_setopt($ch, CURLOPT_HEADER, 0);
              curl_exec($ch);
              curl_close($ch);
              fclose($fp);
          }
          return $img;
      }
      return $url;
          
      
      
  }
  
  public function youtubeGetImageUrl()
  {
    return "http://img.youtube.com/vi/".$this->getCode()."/0.jpg";
  }
  
  public function retrieveYoutubeId()
  {
    $video_id = null;
    if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $this->getUrl(), $match)) {
        $video_id = $match[1];
    }
    return $video_id;
  }
  
  public function retrieveYoutubeMetaData()
  {
    if(is_null($this->_metadata))
    {
      //
      $url = "http://gdata.youtube.com/feeds/api/videos/".$this->getCode();
      $xml = simplexml_load_file($url);
      $children = $xml->children("http://www.w3.org/2005/Atom");
      //var_dump($children);
      $stdObject = new stdClass();
      $stdObject->title = (string)$children->title;
      $stdObject->published = (string)$children->published;
      $stdObject->content = (string)$children->content;
      $stdObject->author = (string)$children->author->name;
      $this->_metadata = $stdObject;
      //
    }
    return $this->_metadata;
  }
  
  public function youtubeRetrieveEmbeddedCode($options = array())
  {
        $width = 480;
        $height = 390;
        if(isset($options['width'])) $width = $options['width'];
        if(isset($options['height'])) $height = $options['height'];
        $code = '<iframe title="YouTube video player" width="'.$width.'" height="'.$height.'" src="http://www.youtube.com/embed/'.$this->getCode().'" frameborder="0" allowfullscreen></iframe>';
        return $code;
  }
  
}