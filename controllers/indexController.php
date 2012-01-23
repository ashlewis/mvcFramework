<?php
/**
 * Controller to handle default action
 *
 * @author ashleyl
 *
 */
class IndexController extends Controller
{

	/**
	 * Default action
	 *
	 * @param array $args
	 */
	public function index(array $args){

		foreach ($args as $key => $arg) {
			$this->view->setVariables('arg_'.$key, $arg);
		}

		$this->view->render($this->templateDir . Config::get('ds') . 'index');
	}


}