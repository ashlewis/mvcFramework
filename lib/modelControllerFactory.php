<?php
/**
 * ModelController Factory class
 *
 * @author ashleyl
 *
 */
class ModelControllerFactory
{
	public static function create($modelController, View $view, Model $model, Mapper $mapper){

		return new $modelController($view, $model, $mapper);
	}
}