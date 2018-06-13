<?php
	require 'libs/Controller.php';

	class videosController extends Controller
	{
		public function index()
		{
			$this->view->render('videos');
		}
	}
?>
