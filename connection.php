<?php 
//LOCAL PHP MY ADMIN CONNECTION
// $host = "localhost";
// $username = "root";
// $password = "";
// $database = "project-read-it";
// // $database = "phpmyadmin";

 // ORVINS CONNECTION (IT WORKS)
// $host = "cosc360.ok.ubc.ca";
// $username = "85707669";
// $password = "85707669";
// $dbname = "db_85707669";


//LUCA'S CONNECTION
$host = "cosc360.ok.ubc.ca";
$username = "81822173";
$password = "81822173";
$dbname = "db_81822173";
// (NEW PASSOWRD)$password = "newpassword";

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