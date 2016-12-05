<?php

namespace Application\Models;

use Application\Model;

class User extends Model implements HasEmail
{
	const TABLE = 'users';
	
	public $name;
	public $email;
	
	public function getEmail()
	{
		return $this->email;
	}
}