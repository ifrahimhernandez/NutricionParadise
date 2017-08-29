<?php 

session_start();
include './Connection/connection.php';


if (isset($_POST["email"]) ) {
	
	
		$sql = "SELECT * FROM `user` where email = '".$_POST["email"]."' LIMIT 1";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
		    // output data of each row
		    while($row = mysqli_fetch_assoc($result)) {
		         $name=$row["first_name"]." ".$row["last_name"];
		         $username=$row["username"];
		         $password= $row["password"];
		         $email= $row["email"];

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

					$mail->setFrom('ifrahim.hernandez@gmail.com', 'Nutricion Paradise');
					$mail->addAddress($email, $name);     // Add a recipient
					

					$mail->Subject = 'Your password and username were requested.';
					$mail->Body    = '	<p>Hello, '.$name.'</p>
										<p>Here are your login details for Nutricion Paradice account.</p>
										<p><a href="http://nutricionparadis.byethost6.com/">http://nutricionparadis.byethost6.com/</a></p>
										<p>Username : '.$username.'</p>
										<p>Password : '.$password.'</p>
										<p>To change your password, login with the above details, click Settings and then click Change Password.</p>
										<p>Thanks, Nutricion Paradise Admin</p>';

					$mail->AltBody = 'Here are your login details for Nutricion Paradice account. http://nutricionparadis.byethost6.com/ Username : '.$username.' Password : '.$password.' To change your password, login with the above details, click Settings and then click Change Password. Thanks, Nutricion Paradise Admin';

					if(!$mail->send()) {
					    echo 'Message could not be sent.';
					    echo 'Mailer Error: ' . $mail->ErrorInfo;
					} else {
					    echo 'Message has been sent';
					}
				}
		    } else {
				    echo "Email no found in the system. Please go back and try again.";
				}

		   


	}

 ?>