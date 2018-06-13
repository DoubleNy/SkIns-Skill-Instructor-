<?php
	require 'libs/Controller.php';
  require 'PHPMailer_5.2.4/class.phpmailer.php';

	class contactController extends Controller
	{
		public static function sendFeedback(){
			if(isset($_POST['Submit']))
			{
				$name=$_POST['Name'];
				$mailFrom=$_POST['Email'];
				$message=$_POST['Message'];

				$mailTo="skillinstructor2018@gmail.com";
				$headers="From: ".$mailFrom;
				$txt="You have recieved an email from ".$name.".\n\n".$message;

				//mail($mailTo,"SKINS",$txt,$headers);
				//header("Location: /SkillInstructor/contact");

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
				$mail->Body = $txt;
				$mail->AddAddress("skillinstructor2018@gmail.com");

				 if(!$mail->Send()) {
				    echo "Mailer Error: " . $mail->ErrorInfo;
				 } else {
				    echo "Message has been sent";
				 }
		}
	}
		public function index()
		{
			$show = self::sendFeedback();
			$this->view->render('contact');

	}
}
?>
