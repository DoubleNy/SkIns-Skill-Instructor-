<?php $videoList = Controller::interogateYtApi("math"); ?>

<html>
<head>
  <link href="https://fonts.googleapis.com/css?family=Roboto:300" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="public/css/home.css">
  <link rel="stylesheet" href="public/css/animations.css">
  <link rel="stylesheet" href="public/css/menu.css">
  <link rel="stylesheet" href="public/css/slideshow.css">
  <link rel="stylesheet" href="public/css/about.css">
  <link rel="stylesheet" href="public/css/videos.css">
  <link rel="stylesheet" href="public/css/template.css">
  <script src="public/javascript/home.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
</head>

<body>

<?php require_once 'menu.php'; ?>
<?php require_once 'slider.php'; ?>
<?php require_once 'categories.php'; ?>

<div class="content">

 <div class="subtitle"><h1>Math</h1></div>

 <center>
   <!--<form action="videos.php" method="GET">
     <input name="search" type="text" class="searchTerm" placeholder="What are you looking for?">
     <button type="submit" class="searchButton">Submit</button>
   </form>-->
 <div id="container">
     <?php
     foreach($videoList->items as $item){
      //Embed video
        if(isset($item->id->videoId)){
          $videoTitle = json_decode(file_get_contents('https://www.googleapis.com/youtube/v3/videos?part=snippet&id='.$item->id->videoId.'&key='.$_SESSION['API_key']));
          $videoInfo = json_decode(file_get_contents('https://www.googleapis.com/youtube/v3/videos?part=statistics&id='.$item->id->videoId.'&key='.$_SESSION['API_key']));

          if(isset($videoInfo->items[0]->statistics->commentCount))
          {
          echo '<div class="videoContainer" onclick="window.location.href = \'displayVideo.php?idOfVideo='.$item->id->videoId.'\'">
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
            echo '<div class="videoContainer" onclick="window.location.href = \'displayVideo.php?idOfVideo='.$item->id->videoId.'\'">
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
      ?>
 </div>
 </center>
<script src="public/javascript/dynamicload.js"></script>

 <?php require_once 'footer.php'; ?>
