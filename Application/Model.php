<?php

namespace Application;

use Application\Db;

abstract class Model
{
	const TABLE = '';
	public static function findAll()
	{
		$db = new Db();
		return $db->query('SELECT * FROM ' . static::TABLE, static::class);
	}
}