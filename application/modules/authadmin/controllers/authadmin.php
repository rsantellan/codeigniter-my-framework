<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/*
 */

/**
 * Description of authAdmin
 *
 * @author Rodrigo Santellan <rodrigo.santellan at inswitch.us>
 */
class Authadmin extends MY_Controller{
  
  
  	function __construct()
    {
		parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->data['menu_id'] = 'users';
        
        if(!$this->isLogged())
        {
          //Si no esta logeado se tiene que ir a loguear
          $this->session->set_userdata('url_to_direct_on_login', 'authadmin/index');
          redirect('auth/login'); 
        }
        
    }
    
    function index()
    {
      
      
      $this->load->model('auth/users');
      $this->load->library('tank_auth', true, NULL, 'auth');
      
      //$pass = $this->tank_auth->hashPassword('Cnea.Adm1n1strador');
      //var_dump($pass);
      $this->data['user_list'] = $this->users->listUsers();
      $rows = array();
      foreach($this->data['user_list'] as $user)
      {
        $mData['user'] = $user;
        $show_delete = true;
        if($this->tank_auth->get_user_id() == $user->id)
        {
          $show_delete = false;
        }
        $mData['delete'] = $show_delete;
        $view = $this->load->view('authadmin/user_row', $mData, true);
        $rows[] = $view;
      }
      $this->data['user_rows'] = $rows;
      
      $this->data['content'] = "authadmin/user_list";
      //$this->load->view('authadmin/user_list', $data);
      $this->load->view("admin/layout", $this->data);
    }

    
    
    /**
	 * Register user on the site
	 *
	 * @return void
	 */
	function register()
	{
      
        $this->config->load('tank_auth', false, false, 'auth');
        $this->load->library('tank_auth', true, NULL, 'auth');
        $use_username = $this->config->item('use_username', 'tank_auth');
        
		if ($use_username) {
			$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean|min_length['.$this->config->item('username_min_length', 'tank_auth').']|max_length['.$this->config->item('username_max_length', 'tank_auth').']|alpha_dash');
		}
        $this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean|valid_email');
        $data['errors'] = array();

        $email_activation = $this->config->item('email_activation', 'tank_auth');
        $password = "";
        $length = 8;
        $possible = "2346789bcdfghjkmnpqrtvwxyzBCDFGHJKLMNPQRTVWXYZ";
        $maxlength = strlen($possible);
        if ($length > $maxlength) {
          $length = $maxlength;
        } 
        $i = 0; 
        while ($i < $length) { 
          $char = substr($possible, mt_rand(0, $maxlength-1), 1);
          if (!strstr($password, $char)){
            $password .= $char;
            $i++;
          }
        }
        
        if ($this->form_validation->run()) {								// validation ok
            
            if (!is_null($data = $this->tank_auth->create_user(
                    $use_username ? $this->form_validation->set_value('username', 'tank_auth') : '',
                    $this->form_validation->set_value('email'),
                    $password,
                    $email_activation))) {									// success

                $data['site_name'] = $this->config->item('website_name', 'tank_auth');
                
                if ($email_activation) {									// send "activate" email
                    $data['activation_period'] = $this->config->item('email_activation_expire', 'tank_auth') / 3600;

                    $this->_send_email('activate', $data['email'], $data);

                    unset($data['password']); // Clear password (just for any case)

                    $this->_show_message($this->lang->line('auth_message_registration_completed_1'));

                } else {
                    if ($this->config->item('email_account_details', 'tank_auth')) {	// send "welcome" email

                        $this->_send_email('welcome', $data['email'], $data);
                    }
                    unset($data['password']); // Clear password (just for any case)

                    $this->_show_message($this->lang->line('auth_message_registration_completed_2').' '.anchor('/auth/login/', 'Login'));
                }
            } else {
                $errors = $this->tank_auth->get_error_message();
                foreach ($errors as $k => $v)	$data['errors'][$k] = $this->lang->line($v);
            }
        }
        
        $this->data['errors'] = $data['errors'];
        $data['use_username'] = $use_username;
        $this->data['use_username'] = $use_username;
        //$this->load->view('authadmin/register_form', $data);
        $this->data['content'] = "authadmin/register_form";
        //$this->load->view('authadmin/user_list', $data);
        $this->load->view("admin/layout", $this->data);
	}
    
    
	/**
	 * Change user email
	 *
	 * @return void
	 */
	function change_email($userId)
	{
		if (!$this->tank_auth->is_logged_in()) {								// not logged in or not activated
			redirect('/auth/login/');

		} else {
            $this->config->load('tank_auth', false, false, 'auth');
            $this->load->library('tank_auth', true, NULL, 'auth');
			$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean|valid_email');
            $this->form_validation->set_rules('user_id', 'user_id', 'required|xss_clean');
            
            $aux_user_id = $this->input->post('user_id');
            if($aux_user_id !== '')
            {
              $userId = $aux_user_id;
            }
            
            $data['user_id'] = $userId;
			$data['errors'] = array();
            
			if ($this->form_validation->run()) {								// validation ok
                $data = $this->tank_auth->set_user_new_email($this->form_validation->set_value('email'),$userId);
                if (!is_null($data)) {			// success
                    $data['site_name'] = $this->config->item('website_name', 'tank_auth');

					// Send email with new email address and its activation link
					$this->_send_email('change_email', $data['new_email'], $data);

					$this->_show_message(sprintf($this->lang->line('auth_message_new_email_sent'), $data['new_email']));

				} else {
					$errors = $this->tank_auth->get_error_message();
					foreach ($errors as $k => $v)	$data['errors'][$k] = $this->lang->line($v);
				}
			}
            $data['user_id'] = $userId;
			$this->load->view('authadmin/change_email_form', $data);
		}
	}    
    
