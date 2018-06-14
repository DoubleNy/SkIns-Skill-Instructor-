<?php
	require 'libs/Controller.php';

	class docsController extends Controller
	{
		public function index()
		{
			$this->view->render('docs');
		}
		public static function drawDoc($param)
		{
			echo '<div class="infoDocument">
				<div class="content">
					 <h1>'.$param.'</h1>
					'.Controller::truncateStringByParagraph(Controller::getHTMLWikiApi($param)).'


					<a href="./documentPreview.html" class="button">Read more ...</a>

				</div>

				<div class="imageBox" style="background-image:url('.Controller::getThumbnailWikiApi($param).'>
				</div>

			</div>';
		}
	}
?>
