<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/*
 */

/**
 * Description of efsalaboratorio
 *
 * @author Rodrigo Santellan
 */
class efsalaboratorio extends MY_Model{
  
  
    private $id;
    private $nombre;
    private $description;
    
    function __construct()
	{
		parent::__construct();
        $this->setTablename('efsalaboratorio');
    }

    public function getId() {
      return $this->id;
    }

    public function setId($id) {
      $this->id = $id;
    }

    public function getNombre() {
      return $this->nombre;
    }

    public function setNombre($nombre) {
      $this->nombre = $nombre;
    }    
    
	public function getDescription($decode = true) {
	  if(!$decode) return $this->description;
	  return html_entity_decode($this->description, ENT_COMPAT | 0, 'UTF-8');
	}

	public function setDescription($description) {
	  $this->description = $description;
	}

	function retrieveAll($number = NULL, $offset = NULL, $returnObjects = FALSE)
    {
      $this->db->order_by("ordinal", "desc");
	  $query = null;
      if(is_null($number))
      {
        $query = $this->db->get($this->getTablename());
      }
      else
      {
        $query = $this->db->get($this->getTablename(), $number, $offset);
      }
      if(!$returnObjects)
      {
        return $query->result();
      }
      else
      {
        $salida = array();
        foreach($query->result() as $obj)
        {
          $salida[] = $this->createObjectFromStd($obj);
        }
        return $salida;
      }
    }

	private function createObjectFromStd($obj)
	{
	  $aux = new efsalaboratorio();
	  $aux->setId($obj->id);
	  $aux->setNombre($obj->name);
	  $aux->setDescription($obj->description);
	  return $aux;
	}
    
    
    function retrieveLastOrder()
    {
      $this->db->select_max('ordinal');
      $query = $this->db->get($this->getTablename());
      $result = $query->result('array');
      return ((int)$result[0]['ordinal'] + 1);
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
      $data = array(
          'name' => $this->getNombre(),
          'description' => $this->getDescription(),
          'ordinal' => $this->retrieveLastOrder(),
       );
	  
      $this->db->insert($this->getTablename(), $data);
      $id = $this->db->insert_id(); 
      return $id;
    }
    
    private function edit()
    {
      $data = array(
          'name' => $this->getNombre(),
          'description' => $this->getDescription(),
       );
      $this->db->where('id', $this->getId());
      $this->db->update($this->getTablename(), $data);
      
      return $this->getId();
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
		  return $this->createObjectFromStd($obj);
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
