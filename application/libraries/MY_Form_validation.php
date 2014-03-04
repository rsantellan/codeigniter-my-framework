<?php

/**
 * 
 *  @author http://darrenonthe.net/2011/05/10/get-codeigniter-form-validation-errors-as-an-array/
 */
class MY_Form_validation extends CI_Form_validation
{
     function __construct($config = array())
     {
          parent::__construct($config);
     }
 
    /**
     * Error Array
     *
     * Returns the error messages as an array
     *
     * @return  array
     */
    function error_array()
    {
        if (count($this->_error_array) === 0)
        {
                return FALSE;
        }
        else
            return $this->_error_array;
 
    }
}