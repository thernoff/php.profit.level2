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
		$db = Db::instance();
		$res = $db->query('SELECT * FROM ' . static::TABLE . ' WHERE id = :id', static::class, [':id' => $id]);
		
		if ($res[0]){
			return $res[0];
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
		$db = Db::instance();
		$db->execute($sql, $values);
		$this->id = $db->lastInsertId();
	}
	
	public function update()
	{
		if ($this->isNew())
		{
			return;//Если объект не является только что созданным, то выходим из метода insert()
		}
		
		$columns = [];//В данный массив записываем наименования полей таблицы или свойства объекта
		$values = [];//В данный массив будем записывать значения полей таблицы или значения свойств объекта
		foreach ($this as $key => $value){
			if ('id' == $key){
				continue;
			}
			$columns[] = $key.'=:'.$key;
			$values[':'.$key] = $value;
		}
		$sql = 'UPDATE ' . static::TABLE . ' SET '. implode(',', $columns) .' WHERE id = :id';
		$values[':id'] = $this->id;
		$db = Db::instance();
		$db->execute($sql, $values);
	}
	
	public function save()
	{
		if (!$this->isNew())
		{
			$this->update();
		}else{
			$this->insert();
		}
	}
	
	public function delete()
	{
		if ($this->isNew())
		{
			return;//Если объект не является только что созданным, то выходим из метода insert()
		}
				
		$sql = 'DELETE FROM ' . static::TABLE . ' WHERE id = :id';
		echo $sql;
		$values[':id'] = $this->id;
		$db = Db::instance();
		$db->execute($sql, $values);
	}
}