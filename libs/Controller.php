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
        $videoList = json_decode(file_get_contents('https://www.googleapis.com/youtube/v3/search?part=id&maxResults=10&q='.$_SESSION['querry'].'&type=video&key='.$_SESSION['API_key']));
        $_SESSION['tokenToNextPage'] = $videoList->nextPageToken;

      return $videoList;
    }
    public static function interogateWikiApi($wikiQuerry)
    {
      $wikiQuerry=ucwords($wikiQuerry);
      $wikiApiURI='https://en.wikipedia.org/w/api.php?format=json&action=query&prop=extracts&titles='.$wikiQuerry.'&redirects=true';
      $wikiApiURI=str_replace(' ','%20',$wikiApiURI);
      if($wikiJson=json_decode(file_get_contents($wikiApiURI)))
      {
          foreach($wikiJson->query->pages as $key=>$value)
          {
            $pageId=$key;
            break;
          }
          echo $key;
          echo $value->extract;


      }

    }

    function __construct() {
        $this->view = new View();
    }
}
