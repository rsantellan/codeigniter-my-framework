<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/**
 * Controller for CodeIgniter frontend language files editor.
 *
 * Idea:
 * Keys stored in database only as an information and simple way to communicate between files.
 * Edit translation for existing keys, Add new keys, Same keys for every language.
 *
 * Tested for CodeIgniter 2.x
 * @author		Eliza Witkowska (http://codebusters.pl/en/)
 * @version		2.1
 * @license		MIT License
 * @link	http://blog.codebusters.pl/en/entry/codeigniter-frontend-language-files-editor/
 * @link https://github.com/kokers/Codeigniter-Frontend-Language-Files-Editor
 */
class Language extends MY_Controller {

  function __construct() {
    parent::__construct();
    
    if(!$this->isLogged())
    {
      //Si no esta logeado se tiene que ir a loguear
      $this->session->set_userdata('url_to_direct_on_login', 'language/index');
      redirect('auth/login'); 
    }
    
    $this->load->helper(array('url', 'file', 'language', 'form')); //load this helpers if youre not doing it in autoload
    $this->load->model(array('model_language'));
    $this->load->library(array('session')); //load session if youre not doing it in autoload
    $this->load->database(); //load database if youre not doing it in autoload
    $this->load->language('language'); //you can delete it if you have translation for you language
    $this->config->load('language_editor');
  }

  function index() {
    $this->lang_list();
  }

  /**
   * Get language list based on directories or files in it.
   *
   * @return void
   */
  function lang_list($dir=FALSE, $module = null) {
    $this->config->load("language/language_editor");
    $modules = $this->config->item("modules");
    $data['allModules'] = $modules;
    if ($dir === FALSE) {
      $data['dir'] = $this->model_language->get_languages($modules);
      $this->load->view('language/dir_list', $data);
    } else {
      $data['sel_dir'] = $dir;
      $data['sel_module'] = $module;
      $data['module'] = $module;
      $data['dir'] = $this->model_language->get_languages($modules);
      $data['files'] = $this->model_language->get_list_lfiles($dir, $module);
      $this->load->view('language/file_list', $data);
    }
  }

  /**
   * Get list of keys and translations from file.
   * Check if all keys from file are in database and show new keys available for translate.
   * If there is new keys file must should be saved - until then they are not existing in file.
   *
   * @return void
   */
  function lang_file($l=FALSE, $file=FALSE, $module = NULL) {
    //$this->output->enable_profiler(TRUE);
    $exists = false;
    if ($l !== FALSE && $file !== FALSE) {
      $mFile = "";
      $mDir = "";
      if (!is_null($module)) {
        $mDir = APPPATH . "modules/" . $module . "/language/" . $l . "/";
        $mFile = $mDir . $file;
      } else {
        $mDir = APPPATH . "language/$l/";
        $mFile = $mDir . $file;
      }
      if (is_dir($mDir) && file_exists($mFile)) {
        $exists = true;
      }
    }
	
    if ($exists) {
	  require($mFile);
      $data = array(
          'lang' => $lang,
          'language' => $l,
          'file' => $file,
          'module' => $module
      );
      $data['keys'] = $this->model_language->get_keys_from_db($file, $module); /// get keys for this file
      if ($this->config->item('comments') == 1) {
        $data['comments'] = $this->model_language->get_comments_from_db($file);
      }
      if ($data['keys'] !== FALSE) {
        $data['extra_keys'] = array_diff(array_keys($lang), $data['keys']); ///get keys that are in file but not in database
      }
      $data['dir'] = $this->model_language->get_languages();
      if ($this->config->item('language_pattern') == 1 && $l != $this->config->item('language_pattern_lang') && file_exists(APPPATH . "language/{$this->config->item('language_pattern_lang')}/$file")) {
        require(APPPATH . "language/{$this->config->item('language_pattern_lang')}/$file");
        $data['pattern'] = $lang;
      }
      $this->load->view('language/edit_lang_file', $data);
    } else {
      $this->session->set_flashdata('error', $this->lang->line('language_error_dir_not_exist'));
      redirect('/language');
    }
  }

