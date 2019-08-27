<?php

namespace Models;
use PDO;
class DataBase
{
	private $db;

	public function __construct() {
		$host = "localhost";
		$db_name = "test_users";
		$user_name = 'root';
		$user_password = 'root';
		try {
			$this->db = new PDO("mysql:host=$host;dbname=$db_name", $user_name, $user_password);
			/*** echo a message saying we have connected ***/
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}

	public function getCountries() {
		return $this->db->query("SELECT * FROM `countries`")->fetchAll(PDO::FETCH_ASSOC);
	}

	public function getUsers() {
		return $this->db->query("SELECT * FROM `users`")->fetchAll(PDO::FETCH_ASSOC);
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

