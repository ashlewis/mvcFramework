<?php
/**
 * Model Factory class
 *
 * @author ashleyl
 *
 */
class ModelFactory
{
	public static function create($modelName){

		return new $modelName;
	}
}