  /**
   * Update keys for file - method most likely trigger when we open file for first time.
   *
   * @return void
   */
  function update_all_keys() {
    if ($this->input->post('update')) { ///check if form was submitted
      $l = $this->prepare_str($this->input->post('language'));
      $file = $this->input->post('filename');
      $module = $this->input->post('module');
      if (empty($module))
        $module = NULL;
      $exists = false;
      if (!empty($l) && !empty($file)) {
        $mFile = "";
        $mDir = "";
        if (!is_null($module)) {
          $mDir = APPPATH . "modules/" . $module . "/language/" . $l . "/";
          $mFile = $mDir . $file;
        } else {
          $mDir = APPPATH . "language/$l/";
          $mFile = $mDir . $file;
        }
        if (is_dir($mDir) && file_exists($mFile)) {
          $exists = true;
        }
      }
      if ($exists) { ///check if hidden fields are passed and if they exists
        require($mFile);
        if ($this->model_language->update_all_keys(array_keys($lang), $file, $module)) { ///insert keys from file into database
          $this->session->set_flashdata('msg', $this->lang->line('language_msg_success'));
        } else {
          $this->session->set_flashdata('error', $this->lang->line('language_error'));
        }
        $url_to_redirect = $site_url = 'language/lang_file/' . $l . '/' . $file;
        if (!is_null($module)) {
          $site_url .= "/" . $module;
        }

        redirect($this->config->item('cms_url') . $site_url);
      } else {
        $this->session->set_flashdata('error', $this->lang->line('language_error_dir_not_exist'));
        redirect('/language');
      }
    } else {
      $this->session->set_flashdata('error', $this->lang->line('language_error_no_direct_access'));
      redirect('/language');
    }
  }

  /**
   * Add extra keys from file - method most likely trigger when there where some keys that were in file but not in database.
   *
   * @return void
   */
  function add_extra_keys() {
    //$this->output->enable_profiler(TRUE);
    if ($this->input->post('add_keys')) {
      $l = $this->prepare_str($this->input->post('language'));
      $file = $this->input->post('filename');
      $module = $this->input->post('module');
      if (empty($module))
        $module = NULL;
      $exists = false;
      if (!empty($l) && !empty($file)) {
        $mFile = "";
        $mDir = "";
        if (!is_null($module)) {
          $mDir = APPPATH . "modules/" . $module . "/language/" . $l . "/";
          $mFile = $mDir . $file;
        } else {
          $mDir = APPPATH . "language/$l/";
          $mFile = $mDir . $file;
        }
        if (is_dir($mDir) && file_exists($mFile)) {
          $exists = true;
        }
      }
      if ($exists) { ///check if hidden fields are passed and if they exists
        require($mFile);
        $keys = $this->model_language->get_keys_from_db($file, $module);
        if (!is_array($lang) || !is_array($keys)) {
          redirect("/language/lang_file/$l/$file");
        }
        $extra_keys = array_diff(array_keys($lang), $keys);
        if ($this->model_language->add_keys($extra_keys, $file, $module)) {
          $this->session->set_flashdata('msg', $this->lang->line('language_msg_success'));
        } else {
          $this->session->set_flashdata('error', $this->lang->line('language_error'));
        }
        $url_to_redirect = $site_url = 'language/lang_file/' . $l . '/' . $file;
        if (!is_null($module)) {
          $site_url .= "/" . $module;
        }
        redirect($url_to_redirect);
      } else {
        $this->session->set_flashdata('error', $this->lang->line('language_error_dir_not_exist'));
        redirect('/language');
      }
    } else {
      $this->session->set_flashdata('error', $this->lang->line('language_error_no_direct_access'));
      redirect('/language');
    }
  }

