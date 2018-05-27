<?php
  session_start();
  $API_key = 'AIzaSyBS2yY5JobnjSKnANIUdIrEXyQJ2ELnGbQ';
  $querry = 'psi';
  $videoList = json_decode(file_get_contents('https://www.googleapis.com/youtube/v3/search?part=id&maxResults=5&q='.$querry.'&type=video&key='.$API_key));
  $_SESSION['tokenToNextPage'] = $videoList->nextPageToken;
?>
<html>
<head>
  <link href="https://fonts.googleapis.com/css?family=Roboto:300" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../css/home.css">
  <link rel="stylesheet" href="../css/animations.css">
  <link rel="stylesheet" href="../css/menu.css">
  <link rel="stylesheet" href="../css/slideshow.css">
  <link rel="stylesheet" href="../css/about.css">
  <link rel="stylesheet" href="../css/videos.css">
  <link rel="stylesheet" href="../css/template.css">
  <script src="../javascript/home.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
</head>

<body>


        <div class="slideshow_Container">

              <div class="slide first" style="background-image:url(../images/Slider1.jpeg)">
                <!--  <img src="../images/Slider1.jpeg" style="width:100%">-->
              </div>

              <div class="slide" style="background-image:url(../images/Slider2.jpeg)">
                <!--  <img src="../images/Slider2.jpeg" style="width:100%">-->
              </div>

              <div class="slide" style="background-image:url(../images/Slider3.jpeg)">
                <!--  <img src="../images/Slider3.jpeg" style="width:100%">-->
              </div>

              <div class="slide" style="background-image:url(../images/Slider4.jpeg)">
                <!--  <img src="../images/Slider4.jpeg" style="width:100%">-->
              </div>

              <div class="slide" style="background-image:url(../images/Slider5.jpg)">
                <!--  <img src="../images/Slider5.jpg" style="width:100%"> -->
              </div>



              <!--<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
              <a class="next" onclick="plusSlides(1)">&#10095;</a>-->

              <div class="dots">
                  <span class="dot active" onclick="currentSlide(1)"></span>
                  <span class="dot" onclick="currentSlide(2)"></span>
                  <span class="dot" onclick="currentSlide(3)"></span>
                  <span class="dot" onclick="currentSlide(4)"></span>
                  <span class="dot" onclick="currentSlide(5)"></span>
              </div>
              <div class="cos_Logo">Skill <span>Instructor</span></div>

        </div>

        <!--<div class="icon_meniu"> -->
            <div onclick="myFunction(this)" class="container1 change" >
                <div class="bar1"></div>
                <div class="bar2"></div>
                <div class="bar3"></div>
            </div>


              <div id="navbar" class="slide-right" >
                <a href="home.html"><div id="active1" class="hexagon"><div class="buttonName"><h5>Home</h5></div></div></a>
                <a href="about.html"><div class="hexagon" id="h2"><div class="buttonName"><h5>About</h5></div></div></a>
                <a href="videos.html"><div class="hexagon" id="h3"><div class="buttonName"><h5>Videos</h5></div></div></a>
                <a href="docs.html"> <div class="hexagon" id="h4"><div class="buttonName"><h5>Docs</h5></div></div></a>
                <a href="contact.html"><div class="hexagon" id="h5"><div class="buttonName"><h5>Contact</h5></div></div></a>
                <a href="login.html"> <div onclick="addPop()" class="hexagon" id="h6"><div class="buttonName"><h5>Log in</h5></div></div></a>
                <a href="signup.html"> <div onclick="addSign()" class="hexagon" id="h7"><div class="buttonName"><h5>Sign up</h5></div></div></a>

              </div>

        <div class="navbar1">
        <div class="dropdown-hover1">
          <button class="button1" title="More">Math</button>
          <div class="dropdown-content1 bar-block1">
            <a href="./videosCategory.html" class="bar-item1 button1">Arithmetic</a>
            <a href="./videosCategory.html" class="bar-item1 button1">Geometry</a>
            <a href="./videosCategory.html" class="bar-item1 button1">Trigonometry</a>
            <a href="./videosCategory.html" class="bar-item1 button1">Statistics & probability</a>
          </div>
        </div>
        <div class="dropdown-hover1">
          <button class="button1" title="More">Computing</button>
          <div class="dropdown-content1 bar-block1">
            <a href="./videosCategory.html" class="bar-item1 button1">Computer programming</a>
            <a href="./videosCategory.html" class="bar-item1 button1">Computer science</a>
            <a href="./videosCategory.html" class="bar-item1 button1">Computer animation</a>
          </div>
        </div>
        <div class="dropdown-hover1">
          <button class="button1" title="More">Science & engineering</button>
          <div class="dropdown-content1 bar-block1">
            <a href="./videosCategory.html" class="bar-item1 button1">Physics</a>
            <a href="./videosCategory.html" class="bar-item1 button1">Chemistry</a>
            <a href="./videosCategory.html" class="bar-item1 button1">Biology</a>
          </div>
        </div>
        <div class="dropdown-hover1">
          <button class="button1" title="More">Survival</button>
          <div class="dropdown-content1 bar-block1">
            <a href="./videosCategory.html" class="bar-item1 button1">In Jungle</a>
            <a href="./videosCategory.html" class="bar-item1 button1">In Dorm</a>
            <a href="./videosCategory.html" class="bar-item1 button1">In Cosmic Vehicle</a>
          </div>
        </div>
    </div>

              <!--

              -->
        <div class="content">

         <div class="subtitle"><h1>Recomanded for you !</h1></div>
         <center>
         <div id="container">

             <?php
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
         </div>
         </center>

         <button id="more">More</button>


              <footer class="footer-distributed">
                    <div class="div1">
                            <div class="footer-left">
                                <h3>Sk<span>Ins</span>
                                </h3>
                            </div>
                            <div class="footer-center">
                                <ul class="lista-contact1">
                                    <li class="call">
                                      <p class="c1">Call:</p>
                                      <p class="c2">+0759023027</p>
                                    </li>
                                    <li class="skype">
                                      <p class="c1">Skype:</p>
                                      <p class="c2">blablabla</p>
                                    </li>
                                </ul>
                                <ul class="lista-contact2">
                                    <li class="write">
                                      <p class="c1">Write:</p>
                                      <p class="c2">student@info.uaic.ro</p>
                                    </li>
                                    <li class="adress">
                                      <p class="c1">Adress:</p>
                                      <p class="c2">General Berthelot, 16,<br> IASI 700483, ROMANIA</p>
                                    </li>

                                </ul>
                            </div>
                            <div class="footer-right">
                                <strong class="title" style="text-align:center">Stay conected</strong>
                                <ul class="social-bar" style="list-style-type:none">
                                    <li> <a href="facebook.com" class="fa fa-facebook"> </a> </li>
                                    <li> <a href="https://www.instagram.com" class="fa fa-instagram"> </a></li>
                                    <li> <a href="https://www.twitter.com" class="fa fa-twitter"> </a></li>
                                    <li> <a href="https://github.com/DoubleNy/SkIns-Skill-Instructor" class="fa fa-github"> </a></li>
                                </ul>
                            </div>
                    </div>
                    <div class="copyright">
                        &copy; 2018, Skill Instructor. All rights reserved.
                    </div>
                </footer>

            <script src="../javascript/slideshow.js"></script>
            <div id="templateColors">
              <a href="javascript:void(0)" id="template1" onclick="setTemplate1()" />
              <a href="javascript:void(0)" id="template2" onclick="setTemplate2()" />
            </div>
            <script src="../javascript/template.js"></script>
            <script type="text/javascript">
                $(document).ready(function(){
                    $("#more").click(function(){
                      $.ajax({
                        type: "POST",
                        url: 'getvideos.php',
                        success: function(html) {
                          $("#container").append(html);
                        }
                      });
                    });
                });
            </script>
</body>
</html>