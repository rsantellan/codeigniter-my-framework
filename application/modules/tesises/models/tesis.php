<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/*
 */

/**
 * Description of actas
 *
 * @author Rodrigo Santellan <rodrigo.santellan at inswitch.us>
 */
class tesis extends MY_Model{
  
    //private $table_name			= 'actas';
  
    private $id;
    private $titulo;
    private $subtitulo;
    private $orientadores;
    private $tribunal;
    private $defensa;
    private $academica;
    
    function __construct()
	{
		parent::__construct();
        $this->setTablename('tesis');
    }

    public function getId() {
      return $this->id;
    }

    public function setId($id) {
      $this->id = $id;
    }

    public function getTitulo() {
      return $this->titulo;
    }

    public function setTitulo($titulo) {
      $this->titulo = $titulo;
    }

    public function getSubtitulo() {
      return $this->subtitulo;
    }

    public function setSubtitulo($subtitulo) {
      $this->subtitulo = $subtitulo;
    }

    public function getOrientadores() {
      return $this->orientadores;
    }

    public function setOrientadores($orientadores) {
      $this->orientadores = $orientadores;
    }

    public function getTribunal() {
      return $this->tribunal;
    }

    public function setTribunal($tribunal) {
      $this->tribunal = $tribunal;
    }

    public function getDefensa() {
      return $this->defensa;
    }

    public function setDefensa($defensa) {
      $this->defensa = $defensa;
    }

    public function getAcademica() {
      return $this->academica;
    }

    public function setAcademica($academica) {
      $this->academica = $academica;
    }

    function retrieveAll($number = NULL, $offset = NULL)
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
      return $query->result();
      
    }

    function retrieveNovedadesForSort()
    {
      $this->db->select(array('id', 'nombre', 'ordinal'));
      $this->db->order_by("ordinal", "desc");
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
          'titulo' => $this->getTitulo(),
          "subtitulo" => $this->getSubtitulo(),
          "orientadores" => $this->getOrientadores(),
          "tribunal" => $this->getTribunal(),
          "defensa" => $this->getDefensa(),
          "academica" => $this->getAcademica(),
          "ordinal" => $this->retrieveLastOrder(),
       );
      $this->db->insert($this->getTablename(), $data);
      $id = $this->db->insert_id(); 
      return $id;
    }
    
    private function edit()
    {
      $data = array(
          'titulo' => $this->getTitulo(),
          "subtitulo" => $this->getSubtitulo(),
          "orientadores" => $this->getOrientadores(),
          "tribunal" => $this->getTribunal(),
          "defensa" => $this->getDefensa(),
          "academica" => $this->getAcademica(),
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
          $aux = new tesis();
          $aux->setId($obj->id);
          $aux->setTitulo($obj->titulo);
          $aux->setSubtitulo($obj->subtitulo);
          $aux->setOrientadores($obj->orientadores);
          $aux->setTribunal($obj->tribunal);
          $aux->setDefensa($obj->defensa);
          $aux->setAcademica($obj->academica);
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