  /**
   * Update language file.
   * If new keys were added, add them to database so they could be available for another language
   *
   * @return void
   */
  function save_language_file() {
    if ($this->input->post('change')) { //check if form was submitted
      $l = $this->prepare_str($this->input->post('language'));
      $file = $this->input->post('filename');
      $module = $this->input->post('module');
      if (empty($module))
        $module = NULL;
      $exists = false;
      if (!empty($l) && !empty($file)) {
        $mFile = "";
        $mDir = "";
        $backUpFile = "";
        if (!is_null($module)) {
          $mDir = APPPATH . "modules/" . $module . "/language/" . $l . "/";
          $mFile = $mDir . $file;
          $backUpFile = $mDir . "backup_" . $file;
        } else {
          $mDir = APPPATH . "language/$l/";
          $mFile = $mDir . $file;
          $backUpFile = $mDir . "backup_" . $file;
        }
        if (is_dir($mDir) && file_exists($mFile)) {
          $exists = true;
        }
      }

      if ($exists) {
        $f = '<?php  if (!defined(\'BASEPATH\')) exit(\'No direct script access allowed\');' . "\n"; /// begin file with standard line
        //$f .= "\$lang = array("."\n"; /// our language array
        $keys = $this->model_language->get_keys_from_db($file, $module);
        if (empty($keys) || !is_array($keys)) {
          $keys = FALSE;
        }
        foreach ($_POST as $key => $value) { /// create new array
          if ($keys !== FALSE && in_array($key, $keys)) {
            if ($this->input->post('comment_' . $key)) {
              $comments[$key] = $this->input->post('comment_' . $key);
              $f .= '/* ' . $this->input->post('comment_' . $key) . ' */' . "\n";
            } else {
              $comments[$key] = '';
            }
            $f .= '$lang[\'' . $key . '\']=\''; ///for language array
            $f .= $this->sanitateData($this->input->post($key, TRUE)) . '\';' . "\n";  ///for language array		, add escaping "
          } elseif ($pos = strpos($key, 'new_key_') !== FALSE) { /// check if there is new key -> strpos is faster than substr
            $new_key = $this->prepare_str(trim($this->input->post($key, TRUE)));
            if (!empty($new_key)) {
              if (!in_array($new_key, $keys) && !in_array($new_key, $new_keys)) {
                if ($this->input->post('comment_' . $key)) {
                  $f .= '/* ' . $this->input->post('comment_' . $key) . ' */' . "\n";
                }
                $f .= '$lang[\'' . $new_key . '\']=\''; ///for language array
                $f .= addslashes($this->input->post('new_value_' . substr($key, -1))) . '\';' . "\n"; ///for language array
                $new_keys[] = $new_key;
              }
            }
          }
        }
        $f.= '/* End of file ' . $file . ' */'; ///closing tags
        ///Before we go on, copy files just in case.
        if (!isset($new_keys) || (!empty($new_keys) && is_array($new_keys) && $this->model_language->add_keys($new_keys, $file))) {
          if (isset($comments) && !empty($comments)) {
            $this->model_language->add_comments($comments, $file);
          }
          copy($mFile, $backUpFile);
          $r = file_put_contents($mFile, $f, LOCK_EX); ///save language file
          if ($r) {
            $this->session->set_flashdata('msg', $this->lang->line('language_file_saved'));
          } else {
            $this->session->set_flashdata('error', $this->lang->line('language_file_not_saved'));
          }
        } else {
          $this->session->set_flashdata('error', $this->lang->line('language_error_keys_db'));
        }
        $url_to_go = "/language/lang_file/$l/$file";
        if (!is_null($module)) {
          $url_to_go .= "/" . $module;
        }
        redirect($url_to_go);
      } else {
        $this->session->set_flashdata('error', $this->lang->line('language_error_dir_not_exist'));
        redirect('/language');
      }
    } else {
      $this->session->set_flashdata('error', $this->lang->line('language_error_no_direct_access'));
      redirect('/language');
    }
  }

  private function sanitateData($input)
  {
	//Esto estaba por default
	$data = addslashes($input);
	//Esto es sacandole las simples por dobles.
	$data = str_replace("'",'"',$input);

	return $data;
  }
  /**
   * Create new file
   * If file was created by form - create new empty file.
   * If file was created from another file - create copy of it
   *
   * @return void
   */
  function create_file() {
    if ($this->input->post('create')) { //check if form was submitted
      $l = $this->prepare_str($this->input->post('language'));
      $file = $this->input->post('filename');
      $lang_ref = $this->input->post('language_refferer');
      $module = $this->input->post('module');
      if (empty($module))
        $module = NULL;
      $exists = false;
      if (!empty($l) && !empty($file)) {
        if (substr($file, -9) != '_lang.php') {
          $file = $this->prepare_str($file);
          $file = $file . '_lang.php';
        }
        $mDir = "";
        $mFile = "";
        $mDirRef = "";
        if (!is_null($module)) {
          $mDir = APPPATH . "modules/" . $module . "/language/" . $l . "/";
          $mDirRef = APPPATH . "modules/" . $module . "/language/" . $lang_ref . "/";
          $mFile = $mDir . $file;
          $mFileRef = $mDirRef . $file;
        } else {
          $mDir = APPPATH . "language/" . $l . "/";
          $mDirRef = APPPATH . "language/" . $lang_ref . "/";
          $mFile = $mDir . $file;
          $mFileRef = $mDirRef . $file;
        }

        if (is_dir($mDir) && !file_exists($mFile)) {
          if (!empty($lang_ref) && is_dir($mDirRef) && file_exists($mFileRef)) {
            if (copy($mFileRef, $mFile)) {
              $this->session->set_flashdata('msg', $this->lang->line('language_file_created'));
              redirect("/language/lang_file/$l/$file");
            } else {
              $this->session->set_flashdata('error', $this->lang->line('language_error_creating_permissions'));
              redirect("/language/lang_file/$l/$file");
            }
          } else {
            $f = "<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');" . "\n"; /// begin file with standard line
            $keys = $this->model_language->get_keys_from_db($file);
            if (is_array($keys)) {
              foreach ($keys as $key) { /// create new array
                $f .= '$lang[\'' . $key . '\']=\'\';' . "\n"; ///for language array
              }
            } else {
              $f .= "\$lang = array();" . "\n"; /// our language array
            }
            $f.= '/* End of file ' . $file . ' */';
            if (file_put_contents($mFile, utf8_encode($f), LOCK_EX)) {
              $this->session->set_flashdata('msg', 'File created.');
              redirect("/language/lang_file/$l/$file");
            } else {
              $this->session->set_flashdata('error', $this->lang->line('language_error_creating_permissions'));
              redirect("/language/lang_file/$l/$file");
            }
          }
        } else {
          $this->session->set_flashdata('error', $this->lang->line('language_error_file_exist'));
          redirect("/language/lang_list/$l");
        }
      } else {
        $this->session->set_flashdata('error', $this->lang->line('language_error_name_required'));
        redirect('/language');
      }
    } else {
      $this->session->set_flashdata('error', $this->lang->line('language_error_no_direct_access'));
      redirect('/language');
    }
  }

