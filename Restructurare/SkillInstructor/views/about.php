<?php session_start(); ?>
<html>
<head>
  <link href="https://fonts.googleapis.com/css?family=Roboto:300" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="public/css/home.css">
  <link rel="stylesheet" href="public/css/animations.css">
  <link rel="stylesheet" href="public/css/menu.css">
  <link rel="stylesheet" href="public/css/slideshow.css">
  <link rel="stylesheet" href="public/css/about.css">
  <link rel="stylesheet" href="public/css/template.css">
  <!--<link rel="stylesheet" href="../css/ft-para.css">-->
  <script src="public/javascript/home.js"></script>
  <!--<script src="../javascript/slideshow.js"></script>-->
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>



<body>

  <?php require_once 'menu.php'; ?>
  <?php require_once 'slider.php'; ?>


  <ul class="infoList">
    <li id="cosmin">
        <div class="flip-container" ontouchstart="this.classList.toggle('hover');">
          <div class="flipper">
            <div class="front">
              <figure><img src="public/images/lion.jpg" /> </figure>
            </div>
            <div class="back">
              <figure>
                <div class="nume">
                    <b>Cosmin Stefan :)</b>
                </div>
                <div class="text">
                    <ul class="social-bar" style="list-style-type:none">
                        <li> <a href="facebook.com" class="fa fa-facebook"> </a> </li>
                        <li> <a href="https://www.instagram.com" class="fa fa-instagram"> </a></li>
                        <li> <a href="https://www.twitter.com" class="fa fa-twitter"> </a></li>
                        <li> <a href="https://github.com/DoubleNy/SkIns-Skill-Instructor" class="fa fa-github"> </a></li>
                    </ul>
                </div>
                <img src="public/images/lion.jpg" />
              </figure>
            </div>
          </div>
        </div>
    </li>
    <li id="andreea">
        <div class="flip-container" ontouchstart="this.classList.toggle('hover');">
          <div class="flipper">
            <div class="front">
              <figure><img src="public/images/wolf.jpg" /> </figure>
            </div>
            <div class="back">
              <figure>
                <div class="nume">
                    <b>Sustac Andreea :)</b>
                </div>
                <div class="text">
                    <ul class="social-bar" style="list-style-type:none">
                        <li> <a href="facebook.com" class="fa fa-facebook"> </a> </li>
                        <li> <a href="https://www.instagram.com" class="fa fa-instagram"> </a></li>
                        <li> <a href="https://www.twitter.com" class="fa fa-twitter"> </a></li>
                        <li> <a href="https://github.com/DoubleNy/SkIns-Skill-Instructor" class="fa fa-github"> </a></li>
                    </ul>
                </div>
                <img src="public/images/wolf.jpg" />
              </figure>
            </div>
          </div>
        </div>
    </li>
    <li id="cristi">
        <div class="flip-container" ontouchstart="this.classList.toggle('hover');">
          <div class="flipper">
            <div class="front">
              <figure><img src="../images/eagle.jpg" /> </figure>
            </div>
            <div class="back">
              <figure>
                <div class="nume">
                    <b>Ninicu Cristian :)</b>
                </div>
                <div class="text">
                    <ul class="social-bar" style="list-style-type:none">
                        <li> <a href="facebook.com" class="fa fa-facebook"> </a> </li>
                        <li> <a href="https://www.instagram.com" class="fa fa-instagram"> </a></li>
                        <li> <a href="https://www.twitter.com" class="fa fa-twitter"> </a></li>
                        <li> <a href="https://github.com/DoubleNy/SkIns-Skill-Instructor" class="fa fa-github"> </a></li>
                    </ul>
                </div>
                <img src="../images/eagle.jpg" />
              </figure>
            </div>
          </div>
        </div>
    </li>
    <li id="dani">
        <div class="flip-container" ontouchstart="this.classList.toggle('hover');">
          <div class="flipper">
            <div class="front">
              <figure><img src="../images/tiger.jpg" /> </figure>
            </div>
            <div class="back">
              <figure>
                <div class="nume">
                    <b>Marian Alexandru :)</b>
                </div>
                <div class="text">
                    <ul class="social-bar" style="list-style-type:none">
                        <li> <a href="facebook.com" class="fa fa-facebook"> </a> </li>
                        <li> <a href="https://www.instagram.com" class="fa fa-instagram"> </a></li>
                        <li> <a href="https://www.twitter.com" class="fa fa-twitter"> </a></li>
                        <li> <a href="https://github.com/DoubleNy/SkIns-Skill-Instructor" class="fa fa-github"> </a></li>
                    </ul>
                </div>
                <img src="../images/tiger.jpg" />
              </figure>
            </div>
          </div>
        </div>
    </li>


  </ul>

  <?php require_once 'footer.php'; ?>
