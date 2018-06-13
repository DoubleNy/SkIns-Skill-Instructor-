<?php
	require 'libs/Controller.php';

	class signupController extends Controller
	{
		public function index()
		{
			$this->view->render('signup');
		}
	}
?>
