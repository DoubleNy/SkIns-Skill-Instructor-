<?php
	class Bootstrap
	{
		private $_controllerPath = 'controllers/';
  	private $_modelPath = 'models/';
  	private $_libsPath = 'libs/';

  	private $_url = null;

		public function init()
		{
			$url = $this -> parseUrl();
        	if(empty($url[0])) {
        		$this -> loadDefaultController();
        	} else {
        		$this -> loadExistingController();
        	}
		}

		private function parseUrl()
		{
			$url = isset($_GET['url']) ? $_GET['url'] : null;
        	$url = rtrim($url, '/');
        	$url = filter_var($url, FILTER_SANITIZE_URL);
        	return $this->_url = explode('/', $url);
		}

		private function loadDefaultController()
    	{
        	require $this->_controllerPath . 'indexController.php';
        	$this->_controller = new indexController();
        	$this->_controller->index();
        	return 0;
    	}

	    private function loadExistingController()
	    {
	        $file = $this->_controllerPath . $this->_url[0] . 'Controller.php';

					//echo $file;

	        if (file_exists($file)) {
	            require $file;
	            $className = $this->_url[0].'Controller';
	            $this->_controller = new $className;
	            $argument = isset($this->_url[1]) ? $this->_url[1] : null;
	            if($argument == null)
	            {
	           		$this->_controller->index();
	           	}
	           	else {
	           		if(method_exists($this->_controller, $argument))
	           			$this->_controller -> $argument();
	           		else{
	           			echo "404 error. Pagina nu exista!";
	           		}
	           	}
	        } else {
	            echo "404 error. Pagina nu exista!";
	            return false;
	        }
	    }
	}
?>
