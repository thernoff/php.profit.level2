<?php

namespace Application\Models;

use Application\Model;
use Application\Db;

class News extends Model
{
	const TABLE = 'news';
	
	public $title;
	public $text;
	public $author;
	
	public static function getLastNews($count)
	{
		$db = Db::instance();
		$sql = 'SELECT * FROM ' . self::TABLE . ' ORDER BY id DESC LIMIT '.$count;

		$res = $db->query($sql, self::class);
		//$res = $db->query($sql, self::class, [':count' => $count]);
		return ($res) ? $res : false;
	}
}