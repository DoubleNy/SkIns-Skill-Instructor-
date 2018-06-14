<?php
	require 'libs/Controller.php';
	require 'models/signupModel.php';
	require 'PHPMailer_5.2.4/class.phpmailer.php';

		class signupController extends Controller
		{
			private $username;
			private $password;
			private $email;

			protected $signupModel;
			public function index()
			{
				$this->view->render('signup');
			}


			public function createUser()
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
					$email = $_POST['email'];
					$retyped = $_POST['retypePassword'];
					//echo $username . " " . $password . " " . $email . " " . $retyped;
					$log = new SignUpModel();
					$UsedUsernam = $log -> verifyUser($username);
					$UsedEmail = $log -> verifyEmail($email);
					if($UsedUsernam + $UsedEmail == 0){
						if($password == $retyped){
								$this->username = $username;
								$this->password = $password;
								$this->email = $email;
								//echo $this->username . " " . $this->email;
								$this->sendMail();
								$response = $log -> insertUser($username,$password, $email);
								session_start();
								$_SESSION['user'] = $username;
								$_SESSION['logmsg'] = "Logare cu succes";
								$_SESSION['logged'] = true;
								header("Location: ../index");
						} else {
								echo "Parolele sunt diferite";
						}
					} else {
							if($UsedEmail){
									echo "Used email";
									header("Location: ../signup");

							} else {
								echo "Used username";
								header("Location: ../signup");
							}
					}
			}

			public function sendMail(){
				$mailFrom="skillinstructor2018@gmail.com";
				$message="Bun venit. Datele contului tau sunt Username :  " . $this->username . ",  Parola: " . $this->password;
				$mailTo=$this->username;
				$mail = new PHPMailer(); // create a new object
				$mail->IsSMTP(); // enable SMTP
				$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
				$mail->SMTPAuth = true; // authentication enabled
				$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
				$mail->Host = "smtp.gmail.com";
				$mail->Port = 465; // or 587
				$mail->IsHTML(true);
				$mail->Username = "skillinstructor2018@gmail.com";
				$mail->Password = "nerugamsatrecem";
				$mail->SetFrom("skillinstructor2018@gmail.com");
				$mail->Subject = "SKINS";
				$mail->Body = $message;
				$mail->AddAddress($this->email);

				 if(!$mail->Send()) {
				    echo "Mailer Error: " . $mail->ErrorInfo;
				 } else {
				    echo "Message has been sent";
				 }
			}
		}
	?>
