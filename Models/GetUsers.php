<?php


namespace Models;

use core\Model;
use PDO;

class GetUsers extends Model
{
	public function getUsers() {
		$result = $this->db->row("SELECT * FROM `users`");
		return $result;
	}
}