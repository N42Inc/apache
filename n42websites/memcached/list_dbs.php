<?php

//get config settings

$mysql_server = getenv('MYSQL_IP');
$memcached_server = getenv('MEMCACHED_IP');
$mysql_db = getenv('MYSQL_DB');
$mysql_user = getenv('MYSQL_USER');
$mysql_password = getenv('MYSQL_PASSWORD');

#echo $mysql_server , $mysql_db , $mysql_user ,$mysql_password ;
mysql_connect($mysql_server, $mysql_user, $mysql_password) or die(mysql_error());
mysql_select_db($mysql_db) or die(mysql_error());

echo "sucess fully connected to db : ",$mysql_db,"<br/>";

echo "<table border=1><tr><th>  tables </th></tr> ";

#$query = "show tables";
#$result = mysql_fetch_array(mysql_query($query)) or die(mysql_error());

$q1 = "SHOW TABLES FROM $mysql_db";
$q2 = mysql_query($q1);
while ($row = mysql_fetch_row($q2)) {
    echo "<tr><td> {$row[0]} </td></tr>";
}

echo "</table>";

$q3 = "SHOW TABLES FROM $mysql_db";
$q4 = mysql_query($q3);

#for ($x = 0; $x < count($result) - 1 ; $x++){
while ($row = mysql_fetch_row($q4)) {
        #echo  "{$row[0]}";
        $table = $row[0];
        $q = "DESCRIBE  $table";
        #print $q ;
        echo  "<table border=1><tr><th> ",$table,"  structure  </th></tr> ";
        $tb_st =  mysql_query($q ) or die(mysql_error());
        $num_columns = 0;
        while($row = mysql_fetch_array($tb_st)) {
           echo " <tr><td> {$row['Field']} </td><td>  {$row['Type']} </td></tr> ";
           $num_columns = $num_columns + 1;
        }
        echo "</table>";

        echo "<table border=1><tr><th> ".$table."  data  </th></tr>  ";

        $data_q = "select * from $table";
        $data = mysql_query($data_q);
        while($row = mysql_fetch_array($data)) {
           #echo $num_columns;
           echo "<tr>";
           for ($j=0;$j < $num_columns;$j++){
           echo "<td> {$row[$j]} </td>";
           }
           echo "</tr>";
        }
        echo "</table>";


}

?>
