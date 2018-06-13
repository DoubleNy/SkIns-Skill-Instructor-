<?php
	require 'libs/Controller.php';

	class contactController extends Controller
	{
		public function index()
		{
			$this->view->render('contact');
		}
	}
?>
