<?php
require 'libs/View.php';
class Controller {
    protected $view;

    public static function interogateYtApi($ytQuerry) {

        session_start();

        $_SESSION['API_key'] = 'AIzaSyBS2yY5JobnjSKnANIUdIrEXyQJ2ELnGbQ';
        $_SESSION['querry'] = $ytQuerry;
        $videoList = json_decode(file_get_contents('https://www.googleapis.com/youtube/v3/search?part=id&maxResults=5&q='.$_SESSION['querry'].'&type=video&key='.$_SESSION['API_key']));
        $_SESSION['tokenToNextPage'] = $videoList->nextPageToken;

      return $videoList;
    }

    function __construct() {
        $this->view = new View();
    }
    //function returnView($view_filename,$view_data = [])
    //{
    //    $this->view = new View($view_filename,$view_data);
    //    return $this->view;
    //}
}