  /**
   * Create new language
   * New directory is created
   *
   * @return void
   */
  function create_new_language() {
    //var_dump($_SERVER['REQUEST_METHOD'] == 'POST');
    //die;
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

      $l = $this->prepare_str($this->input->post('language'));
      $module = $this->input->post('module');
      if (empty($module))
        $module = NULL;
      $exists = false;
      if (!empty($l)) {
        $mDir = "";
        if (!is_null($module)) {
          $mDir = APPPATH . "modules/" . $module . "/language/" . $l . "/";
        } else {
          $mDir = APPPATH . "language/$l/";
        }
      }

      if (!empty($l) && !is_dir($mDir)) {

        $l = $this->prepare_str($l);
        if (mkdir($mDir)) {
          $this->session->set_flashdata('msg', $this->lang->line('language_created'));
          $url_to_go = "/language/lang_list/" . $l;
          if (!is_null($module))
            $url_to_go .= "/" . $module;
          redirect($url_to_go);
        }else {
          $this->session->set_flashdata('error', $this->lang->line('language_error_creating_dir_permissions'));
          redirect('/language/create_new_language');
        }
      } else {
        $this->session->set_flashdata('error', $this->lang->line('language_error_exist'));
        redirect('/language');
      }
    } else {
      $this->session->set_flashdata('error', $this->lang->line('language_error_no_direct_access'));
      redirect('/language');
    }
  }

  /**
   * Delete language
   * Directory and all files in it are deleted
   *
   * @return void
   */
  function delete_language() {
    if ($this->input->post('delete')) { //check if form was submitted
      $l = $this->prepare_str($this->input->post('language'));
      if (!empty($l) && is_dir(APPPATH . "language/$l/")) {
        if (delete_files(APPPATH . "language/$l/", TRUE) && rmdir(APPPATH . "language/$l/")) {
          $this->session->set_flashdata('msg', $this->lang->line('language_msg_deleted'));
        } else {
          $this->session->set_flashdata('error', $this->lang->line('language_error_delete_permissions'));
        }
      } else {
        $this->session->set_flashdata('error', $this->lang->line('language_langdir_not_exist'));
      }
    } else {
      $this->session->set_flashdata('error', $this->lang->line('language_error_no_direct_access'));
    }
    redirect('/language');
  }

  /**
   * Delete language file from specified language
   *
   * @return void
   */
  function delete_language_file() {
    if ($this->input->post('delete')) { //check if form was submitted
      $l = $this->prepare_str($this->input->post('language'));
      $file = $this->input->post('filename');
      $file = preg_replace('/[^a-zA-Z0-9-_.]*/', '', $file);
      $module = $this->input->post('module');
      if (empty($module))
        $module = NULL;
      $exists = false;
      if (!empty($l)) {
        $mDir = "";
        $mFile = "";
        if (!is_null($module)) {
          $mDir = APPPATH . "modules/" . $module . "/language/" . $l . "/";
          $mFile = $mDir . $file;
        } else {
          $mDir = APPPATH . "language/$l/";
          $mFile = $mDir . $file;
        }
      }
      if (!empty($l) && !empty($file) && is_dir($mDir) && file_exists($mFile)) {
        if (unlink($mFile)) {
          $this->model_language->delete_keys($file);
          $this->session->set_flashdata('msg', $this->lang->line('language_file_deleted'));
        } else {
          $this->session->set_flashdata('error', $this->lang->line('language_error_delete_file_permissions'));
        }
      } else {
        $this->session->set_flashdata('error', $this->lang->line('language_error_dir_not_exist'));
      }
      $url_to_go = "/language/lang_file/" . $l;
      if (!is_null($module)) {
        $url_to_go .= "/" . $module;
      }
      redirect($url_to_go);
      //redirect("/language/lang_list/$l");
    } else {
      $this->session->set_flashdata('error', $this->lang->line('language_error_no_direct_access'));
    }
    redirect('/language');
  }

  /**
   * Delete key from database and all files. Call by AJAX.
   *
   * @return void
   */
  function remove_key() {
    if (!$this->input->is_ajax_request()) {
      redirect('/language');
    } else {
      $del_key = substr($this->input->post('key'), 4);
      $file = $this->input->post('filename');
      $file = preg_replace('/[^a-zA-Z0-9-_.]*/', '', $file);
      $l = $this->prepare_str($this->input->post('language'));

      $module = $this->input->post('module');
      if (empty($module))
        $module = NULL;
      $exists = false;
      if (!empty($l) && !empty($file)) {
        $mFile = "";
        $mDir = "";
        $backUpFile = "";
        if (!is_null($module)) {
          $mDir = APPPATH . "modules/" . $module . "/language/" . $l . "/";
          $mFile = $mDir . $file;
          $backUpFile = $mDir . "backup_" . $file;
        } else {
          $mDir = APPPATH . "language/$l/";
          $mFile = $mDir . $file;
          $backUpFile = $mDir . "backup_" . $file;
        }
        if (is_dir($mDir) && file_exists($mFile)) {
          $exists = true;
        }
      }

      if ($exists) {
        $in_lang = $this->model_language->file_in_language($file);
        if (is_array($in_lang)) {
          foreach ($in_lang as $in) {
            unset($lang);
            $auxFile = "";
            $auxBackupFile = "";
            if (!is_null($module)) {
              $auxFile = APPPATH . "modules/" . $module . "/language/" . $in . "/" . $file;
              $auxBackupFile = APPPATH . "modules/" . $module . "/language/" . $in . "/backup_" . $file;
            } else {
              $auxFile = APPPATH . "/language/" . $in . "/" . $file;
              $auxBackupFile = APPPATH . "modules/" . $module . "/language/" . $in . "/backup_" . $file;
            }
            require($auxFile);
            if (array_key_exists($del_key, $lang)) {
              $f = "<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');" . "\n"; /// begin file with standard line
              $f .= "\$lang = array(" . "\n"; /// our language array
              foreach ($lang as $key_lang => $val) { /// create new array
                if ($key_lang != $del_key) {
                  $f .= "'" . $key_lang . "'=>"; ///for language array
                  $f .= "\"" . htmlspecialchars($val) . "\"," . "\n"; //"\"$val\","."\n";		///for language array		, add escaping "
                }
              }
              $f.= ");?>"; ///closing tags
              copy($auxFile, $auxBackupFile);
              file_put_contents($auxFile, $f, LOCK_EX);
            }
          }
        }
        $this->model_language->delete_one_key($del_key, $file, $module);
        echo json_encode(array('response' => TRUE, 'msg' => $this->lang->line('language_key_deleted')));
      } else {
        echo json_encode(array('response' => FALSE, 'msg' => $this->lang->line('language_error_dir_not_exist')));
      }
    }
  }

  /**
   * Prepare string by removing unwanted signs
   *
   * @param string
   * @return string0tring
   */
  function prepare_str($string) {
    $from = array('ą', 'ć', 'ę', 'ł', 'ó', 'ń', 'ś', 'ż', 'ź', ' '); ///polish signs
    $to = array('a', 'c', 'e', 'l', 'o', 'n', 's', 'z', 'z', '_'); ///signs to replace
    $out = preg_replace('/[^a-zA-Z0-9-_]*/', '', str_ireplace($from, $to, strtolower($string))); ///prepare, remove spaces, replace
    return strtolower($out);
  }

}
