<?php


namespace core;


class View
{
 public $path;
 public $route;
 public $name;

	public function __construct($name)
	{
		$this->name = $name;
  }

	public function render( $title='', $vars=[] )
	{
		extract($vars);
		if (file_exists('Views/' . $this->name . '.php')) {
			require_once './Views/' . $this->name . '.php';
		}

		else {
				echo 'view not found application/Views/' . $this->name . '.php' . '<br>';
		}
  }
}