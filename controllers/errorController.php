<?php
/**
 * Controller to handle all error actions
 *
 * @author ashleyl
 *
 */
class ErrorController extends Controller
{
	/**
	 * Default error
	 *
	 * @param array $args
	 */
	public function index(array $args){

		foreach ($args as $key => $arg) {
			$this->view->setVariables('arg_'.$key, $arg);
		}

		$this->view->render($this->templateDir . DS . 'index');
	}

	/**
	 * 404 - Page not found error action
	 *
	 * @param array $args
	 */
	public function pageNotFound($args){

		$this->view = new View();

		$this->view->render($this->templateDir . Config::get('ds') . '404', 1, "http/1.0 404 Not Found");
	}


}