<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of roche
 *
 * @author rodrigo
 */
class Roche extends MY_Controller{

  private $DEFAULT_LAYOUT = "roche_layout";
  
  function __construct() {
    parent::__construct();
    //$this->loadI18n("global", "", FALSE, TRUE, "", "sitio");
    //$this->output->cache(1);
    if(!$this->isLogged() && $this->router->method != "adminLogin")
    {
      //Si no esta logeado se tiene que ir a loguear
      $this->session->set_userdata('url_to_direct_on_login', 'inicio.html');
      redirect('auth/login'); 
    }
    $this->data["menu_id"] = "";
  }
  
  public function index()
  {
    $this->data['content'] = 'home';
    $this->load->view($this->DEFAULT_LAYOUT, $this->data);
  }
  
  public function buscar()
  {
    $this->data['content'] = 'buscar';
    $this->data["menu_id"] = "busqueda";
    $this->addJqueryUI();
    $this->load->view($this->DEFAULT_LAYOUT, $this->data);
  }
}

