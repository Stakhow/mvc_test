<?php


namespace core;
use core;

abstract class Controller
{
	public $route;
	public $model;
	public $view;

	public function __construct($route, $model=null, $view=null)
	{
		$this->route = $route;
		$this->model = $model;
		$this->view = $view;
	}

	public function loadModel($model)
	{
		$path = 'Models\\' . $model;
		if(class_exists($path)){
			return new $path;
		}
	}

	public function loadHeader()
	{
		$this->view = new View('header');
		$this->view->render();
	}
	public function loadFooter()
	{
		$this->view = new View('footer');
		$this->view->render();
	}


}