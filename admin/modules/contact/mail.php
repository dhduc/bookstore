<?php
$to      = 'vudoanbt3@gmail.com';
$subject = 'the subject';
$message = 'hello';
$headers = 'From: webmaster@example.com' . "\r\n" .
    'Reply-To: webmaster@example.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

if(
mail('vudoanbt3@gmail.com', 'the subject', 'the message', null,
   '-fwebmaster@example.com')
==1)
echo "Email has been sent !";
else
echo "Send failured !";
?> 