<?php


namespace Models;

use PDO;

class AddUser extends User
{
	public function addUser($user_name, $user_email, $user_country) {

		$this->if_name_short($user_name);
		$this->if_field_exist('user_email', $user_email);
		$this->if_fields_are_empty([$user_name, $user_email, $user_country]);

		$sql = "INSERT INTO `users` (`user_name`, `user_email`, `user_country`)
					VALUES ('$user_name', '$user_email', '$user_country')";
		if ($this->validated) {
			try {
				$this->db->query($sql);
				$this->result = "success";
			}
			catch(\PDOException $e)
			{
				echo $e->getMessage();
			}
		} else {
			echo "NOT VALIDATED<br>";
		}
	}


}

