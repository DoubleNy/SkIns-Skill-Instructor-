<?php
session_start();
$API_key = 'AIzaSyBS2yY5JobnjSKnANIUdIrEXyQJ2ELnGbQ';
$querry = 'psi';
$nextPageToken = $_SESSION['tokenToNextPage'];
if(isset($nextPageToken)){
  $videoList = json_decode(file_get_contents('https://www.googleapis.com/youtube/v3/search?part=id&maxResults=5&pageToken='.$nextPageToken.'&q='.$querry.'&type=video&key='.$API_key));
}
$_SESSION['tokenToNextPage'] = $videoList->nextPageToken;
foreach($videoList->items as $item){
 //Embed video
   if(isset($item->id->videoId)){
     $videoTitle = json_decode(file_get_contents('https://www.googleapis.com/youtube/v3/videos?part=snippet&id='.$item->id->videoId.'&key='.$API_key));
     $videoInfo = json_decode(file_get_contents('https://www.googleapis.com/youtube/v3/videos?part=statistics&id='.$item->id->videoId.'&key='.$API_key));

     if(isset($videoInfo->items[0]->statistics->commentCount))
     {
     echo '<div class="videoContainer">
             <a href="displayVideo.html">
               <div class="video">
               <img src="https://img.youtube.com/vi/'.$item->id->videoId.'/0.jpg" alt="video thumbnail">
               <i class="fa">&#xf04b;</i>
               </div>
             </a>
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
       echo '<div class="videoContainer">
               <a href="displayVideo.html">
                 <div class="video">
                 <img src="https://img.youtube.com/vi/'.$item->id->videoId.'/0.jpg" alt="video thumbnail">
                 <i class="fa">&#xf04b;</i>
                 </div>
               </a>
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
 ?>
