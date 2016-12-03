<?php

namespace Application;

use Application\Db;

abstract class Model
{
	const TABLE = '';
	
	public static function findAll()
	{
		$db = Db::instance();
		return $db->query('SELECT * FROM ' . static::TABLE, static::class);
	}
	
	public static function findById($id)
	{
		$db = new Db();
		$res = $db->query('SELECT * FROM ' . static::TABLE . ' WHERE id = :id', static::class, [':id' => $id]);
		
		if ($res){
			return $res;
		}else{
			return false;
		}
	}
}