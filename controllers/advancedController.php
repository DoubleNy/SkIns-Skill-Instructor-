<?php
	require 'libs/Controller.php';

	class advancedController extends Controller
	{
		public function index()
		{
			$this->view->render('advanced');
		}
	}
?>
