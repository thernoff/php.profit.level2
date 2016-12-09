<?php
namespace Application;

class Db
{
	use Singleton;
	
	protected $dbh;
	
	protected  function __construct()
	{
		try {
			$this->dbh = new \PDO('mysql:host=localhost;dbname=test','root','');
		}catch(\PDOException $e){
			throw new \Application\Exceptions\Db($e->getMessage()); 
		}
	}
	/*
	 * Метод execute() используем для выполнения запросов без возвращения данных
	 */
	public function execute($sql, $arrParam = [])
	{
		$sth = $this->dbh->prepare($sql);
		$res = $sth->execute($arrParam);
		return $res;
	}
	/*
	 * Метод query() используем для выполнения запросов с возвращением данных
	 */
	public function query($sql, $class, $arrParam = [])
	{
		$sth = $this->dbh->prepare($sql);
		$res = $sth->execute($arrParam);
		if (false !== $res){
			//return $sth->fetchAll();
			return $sth->fetchAll(\PDO::FETCH_CLASS, $class);//Получаем массив, состоящий из объектов класса User
		}
		return [];
	}
	
	public function lastInsertId()
	{
		return $this->dbh->lastInsertId();
	}
}