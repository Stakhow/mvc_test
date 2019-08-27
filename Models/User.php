<?php


namespace Models;


use core\Model;

class User extends Model

{
	protected $result='';
	protected $validated=true;

	/*check if name not less than 3 */
	public function if_name_short ($user_name) {
		if (strlen($user_name)<3 && !ctype_space($user_name)){
			$this->result = "short-name";
			$this->validated = false;
			return false;
		}
	}

	/* check if all field aren't empty */
	public function if_fields_are_empty($fields)
	{
		foreach ($fields as $field) {
			if(empty($field)) {
				echo "this->result: " . $this->result . "<br>";
				$this->result = "fields-empty";
				$this->validated = false;
				return false;
			}
		}
	}

	public function if_field_exist($field, $value, $user_id=null) {
		$sql = "SELECT * FROM `users` WHERE `users`.`$field` = '$value'";
		$result = $this->db->row($sql)[0];
//		$condition = false;
		if (!empty($user_id)) {
			$condition = $value === $result[$field] && $user_id !== $result['user_id'];
		} else {
			$condition = $value === $result[$field];
		}
		if ($condition) {
			$this->result  = "email-exist";
			$this->validated = false;
			return true;
		} else {
			return false;
		}
	}

	public function get_result(){
		return $this->result;
	}
}