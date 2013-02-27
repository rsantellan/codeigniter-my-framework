<?php
if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/**
 * Description of proyectos_model
 *
 * @author rodrigo santellan
 */
class propiedad_model extends MY_Model{
  

  private $id;
  private $titulo;
  private $detalle;
  private $ubicacion;
  private $garantia;
  private $metros;
  private $dormitorios;
  private $banios;
  private $calefaccion;
  private $garage;
  private $precio;
  private $moneda;
  private $orden;
  
  function __construct()
  {
      parent::__construct();
      $this->setTablename('propiedad');
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

  public function getDetalle() {
    return $this->detalle;
  }

  public function setDetalle($detalle) {
    $this->detalle = $detalle;
  }

  public function getUbicacion() {
    return $this->ubicacion;
  }

  public function setUbicacion($ubicacion) {
    $this->ubicacion = $ubicacion;
  }

  public function getGarantia() {
    return $this->garantia;
  }

  public function setGarantia($garantia) {
    $this->garantia = $garantia;
  }

  public function getMetros() {
    return $this->metros;
  }

  public function setMetros($metros) {
    $this->metros = $metros;
  }

  public function getDormitorios() {
    return $this->dormitorios;
  }

  public function setDormitorios($dormitorios) {
    $this->dormitorios = $dormitorios;
  }

  public function getBanios() {
    return $this->banios;
  }

  public function setBanios($banios) {
    $this->banios = $banios;
  }

  public function getCalefaccion() {
    return $this->calefaccion;
  }

  public function setCalefaccion($calefaccion) {
    $this->calefaccion = $calefaccion;
  }

  public function getGarage() {
    return $this->garage;
  }

  public function setGarage($garage) {
    $this->garage = $garage;
  }

  public function getPrecio() {
    return $this->precio;
  }

  public function setPrecio($precio) {
    $this->precio = $precio;
  }

  public function getMoneda() {
    return $this->moneda;
  }

  public function setMoneda($moneda) {
    $this->moneda = $moneda;
  }

  public function getOrden() {
    return $this->orden;
  }

  public function setOrden($orden) {
    $this->orden = $orden;
  }

  public function getObjectClass()
  {
    return get_class($this);
  }
  
  public function retrieveAll($order_by = null, $order_type = "desc", $limit = null)
  {
    if(is_null($order_by))
    {
      $this->db->order_by("orden", "desc"); 
    }
    else
    {
      $this->db->order_by($order_by, $order_type);
    }
    if(!is_null($limit))
    {
      $limit_number = (int) $limit;
      if($limit_number > 0)
      {
        $this->db->limit($limit);
      }
      
    }
    $query = $this->db->get($this->getTablename());
    $data = array();
    if($query->num_rows() > 0)
    {
      foreach($query->result() as $row)
      {
        $data[] = $row;
      }
    }
    return $data;
  }

  public function retrieveAllWithImage($limit = 3, $order_by = null, $order_type = "desc")
  {
    if(is_null($order_by))
    {
      $this->db->order_by("orden", "desc"); 
    }
    else
    {
      $this->db->order_by($order_by, $order_type);
    }
    if(!is_null($limit))
    {
      $limit_number = (int) $limit;
      if($limit_number > 0)
      {
        $this->db->limit($limit);
      }
    }
    $query = $this->db->get($this->getTablename());
    $data = array();
    if($query->num_rows() > 0)
    {
      foreach($query->result() as $row)
      {
        $row->avatar = $this->retrieveAvatar("default", $row->id);
        $data[] = $row;
      }
    }
    return $data;
  }
  
  public function isNew()
  {
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
    $data["titulo"] = $this->getTitulo();
    $data["detalle"] = $this->getDetalle();
    $data["ubicacion"] = $this->getUbicacion();
    $data["garantia"] = $this->getGarantia();
    $data["metros"] = $this->getMetros();
    $data["dormitorios"] = $this->getDormitorios();
    $data["banos"] = $this->getBanios();
    $data["calefaccion"] = $this->getCalefaccion();
    $data["garage"] = $this->getGarage();
    $data["precio"] = $this->getPrecio();
    $data["moneda"] = $this->getMoneda();
    $data['orden'] = $this->retrieveLastOrder();
    
    $this->db->insert($this->getTablename(), $data);
    $id = $this->db->insert_id(); 
    if(!is_null($id) && $id != 0)
	{
	  $ci =& get_instance();
	  $ci->load->model('upload/album');
	  $ci->album->createAlbum($id, $this->getObjectClass()); 
	}
    return $id;
  }
  
  private function retrieveLastOrder()
  {
    $sql = "SELECT max( `orden` ) +1 AS MAXIMUN FROM ".$this->getTablename();
    $query = $this->db->query($sql);

    $row = $query->row();
    $return = 0;
    if(!is_null($row->MAXIMUN))
    {
      $return = $row->MAXIMUN;
    }
    return $return;
  }
  
  private function edit()
  {
    $data = array();
    $data["titulo"] = $this->getTitulo();
    $data["detalle"] = $this->getDetalle();
    $data["ubicacion"] = $this->getUbicacion();
    $data["garantia"] = $this->getGarantia();
    $data["metros"] = $this->getMetros();
    $data["dormitorios"] = $this->getDormitorios();
    $data["banos"] = $this->getBanios();
    $data["calefaccion"] = $this->getCalefaccion();
    $data["garage"] = $this->getGarage();
    $data["precio"] = $this->getPrecio();
    $data["moneda"] = $this->getMoneda();
    
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
        $aux = new propiedad_model();
        $aux->setId($obj->id);
        $aux->setTitulo($obj->titulo);
        $aux->setDetalle($obj->detalle);
        $aux->setUbicacion($obj->ubicacion);
        $aux->setGarantia($obj->garantia);
        $aux->setMetros($obj->metros);
        $aux->setDormitorios($obj->dormitorios);
        $aux->setBanios($obj->banos);
        $aux->setCalefaccion($obj->calefaccion);
        $aux->setGarage($obj->garage);
        $aux->setPrecio($obj->precio);
        $aux->setMoneda($obj->moneda);
        $aux->setOrden($obj->orden);
        return $aux;
      }
      return $obj;
    } else {
      // None
      return NULL;
    }
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
  
  function retrieveForSort()
  {
    $this->db->select(array('id', 'titulo', 'orden'));
    $this->db->order_by("orden", "desc");
    $query = $this->db->get($this->getTablename());

    return $query->result();
  }
  
  function updateOrder($id, $order)
  {
    $data = array(
              'orden' => $order
           );
    $this->db->where('id', $id);
    $this->db->update($this->getTablename(), $data);
  }
}