    function resetPassword($userId)
    {
      $this->config->load('tank_auth', false, false, 'auth');
      $this->load->library('tank_auth', true, NULL, 'auth');
      
      $is_ok = false;
      $data = $this->tank_auth->user_forgot_password($userId);
      if(!is_null($data))
      {
        $is_ok = true;
        $data['site_name'] = $this->config->item('website_name', 'tank_auth');
        // Send email with password activation link
        $this->_send_email('forgot_password', $data['email'], $data);
        $this->_show_message($this->lang->line('auth_message_new_password_sent'));
      }
      
      $return = array();
      $return["result"] = $is_ok;
      echo json_encode($return);
    }
    
	/**
	 * Send email message of given type (activate, forgot_password, etc.)
	 *
	 * @param	string
	 * @param	string
	 * @param	array
	 * @return	void
	 */
	function _send_email($type, $email, &$data)
	{
      
		$this->load->library('email');
		$this->email->from($this->config->item('webmaster_email', 'tank_auth'), $this->config->item('website_name', 'tank_auth'));
		$this->email->reply_to($this->config->item('webmaster_email', 'tank_auth'), $this->config->item('website_name', 'tank_auth'));
		$this->email->to($email);
		$this->email->subject(sprintf($this->lang->line('auth_subject_'.$type), $this->config->item('website_name', 'tank_auth')));
		$this->email->message($this->load->view('email/'.$type.'-html', $data, TRUE));
		$this->email->set_alt_message($this->load->view('email/'.$type.'-txt', $data, TRUE));
		$this->email->send();
        //echo $this->email->print_debugger();
	}    
  
  
  function activate($user_id)
  {
    $this->load->model('auth/users');
    $return = array();
    $is_ok = $this->users->activateUser($user_id);
    $return["result"] = $is_ok;
    echo json_encode($return);
  }
  
  function deactivate($user_id)
  {
    $this->load->model('auth/users');
    $return = array();
    $is_ok = $this->users->deactivateUser($user_id);
    $return["result"] = $is_ok;
    echo json_encode($return);
  }  
  
  function banUser($user_id)
  {
    $this->load->model('auth/users');
    $return = array();
    $this->users->ban_user($user_id, "Admin deactivated");
    $return["result"] = true;
    echo json_encode($return);
  }
  
  function unbanUser($user_id)
  {
    $this->load->model('auth/users');
    $return = array();
    $this->users->unban_user($user_id);
    $return["result"] = true;
    echo json_encode($return);
  }  
  
  function deleteUser($user_id)
  {
    $this->load->model('auth/users');
    $return = array();
    $this->users->delete_user($user_id);
    $return["result"] = true;
    echo json_encode($return);    
  }
  
  /**
	 * Show info message
	 *
	 * @param	string
	 * @return	void
	 */
	function _show_message($message)
	{
		$this->session->set_flashdata('message', $message);
		redirect('/authadmin/');
	}
}
