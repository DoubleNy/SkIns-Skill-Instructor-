<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SkIns</title>
    <link rel="stylesheet" type="text/css" href="../css/displayVideo.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="../javascript/videos.js"></script>

  </head>
  <body>

    <div class="navbar">
        <div class="dropdown-hover">
          <button class="button" title="More">Math</button>
          <div class="dropdown-content bar-block">
            <a href="./videosCategory.html" class="bar-item button">Arithmetic</a>
            <a href="./videosCategory.html" class="bar-item button">Geometry</a>
            <a href="./videosCategory.html" class="bar-item button">Trigonometry</a>
            <a href="./videosCategory.html" class="bar-item button">Statistics & probability</a>
          </div>
        </div>
        <div class="dropdown-hover">
          <button class="button" title="More">Computing</button>
          <div class="dropdown-content bar-block">
            <a href="./videosCategory.html" class="bar-item button">Computer programming</a>
            <a href="./videosCategory.html" class="bar-item button">Computer science</a>
            <a href="./videosCategory.html" class="bar-item button">Computer animation</a>
          </div>
        </div>
        <div class="dropdown-hover">
          <button class="button" title="More">Science & engineering</button>
          <div class="dropdown-content bar-block">
            <a href="./videosCategory.html" class="bar-item button">Physics</a>
            <a href="./videosCategory.html" class="bar-item button">Chemistry</a>
            <a href="./videosCategory.html" class="bar-item button">Biology</a>
          </div>
        </div>
        <div class="dropdown-hover">
          <button class="button" title="More">Survival</button>
          <div class="dropdown-content bar-block">
            <a href="./videosCategory.html" class="bar-item button">In Jungle</a>
            <a href="./videosCategory.html" class="bar-item button">In Dorm</a>
            <a href="./videosCategory.html" class="bar-item button">In Cosmic Vehicle</a>
          </div>
        </div>
    </div>

<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  Video Container  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<div id="mainContent">
    <div id="video">
      <?php
      echo '<iframe style="width:854px;height:480px;" src="https://www.youtube.com/embed/'.$_GET['idOfVideo'].'" frameborder="0" allowfullscreen></iframe>';
      $API_key = 'AIzaSyBS2yY5JobnjSKnANIUdIrEXyQJ2ELnGbQ';
      $videoInfo = json_decode(file_get_contents('https://www.googleapis.com/youtube/v3/videos?part=statistics&id='.$_GET['idOfVideo'].'&key='.$API_key));
      $videoTitle = json_decode(file_get_contents('https://www.googleapis.com/youtube/v3/videos?part=snippet&id='.$_GET['idOfVideo'].'&key='.$API_key));
      ?>
    </div>

    <div id="videoInfo">
      <div id="title">
        <h1><?php echo $videoTitle->items[0]->snippet->title; ?></h1>
      </div>

        <i id="viewsLogo" class="fa fa-eye"></i>
        <i id="views"><?php echo $videoInfo->items[0]->statistics->viewCount; ?></i>
        <i style="float:right;">
          <i id="comments"><?php echo $videoInfo->items[0]->statistics->commentCount; ?></i>
          <i id="commentsLogo" class="material-icons">&#xe0b9;</i>
        </i>

        <div id="commentSection">
          <hr>
          <br>

          <form>
            <div id="formInput">
              <input type="text" name="comment" placeholder="Add a comment here ...">
            </div>
            <div id="sendInput">
              <input type="submit" name="submit" value="POST">
            </div>
          </form>
        <br>
        <hr>

          <div class="comment">
            <div class="user">
              <p>Nume autor</p>
            </div>
            <div class="userComment">
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
              </p>
            </div>
          </div>

          <div class="comment">
            <div class="user">
              <p>Nume autor</p>
            </div>
            <div class="userComment">
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
              </p>
            </div>
          </div>

          <div class="comment">
            <div class="user">
              <p>Nume autor</p>
            </div>
            <div class="userComment">
              <p>Ut labore et dolore modo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
              </p>
            </div>
          </div>

        </div>
    </div>
</div>
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  Recomanded videos  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <div id="container">
      <center>

      <div class="rightContainer">
        <p>Recomanded Videos</p>
      </div>

      <a href="displayVideo.html" target="_top"><div class="videoContainer">
        <div class="video">
          <img src="http://i.ytimg.com/vi/nfQHF87vY0s/maxresdefault.jpg" alt="video thumbnail">
          <i class="fa">&#xf04b;</i>
        </div>
        <div class="description">
          <h1 class="descriptionTitle">Simple title</h1>
          <div class="views">
            <i class="fa fa-eye" style="font-size:20px;"></i>
          </div>
          <div class="comments">
            <i class="material-icons" style="font-size:20px;">&#xe0b9;</i>
          </div>
          <div class="viewsCount">10000
          </div>
          <div class="commentsCount">2323
          </div>
        </div>
      </div></a>

      <a href="displayVideo.html" target="_top"><div class="videoContainer">
        <div class="video">
          <img src="http://i.ytimg.com/vi/nfQHF87vY0s/maxresdefault.jpg" alt="video thumbnail">
          <i class="fa">&#xf04b;</i>
        </div>
        <div class="description">
          <h1 class="descriptionTitle">Simple title</h1>
          <div class="views">
            <i class="fa fa-eye" style="font-size:20px;"></i>
          </div>
          <div class="comments">
            <i class="material-icons" style="font-size:20px;">&#xe0b9;</i>
          </div>
          <div class="viewsCount">10000
          </div>
          <div class="commentsCount">2323
          </div>
        </div>
      </div></a>

      <a href="displayVideo.html" target="_top"><div class="videoContainer">
        <div class="video">
          <img src="http://i.ytimg.com/vi/nfQHF87vY0s/maxresdefault.jpg" alt="video thumbnail">
          <i class="fa">&#xf04b;</i>
        </div>
        <div class="description">
          <h1 class="descriptionTitle">Simple title</h1>
          <div class="views">
            <i class="fa fa-eye" style="font-size:20px;"></i>
          </div>
          <div class="comments">
            <i class="material-icons" style="font-size:20px;">&#xe0b9;</i>
          </div>
          <div class="viewsCount">10000
          </div>
          <div class="commentsCount">2323
          </div>
        </div>
      </div></a>

      </center>
    </div>

    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  Template section  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->

    <div id="templateColors">
      <a href="javascript:void(0)" id="template1" onclick="setTemplate1()" />
      <a href="javascript:void(0)" id="template2" onclick="setTemplate2()" />
      <a href="javascript:void(0)" id="template3" onclick="setTemplate3()"/>
      <a href="javascript:void(0)" id="template4" onclick="setTemplate4()"/>
    </div>
    <script src="../javascript/displayVideo.js"></script>
  </body>