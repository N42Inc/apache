<?php
//get config settings
$mem = new Memcached();
$memcache =  getenv('MEMCACHED_IP');
$mem->addServer($memcache , 11211);
$result = $mem->get("blah");

if ($result) {
    echo $result;
} else {
    echo "No matching key found.  I'll add that now!";
    $mem->set("blah", "I am data!  I am held in memcached!",180) or die("Couldn't save anything to memcached...");
}
?>
