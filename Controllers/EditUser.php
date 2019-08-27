<?php


namespace Controllers;

use core\Controller;
use core\View;
use Models\GetCountries;
use PDOException;
use Views\Form;

class EditUser extends Controller
{


	public function index()
	{
		$get_user_id = preg_match( '/user_id=([0-9]+)/', $_SERVER["REQUEST_URI"], $matches);
		$user_id = (int)$matches[1];
		$this->loadHeader();

		$this->model = new \Models\EditUser();
		$user =  $this->model->getUser($user_id);
		$countries = new GetCountries();
		$countries = $countries->getCountries();

		$vars = ["user" => $user, "countries" => $countries];

		$this->view = new Form('user-form-edit');
		$this->view->render('Edit user', $vars, 'edit-user');
		$this->loadFooter();
	}

	public function editUser()
	{
		$user_id = $_POST['user_id'];
		$user_name = $_POST['user_name'];
		$user_email = $_POST['user_email'];
		$user_country = $_POST['user_country'];


		$model = new \Models\EditUser() ;
		$model->editUser($user_id, $user_name, $user_email, $user_country);
		$result = $model->get_result();
		$this->loadHeader();
echo "<pre>";
    var_dump($result);
echo "</pre>";
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
			case ($result ==="updated") : {
				$this->view = new View('action-success');
				$this->view->render('User UPDATED successfully');
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