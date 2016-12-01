<?php

namespace Application\Models;

use Application\Model;

class User extends Model
{
	const TABLE = 'users';
	
	public $name;
	public $email;
}