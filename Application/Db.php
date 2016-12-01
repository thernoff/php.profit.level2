<?php
namespace Application;

class Db
{
	protected $dbh;
	
	public function __construct()
	{
		$this->dbh = new \PDO('mysql:host=localhost;dbname=test','root','');
	}
	
	public function execute($sql)
	{
		$sth = $this->dbh->prepare($sql);
		$res = $sth->execute();
		return $res;
	}
}