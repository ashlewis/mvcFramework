<?php
/**
 * Base mapper class
 *
 * @author ashleyl
 *
 */
abstract class Mapper
{
	protected $dbh, $fields;

	/**
	 *
	 * @param PDO $dbh
	 */
	public function __construct(PDO $dbh){

		$this->dbh = $dbh;
	}

	/**
	 *
	 */
	public function save($model){

		if ($model->getId()) {
			$this->update($model);

		} else {
			$this->insert($model);
		}
	}

	/**
	 *
	 * @param array $idArray
	 */
	public function getObjects($id){

		if (empty($id)) {
			return $this->getAll();

		} elseif(is_array($id)) {
			return $this->getMultipleById($id);

		} else {
			return $this->getSingleById($id);
		}


	}

	/**
	 *
	 */
	abstract protected function insert($object);

	/**
	 *
	 */
	abstract protected function update($item);

	/**
	 *
	 * @param int $id
	 */
	abstract public function delete($id);

	/**
	 *
	 * @param array $idArray
	 */
	abstract protected function getMultipleById(array $idArray);

	/**
	 *
	 * @param int $idArray
	 */
	abstract protected function getSingleById($idArray);

	/**
	 *
	 */
	abstract public function getAll();


}