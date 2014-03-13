<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/*
 */

/**
 * Description of authAdmin
 *
 * @author Rodrigo Santellan
 */
class Authadmin extends MY_Controller {

  function __construct() {
    parent::__construct();
    $this->load->helper(array('form', 'url'));
    $this->load->library('form_validation');
    $this->data['menu_id'] = 'users';

    if (!$this->isLogged()) {
      //Si no esta logeado se tiene que ir a loguear
      $this->session->set_userdata('url_to_direct_on_login', 'authadmin/index');
      redirect('auth/login');
    }
    else
    {
      $user = $this->getLoggedUserData();
      if(isset($user->profile) && $user->profile !== 'admin')
      {
        $this->session->set_flashdata("permission", "No tiene los permisos suficientes");
        redirect('');
      }
    }
    //var_dump($this->getLoggedUserData());
//	  $this->output->enable_profiler(TRUE);      
  }

  function index() {

    $this->addJquery();
    //$this->addJquery();
    $this->addColorbox();
    $this->addModuleJavascript("datatable", "jquery.dataTables.min.js");
    $this->addModuleStyleSheet('datatable', 'jquery.dataTables.css');
    $this->addModuleStyleSheet('datatable', 'data_table_admin.css');
    
    //$this->addModuleJavascript("admin", "adminManager.js");
    $this->addModuleJavascript("admin", "userManager.js");
    $this->load->model('auth/users');
    $this->load->library('tank_auth', true, NULL, 'auth');

    //$pass = $this->tank_auth->hashPassword('Cnea.Adm1n1strador');
    //var_dump($pass);
    $this->data['user_list'] = $this->users->listUsers();
    $rows = array();
    foreach ($this->data['user_list'] as $user) {
      $mData['user'] = $user;
      $show_delete = true;
      if ($this->tank_auth->get_user_id() == $user->id) {
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
   * Register user on the site sending email
   *
   * @return void
   */
  function register() {

    $this->config->load('tank_auth', false, false, 'auth');
    $this->load->library('tank_auth', true, NULL, 'auth');
    $use_username = $this->config->item('use_username', 'tank_auth');

    if ($use_username) {
      $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean|min_length[' . $this->config->item('username_min_length', 'tank_auth') . ']|max_length[' . $this->config->item('username_max_length', 'tank_auth') . ']|alpha_dash');
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
      $char = substr($possible, mt_rand(0, $maxlength - 1), 1);
      if (!strstr($password, $char)) {
        $password .= $char;
        $i++;
      }
    }

    if ($this->form_validation->run()) {        // validation ok
      if (!is_null($data = $this->tank_auth->create_user(
                      $use_username ? $this->form_validation->set_value('username', 'tank_auth') : '', $this->form_validation->set_value('email'), $password, $email_activation))) {         // success
        $data['site_name'] = $this->config->item('website_name', 'tank_auth');

        if ($email_activation) {         // send "activate" email
          $data['activation_period'] = $this->config->item('email_activation_expire', 'tank_auth') / 3600;

          $this->_send_email('activate', $data['email'], $data);

          unset($data['password']); // Clear password (just for any case)

          $this->_show_message($this->lang->line('auth_message_registration_completed_1'));
        } else {
          if ($this->config->item('email_account_details', 'tank_auth')) { // send "welcome" email
            $this->_send_email('welcome', $data['email'], $data);
          }
          unset($data['password']); // Clear password (just for any case)

          $this->_show_message($this->lang->line('auth_message_registration_completed_2') . ' ' . anchor('/auth/login/', 'Login'));
        }
      } else {
        $errors = $this->tank_auth->get_error_message();
        foreach ($errors as $k => $v)
          $data['errors'][$k] = $this->lang->line($v);
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
   * Edit user basic data
   * @param type $id
   */
  function edit($id) {
    $this->config->load('tank_auth', false, false, 'auth');
    $this->load->library('tank_auth', true, NULL, 'auth');
    $use_username = $this->config->item('use_username', 'tank_auth');
    $this->load->model('auth/users');
    $user = $this->users->retrieve_user_by_id($id);
    if ($use_username) {
      $this->form_validation->set_rules('username', 'Usuario', 'trim|required|xss_clean|min_length[' . $this->config->item('username_min_length', 'tank_auth') . ']|max_length[' . $this->config->item('username_max_length', 'tank_auth') . ']|alpha_dash');
    }
    $this->form_validation->set_rules('email', 'Correo electronico', 'trim|required|xss_clean|valid_email');
    $this->form_validation->set_rules('especialidad', 'Especialidad', 'trim|required|xss_clean|max_length[255]');
    $this->form_validation->set_rules('cjp', 'Número de Caja Profesional', 'trim|required|xss_clean|max_length[255]');
    $this->form_validation->set_rules('direccion', 'Dirección', 'max_length[255]');
    $this->form_validation->set_rules('telefono', 'Teléfono', 'max_length[255]');
    $this->form_validation->set_rules('permisos', 'Permisos', 'required|max_length[255]');
    $data['errors'] = array();
    $valid = false;
    //var_dump($user);
    $oldUsername = $user->username;
    if ($this->form_validation->run()) {        // validation ok
        $valid = true;
      
//      if (!is_null($data = $this->tank_auth->create_user(
//                      $use_username ? $this->form_validation->set_value('username', 'tank_auth') : '', $this->form_validation->set_value('email'), $this->form_validation->set_value('password'), false, $this->form_validation->set_value('especialidad'), $this->form_validation->set_value('cjp'), $this->form_validation->set_value('direccion'), $this->form_validation->set_value('telefono'), $this->form_validation->set_value('permisos')
//              ))) {         // success
//        $this->_show_message($this->lang->line('auth_message_registration_completed_2') . ' ' . anchor('/auth/login/', 'Login'));
//      } else {
//        $errors = $this->tank_auth->get_error_message();
//        foreach ($errors as $k => $v)
//          $data['errors'][$k] = $this->lang->line($v);
//      }
    }
    if($_SERVER['REQUEST_METHOD'] === 'POST')
    {
      //var_dump('aca');
      $user->username = set_value('username');
      $user->email = set_value('email');
      $user->especialidad = set_value('especialidad');
      $user->cjp = set_value('cjp');
      $user->direccion = set_value('direccion');
      $user->telefono = set_value('telefono');
      $user->profile = set_value('permisos');
    }
    //var_dump($user);
    if($valid)
    {
      if($oldUsername != $user->username)
      {
        if(!$this->tank_auth->is_username_available($user->username))
        {
          $data['errors']['usernameinvalid'] = 'El nombre de usuario ya existe';
          $valid = false;
        }
      }
      if($valid)
      {
        //var_dump('lo tengo que salvar!!');
        $data = array(
            'username' => $user->username,
            'email' => $user->email,
            'especialidad' => $user->especialidad,
            'cjp' => $user->cjp,
            'direccion' => $user->direccion,
            'telefono' => $user->telefono,
            'profile' => $user->profile,
        );
        $counter = $this->users->edit($data, $id);
        if($counter > 0)
        {
          $this->session->set_flashdata("salvado", "ok");
          redirect('/authadmin/edit/'.$id);
        }
        else
        {
          $data['errors']['dberror'] = 'Hubo un problema en el sistema, intente mas tarde';
        }
        
      }
      //
      
    }

    $this->data['errors'] = $data['errors'];
    $this->data['user'] = $user;
    $data['use_username'] = $use_username;
    $this->data['use_username'] = $use_username;
    $this->data['use_grid_16'] = false;
    //$this->load->view('authadmin/register_form', $data);
    $this->data['content'] = "authadmin/edit_form_password";
    //$this->load->view('authadmin/user_list', $data);
    $this->load->view("admin/layout", $this->data);
  }
  
  /**
   * Register user on the site with password
   *
   * @return void
   */
  function registerPassword() {

    $this->config->load('tank_auth', false, false, 'auth');
    $this->load->library('tank_auth', true, NULL, 'auth');
    $use_username = $this->config->item('use_username', 'tank_auth');

    if ($use_username) {
      $this->form_validation->set_rules('username', 'Usuario', 'trim|required|xss_clean|min_length[' . $this->config->item('username_min_length', 'tank_auth') . ']|max_length[' . $this->config->item('username_max_length', 'tank_auth') . ']|alpha_dash');
    }
    $this->form_validation->set_rules('email', 'Correo electronico', 'trim|required|xss_clean|valid_email');
    $this->form_validation->set_rules('password', 'Contraseña', 'trim|required|xss_clean|min_length[' . $this->config->item('password_min_length', 'tank_auth') . ']|max_length[' . $this->config->item('password_max_length', 'tank_auth') . ']|alpha_dash');
    $this->form_validation->set_rules('confirm_password', 'Repetir contraseña', 'trim|required|xss_clean|matches[password]');
    $this->form_validation->set_rules('especialidad', 'Especialidad', 'trim|required|xss_clean|max_length[255]');
    $this->form_validation->set_rules('cjp', 'Número de Caja Profesional', 'trim|required|xss_clean|max_length[255]');
    $this->form_validation->set_rules('direccion', 'Dirección', 'max_length[255]');
    $this->form_validation->set_rules('telefono', 'Teléfono', 'max_length[255]');
    $this->form_validation->set_rules('permisos', 'Permisos', 'required|max_length[255]');
    $data['errors'] = array();

    if ($this->form_validation->run()) {        // validation ok
      if (!is_null($data = $this->tank_auth->create_user(
                      $use_username ? $this->form_validation->set_value('username', 'tank_auth') : '', $this->form_validation->set_value('email'), $this->form_validation->set_value('password'), false, $this->form_validation->set_value('especialidad'), $this->form_validation->set_value('cjp'), $this->form_validation->set_value('direccion'), $this->form_validation->set_value('telefono'), $this->form_validation->set_value('permisos')
              ))) {         // success
        $this->_show_message($this->lang->line('auth_message_registration_completed_2') . ' ' . anchor('/auth/login/', 'Login'));
      } else {
        $errors = $this->tank_auth->get_error_message();
        foreach ($errors as $k => $v)
          $data['errors'][$k] = $this->lang->line($v);
      }
    }

    $this->data['errors'] = $data['errors'];
    $data['use_username'] = $use_username;
    $this->data['use_username'] = $use_username;
    $this->data['use_grid_16'] = false;
    //$this->load->view('authadmin/register_form', $data);
    $this->data['content'] = "authadmin/register_form_password";
    //$this->load->view('authadmin/user_list', $data);
    $this->load->view("admin/layout", $this->data);
  }

  /**
   * Change user email
   *
   * @return void
   */
  function change_email($userId) {
    if (!$this->tank_auth->is_logged_in()) {        // not logged in or not activated
      redirect('/auth/login/');
    } else {
      $this->config->load('tank_auth', false, false, 'auth');
      $this->load->library('tank_auth', true, NULL, 'auth');
      $this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean|valid_email');
      $this->form_validation->set_rules('user_id', 'user_id', 'required|xss_clean');

      $aux_user_id = $this->input->post('user_id');
      if ($aux_user_id !== '') {
        $userId = $aux_user_id;
      }

      $data['user_id'] = $userId;
      $data['errors'] = array();

      if ($this->form_validation->run()) {        // validation ok
        $data = $this->tank_auth->set_user_new_email($this->form_validation->set_value('email'), $userId);
        if (!is_null($data)) {   // success
          $data['site_name'] = $this->config->item('website_name', 'tank_auth');

          // Send email with new email address and its activation link
          $this->_send_email('change_email', $data['new_email'], $data);

          $this->_show_message(sprintf($this->lang->line('auth_message_new_email_sent'), $data['new_email']));
        } else {
          $errors = $this->tank_auth->get_error_message();
          foreach ($errors as $k => $v)
            $data['errors'][$k] = $this->lang->line($v);
        }
      }
      $data['user_id'] = $userId;
      $this->load->view('authadmin/change_email_form', $data);
    }
  }

  function resetPassword($userId) {
    $this->config->load('tank_auth', false, false, 'auth');
    $this->load->library('tank_auth', true, NULL, 'auth');

    $is_ok = false;
    $data = $this->tank_auth->user_forgot_password($userId);
    if (!is_null($data)) {
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
  function _send_email($type, $email, &$data) {

    $this->load->library('email');
    $this->email->from($this->config->item('webmaster_email', 'tank_auth'), $this->config->item('website_name', 'tank_auth'));
    $this->email->reply_to($this->config->item('webmaster_email', 'tank_auth'), $this->config->item('website_name', 'tank_auth'));
    $this->email->to($email);
    $this->email->subject(sprintf($this->lang->line('auth_subject_' . $type), $this->config->item('website_name', 'tank_auth')));
    $this->email->message($this->load->view('email/' . $type . '-html', $data, TRUE));
    $this->email->set_alt_message($this->load->view('email/' . $type . '-txt', $data, TRUE));
    $this->email->send();
    //echo $this->email->print_debugger();
  }

  function activate($user_id) {
    $this->load->model('auth/users');
    $return = array();
    $is_ok = $this->users->activateUser($user_id);
    if ($is_ok) {
      $return["response"] = "OK";
      $return["message"] = "Usuario activado";
    } else {
      $return["response"] = "ERROR";
      $return["message"] = "Ocurrio un error por favor intenta mas tarde";
    }
    echo json_encode($return);
  }

  function deactivate($user_id) {
    $this->load->model('auth/users');
    $return = array();
    $is_ok = $this->users->deactivateUser($user_id);
    if ($is_ok) {
      $return["response"] = "OK";
      $return["message"] = "Usuario desactivado";
    } else {
      $return["response"] = "ERROR";
      $return["message"] = "Ocurrio un error por favor intenta mas tarde";
    }
    echo json_encode($return);
  }

  function banUser($user_id) {
    $this->load->model('auth/users');
    $return = array();
    $is_ok = $this->users->ban_user($user_id, "Admin deactivated");
    if ($is_ok) {
      $return["response"] = "OK";
      $return["message"] = "Usuario desactivado";
    } else {
      $return["response"] = "ERROR";
      $return["message"] = "Ocurrio un error por favor intenta mas tarde";
    }
    echo json_encode($return);
  }

  function unbanUser($user_id) {
    $this->load->model('auth/users');
    $return = array();
    $is_ok = $this->users->unban_user($user_id);
    if ($is_ok) {
      $return["response"] = "OK";
      $return["message"] = "Usuario desactivado";
    } else {
      $return["response"] = "ERROR";
      $return["message"] = "Ocurrio un error por favor intenta mas tarde";
    }
    echo json_encode($return);
  }

  function deleteUser($user_id) {
    $this->load->model('auth/users');
    $return = array();
    $this->users->delete_user($user_id);
    $return["result"] = true;
    echo json_encode($return);
  }

  public function showGeneratedPassword() {
    $this->config->load('tank_auth', false, false, 'auth');
    $this->load->library('tank_auth', true, NULL, 'auth');

    $pass = $this->input->get("pass");
    $u = $this->input->get("u");

    if ($u == "123b4a") {
      var_dump($this->tank_auth->hashPassword($pass));
      die;
    }
    show_error("No autorizado");
  }

  /**
   * Show info message
   *
   * @param	string
   * @return	void
   */
  function _show_message($message) {
    $this->session->set_flashdata('message', $message);
    redirect('/authadmin/');
  }
  
  function addByExcel()
  {
    $this->data['use_grid_16'] = false;
    $this->data['content'] = "authadmin/addExcel";
    $this->load->view("admin/layout", $this->data);
  }
  
  function proccesExcel()
  {
    $config['upload_path'] = sys_get_temp_dir();
    $config['allowed_types'] = 'xls';
    $this -> load -> library('upload', $config);
    $usuariosErroneos = array();
    $usuariosOK = 0;
    if (!$this->upload->do_upload('datafile')) {
      $this->data['use_grid_16'] = false;
      $this->data['errores'] = $this->upload->display_errors();
      $this->data['content'] = "authadmin/addExcel";
      //$this->load->view('authadmin/user_list', $data);
      $this->load->view("admin/layout", $this->data);
    }else{
      $uploadData = $this->upload->data();
      $file_path = $uploadData["full_path"];
      //load our new PHPExcel library
      $this->load->library('excel');
      $objReader = PHPExcel_IOFactory::createReader('Excel5');
      $objPHPExcel = $objReader->load($file_path);
      $sheetData = $objPHPExcel->getActiveSheet();
      $first = true;
      $filenamecsv = sys_get_temp_dir().DIRECTORY_SEPARATOR. 'dataupload-'.time().'.csv';
      $fp = fopen($filenamecsv, 'w');
      fputcsv($fp, array('Nombre', 'Email', 'Especialidad', 'CPJ', 'Direccion', 'Telefono', 'Pass', 'Permiso'));
      foreach ($sheetData->getRowIterator() as $row) {
        $cellIterator = $row->getCellIterator();
        $cellIterator->setIterateOnlyExistingCells(false); // This loops all cells,
        // even if it is not set.
        // By default, only cells
        // that are set will be
        // iterated.
        if(!$first)
        {
          $user = array();
          $cellIndex = 0;
          foreach ($cellIterator as $cell) {
            switch ($cellIndex) {
              case 0:
                  $user['nombre'] = $cell->getValue();
                break;
              case 1:
                  $user['email'] = $cell->getValue();
                break;
              case 2:
                  $user['especialidad'] = $cell->getValue();
                break;
              case 3:
                  $user['cjp'] = $cell->getValue();
                break;
              case 4:
                  $user['direccion'] = $cell->getValue();
                break;
              case 5:
                  $user['telefono'] = $cell->getValue();
                break;
              default:
                break;
            }
            $cellIndex++;
          }
          if($this->form_validation->valid_email($user['email']) &&
             $this->form_validation->required($user['especialidad']) &&
             $this->form_validation->required($user['nombre']) &&
             $this->form_validation->required($user['cjp']) 
            )
          {
            $user['password'] = $this->createRandomPassword();
            $user['profile'] = 'medico';
            //var_dump($user);
		   $data = $this->tank_auth->create_user(
				$user['nombre'],
				$user['email'],
				$user['password'],
				false,
				$user['especialidad'],
				$user['cjp'],
				$user['direccion'],
				$user['telefono'],
				$user['profile']
			  );
			if($data !== NULL)
			{
			  fputcsv($fp, $user);	
			  $usuariosOK++;
			}
            else
            {
				$error = $this->tank_auth->get_error_message();
				//
				$this->loadI18n("tank_auth", $this->getLanguageFile(), FALSE, TRUE, "", "auth");
				$this->lang->load('tank_auth');
				if(is_array($error)){
					$aux_error = '';
					foreach($error as $aError)
					{
						$aux_error .= $this->lang->line($aError).'. ';
					}
					$error = $aux_error;
					//$user['error'] = implode('. ', $user['error']);
				}
				$user['error'] = $error;
				$usuariosErroneos[] = $user;
			}
		  }
          else
          {
			$error = '';
			if(!$this->form_validation->valid_email($user['email']))
			  $error .= 'Mail invalido. ';  
			if(!$this->form_validation->required($user['especialidad']))
			  $error .= 'Espacialidad es requerida. ';  
			if(!$this->form_validation->required($user['nombre']))
			  $error .= 'Nombre es requerido. ';  
			if(!$this->form_validation->required($user['cjp']))
			  $error .= 'CJP es requerido. ';
			$user['error'] = $error;  
            $usuariosErroneos[] = $user;
          }
        }
        else
        {
          $first = false;
        }
      }
      fclose($fp);
      $csvObjReader = PHPExcel_IOFactory::createReader('CSV');
      $csvObjPHPExcel = $csvObjReader->load($filenamecsv);
      $csvObjWriter = PHPExcel_IOFactory::createWriter($csvObjPHPExcel, 'Excel5');
      $filenamexls = sys_get_temp_dir().DIRECTORY_SEPARATOR. 'dataupload-'.time().'.xls';
      $csvObjWriter->save($filenamexls);
      $this->data['filecsv'] = $filenamecsv;
      $this->data['erroresListado'] = $usuariosErroneos;  
      $this->data['usuariosOK'] = $usuariosOK;  
      $this->data['use_grid_16'] = false;
      $this->data['content'] = "authadmin/resultExcel";
      $this->load->view("admin/layout", $this->data);
    }
    
  }
  
  private function createRandomPassword($length = 8){
    $password = "";
    $possible = "2346789bcdfghjkmnpqrtvwxyzBCDFGHJKLMNPQRTVWXYZ";
    $maxlength = strlen($possible);
    if ($length > $maxlength) {
      $length = $maxlength;
    }
    $i = 0;
    while ($i < $length) {
      $char = substr($possible, mt_rand(0, $maxlength - 1), 1);
      if (!strstr($password, $char)) {
        $password .= $char;
        $i++;
      }
    }
    return $password;
  }
}
