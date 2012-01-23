<?php
/**
 * Mapper Factory class
 *
 * @author ashleyl
 *
 */
class MapperFactory
{
	public static function create($mapperName, PDO $dbh){

		return new $mapperName($dbh);
	}
}