<?php
/**
 *
 * @author ashleyl
 *
 */
class FormError {

	private $errors = array();

	/**
	 *
	 * @param $fieldName
	 * @param $errorMessage
	 */
	public function setError($fieldName, $errorMessage){
		$this->errors[$fieldName] = $errorMessage;
	}

	/**
	 *
	 * @param $fieldName
	 */
	public function getError($fieldName){
		return $this->errors[$fieldName];
	}

	/**
	 *
	 */
	public function getAllErrors(){
		return $this->errors;
	}

}