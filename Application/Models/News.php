<?php

namespace Application\Models;

use Application\Model;
use Application\Db;
use Application\Models\Author;
/*
 * Class News
 * @package Application\Models
 * 
 * @property \Application\Models\Author $author
 */
class News extends Model
{
	const TABLE = 'news';
	
	public $title;
	public $text;
	public $author_id;
	
	public static function getLastNews($count)
	{
		$db = Db::instance();
		$sql = 'SELECT * FROM ' . self::TABLE . ' ORDER BY id DESC LIMIT '.$count;

		$res = $db->query($sql, self::class);
		//$res = $db->query($sql, self::class, [':count' => $count]);
		return ($res) ? $res : false;
	}
	
	public function __get($key)
	{
		if ('author' == $key){
			$author_id = $this->author_id;
			if (!empty($author_id)){
				$db = Db::instance();				
				$author = Author::findById($author_id);
				$name = $author->name;
				return ($name) ? $name : "Без автора";
			}else{
				return "Без автора";
			}
		}
	}
	
	public function __isset($key)
	{
		if ('author' == $key){
			return !empty($this->author_id);
		}else{
			return false;
		}
	}
}