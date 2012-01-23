<?php
/**
 * Controller class for domain model classes
 *
 * require model and mapper classes
 *
 * @author ashleyl
 *
 */
abstract class modelController extends Controller{

	// domain model object
	protected $model;

	// db mapper object
	protected $mapper;

	/**
	 * Extend parent contructor to set model and mapper classes
	 *
	 * @param View $view
	 * @param Model $model
	 * @param Mapper $mapper
	 */
    public function __construct(View $view, Model $model, Mapper $mapper){
        parent::__construct($view);

        $this->model = $model;
        $this->mapper = $mapper;
    }

    public abstract function create(array $args);

	public abstract function read(array $args);

	public abstract function update(array $args);

	public abstract function delete(array $args);


}