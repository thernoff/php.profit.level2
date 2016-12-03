<?php

namespace Application;

use Application\Db;

abstract class Model
{
	const TABLE = '';
	
	public $id;//Принимаем соглашение: в каждой таблицы БД есть поле id с первичным ключом
		
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
	
	public function isNew()
	{
		return empty($this->id);
	}
	
	
	public function insert()
	{
		if (!$this->isNew())
		{
			return;//Если объект не является только что созданным, то выходим из метода insert()
		}
		
		$columns = [];
		$values = [];
		foreach ($this as $key => $value){
			if ('id' == $key){
				continue;
			}
			
			$columns[] = $key;
			$values[':'.$key] = $value;
		}
		
		//var_dump($columns);
		
		$sql = 'INSERT INTO ' . static::TABLE . ' ('. implode(',', $columns) .') VALUE (' . implode(',', array_keys($values)) . ')';
		//echo $sql;
		$db = Db::instance();
		$db->execute($sql, $values);
		
	}
}