<?php
	require 'libs/Controller.php';

	class documentController extends Controller
	{
		public function index()
		{
			$this->view->render('documentPreview');
		}
	}
?>
