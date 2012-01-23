<?php
/**
 * Controller class to handle all item actions
 *
 * @author ashleyl
 *
 */
class ItemController extends ModelController
{

	/**
	 * Default item action
	 *
	 * @param array $args
	 */
	public function index(array $args){
		$this->listItems($args);
	}

	/**
	 * Create new item
	 */
	public function create(array $args){

		if ($_POST['submit']) {

			// process form post
			$this->process();

		} else {

			// display create form
			$this->view->setVariables('item', $this->model);

			// display success message
			if (in_array('success', $args)) {
				$this->view->setVariables('message', new Message('success', 'Item created', array('New item successfully created.')));
			}

	   		$this->view->render($this->templateDir . Config::get('ds') . 'update');
		}
	}

	/**
	 * View item
	 *
	 * @param array $args
	 */
	public function read(array $args){

	    $itemArray = $this->mapper->getObjects($args);

		$this->view->setVariables('itemArray', $itemArray);

	    $this->view->render($this->templateDir . Config::get('ds') . 'read');
	}

	/**
	 * Update item
	 *
	 * @param array $args
	 */
	public function update(array $args){

		if ($_POST['submit']) {

			// process form post
            $this->process();

		} else {

			// display update form
			if (!empty($args)) {

				// integer check
				if ((string)$args[0] == (string)(int)$args[0]) {

					// we have id , load item
				    $this->model = $this->mapper->getObjects($args[0]);

					$this->view->setVariables('item', $this->model);

					// display success message
					if (in_array('success', $args)){
						$this->view->setVariables('message', new Message('success', 'Updated', array('Item successfully updated.')));
					}

			   		$this->view->render($this->templateDir . Config::get('ds') . 'update');
				}
			}
		}
	}

	/**
	 * Delete item - show delete confirmation screen
	 *
	 * @param array $args
	 */
	public function delete(array $args){

		if (!empty($args)) {

			// integer check
			if ((string)$args[0] == (string)(int)$args[0]) {

				// we have id, load item
			    $this->model = $this->mapper->getObjects($args[0]);

			    $this->view->setVariables('item', $this->model);

				if ($_POST['delete']) {

					// do delete
					$this->deleteConfirmed();

				} else {

					// return user to relevent screen
				    if (isset($_SERVER['HTTP_REFERER'])) {
				    	$cancelURL = $_SERVER['HTTP_REFERER'];

				    } else {
				    	// default to list
				    	$cancelURL = '/item';
				    }

				    $this->view->setVariables('cancelURL', $cancelURL);

				    $this->view->render($this->templateDir . Config::get('ds') . 'delete');
				}

			}
		}
	}

	/**
	 * list all item
	 *
	 * @param array $args
	 */
	private function listItems(array $args){

	    $itemArray = $this->mapper->getObjects($args);

		$this->view->setVariables('itemArray', $itemArray);

		if (isset($_GET['deleted'])){

			$this->view->setVariables('message', new Message('success', 'Deleted', array('Item successfully deleted.')));

		}

	    $this->view->render($this->templateDir . Config::get('ds') . 'list');
	}


	/**
	 *  Update item
	 */
	private function process(){

		$this->model->setId($_POST['id']);

		$formError = new FormError();

		$setName = $this->model->setName($_POST['name']);
		if (get_class($setName) == 'Error' ) {
			$formError->setError('name', 'Name field '. $setName->getDescription());

		}

		$setDescription = $this->model->setDescription($_POST['description']);
		if (get_class($setDescription) == 'Error') {
			$formError->setError('description', 'Description field '. $setDescription->getDescription());
		}

		if (count($formError->getAllErrors())) {

        	$this->view->setVariables('item', $this->model);

       		$this->view->setVariables('formErrors', $formError->getAllErrors());

        	$this->view->setVariables('message', new Message('error', 'Required field', $formError->getAllErrors()));

        	$this->view->render($this->templateDir . Config::get('ds') . 'update');

        } else {

			try {
				$this->mapper->save($this->model);

			} catch (PDOException $e) {
				echo $e->getMessage();
			}

			if (empty($_POST['id'])){
				$action= 'create';
			} else {
				$action= 'update/'. $_POST['id'];
			}

			// redirect (PRG pattern)
	        header("Location: ". Config::get('baseURL') ."item/". $action ."/success");
	        exit();
        }

	}

	/**
	 * delete item action
	 *
	 * @param int $id
	 */
	private function deleteConfirmed(){

		try {
			$this->mapper->delete($this->model);

		} catch (PDOException $e) {

			echo 'Deletion failed: ' . $e->getMessage();
		}

		// redirect (PRG pattern)
        header("Location: ". Config::get('baseURL') ."item?deleted");
        exit();
	}
}