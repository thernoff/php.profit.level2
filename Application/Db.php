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
			throw new \Application\Exceptions\Db('Возникла проблема при подключении к базе данных.'); 
		}
	}
	/*
	 * Метод execute() используем для выполнения запросов без возвращения данных
	 */
	public function execute($sql, $arrParam = [])
	{
		$sth = $this->dbh->prepare($sql);		
		if ($res = $sth->execute($arrParam)){				
			return $res;
		}else{				
			throw new \Application\Exceptions\Db('Ошибка в запросе.');
		}
		
	}
	/*
	 * Метод query() используем для выполнения запросов с возвращением данных
	 */
	public function query($sql, $class, $arrParam = [])
	{
		//echo $sql;
		$sth = $this->dbh->prepare($sql);
		if ($res = $sth->execute($arrParam)){//true или false
			return $sth->fetchAll(\PDO::FETCH_CLASS, $class);//Получаем массив, состоящий из объектов класса News
		}else{
			throw new \Application\Exceptions\Db('Ошибка в запросе.');
			//return [];
		}
	}
	/*
	 * Метод queryEach() используем для выполнения запросов с возвращением данных в качестве генератора
	 */
	public function queryEach($sql, $class, $arrParam = [])
	{
		$sth = $this->dbh->prepare($sql);
		if ($sth->execute($arrParam)){//true или false
			$sth->setFetchMode(\PDO::FETCH_CLASS, $class);
			while($res = $sth->fetch()){
				yield $res;
			}
		}else{
			throw new \Application\Exceptions\Db('Ошибка в запросе.');
			//return [];
		}
	}
	
	public function lastInsertId()
	{
		return $this->dbh->lastInsertId();
	}
}