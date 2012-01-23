<?php 
// Add class dir to include path
define('CLASS_PATH', '..'. DIRECTORY_SEPARATOR . 'lib');
set_include_path(realpath(CLASS_PATH) . PATH_SEPARATOR . get_include_path());

// Use default autoload implementation
spl_autoload_register('spl_autoload');

// Initialize configuration class - allows us to set values which require functions
Config::init();

spl_autoload_register(array('Config', 'autoLoad'));