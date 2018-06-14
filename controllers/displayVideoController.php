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

		public static function loadComments($videoID, $username){
					$exec = new DatabaseModel();
					$query = "select videoID from videos where id = ?";
					$statement = $exec->conn->prepare($query);
					$statement->execute([$videoID]);
					//echo $videoID;
					$id = 0;
					while($row = $statement->fetch()){
								$id = (int)$row[0];
					}
					//
					//echo $id;
					//
					$query = "select userID, text, time from videoComm where videoId = ?";
					$statement = $exec->conn->prepare($query);
					$statement->execute([$id]);
					while($row = $statement->fetch()){
							//print_r($row['text']);
							//print_r($row['time']);
							//print_r($row['userID']);
							$userNume;
							$query2 = "select username from users where id = ?";
							$statement2 = $exec->conn->prepare($query2);
							$statement2->execute([$row['userID']]);
							while($row2 = $statement2->fetch()){
									$userNume = $row2[0];
							}
							echo '<div class="DVcomment">
							          <div class="DVuser">
							            <p>'. $userNume .'</p>
							          </div>
							          <div class="DVdateComment">
							            <p>'. $row['time'] .'</p>
							          </div>
							          <div class="DVuserComment">
							            <p>'. $row['text'] .'</p>
							          </div>
							       </div>';
					}



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
			$query = "insert into videoComm (videoid, userid, text, time) values (?, ?, ?, ?)";
			$statement = $exec->conn->prepare($query);
			$statement->execute([$idVideo, $userID, $comment, $time]);
			//header("Refresh:0");
			//$this->loadComments($idVideo, $userID);
			/*echo '<div class="DVcomment">
								<div class="DVuser">
									<p>'. $_SESSION['user'] .'</p>
								</div>
								<div class="DVdateComment">
									<p>'. $time .'</p>
								</div>
								<div class="DVuserComment">
									<p>'. $comment .'</p>
								</div>
						 </div>';*/
			//echo $query;
			//$exec->executeinsert($query);
		}
	}
?>
