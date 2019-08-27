<?php


namespace Models;

use PDO;

class DeleteUser extends User
{
	public function deleteUser($user_id) {
		$sql = "DELETE FROM `users` WHERE `users`.`user_id` = '$user_id' ";
		try {
			$this->db->query($sql);
			return true;
		}
		catch(\PDOException $e)
		{
			echo $e->getMessage();
		}
	}
}