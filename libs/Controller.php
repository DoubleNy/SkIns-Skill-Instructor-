<?php
require 'libs/View.php';
class Controller {

    public static function ytSession() {

      if (session_status() == PHP_SESSION_NONE) {
        session_start();
      }

      $_SESSION['API_key'] = 'AIzaSyBS2yY5JobnjSKnANIUdIrEXyQJ2ELnGbQ';
    }

    public static function interogateYtApi($ytQuerry) {

        self::ytSession();
        $_SESSION['querry'] = $ytQuerry;
        $videoList = json_decode(file_get_contents('https://www.googleapis.com/youtube/v3/search?part=id&maxResults=5&q='.$_SESSION['querry'].'&type=video&key='.$_SESSION['API_key']));
        $_SESSION['tokenToNextPage'] = $videoList->nextPageToken;

      return $videoList;
    }

    function __construct() {
        $this->view = new View();
    }
}
