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
    <link rel="stylesheet" href="public/css/docRead.css">

    <!--<link rel="stylesheet" href="../css/ft-para.css">-->
    <script src="public/javascript/home.js"></script>
<!--    <script src="../javascript/slideshow.js"></script>-->
    <meta name="viewport" content="width=device-width, initial-scale=1">

  </head>

  <body>
    <?php require_once 'documentCategories.php';?>
    <?php require_once 'menu.php';?>
    <?php require_once 'slider.php';?>


    <?php

    error_reporting(0);

      require_once 'docRead.php';

    if($_GET['category']=='math')
    {
      echo Controller::drawDoc("Integral");
      echo Controller::drawDoc("Pythagorean_theorem");
      echo Controller::drawDoc("Sine");
      echo Controller::drawDoc("Riemann_hypothesis");
  }
  if($_GET['category']=='english')
  {
    echo Controller::drawDoc("English_plurals");
    echo Controller::drawDoc("Conjuctions");
    echo Controller::drawDoc("English_prefix");
    echo Controller::drawDoc("English_modal_verbs");
  }
  if($_GET['category']=='c')
  {
    echo Controller::drawDoc("C++");
  }
  if($_GET['category']=='algorithms')
  {
    echo Controller::drawDoc("Lempel–Ziv–Markov_chain_algorithm");
    echo Controller::drawDoc("Binary_search_algorithm");
    echo Controller::drawDoc("Huffman_coding");
    echo Controller::drawDoc("Quicksort");
  }
  if($_GET['category']=='photos')
  {
    echo Controller::drawDoc('Full-spectrum_photography');
    echo Controller::drawDoc("Abstract_photography");
    echo Controller::drawDoc("Image_editing");
    echo Controller::drawDoc("Motion_blur");
  }

    ?>


    <?php require_once 'footer.php'; ?>
