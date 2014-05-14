<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/*
 */

/**
 * Description of publicacion
 *
 * @author Rodrigo Santellan
 */
class publicacion extends MY_Model{
  
  
    private $id;
    private $description;
    private $tipo;
    
    function __construct()
	{
		parent::__construct();
        $this->setTablename('publicacion');
    }

    public function getId() {
      return $this->id;
    }

    public function setId($id) {
      $this->id = $id;
    }

	public function getDescription($decode = true) {
	  if(!$decode) return $this->description;
	  return html_entity_decode($this->description, ENT_COMPAT | 0, 'UTF-8');
	}

	public function setDescription($description) {
	  $this->description = $description;
	}

	public function getTipo() {
	  return $this->tipo;
	}

	public function setTipo($tipo) {
	  $this->tipo = $tipo;
	}

	public function getArrTipo()
	{
	  return array(
		  1 => 'Revista Cientifica',
		  2 => 'Publicaciones en libros',
	  );
	}
	
	
	function retrieveAll($number = NULL, $offset = NULL, $returnObjects = FALSE, $type = NULL)
    {
      $this->db->order_by("ordinal", "desc");
	  if($type !== NULL)
	  {
		$this->db->where('tipo', $type);
	  }
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
	  $aux = new publicacion();
	  $aux->setId(($obj->id));
	  $aux->setDescription($obj->description);
	  $aux->setTipo($obj->tipo);
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
          'description' => $this->getDescription(),
          'ordinal' => $this->retrieveLastOrder(),
          "tipo" => $this->getTipo(),
          "letter" => strtolower(substr(trim(strip_tags($this->getDescription(false))), 0,1)),
       );
	  
      $this->db->insert($this->getTablename(), $data);
      $id = $this->db->insert_id(); 
      return $id;
    }
    
    private function edit()
    {
      $using_string = str_replace("&lt;/strong&gt;", "", str_replace("&lt;strong&gt;", "", $this->getDescription())); 
	  
	  $data = array(
          'description' => $this->getDescription(),
          'tipo' => $this->getTipo(),
		  "letter" => strtolower(substr(trim($using_string), 0,1)),
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
	
	public function retrieveAccordeon($type = 1)
	{
	  $sql_letters = 'select distinct(letter) from publicacion where tipo = ? order by letter';
	  
	  $data = $this->db->query($sql_letters, array($type)); 
	  $resultados = $data->result();
	  $retorno = array();
	  $sql_publicacion = 'select id, description from publicacion where tipo = ? and letter = ? order by ordinal desc';
	  foreach($resultados as $letter)
	  {
		$resultadoLetra = $this->db->query($sql_publicacion, array($type, $letter->letter))->result();
		$retorno[$letter->letter] = array();
		foreach($resultadoLetra as $publicacion)
		{
		    $retorno[$letter->letter][] = $publicacion;
		}
	  }
	  return $retorno;
	}
    
}
