<?php

/**
 * Description of MY_Form_Validation
 *
 * @author rodrigo
 */
class MY_Form_validation extends CI_Form_validation{


  private $error = NULL;
  
  public function getError() {
    return $this->error;
  }

  public function setError($error) {
    $this->error = $error;
  }

  /**
     * check_float 
     * 
     * This is a float validation method. If the input fails validation
     * the reason for failure is placed in the class var "error".
     * Be aware that allowing null input will allow "null", '', false, 
     * FALSE and array() as "empty" inputs.
     * @param mixed $input          The input you wish to validate
     * @param float $min            The minimum value that can be accepted
     * @param float $max            The maximum value that can be accepted
     * @param bool  $allow_empty    IF "empty" values are allowed as input.  
     * @access public
     * @return bool
     */
    function check_float($input = null, $min = -1.8e307, $max = 1.8e307, $allow_empty = FALSE)
    {
        // Sanity Checks
        $this->error = '';
        // Maker sure min/max is float
        if (!is_float($min) || !is_float($max)) 
        {
            $this->error = 'Min/Max are not valid float values.';
            return FALSE;
        }
        else 
        {
            // make sure the float is not out of bounds
            if (is_infinite($min) || is_infinite($max)) 
            {
                $this->error = 'Min/Max values are not finite values';
                return FALSE;
            }
        }

        // Make sure allow empty is of the right type.
        if(!is_bool($allow_empty)) 
        {
            $this->error = 'Allow empty must be of type boolean.';
            return FALSE;
        }

        // check for null
        if (empty($input) && ($input !== 0.0))
        {
            // if input is nulll
            if ($allow_empty)
            {
                return TRUE;
            }
            else 
            {
                $this->error = "Input is empty or null and is not permitted.";
                return FALSE;
            }
        }

        // validate numeric
        if (!is_numeric($input))
        {
            $this->error = 'Input is not a number.';
            return FALSE;
        }

        // validate float
        if (!is_float($input)) 
        {
            $this->error = 'Input is not a float.';
            return FALSE;
        }

        // check min
        if ($input < $min) 
        {
            $this->error = 'Input is below miniumum bounds.';
            return FALSE;
        }

        // check max
        if ($input > $max)
        {
            $this->error = 'Input is above maximum bounds.';
            return FALSE;
        }

        // If we made it this far it is good.
        return TRUE;
    }  
}


