<?php


namespace Controllers;

use core\Controller;
use core\View;

class AddUser extends Controller
{
	public function index()
	{
		$user_name = $_POST['user_name'];
		$user_email = $_POST['user_email'];
		$user_country = $_POST['user_country'];

		$model = new \Models\AddUser() ;
		$model->addUser( $user_name, $user_email, $user_country );
		$result = $model->get_result();
		$this->loadHeader();


		switch ($result) {
			case ($result === "fields-empty") : {
				$this->view = new View('action-failed');
				$this->view->render('All fields are required!');
			} break;
			case ($result ==="email-exist") : {
				$this->view = new View('action-failed');
				$this->view->render('Such an email already exists');
			} break;
			case ($result ==="short-name") : {
				$this->view = new View('action-failed');
				$this->view->render('Name must be more than 3 characters');
			} break;
			case ($result ==="success") : {
				$this->view = new View('action-success');
				$this->view->render('New user added successfully');
			} break;
			default: {
				$this->view = new View('action-failed');
				$this->view->render('Error occurred!!');
			}
		}

		$this->loadFooter();
	}
}