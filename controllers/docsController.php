<?php
	require 'libs/Controller.php';

	class docsController extends Controller
	{

		public function index()
		{
			$this->view->render('docs');
		}

	}
?>
