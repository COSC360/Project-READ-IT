<?php 

// $host = "localhost";
// $username = "root";
// $password = "";
// $database = "project-read-it";

$host = "cosc360.ok.ubc.ca";
$username = "85707669";
$password = "85707669";
$dbname = "db_85707669";
// // $database = "phpmyadmin";

// $connection = new mysqli($host, $username, $password, $database);

// if(mysqli_connect_error()) {
//     die("Server error");
// }
try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    echo "Connected to $dbname at $host successfully.";
    } catch (PDOException $pe) {
    die ("Could not connect to the database $dbname :" . $pe->getMessage());
    }




?>