<?php
if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['comment']) && isset($_POST['redirect']) && isset($_POST['key']))
{
	$key = $_POST['key'];
	if ($key != 'b424168e2dac758e3d2d471bd0a3592b')
	{
		header("HTTP/1.0 401 Unauthorized");
		exit;
	}

	$honeypot	= $_POST['email-confirmation'];
	if($honeypot)
	{
		header("HTTP/1.0 410 Gone");
		exit;
	}
	
	$title		= 'Lee Kelleher';
	$to			= 'leekelleher@gmail.com';
	$subject	= '[leekelleher.com] Contact Form';

	$name		= htmlspecialchars(urldecode($_POST['name']));
	$email		= htmlspecialchars(urldecode($_POST['email']));
	$website	= htmlspecialchars(urldecode($_POST['website']));
	$comment	= htmlspecialchars(urldecode($_POST['comment']));
	$redirect 	= $_POST['redirect'];

	$http_ref   = getenv("HTTP_REFERER");
	$http_agent = getenv("HTTP_USER_AGENT");
		
	$message	= "<html>
	<head><title>$subject</title></head>
	<body>
		<b>Name:</b> $name<br />
		<b>Email:</b> $email<br />
		<b>Website:</b> $website<br />
		<b>Comment:</b><br /><br />$comment<br /><br />
		<hr />
		<b>Referrer:</b> $http_ref<br />
		<b>User Agent:</b> $http_agent<br />
		<b>Honeypot:</b> $honeypot<br />
	</body>
</html>";
	
	require("form-class.phpmailer.php");

	$mail = new PHPMailer();
	$mail->IsSMTP();
	$mail->SMTPAuth	= true;
	$mail->Host		= 'mail.leekelleher.com';
	$mail->Port		= 25;
	$mail->Username	= 'me@leekelleher.com';
	$mail->Password	= '437EBs0bJGuR0PJfjawb';
	
	$mail->AddAddress($to, $title);
	$mail->AddReplyTo($email, $name);
	$mail->From		= $mail->Username;
	$mail->FromName	= $title;
	$mail->Subject	= $subject;
	$mail->IsHTML(true);
	$mail->Body		= $message;
	
	if(!$mail->Send())
	{
		echo 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;
		exit;
	}
	else
	{
		header("Location: $redirect", true);
		exit;
	}
}
?>