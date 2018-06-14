<?php session_start();
//require 'controllers/docsController.php'?>
<html>

  <head>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="public/css/home.css">
    <link rel="stylesheet" href="public/css/animations.css">
    <link rel="stylesheet" href="public/css/menu.css">
    <link rel="stylesheet" href="public/css/docs.css">
    <link rel="stylesheet" href="public/css/slideshow.css">
    <link rel="stylesheet" href="public/css/template.css">

    <!--<link rel="stylesheet" href="../css/ft-para.css">-->
    <script src="public/javascript/home.js"></script>
<!--    <script src="../javascript/slideshow.js"></script>-->
    <meta name="viewport" content="width=device-width, initial-scale=1">

  </head>

  <body>
    <?php require_once 'menu.php';?>
    <?php require_once 'slider.php';?>


    <?php echo Controller::drawDoc("Trie");
          echo Controller::drawDoc("integral");
          echo Controller::drawDoc("Adobe");
          echo Controller::drawDoc("Lionel Messi");
    ?>

    <?php require_once 'footer.php'; ?>
