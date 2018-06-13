<?php
	require 'libs/Controller.php';

	class indexController extends Controller
	{
		public function index()
		{
			$this->view->render('index');
		}
	}
?>
