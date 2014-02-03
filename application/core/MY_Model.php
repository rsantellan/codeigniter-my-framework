<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/*
 */

/**
 * Description of MY_Model
 *
 * @author Rodrigo Santellan 
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

  public function simpleDeleteById($id){
    $this->db->where('id', $id);
    $this->db->delete($this->getTablename());
    if($this->db->affected_rows() > 0)
    {
      return true;
    }
    else
    {
      return false;
    }
  }
  
  public function deleteById($id)
  {
    log_message("debug", "Deleting by id : ".$id);
    try
    {
      log_message("debug", "Deleting images of class : ".$this->getObjectClass());
      $ci = &get_instance();
      $ci->load->model("upload/album");
      $ci->album->deleteAllOf($id, $this->getObjectClass());
    }
    catch(Exception $e)
    {
      log_message('error', 'Album no existe');
    }
    
    return $this->simpleDeleteById($id);
  }
  
  public function countAllRecords()
  {
    return $this->db->count_all($this->getTablename());
  }
  
  function retrieveForSort($showField)
  {
    $this->db->select(array('id', "name", 'ordinal'));
    $this->db->order_by("ordinal", "desc");
    $query = $this->db->get($this->getTablename());

    return $query->result();
  }
  
  function retrieveForSortWithParameter($sort_attribute, $parameterid)
  {
    $this->db->select(array('id', "name", 'ordinal'));
    $this->db->order_by("ordinal", "desc");
    $this->db->where($sort_attribute, $parameterid);
    $query = $this->db->get($this->getTablename());

    return $query->result();
  }
    
  function updateOrder($id, $order)
  {
    $data = array(
              'ordinal' => $order
           );
    $this->db->where('id', $id);
    $this->db->update($this->getTablename(), $data);
  }
    
    
  function retrieveLastOrder()
  {
    $this->db->select_max('ordinal');
    $query = $this->db->get($this->getTablename());
    $result = $query->result('array');
    return ((int)$result[0]['ordinal'] + 1);
  }

  public function hasAvatar($albumName = "default")
  {
    if(!is_null($this->getId()) && $this->getId() != "")
    {
      $ci = &get_instance();
      $ci->load->model("upload/album");
      return $ci->album->albumHasAvatar($this->getId(), $this->getObjectClass(), $albumName);
    }
    return false;
  }
    
  public function retrieveAvatar($albumName = "default", $id = NULL)
  {
    if(!is_null($id)) $this->setId($id);
     
    if(!is_null($this->getId()) && $this->getId() != "")
    {
      $ci = &get_instance();
      $ci->load->model("upload/album");
      return $ci->album->retrieveAlbumAvatar($this->getId(), $this->getObjectClass(), $albumName);
    }
    return NULL;      
  }
  
  public function createSlug($field, $data, $table = null, $id = null, $fieldWhere = null, $valueWhere = null)
  {
	$CI =& get_instance();
	$CI->load->helper(array('url', 'text', 'string'));
	$data = strtolower(url_title(convert_accented_characters($data), "-"));
	return $this->checkSlugNotExists($field, reduce_multiples($data, "-", TRUE), 0, $table, $id ,$fieldWhere, $valueWhere);
  }
  
  private function checkSlugNotExists($field, $uri, $count = 0, $table, $id, $fieldWhere, $valueWhere)
  {
	  $new_uri = ($count > 0) ? $uri."-".$count : $uri;

	  // Setup the query
	  $this->db->select($field)->where($field, $new_uri);
	  
	  $this->db->where($this->id.'!=', $this->getId());
	  if ($this->getId())
	  {
		  $this->db->where($this->id.'!=', $this->getId());
	  }

	  if ($this->db->count_all_results($this->getTablename()) > 0)
	  {
		  return $this->checkSlugNotExists($field, $uri, ++$count);
	  }
	  else
	  {
		  return $new_uri;
	  }
  }
    
}
