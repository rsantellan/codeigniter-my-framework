<?php

/*
 */

/**
 * Description of admin
 *
 * @author Rodrigo Santellan
 */
class admin extends MY_Controller{
  
  public function __construct() 
  {
    parent::__construct();
    $this->loadI18n(get_class($this), $this->lenguage, FALSE, TRUE, '', strtolower(get_class($this)));

    if(!$this->isLogged() && $this->router->method != "adminLogin")
    {
      //Si no esta logeado se tiene que ir a loguear
      $this->session->set_userdata('url_to_direct_on_login', 'admin/index');
      redirect('auth/login'); 
    }
  }
 
  public function index()
  {
    $this->data['content'] = "admin/welcome";
    $this->data['menu_id'] = 'dashboard';
    
    $this->load->view("admin/layout", $this->data);
  }
  
  public function adminLogin()
  {
    $this->addModuleStyleSheet("admin", "login_admin");
    
    $this->load->view("admin_login");
  }
}

