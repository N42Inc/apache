<html>
<body>
<?php

print "<table style='width:100%' border='1' bgcolor='white'>";
$color = "";
$handle = fopen("details.txt", "r");
if ($handle) {
    while (($line = fgets($handle)) !== false) {
        if ($line == "Form details below.\n"){
	   $color = "#228B22";
	}
	else {$color = "#A9A9A9";}
        print "<tr><td bgcolor=".$color.">".$line."</td></tr>";// process the line read.
    }

    fclose($handle);
} else {
    print "file not exist";// error opening the file.
}

print "</table>";
?> 


</body>
</html>
