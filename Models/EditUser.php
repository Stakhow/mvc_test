<?php


namespace Models;

use core\Model;
use PDO;

class EditUser extends User
{
	public function getUser($user_id) {
		$sql = "SELECT * FROM `users` WHERE `users`.`user_id` = '$user_id' ";
		$user =  $this->db->row($sql)[0];
		return $user;
	}

	public function editUser($user_id, $user_name, $user_email, $user_country)
	{

		$this->if_name_short($user_name);
		$this->if_field_exist('user_email', $user_email, $user_id);
		$this->if_fields_are_empty([$user_name, $user_email, $user_country]);


		$sql = "UPDATE `users` SET 
					`user_name` = '$user_name',
					`user_email` = '$user_email',
					`user_country` = '$user_country' 
					WHERE `user_id` = '$user_id' ";

		if ($this->validated) {
			try {
				$this->db->query($sql);
				$this->result = "updated";
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

