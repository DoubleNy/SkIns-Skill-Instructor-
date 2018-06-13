<?php
	require 'libs/Controller.php';

	class getvideosController extends Controller
	{
		public function index()
		{
			$this->view->render('getvideos');
		}
	}
?>
