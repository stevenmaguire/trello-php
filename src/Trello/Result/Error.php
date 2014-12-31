<?php
/**
 * Trello Error Result
 *
 * An Error Result will be returned from gateway methods when
 * the gateway responds with an error. It will provide access
 * to the original request.
 * For example, when voiding a transaction, Error Result will
 * respond to the void request if it failed:
 *
 * <code>
 * $result = Trello_Transaction::void('abc123');
 * if ($result->success) {
 *     // Successful Result
 * } else {
 *     // Trello_Result_Error
 * }
 * </code>
 *
 * @package    Trello
 * @subpackage Result
 * @copyright  2014 Steven Maguire
 *
 * @property-read array $params original passed params
 * @property-read object $errors Trello_Error_ErrorCollection
 * @property-read object $creditCardVerification credit card verification data
 */
class Trello_Result_Error extends Trello
{
    /**
     *
     * @var boolean always false
     */
    public $success = false;

    /**
     * return original value for a field
     * For example, if a user tried to submit 'invalid-email' in the html field transaction[customer][email],
     * $result->valueForHtmlField("transaction[customer][email]") would yield "invalid-email"
     *
     * @param string $field
     * @return string
     */
   public function valueForHtmlField($field)
   {
       $pieces = preg_split("/[\[\]]+/", $field, 0, PREG_SPLIT_NO_EMPTY);
       $params = $this->params;
       $key = null;
       foreach(array_slice($pieces, 0, -1) as $key) {
           $params = $params[Trello_Util::delimiterToCamelCase($key)];
       }
       if ($key != 'custom_fields') {
           $finalKey = Trello_Util::delimiterToCamelCase(end($pieces));
       } else {
           $finalKey = end($pieces);
       }
       $fieldValue = isset($params[$finalKey]) ? $params[$finalKey] : null;
       return $fieldValue;
   }

   /**
    * overrides default constructor
    * @codeCoverageIgnore
    * @param array $response gateway response array
    */
   public function  __construct($response)
   {
       $this->_attributes = $response;
       $this->_set('errors',  new Trello_Error_ErrorCollection($response['errors']));

       if(isset($response['verification'])) {
           $this->_set('creditCardVerification', new Trello_Result_CreditCardVerification($response['verification']));
       } else {
           $this->_set('creditCardVerification', null);
       }

       if(isset($response['transaction'])) {
           $this->_set('transaction', Trello_Transaction::factory($response['transaction']));
       } else {
           $this->_set('transaction', null);
       }

       if(isset($response['subscription'])) {
           $this->_set('subscription', Trello_Subscription::factory($response['subscription']));
       } else {
           $this->_set('subscription', null);
       }

       if(isset($response['merchantAccount'])) {
           $this->_set('merchantAccount', Trello_MerchantAccount::factory($response['merchantAccount']));
       } else {
           $this->_set('merchantAccount', null);
       }
   }

   /**
     * create a printable representation of the object as:
     * ClassName[property=value, property=value]
     * @codeCoverageIgnore
     * @return var
     */
    public function  __toString()
    {
        $output = Trello_Util::attributesToString($this->_attributes);
        if (isset($this->_creditCardVerification)) {
            $output .= sprintf('%s', $this->_creditCardVerification);
        }
        return __CLASS__ .'['.$output.']';
    }
}
