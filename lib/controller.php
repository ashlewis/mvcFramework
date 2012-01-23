<?php
/**
 * Base controller class
 *
 * @author ashleyl
 *
 */
abstract class Controller
{
	public $templateDir;
	public $view;

	/**
	 *
	 * @param PDO $dbh
	 */
	public function __construct(View $view){


		$this->view = $view;

		$this->templateDir = str_replace('controller', '', strtolower(get_class($this)));

	}

	/**
	 * magic method to output class as a string
	 */
	public function __toString(){
		return strtolower(get_class($this));
	}

	public abstract function index(array $args);

}
