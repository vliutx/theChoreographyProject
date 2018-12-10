<?php
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

$to = "hliu38@hotmail.com, theresa.sim@utexas.edu";
$subject = "TCP Contact Form";

$message = "
<html>
<head>
<title>TCP Contact Form</title>
</head>
<body>
<p>$name, $email<br>
Message: $message</p>
</body>
</html>
";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <form@tcp.com>' . "\r\n";
$headers .= 'Cc:' . "\r\n";

mail($to,$subject,$message,$headers);

header('Location: ../contact.php');
die();
?>