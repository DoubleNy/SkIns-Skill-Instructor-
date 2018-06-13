<?php
	require 'libs/Controller.php';
  require 'models/loginModel.php';

	class loginController extends Controller
	{
		public function index()
		{
			$this->view->render('login');
		}
		public function makeLogin()
		{
				if(empty($_POST['username']))
    		{
						echo 'Username is empty';
						//$this->HandleError("UserName is empty!");
						return false;
				}
				if(empty($_POST['password']))
				{
						echo 'Password is empty';
						//$this->HandleError("Password is empty!");
						return false;
				}
				$username=$_POST['username'];
				$password=$_POST['password'];
				//echo $username . " " . $password;
				$log = new LoginModel();
				$response = $log -> verifyLogin($username,$password);
				//echo $response;
				if($response > 0)
				{
						session_start();
						$_SESSION['user'] = $username;
						$_SESSION['logmsg'] = "Logare cu succes";
						$_SESSION['logged'] = true;
						//$this->view->render('index');
						header("Location: ../index");
						//echo $_SESSION['user'];
				} else {
					   //echo 'esec';
						 //$this->view->render('login');
						 $_SESSION['logmsg'] = "Logare nereusita";
						 header("Location: ../login");
						 //$this->returnView('login',[]);
						 //$this -> index();
				}
		}


	}
?>
