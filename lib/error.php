<?php
/**
 * Base Error class
 *
 * @author ashleyl
 *
 */
class Error
{
	private $code;
	private $description;

	public function __construct($code, $description){
		$this->code = $code;
		$this->description = $description;
	}

	public function getCode(){
		return $this->code;
	}

	public function getDescription(){
		return $this->description;
	}


}