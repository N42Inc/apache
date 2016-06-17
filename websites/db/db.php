<?php
$servername = getenv('MYSQL_IP');
$username = getenv('MYSQL_USER');
$password = getenv('MYSQL_PASSWORD');
$db = getenv('MYSQL_DB');
try {
    $conn = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected to database successfully".$servername."\n";
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }

    $sql = 'SELECT CompanyName, City, Country FROM Customers';

    foreach ($conn->query($sql) as $row) {

    echo "\n".$row['CompanyName']."\t".$row['City']."\t".$row['Country'];

    }
?>

