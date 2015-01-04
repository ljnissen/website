<?php
	if (isset($_POST['send'])) {
		$to = 'lj.nissen@googlemail.com';
		$subject = 'From website: ';
		$message = 'Name: ' . $_POST['name'] . "\r\n\r\n";
		$message .= 'Email: ' . $_POST['email'] . "\r\n\r\n";
		$message .= 'Message: ' . $_POST['message'];
		$headers = "From: webmaster@coquilles-web-logo.se\r\n";
		$headers .= 'Content-Type: text/plain; charset=utf-8';
	}
		$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
		if ($email) {
			$headers .= "\r\nReply-To: $email";
		}

		$success = mail($to, $subject, $message, $headers, '-flj.nissen@gmail.com');
?>
<!doctype>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="./css/newsletter.css" />
</head>

<link rel="stylesheet" href="./css/newsletter.css" />
<meta charset="utf-8">

<style type="text/css">
</style>

<body>

<?php if (isset($success) && $success) { ?>	
<h1>Thank you for subscribing!</h1>
<?php } else { ?>
<h1>Sorry</h1>
There was a problem sending your message.
<?php } ?>

</body>
</html>