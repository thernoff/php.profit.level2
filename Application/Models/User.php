<?php

namespace Application\Models;

use Application\Db;

class User
{
	public $name;
	public $email;
	
	public static function findAll()
	{
		$db = new Db();
		return $db->query('SELECT * FROM users', 'Application\Models\User');
	}
}