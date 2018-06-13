<?php session_start(); ?>
<html>
<head>
  <link href="https://fonts.googleapis.com/css?family=Roboto:300" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="public/css/home.css">
  <link rel="stylesheet" href="public/css/animations.css">
  <link rel="stylesheet" href="public/css/menu.css">
  <link rel="stylesheet" href="public/css/login.css">
  <link rel="stylesheet" href="public/css/about.css">
  <link rel="stylesheet" href="public/css/template.css">
  <!--<link rel="stylesheet" href="../css/ft-para.css">-->
  <script src="public/javascript/home.js"></script>
  <!--<script src="../javascript/slideshow.js"></script>-->
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>

<?php require_once 'menu.php'; ?>


<div class="wrapper">
<div class="container">
  <h1>Welcome</h1>
  <form class="form">
    <input type="text" placeholder="Username">
    <input type="text" placeholder="email">
    <input type="password" placeholder="Password">
    <input type="password" placeholder="Re-type password">
    <button type="submit" id="login-button"><b>Login</b></button>
  </form>
</div>
<div class = "other">
         <ul class="social-bar" style="list-style-type:none">
              <li> <a href="https://www.facebook.com" class="fa fa-facebook"> </a> </li>
              <li> <a href="https://www.instagram.com" class="fa fa-instagram"> </a></li>
              <li> <a href="https://www.twitter.com" class="fa fa-twitter"> </a></li>
              <li> <a href="https://github.com/DoubleNy/SkIns-Skill-Instructor" class="fa fa-github"> </a></li>
          </ul>

</div>
<ul class="bg-bubbles">
  <li></li>
  <li></li>
  <li></li>
  <li></li>
  <li></li>
  <li></li>
  <li></li>
  <li></li>
  <li></li>
  <li></li>
</ul>
</div>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

<?php require_once 'template.php'; ?>

</body>
</html>
