<?php

namespace core;

use config\Db;

abstract class Model
{
	public $db;
	public function __construct()
	{
		$this->db = new Db();
	}
}