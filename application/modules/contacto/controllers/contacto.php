<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/*
 */

/**
 * Description of contacto
 *
 * @author Rodrigo Santellan <rodrigo.santellan at inswitch.us>
 */
class contacto extends MY_Controller{
  
    function __construct()
    {
      parent::__construct();
      $this->data['menu_id'] = 'contacto';
      $this->loadI18n("global", "", FALSE, TRUE, "", "sitio");
      //$this->loadI18n("sitio", "", FALSE, TRUE, "", "sitio");
      //$this->loadI18n("menu", "", FALSE, TRUE, "", "sitio");
      //$this->loadI18n("contacto");
	  $this->loadI18n("contacto", "", FALSE, TRUE, "", "sitio");
	  
      //$this->addJavascript("jquery-1.7.1.min.js");
      //$this->addJavascript("jquery.infieldlabel.min.js");
      //$this->addJavascript("basicInfieldForm.js");
      //$this->addStyleSheet("infieldlabel.css");
      //$this->addJavascript("busqueda.js");
      //$this->addStyleSheet("contacto.css");  
    }
    
    function index()
    {
      $this->load->library('form_validation');
      $this->load->helper('form');
      $this->load->helper('url');
      
      $this->form_validation->set_rules('nombre', 'nombre', 'required|max_length[255]');			
      $this->form_validation->set_rules('email', 'email', 'required|valid_email|max_length[255]');			
      $this->form_validation->set_rules('comentario', 'comentario', 'required|max_length[1000]');

      $this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
      
      if ($this->form_validation->run() == FALSE) // validation hasn't been passed
      {
        $this->data['content'] = 'contact_form';
        $this->load->view('layout', $this->data);
      }
      else
      {
        // build array for the model
			
        $form_data = array(
                        'nombre' => set_value('nombre'),
                        'email' => set_value('email'),
                        'comentario' => set_value('comentario')
                    );
        $data['form_data'] = $form_data;
        
        $this->load->model('mail_db');
        $return = $this->mail_db->retrieveContactMailInfo();
        //var_dump($return);die;
        //Con estos datos preparo un email para enviar.
        $this->load->library('email');

        $this->email->from($return['from']['direccion'], $return['from']['nombre']);
        $this->email->to($return['to']); 
		if(isset($return['cc']))
		{
		  $this->email->cc($return['cc']); 
		}
        if(isset($return['bcc']))
		{
		  $this->email->bcc($return['bcc']);
		}
        
        $this->email->reply_to($form_data['email'], $form_data['nombre']);
		
        $this->email->subject('Contacto desde el sitio web');
        $message = $this->load->view('memail', $form_data, true);
        $this->email->message($message); 

        $this->email->send();
		//Debug
		//echo $this->email->print_debugger();die;

        redirect('contacto/success');   // or whatever logic needs to occur
        
      }
    }
    
    function success()
	{
      $this->data['content'] = 'mail_success';
      $this->load->view('layout', $this->data);
	}
}
