<?php

$mysql_server = getenv('MYSQL_IP');
$memcached_server = getenv('MEMCACHED_IP');
$mysql_db = getenv('MYSQL_DB');
$mysql_user = getenv('MYSQL_USER');
$mysql_password = getenv('MYSQL_PASSWORD');

$mem = new Memcached();
$mem->addServer($memcached_server, 11211);

mysql_connect($mysql_server, $mysql_user, $mysql_password) or die(mysql_error());
mysql_select_db($mysql_db) or die(mysql_error());

$query = "SELECT name FROM sample_data WHERE id = 1";
$querykey = "KEY" . md5($query);

$result = $mem->get($querykey);

if ($result) {
    print "<p>Data was: " . $result[0] . "</p>";
    print "<p>Caching success!</p><p>Retrieved data from memcached!</p>";
} else {
    $result = mysql_fetch_array(mysql_query($query)) or die(mysql_error());
    $mem->set($querykey, $result, 180);
    print "<p>Data was: " . $result[0] . "</p>";
    print "<p>Data not found in memcached.</p><p>Data retrieved from MySQL and stored in memcached for next time.</p>";
}
?>
