<?php
/**
 * FormException class
 *
 * @author ashleyl
 *
 */
class FormException extends Exception
{
    private $field;
    
    public function __construct($message, $code, $field){
        
        parent::__construct($message, $code);
        
        $this->field = $field;
    }
    
    public function getField(){
        return $this->field;
    }
    
}