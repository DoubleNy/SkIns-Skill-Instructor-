<?php
	require 'libs/Controller.php';

	class videosSurvivalController extends Controller
	{
		public function index()
		{
			$this->view->render('videosSurvival');
		}
    public function getSurvivalJson(){
				    $videoList = Controller::interogateYtApi("survival");
						echo json_encode($videoList);
    }
	}
?>
