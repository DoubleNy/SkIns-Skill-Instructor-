<?php
require 'libs/Controller.php';

	class logoutController extends Controller
	{
		protected $logoutModel;
		public function index()
		{
			$this->view->render('logout');
		}

		public function makeLogout()
		{
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        session_destroy();
				header("Location: ../login");
    }
	}
?>
