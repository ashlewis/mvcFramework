<?php
/**
 * Helper class for misc utility functionality
 *
 * @author ashleyl
 *
 */
class Helper
{
	/**
	 * Make a string's first letter lowercase
	 *
	 * php native function is not available in php version < 5.3
	 * @param string $str
	 */
	public static function lcfirst($str){

		if (!function_exists('lcfirst')) {
			// php < 5.3 - use custom
			$str[0] = strtolower($str[0]);
		    $str =  (string)$str;

		} else {
			// php >= 5.3 - use native function
			$str = lcfirst($str);
		}

		return $str;

	}

}