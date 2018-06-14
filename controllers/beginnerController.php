<?php
	require 'libs/Controller.php';

	class beginnerController extends Controller
	{
		public function index()
		{
			$this->view->render('beginner');
		}
	}
?>
