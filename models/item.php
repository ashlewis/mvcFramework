<?php
/**
 * Item class
 *
 * @author ashleyl
 *
 */
class Item extends Model
{
	private $id;
    private $name;
	private $description;

	/**
	 *
	 * @param int $id
	 * @param string $name
	 * @param string $decription
	 */
	public function __construct($id=null, $name=null, $decription=null){
		$this->setId($id);
		$this->setName($name);
		$this->setDescription($decription);
	}

	/**
	 * Get item id
	 */
	public function getId(){
	    return $this->id;
	}

	/**
	 * Get item name
	 */
	public function getName(){

	    return filter_var($this->name, FILTER_SANITIZE_STRING);
	}

	/**
	 * Get item description
	 */
	public function getDescription(){
	    return filter_var($this->description, FILTER_SANITIZE_STRING);
	}

	/**
	 * Set item id
	 *
	 * @param int $id
	 */
	public function setId($id){

	   $this->id = (int)$id;

	}

	/**
	 * Set item name
	 *
	 * @param string $name
	 */
	public function setName($name){

		if (isSet($name)) {

			$this->name = filter_var($name, FILTER_SANITIZE_STRING);

			$nameSize = strlen(trim($this->name));

    	    switch (true) {
    	    	case  $nameSize < 1:
    	    		return new Error(1, 'not null');
    	    		break;
    	    	case  $nameSize < 3:
    	    		return new Error(2, 'not less than 3 chars');
    	    	default:
    	    		true;
    	    }
        }

	}

	/**
	 * Set item description
	 *
	 * @param string $description
	 */
	public function setDescription($description){
	    
	    if (isSet($description)) {

    		$this->description = filter_var($description, FILTER_SANITIZE_STRING);
    
    		$descriptionSize = strlen(trim($this->description));
    
            switch (true) {
            	case  $descriptionSize < 1:
            		return new Error(1, 'not null');
            		break;
            	case  $descriptionSize < 5:
            		return new Error(2, 'not less than 5 chars');
            	default:
            		true;
            }
        
	    }
	}

	/**
	 * magic method to output class as a string
	 */
	public function __toString(){
	   return 'id: '. $this->getId() .'<br />'.
	          'name: '. $this->getName() .'<br />'.
	          'description: '. $this->getDescription();
	}
}