<?php

/**
 * Configuration class to hold all config settings
 *
 * @author ashleyl
 *
 */
class Config
{

	// configuration data
	private static $data = array(
		'defaultController' => 'index',
		'defaultAction' 	=> 'index',
	    'dbDSN'             => '',
	    'dbUsername'        => '',
	    'dbPassword'        => '',
	);

	/**
	 * Set config values that require fuctions
	 */
	public static function init(){

        self::set('ds', DIRECTORY_SEPARATOR);

        // base file path
        self::set('basePath', dirname(dirname(__FILE__)) . self::get('ds'));

        // base url (trim backslash to cater for site in VirtualDocumentRoot)
        self::set('baseURL', trim(dirname(dirname($_SERVER['SCRIPT_NAME'])), '\\') . '/');

        // class paths
        self::set('modelPath', self::get('basePath') .'models'. self::get('ds'));
        self::set('viewPath', self::get('basePath') .'views'. self::get('ds'));
        self::set('controllerPath', self::get('basePath') .'controllers'. self::get('ds'));

	}

	/**
	 * custom autoload method
	 *
	 * @param string $class
	 */
	public static function autoLoad($class){

		if (file_exists(self::get('controllerPath') . Helper::lcfirst($class) .'.php')) {
			include self::get('controllerPath') . Helper::lcfirst($class) .'.php';
		} elseif (file_exists(self::get('modelPath') . Helper::lcfirst($class) .'.php')) {
            include self::get('modelPath') . Helper::lcfirst($class) .'.php';
		} else {
			$e = new Exception('Class does not exist');
			echo $e->getMessage();
			exit;
		}

	}

	/**
	 * config getter
	 *
	 * @param $key
	 */
	public static function get($key){

		return self::$data[$key];

	}

	/**
	 * config setter
	 *
	 * @param string $key
	 * @param mixed $value
	 */
	public static function set($key, $value){

		self::$data[$key] = $value;

	}

}