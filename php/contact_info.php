<?php 

session_start();
include './Connection/connection.php';


if (isset($_POST["contact_name"]) && isset($_POST["contact_email"]) && isset($_POST["message"]) && isset($_POST["contact_subject"])) {
	
			
		   
		          require '.././PHPMailer-master/PHPMailerAutoload.php';

		          //allow acces app for it to work https://accounts.google.com/b/0/DisplayUnlockCaptcha
					$mail = new PHPMailer;

					//$mail->SMTPDebug = 3;                               // Enable verbose debug output

					$mail->isSMTP();                                      // Set mailer to use SMTP
					$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
					$mail->SMTPAuth = true;                               // Enable SMTP authentication
					$mail->Username = 'ifrahim.hernandez@gmail.com';                 // SMTP username
					$mail->Password = '0150386ifra';                           // SMTP password
					$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
					$mail->Port = 465;                                    // TCP port to connect to

					$mail->setFrom($_POST["contact_email"], $_POST["contact_name"]);
					$mail->addAddress('ifrahim.hernandez@gmail.com', 'Nutricion Paradise');     // Add a recipient
					

					$mail->Subject = 'Message from '. $_POST["contact_name"].'';
					$mail->Body    = '	
					<p>From: '.$_POST["contact_email"].'</p>
					<p>'.$_POST["contact_subject"].'</p>
					<p>'.$_POST["message"].'</p>';

					$mail->AltBody = $_POST["message"];

					if(!$mail->send()) {
					    echo 'Message could not be sent.';
					    echo 'Mailer Error: ' . $mail->ErrorInfo;
					} else {
					    echo 'Message has been sent';
					}
		
	}

 ?>