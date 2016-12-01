<?php
namespace Application;

class Db
{
	protected $dbh;
	
	public function __construct()
	{
		$this->dbh = new \PDO('mysql:host=localhost;dbname=test','root','');
	}
	/*
	 * Метод execute() используем для выполнения запросов без возвращения данных
	 */
	public function execute($sql)
	{
		$sth = $this->dbh->prepare($sql);
		$res = $sth->execute();
		return $res;
	}
	/*
	 * Метод query() используем для выполнения запросов с возвращением данных
	 */
	public function query($sql)
	{
		$sth = $this->dbh->prepare($sql);
		$res = $sth->execute();
		if (false !== $res){
			return $sth->fetchAll();
		}
		return [];
	}
}