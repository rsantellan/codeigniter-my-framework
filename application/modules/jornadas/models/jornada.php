<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/*
 */

/**
 * Description of jornada
 *
 * @author Rodrigo Santellan
 */
class jornada extends MY_Model{
  
  private $id;
  private $name;
  
  function __construct()
  {
    parent::__construct();
    $this->setTablename('jornada');
  }
    
  public function getId() {
    return $this->id;
  }

  public function setId($id) {
    $this->id = $id;
  }

  public function getName() {
    return $this->name;
  }

  public function setName($name) {
    $this->name = $name;
  }

  public function retrieveAllForSelect()
  {
    $this->db->order_by("ordinal", "desc");
    $query = $this->db->get($this->getTablename());
    $salida = array();
    foreach($query->result() as $obj)
    {
        $salida[$obj->id] = $obj->name;
    }
    return $salida;
  }
  
  public function retrieveAllData($rows, $offset)
  {
      $sql_jornada = "select 
            jornada.id as j_id,
            jornada.name as j_name,
            jornada.ordinal as j_ordinal
            from
            jornada
            order by jornada.ordinal desc
            limit ".$offset." , ".$rows;
      
      $returnjornada = $this->db->query($sql_jornada);
      $resultsjornada = $returnjornada->result();
      $data = array();
      $in_data = array();
      foreach($resultsjornada as $jornada)
      {
          $aux = new stdClass();
          $aux->j_id = $jornada->j_id;
          $aux->j_name = $jornada->j_name;
          $aux->j_ordinal = $jornada->j_ordinal;
          $aux->temas = array();
          $in_data[] = $jornada->j_id;
          $data[$jornada->j_id] = $aux;
          
      }
      $sql = "select 
            jornadatema.id as jt_id,
            jornadatema.name as jt_name,
            jornadatema.orator as jt_orator,
            jornadatema.jornadaid as jt_j_id,
            jornadatema.ordinal as jt_ordinal,
            albumcontent.id as ac_id,
            albumcontent.path as ac_path,
            albumcontent.name as ac_name,
            albumcontent.type as ac_type,
            albumcontent.contenttype as ac_contenttype,
            albumcontent.url as ac_url,
            albumcontent.code as ac_code,
            albumcontent.description as ac_description,
            albumcontent.extradata as ac_extradata,
            albumcontent.ordinal as ac_ordinal
        from
            jornadatema
              left outer join
            albums ON (albums.obj_id = jornadatema.id and albums.obj_class = 'jornadatema' and albums.name = 'default')
                left outer join
            albumcontent ON (albums.id = albumcontent.album_id)
        where jornadatema.jornadaid in (". implode(",", $in_data) .")
        order by jornadatema.ordinal , albumcontent.ordinal";

      $return = $this->db->query($sql);
      $results = $return->result();
      
      foreach($results as $object)
      {
          $aux = $data[$object->jt_j_id];
          if($object->jt_id !== null)
          {
            $auxtema = new stdClass();
            if(!isset($aux->temas[$object->jt_id]))
            {
                $auxtema->jt_id = $object->jt_id;
                $auxtema->jt_name = $object->jt_name;
                $auxtema->jt_orator = $object->jt_orator;
                $auxtema->jt_j_id = $object->jt_j_id;
                $auxtema->jt_ordinal = $object->jt_ordinal;
            }
            else
            {
                $auxtema = $aux->temas[$object->jt_id];
            }
            if(!isset($auxtema->contents))
            {
                $auxtema->contents = array();
            }
            if($object->ac_id !== null)
            {
                $content = new stdClass();
                if(!isset($auxtema->contents[$object->ac_id]))
                {
                    $content->ac_id = $object->ac_id;
                    $content->ac_path = $object->ac_path;
                    $content->ac_name = $object->ac_name;
                    $content->ac_type = $object->ac_type;
                    $content->ac_contenttype = $object->ac_contenttype;
                    $content->ac_url = $object->ac_url;
                    $content->ac_code = $object->ac_code;
                    $content->ac_description = $object->ac_description;
                    $content->ac_extradata = $object->ac_extradata;
                    $content->ac_ordinal = $object->ac_ordinal;
                }
                else
                {
                    $content = $auxtema->contents[$object->ac_id];
                }
                $auxtema->contents[$object->ac_id] = $content;
            }
            
            $aux->temas[$object->jt_id] = $auxtema;
          }
          $data[$object->jt_j_id] = $aux;
      }
      //var_dump($data);
      //die;
      return $data;
  }
  
  public function retrieveAll($returnObjects = FALSE)
  {
    $this->db->order_by("ordinal", "desc");
    $query = $this->db->get($this->getTablename());
    
    if(!$returnObjects)
    {
      
      return $query->result();
    }
    else
    {
      $salida = array();
      foreach($query->result() as $obj)
      {
        $aux = new jornada();
        $aux->setId($obj->id);
        $aux->setName($obj->name);
        $salida[$obj->id] = $aux;
      }
      return $salida;
    }
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
    $data["name"] = $this->getName();
    $data["ordinal"] = $this->retrieveLastOrder();
    $this->db->insert($this->getTablename(), $data);
    $id = $this->db->insert_id(); 
    return $id;
  }

  private function edit()
  {
    $data = array(
        'name' => $this->getName(),
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
          $aux = new jornada();
          $aux->setId($obj->id);
          $aux->setName($obj->name);
          return $aux;
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
