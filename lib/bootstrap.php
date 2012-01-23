<?php
/**
 * Bootstrap class to set up application
 *
 * @author ashleyl
 *
 */
class Bootstrap
{
    private $dbh;
    private $controller;
    private $action;
    private $args;

	/**
	 * Initialize app
	 */
	public function __construct(){
	    try {
	        $this->dbh = new PDO(Config::get('dbDSN'), Config::get('dbUsername'), Config::get('dbPassword'));
	    } catch (PDOException $e) {
	        echo 'Connection failed: '. $e->getMessage();
	    }
	}

	/**
	 * Route application based on url
	 *
	 * @param string $defaultController
	 * @param string $defaultAction
	 */
	public function route($defaultController, $defaultAction){

		$path = isset($_GET['q']) ? $_GET['q'] : null;
		$pathArray = isset($path) ? explode('/', rtrim($path, '/')) : array();

		$controllerName = ($controllerName = array_shift($pathArray)) ? $controllerName : $defaultController;

		$this->action = ($this->action = array_shift($pathArray)) ? $this->action : $defaultAction;

		$this->args = $pathArray;

		$modelName = ucfirst($controllerName);
		$controllerName = ucwords($modelName) .'Controller';
		$mapperName = $modelName .'Mapper';

		try {
			$this->controller = ModelControllerFactory::create($controllerName, new View(), ModelFactory::create($modelName), MapperFactory::create($mapperName, $this->dbh));
		} catch (Exception $e) {
			// php 5.3.0+
			$this->controller = new ErrorController(new View());
		}

		if (method_exists($this->controller, $this->action)) {
			$this->controller->{$this->action}($this->args);
		} else {
			$this->controller = new ErrorController(new View());
			$action = 'pageNotFound';
			$this->controller->{$this->action}($this->args);
		}

	}

}