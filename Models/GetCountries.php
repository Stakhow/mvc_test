<?php


namespace Models;

use core\Model;
use PDOException;

class GetCountries extends Model
{
	public function getCountries() {
		$result = $this->db->row("SELECT * FROM `countries`");
		return $result;
	}
	public function addCountries () {
		$countries_list = explode(",", file_get_contents('./countries-list.txt'));

		try {
			foreach ($countries_list as $arr_item) {
				$arr_item = str_replace('\'', '\'\'', $arr_item);
				$arr_item = trim($arr_item);
				$sql = "INSERT INTO countries (country_name)
					SELECT * FROM (SELECT '$arr_item') AS tmp
WHERE NOT EXISTS ( SELECT country_name FROM countries WHERE country_name = '$arr_item' LIMIT 1)";
				$this->db->row("$sql");
			}
		}
		catch (PDOException $e)
		{
			echo $e->getMessage();
			die();
		}
	}

}