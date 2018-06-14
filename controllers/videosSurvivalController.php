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
						$_SESSION['category'] = "survival";
						//echo json_encode($videoList);
								echo '<div id="container">';
								foreach($videoList->items as $item){
								 //Embed video
									 if(isset($item->id->videoId)){
										 $videoTitle = json_decode(file_get_contents('https://www.googleapis.com/youtube/v3/videos?part=snippet&id='.$item->id->videoId.'&key='.$_SESSION['API_key']));
										 $videoInfo = json_decode(file_get_contents('https://www.googleapis.com/youtube/v3/videos?part=statistics&id='.$item->id->videoId.'&key='.$_SESSION['API_key']));
										 if(isset($videoInfo->items[0]->statistics->commentCount))
										 {
										 echo '<div class="videoContainer" onclick="window.location.href = \'displayVideo?idOfVideo='.$item->id->videoId.'\'">
															 <div class="video">
															 <img src="https://img.youtube.com/vi/'.$item->id->videoId.'/0.jpg" alt="video thumbnail">
															 <i class="fa">&#xf04b;</i>
															 </div>
															 <div class="description">
																 <h1 class="descriptionTitle">'.$videoTitle->items[0]->snippet->title.'</h1>
																 <div class="views">
																	 <i class="fa fa-eye" style="font-size:20px;"></i>
																 </div>
																 <div class="comments">
																	 <i style="font-size:20px" class="fa">&#xf27a;</i>
																 </div>
																 <div class="viewsCount">'.$videoInfo->items[0]->statistics->viewCount.'</div>
																 <div class="commentsCount">'.$videoInfo->items[0]->statistics->commentCount.'</div>
															 </div>
													 </div>';
										 } else {
											 echo '<div class="videoContainer" onclick="window.location.href = \'displayVideo?idOfVideo='.$item->id->videoId.'\'">
																 <div class="video">
																 <img src="https://img.youtube.com/vi/'.$item->id->videoId.'/0.jpg" alt="video thumbnail">
																 <i class="fa">&#xf04b;</i>
																 </div>
																 <div class="description">
																	 <h1 class="descriptionTitle">'.$videoTitle->items[0]->snippet->title.'</h1>
																	 <div class="views">
																		 <i class="fa fa-eye" style="font-size:20px;"></i>
																	 </div>
																	 <div class="comments">
																		 <i style="font-size:20px" class="fa">&#xf27a;</i>
																	 </div>
																	 <div class="viewsCount">'.$videoInfo->items[0]->statistics->viewCount.'</div>
																	 <div class="commentsCount">none</div>
																 </div>
														 </div>';
										 }
									 }
								 }
								 echo '</div>';
		}
	}
?>
