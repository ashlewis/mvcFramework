<?php
/**
 * Message class
 *
 * @author ashleyl
 *
 */
class Message extends Model
{
	private $type;
	private $title;
    private $body;

    /**
     *
     * @param string $type
     * @param string $title
     * @param array $body
     */
	function __construct($type, $title, array $body){
		$this->type = $type;
		$this->title = $title;
		$this->body = $body;
	}

	/**
	 *
	 */
	function getType(){
		return $this->type;
	}

	/**
	 *
	 */
	function getTitle(){
		return $this->title;
	}

	/**
	 * @return array array of messages
	 */
	function getBody(){
		return $this->body;
	}


}