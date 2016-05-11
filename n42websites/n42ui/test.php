<?php
print "Messages";
$contactsfile = fopen("/var/www/html/details.txt", "a");
fwrite($contactsfile, "\n". "Messages");
fclose($contactsfile);


?>
