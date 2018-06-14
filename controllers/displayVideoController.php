<?php
	require 'libs/Controller.php';
	require 'models/databaseModel.php';

	class displayVideoController extends Controller
	{
		public function index()
		{
			$this->view->render('displayVideo');
		}

		public static function addVideo($videoID, $category){
			//
   			$exec = new DatabaseModel();
				$exec->insertVideo($category, $videoID);
			//
		}

		public function addComment()
		{

			if(empty($_POST['comm']))
			{
					echo 'comment is empty';
					//$this->HandleError("UserName is empty!");
					return false;
			}
			$exec = new DatabaseModel();
			$comment= $_POST['comm'];
			$user= $_POST['user'];
			$videoID= $_POST['videoID'];

			//echo $comment . " " . $user . " " . $videoID;
			$query = "SELECT id FROM users where username = ?";
			$statement = $exec->conn->prepare($query);
			$statement->execute([$user]);
			$userID = 0;
			while ($row = $statement->fetch()) {
					$userID = (int)$row[0];
			}

			$query = "SELECT videoid FROM videos where id = ?";
			$statement = $exec->conn->prepare($query);
			$statement->execute([$videoID]);
			$idVideo = 0;
			while ($row = $statement->fetch()) {
					$idVideo = (int)$row[0];
			}

			$time = date("Y/m/d");
			echo $idVideo;
			//$array=array("Volvo","BMW","Toyota");
			$query = "insert into videocomm (videoid, userid, text, time) values (?, ?, ?, ?)";
			$statement = $exec->conn->prepare($query);
			$statement->execute([$idVideo, $userID, $comment, $time]);
			//echo $query;
			//$exec->executeinsert($query);
		}
	}
?>
