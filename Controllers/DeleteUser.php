<?php


namespace Controllers;

use core\Controller;
use core\View;

class DeleteUser extends Controller
{
	public function index()
	{
		$get_user_id = preg_match( '/user_id=([0-9]+)/', $_SERVER["REQUEST_URI"], $matches);
		$user_id = (int)$matches[1];
		if ($get_user_id) {
			$model = new \Models\DeleteUser();
			$model->deleteUser($user_id);
			if ( $model->deleteUser($user_id) ) {
				$this->loadHeader();
				$this->view = new View('action-success');
				$this->view->render('User REMOVED successfully');
				$this->loadFooter();
			}
		}
	}
}