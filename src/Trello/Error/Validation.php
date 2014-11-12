<?php
/**
 * error object returned as part of a validation error collection
 * provides read-only access to $attribute, $code, and $message
 *
 * <b>== More information ==</b>
 *
 * For more detailed information on Validation errors, see {@link http://www.Trellopayments.com/gateway/validation-errors http://www.Trellopaymentsolutions.com/gateway/validation-errors}
 *
 * @package    Trello
 * @subpackage Error
 * @copyright  2014 Steven Maguire
 *
 * @property-read string $attribute
 * @property-read string $code
 * @property-read string $message
 */
class Trello_Error_Validation
{
   private $_attribute;
   private $_code;
   private $_message;

    /**
     * @codeCoverageIgnore
     * @param array $attributes
     */
    public function  __construct($attributes)
    {
        $this->_initializeFromArray($attributes);
    }
    /**
     * initializes instance properties from the keys/values of an array
     * @codeCoverageIgnore
     * @access protected
     * @param array $attributes array of properties to set - single level
     * @return none
     */
    private function _initializeFromArray($attributes)
    {
        foreach($attributes AS $name => $value) {
            $varName = "_$name";
            $this->$varName = Trello_Util::delimiterToCamelCase($value, '_');
        }
    }

    /**
     *
     * @codeCoverageIgnore
     */
    public function  __get($name)
    {
        $varName = "_$name";
        return isset($this->$varName) ? $this->$varName : null;
    }
}
