<?php
use Application\Models\User;

require __DIR__ . '/autoload.php';

$users = User::findAll();
var_dump($users);