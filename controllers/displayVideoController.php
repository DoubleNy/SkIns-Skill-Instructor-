<?php
	require 'libs/Controller.php';

	class displayVideoController extends Controller
	{
		public function index()
		{
			$this->view->render('displayVideo');
		}

		public function addComment()
		{
			if(empty($_POST['comment']))
			{
					echo 'comment is empty';
					//$this->HandleError("UserName is empty!");
					return false;
			}
			$comment= $_POST['comment'];
			echo "aa";
			//$exec = new DatabaseModel();
			//$query="insert into"
			//$response = $exec -> executeInsert($query);
		}
	}
?>
