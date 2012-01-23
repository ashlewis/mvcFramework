<?php
/**
 * Item mapper
 *
 * @author ashleyl
 *
 */
class ItemMapper extends Mapper
{
	protected $fields = array('id', 'name', 'description');

	/**
	 *
	 */
	protected function insert($item){

		$sth = $this->dbh->prepare("INSERT INTO items (name, description) VALUES (:name, :description)");
		$sth->execute(array(':name'=>$item->getName(), ':description'=>$item->getDescription()));

	}

	/**
	 *
	 */
	protected function update($item){
		$sth = $this->dbh->prepare("UPDATE items SET name = :name, description = :description WHERE id = :id");
		$sth->execute(array(':name'=>$item->getName(), ':description'=>$item->getDescription(), ':id'=>$item->getId()));
	}

	/**
	 *
	 * @param int $id
	 */
	public function delete($item){
		$sth = $this->dbh->prepare("DELETE FROM items WHERE id = :id");
		$sth->execute(array(':id'=>$item->getId()));
	}



	/**
	 *
	 */
	public function getAll(){

		$itemArray  = array();

		$sth = $this->dbh->prepare("SELECT ". implode(', ', $this->fields) ." FROM items");
        $sth->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "Item", $this->fields);
		$sth->execute();
        $itemArray = $sth->fetchAll();

		if (!$itemArray) {
            throw new Exception('no items found');
        }

		return $itemArray;
	}

	/**
	 * get a single item by id
	 *
	 * @param int $id
	 */
	protected function getSingleById($id){
		$itemArray = $this->getMultipleById((array)$id);
		return $itemArray[0];
	}

	/**
	 * get multiple items by id
	 *
	 * @param $idArray
	 */
	protected function getMultipleById(array $idArray){

		$itemArray  = array();

		if ($idArray) {
			// build placeholders string
			$inQuery = implode(',', array_fill(0, count($idArray), '?'));

	        $sth = $this->dbh->prepare("SELECT ". implode(', ', $this->fields) ." FROM items WHERE id IN (". $inQuery .")");
	        $sth->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "Item", $this->fields);

	        // bindvalue is 1-indexed, so $k+1
			foreach ($idArray as $key => $id) {
	    		$sth->bindValue(($key+1), $id);
			}

	        $sth->execute();
	        $itemArray = $sth->fetchAll();
		}


		return $itemArray;
	}
}