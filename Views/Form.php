<?php


namespace Views;


use core\View;

class Form extends View
{
	public function render( $title='', $vars=[], $action='')
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