<?php
/**
 * Base view class
 *
 * @author ashleyl
 *
 */
class View
{

	private $varArray = array();


	/**
	 * Set variables to be available in template
	 *
	 * @param string $key
	 * @param mixed $val
	 */
	public function setVariables($key, $val){
		$this->varArray[$key] = $val;
	}

	/**
	 * Render view
	 *
	 * @param string $template
	 * @param boolean $full
	 * @param boolean $httpHeader
	 */
	public function render($template,  $full=1, $httpHeader=0){

		// make var array available to view as individual vars
		extract($this->varArray);

		if ($httpHeader) {
			header($httpHeader);
		}

		if ($full) {
			// include header
			include Config::get('viewPath') .'header.php';
		}

		if (file_exists(Config::get('viewPath') . $template .'.php')) {
			include Config::get('viewPath') . $template .'.php';
		}

		if ($full) {
			// inlude footer
			include Config::get('viewPath') .'footer.php';
		}
	}


}