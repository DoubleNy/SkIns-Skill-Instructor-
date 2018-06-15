<?php
	require 'libs/Controller.php';
  require 'models/docsModel.php';

	class docsController extends Controller
	{
		public static function getPageIdWikiApi($wikiQuerry)
		{
			$wikiQuerry=ucwords($wikiQuerry);
			$wikiApiURI='https://en.wikipedia.org/w/api.php?format=json&action=query&prop=extracts&titles='.$wikiQuerry.'&redirects=true';
			$wikiApiURI=str_replace(' ','_',$wikiApiURI);
			$wikiApiURI=str_replace('+','%2B',$wikiApiURI);
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
				$wikiApiURI=str_replace(' ','_',$wikiApiURI);
				$wikiApiURI=str_replace('+','%2B',$wikiApiURI);
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
			$wikiApiURI=str_replace(' ','_',$wikiApiURI);
			$wikiApiURI=str_replace('+','%2B',$wikiApiURI);

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

		public static function loadDoc($param)
		{
			$title=str_replace('_',' ',$param);
			$title=str_replace('%2B','+',$title);
			return '<div class="infoDocument">
				<div class="content">
					 <h1>'.$title.'</h1>
					'.Controller::truncateStringByParagraph(Controller::getHTMLWikiApi($param)).'


					<a href="docs?document='.$param.'" class="button">Read more ...</a>

				</div>

				<div class="imageBox" style="background-image:url('.Controller::getThumbnailWikiApi($param).')">
				</div>

			</div>';
		}

		public static function loadFullDoc()
		{
			if(isset($_GET['document']))
			{
					echo self::getHTMLWikiApi($_GET['document']);
			}
		}

		public function index()
		{

			$this->view->render('docs');
		}

	}
?>
