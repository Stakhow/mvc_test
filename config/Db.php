<?php

namespace config;

use PDO;
class Db
{
	protected $db;
	public function __construct()
	{
		$config = require_once ('db-conf.php');
		try {
//			$this->db = new PDO("mysql:host=".$config['host']. ";" . "dbname=". $config['db_name'], $config['user_name'], $config['user_password']);
			$this->db = new PDO("mysql:host=localhost; dbname=test_users", "root", "root");
		} catch(PDOException $e) {
			echo $e->getMessage();
		}
	}

	public function query($sql)
	{
		$result = $this->db->prepare($sql);
		$result->execute();
		return $result;
	}

	public function row($sql)
	{
		$result = $this->query($sql);
		return $result->fetchAll(PDO::FETCH_ASSOC);
	}

	public function getCountries() {
		return $this->db->query("SELECT * FROM `countries`")->fetchAll(PDO::FETCH_ASSOC);
	}



	public function addUser($user_name, $user_email, $user_country)
	{
		$sql = "INSERT INTO `users` (`user_name`, `user_email`, `user_country`)
						VALUES ('$user_name', '$user_email', '$user_country')";
		try {
			$this->db->query($sql);
			echo 'USER ADDED SUCCESS';
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}

	}
}