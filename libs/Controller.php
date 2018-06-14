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

    public static function getPageIdWikiApi($wikiQuerry)
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
          return $key;

      }
    }
      public static function getHTMLWikiApi($wikiQuerry)
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
            return $value->extract;



        }

    }
    public static function getThumbnailWikiApi($wikiQuerry)
    {

      $wikiQuerry=ucwords($wikiQuerry);
      $wikiApiURI='http://en.wikipedia.org/w/api.php?action=query&prop=pageimages&format=json&piprop=original&titles='.$wikiQuerry;
      $wikiApiURI=str_replace(' ','%20',$wikiApiURI);

      if($wikiImageJson=json_decode(file_get_contents($wikiApiURI)))
      {
          foreach ($wikiImageJson->query->pages as $key => $value) {
            return $value->original->source;
            break;
          }

        }
    }
    public static function truncateStringByParagraph($str)
    {
      $pozitie=strpos($str,"</p>");
      $rezultat=substr($str,0,$pozitie+4);
      return $rezultat;
    }
    function __construct() {
        $this->view = new View();
    }
    public static function drawDoc($param)
    {
      return '<div class="infoDocument">
        <div class="content">
           <h1>'.$param.'</h1>
          '.Controller::truncateStringByParagraph(Controller::getHTMLWikiApi($param)).'


          <a href="./documentPreview.html" class="button">Read more ...</a>

        </div>

        <div class="imageBox" style="background-image:url('.Controller::getThumbnailWikiApi($param).')">
        </div>

      </div>';
    }
}
