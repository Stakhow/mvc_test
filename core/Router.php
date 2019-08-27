<?php


namespace core;


class Router
{
	protected $routes = [];
	protected $params = [];

	public function __construct()
	{
			$arr = require ('./config/routes.php');
			foreach ($arr as $key => $val) {
					$this->add($key, $val);
			}
	}

	public function add($route, $params)
	{
		$route = '/' .$route. '/';
		$this->routes[$route] = $params;
	}

	public function match()
	{
		$url = trim($_SERVER['REQUEST_URI'], '/');

		foreach ($this->routes as $route=>$params) {
			if(preg_match($route, $url, $matches)){
				$this->params = $params;
				return true;
			}
		}
		return false;
	}

	public function run()
	{
		if ($this->match()) {
			$controller = 'Controllers\\' . ucfirst($this->params['controller']);
			if (class_exists($controller)){
				$action = $this->params['action'];
				if(method_exists($controller, $action)){
					$controller = new $controller($this->params);
					$controller->$action();
				} else {
					echo "action not found <br>";
				}
			} else {
				echo "Class not found<br>";
			}
		} else {
			echo "Route not found <br>";
		}
	}

}