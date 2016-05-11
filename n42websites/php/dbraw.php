<?php
//
// Database Test
//
$servername = getenv('MYSQL_IP');
$username = getenv('MYSQL_USER');
$password = getenv('MYSQL_PASSWORD');
$db = getenv('MYSQL_DB');

// Database connection
// http://www.php.net/manual/en/ref.pdo-mysql.php
$pdo = new PDO("mysql:host=$servername;dbname=$db", $username, $password, array(
    PDO::ATTR_PERSISTENT => true
));

// Read number of queries to run from URL parameter
$query_count = 1;
if (TRUE === isset($_GET['queries'])) {
  $query_count = $_GET['queries'];
}

// Create an array with the response string.
$arr = array();
$id = mt_rand(1, 10000);

// Define query
$statement = $pdo->prepare('SELECT randomNumber FROM sample_data WHERE id = :id');
$statement->bindParam(':id', $id, PDO::PARAM_INT);

// For each query, store the result set values in the response array
while (0 < $query_count--) {
  $statement->execute();
  
  // Store result in array.
  $arr[] = array('id' => $id, 'randomNumber' => $statement->fetchColumn());
  $id = mt_rand(1, 10000);
}

// Use the PHP standard JSON encoder.
// http://www.php.net/manual/en/function.json-encode.php
if (count($arr) == 1) {
  $arr = $arr[0];
}

echo json_encode($arr);
?>
