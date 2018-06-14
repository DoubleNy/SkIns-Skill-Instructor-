<?php Controller::ytSession(); ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SkIns</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="public/css/displayVideo.css">
    <link rel="stylesheet" href="public/css/home.css">
    <link rel="stylesheet" href="public/css/menu.css">
    <link rel="stylesheet" href="public/css/about.css">
    <link rel="stylesheet" href="public/css/videos.css">
    <link rel="stylesheet" href="public/css/template.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="public/javascript/videos.js"></script>
    <script src="public/javascript/home.js"></script>

  </head>
  <body>

<?php
require_once 'menu.php';
require_once 'categories.php';
?>

<div id="DVmainContent">
    <div id="DVvideo">
      <?php
      echo '<iframe style="width:854px;height:480px;" src="https://www.youtube.com/embed/'.$_GET['idOfVideo'].'" frameborder="0" allowfullscreen></iframe>';
      $videoInfo = json_decode(file_get_contents('https://www.googleapis.com/youtube/v3/videos?part=statistics&id='.$_GET['idOfVideo'].'&key='.$_SESSION['API_key']));
      $videoTitle = json_decode(file_get_contents('https://www.googleapis.com/youtube/v3/videos?part=snippet&id='.$_GET['idOfVideo'].'&key='.$_SESSION['API_key']));
      ?>
    </div>

    <div id="DVvideoInfo">
      <div id="DVtitle">
        <h1><?php echo $videoTitle->items[0]->snippet->title; ?></h1>
      </div>

      <div class="DVcounter">
        <i id="DVviewsLogo" class="fa fa-eye" style="font-size:14px"></i>
        <i id="DVviews"><?php echo $videoInfo->items[0]->statistics->viewCount; ?></i>
      </div>
      <div class="DVcounter">
        <i id="DVcommentsLogo" class="material-icons" style="font-size:14px">&#xe0b9;</i>
        <i id="DVcomments"><?php echo $videoInfo->items[0]->statistics->commentCount; ?></i>
      </div>

        <div id="DVcommentSection">


        <form method="post" action="displayVideo/addComment">
          <div id="DVformInput">
            <input type="text" name="comment" placeholder="Add a comment here ...">
          </div>
          <div id="DVsendInput">
            <input type="submit" name="submit" value="POST">
          </div>
        </form>


        <div class="DVcomment">
          <div class="DVuser">
            <p>Nume autor</p>
          </div>
          <div class="DVdateComment">
            <p>7 march 2017</p>
          </div>
          <div class="DVuserComment">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </p>
          </div>
        </div>

        <div class="DVcomment">
          <div class="DVuser">
            <p>Nume autor</p>
          </div>
          <div class="DVuserComment">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </p>
          </div>
        </div>

        <div class="DVcomment">
          <div class="DVuser">
            <p>Nume autor</p>
          </div>
          <div class="DVuserComment">
            <p>Ut labore et dolore modo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </p>
          </div>
        </div>

        </div>
    </div>

    <div id="DVrecomandedVideos">
      <p>Recomanded for you</p>

        <?php $videoList = Controller::interogateYtApi("learn");


        foreach($videoList->items as $item){
         //Embed video
           if(isset($item->id->videoId)){
             $videoTitle = json_decode(file_get_contents('https://www.googleapis.com/youtube/v3/videos?part=snippet&id='.$item->id->videoId.'&key='.$_SESSION['API_key']));
             $videoInfo = json_decode(file_get_contents('https://www.googleapis.com/youtube/v3/videos?part=statistics&id='.$item->id->videoId.'&key='.$_SESSION['API_key']));

             echo '<div class="DVrecomandedVideo" onclick="window.location.href = \'displayVideo?idOfVideo='.$item->id->videoId.'\'">
                       <div class="DVvideo">
                       <img src="https://img.youtube.com/vi/'.$item->id->videoId.'/0.jpg" alt="video thumbnail">
                       </div>
                       <div class="DVdescription">
                         <h1 class="DVdescriptionTitle">'.$videoTitle->items[0]->snippet->title.'</h1>
                       </div>
                   </div>
                  <div style="clear:both;"></div>'
                   ;
           }
         }
         ?>

      </div>
    </div>

    <div style="clear:both;">
    </div>
</div>


<?php require_once 'footer.php'; ?>
