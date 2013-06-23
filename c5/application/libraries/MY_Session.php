<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * MY_Session
 *
 * @author Simon Emms <simon@simonemms.com>
 */
class MY_Session {

    
    
    
    /* How we can identify flash sessions */
    const flash = 'FLASH_';

    
    
    
    
    /* Do not delete this time round */
    private static $_arrFlashDND = array();

    
    
    
    
    
    /**
     * Construct
     *
     * Calls the session start function
     *
     * @author Simon Emms <simon@simonemms.com>
     */
    public function __construct() {
        /* Set the timeout time */
        $objCI = &get_instance();
        $objCI->load->config('session', false, true);

        /* Set the timeout time */
        $timeout = $objCI->config->item('session_lifetime');
        if(is_numeric($timeout)) { ini_set('session.gc_maxlifetime', $timeout); }

        $this->start();
    }

    
    
    
    
    
    

    /**
     * Destruct
     *
     * Deletes any flash sessions that have not
     * been set up this time.  It's a duplication
     * of what's done during the getSession() function,
     * but this clears up sessions that have not
     * actually been called
     *
     * @author Simon Emms <simon@simonemms.com>
     */
    public function  __destruct() {
        $arrSession = $this->all_userdata();
        if(count($arrSession) > 0) {
            foreach($arrSession as $key => $value) {
                if(!in_array($key, self::$_arrFlashDND) && preg_match('/^'.self::flash.'/', $key)) {
                    $this->unset_userdata($key);
                }
            }
        }
    }


    
    
    
    
    
    
    /**
     *	Start()
     *
     *	Checks no session is start then it simply calls
     *	the session_start() function.  You can force a new
     *	session_start by putting true - not sure if you'd
     *	ever need that functionality, but it's there anyway
     *
     *	@author Simon Emms <simon@simonemms.com>
     */
    public function start($override = false) {
        if(!session_id() || $override) {
            session_start();
        }
    }

    
    
    
    
    
    
    /**
     *	Is Session
     *
     *	Checks there is a session set and that it's not empty
     *
     *	@author Simon Emms <simon@simonemms.com>
     */
    public function exists($name) {
        if(isset($_SESSION[$name]) && !empty($_SESSION[$name])) {
            return true;
        } else {
            return false;
        }
    }

    
    
    
    
    
    
    
    /**
     *	Set Session()
     *
     *	Sets a session based on the variables passed
     *	setSession(str $sessionName, mixed $sessionValue, bool $encryption);
     *
     *	@author Simon Emms <simon@simonemms.com>
     */
    public function set_userdata($name, $value = null, $flash = false) {
        if(is_array($name)) {
            if(count($name) > 0) {
                foreach($name as $n => $v) {
                    $this->set_userdata($n, $v, $flash);
                }
            }
        } else {
            if($flash) {
                $name = self::flash.$name;
                self::$_arrFlashDND[] = $name;
            }
            $_SESSION[$name] = $value;
        }
    }


    
    
    
    
    
    
    
    /**
     * Redo Session
     *
     * Re-sets the session.  Will work for any session, but
     * the idea is to use it for Flash sessions
     *
     * @param string $name
     */
    public function keep_flashdata($name) {
        $value = $this->flashdata($name);
        if($value) { $this->set_userdata($name, $value); }
    }


    
    
    
    
    
    
    
    /**
     * Get Session()
     *
     * Returns value of specified session.  Will only decrypt on specified sessions
     *
     * @author Simon Emms <simon@simonemms.com>
     */
    public function userdata($name = null, $flash_only = false) {
        if($flash_only === false) {
            if(is_null($name)) {
                $_arrDetails = $this->all_userdata();
            } else {
                $_arrDetails = false;
                if(isset($_SESSION[$name]) && !empty($_SESSION[$name])) {
                    /* Check for session name */
                    $_arrDetails = $_SESSION[$name];
                }
            }
        }
        /* If nothing found, repeat search for flash data */
        if(empty($_arrDetails) && $flash_only === true) {
            $_arrDetails = $this->userdata(self::flash.$name, true);
        }
        return $_arrDetails;
    }

    
    
    
    
    
    
    /**
     * All Userdata
     *
     * Returns all sessions
     *
     * @author Simon Emms <simon@simonemms.com>
     */
    public function all_userdata() {
        $sessionId = $this->id();
        if(!empty($sessionId)) {
            return $_SESSION;
        } else {
            return array();
        }
    }
    
    
    
    
    
    
    
    public function set_flashdata($item, $value) { $this->set_userdata($item, $value, true); }
    
    
    
    
    
    
    
    
    public function flashdata($item) { return $this->userdata($item, false, true); }

    
    
    
    
    
    
    
    /**
     * Destroy
     *
     * Destroys named session
     *
     * @author Simon Emms <simon@simonemms.com>
     */
    public function unset_userdata($name = null) {
        if(is_null($name)) {
            /* Remove all */
        } elseif(is_array($name)) {
            if(count($name) > 0) {
                foreach($name as $n => $v) {
                    $this->unset_userdata($n);
                }
            }
        } else {
            unset($_SESSION[$name]);
        }
    }

    
    
    
    
    
    
    /**
     * ID
     *
     * Returns the session ID
     *
     * @return string
     * @author Simon Emms <simon@simonemms.com>
     */
    public function id() { return session_id(); }
    
}

?>