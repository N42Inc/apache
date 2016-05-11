
<?php
 
#if(isset($_POST['Submit'])) {
$name = $_POST['name'];
$email = $_POST['email'];
$comments = $_POST['comments'];
$reason = $_POST['Reason'];
$email_to = "sathya.telu@hotmail.com";
$email_subject = "Your email subject line";
$email_message = "Form details below.\n\n";
$email_message .= "Name: ".$name."\n";
$email_message .= "Email: ".$email."\n";
$email_message .= "Comments: ".$comments."\n";
$email_message .= "Reason For Reaching Out: ".$reason."\n";

$headers = 'From: '.$email."\r\n".'Reply-To: '.$email_to."\r\n" .'X-Mailer: PHP/' . phpversion();
 
//@mail($email_to, $email_subject, $email_message, $headers);  

$contactsfile = fopen("/var/www/html/details.txt", "a");
fwrite($contactsfile, "\n". $email_message);
fclose($contactsfile);

 #}
header('Location: Contact_resp.html');
die();
?>


