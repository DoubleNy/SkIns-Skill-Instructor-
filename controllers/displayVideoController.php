<?php
	require 'libs/Controller.php';

	class displayVideoController extends Controller
	{
		public function index()
		{
			$this->view->render('displayVideo');
		}
	}
?>
