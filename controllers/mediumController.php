<?php
	require 'libs/Controller.php';

	class mediumController extends Controller
	{
		public function index()
		{
			$this->view->render('medium');
		}
	}
?>
