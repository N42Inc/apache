<?php
echo "Test";
print_r($_POST);

if(isset($_GET['Submit'])) {

$name=$_POST['name'];
$email=$_POST[];
$comments=$_POST[];

$email_to = "sathya.telu@hotmail.com";
$email_subject = "Your email subject line";
$email_message = "Form details below.\n\n";
$email_message .= "Name: ".clean_string($name)."\n";
$email_message .= "Email: ".clean_string($email)."\n";
$email_message .= "Comments: ".clean_string($comments)."\n";


$headers = 'From: '.$email."\r\n".
 
'Reply-To: '.$email."\r\n" .
 
'X-Mailer: PHP/' . phpversion();
 
//@mail($email_to, $email_subject, $email_message, $headers);  

$contactsfile = fopen("/home/ubuntu/contacts.txt", "a");
fwrite($contactsfile, "\n", $email_message);
fcloe($contactsfile);

 }
header('Location: Contact_resp.html');
die();
?>


