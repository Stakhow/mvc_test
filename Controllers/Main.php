<?php

namespace Controllers;
use core\Controller;
use core\View;
use Models\GetCountries;
use Models\GetUsers;

class Main extends Controller
{
	public function index()
	{
		$this->loadHeader();
		$this->loadForm();
		$this->loadUsersTable();
		$this->loadFooter();
	}

	public function loadForm()
	{
		$model = new GetCountries();
		$countries = $model->getCountries();
//		$countries = $model->addCountries();
		$this->view = new View('user-form');
		$this->view->render('Register Form', $countries);
	}

	public function loadUsersTable()
	{
		$model = new GetUsers();
		$users = $model->getUsers();
		$this->view = new View('user-table');
		$this->view->render('Users', $users);
	}

}