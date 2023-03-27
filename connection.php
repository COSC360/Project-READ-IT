<?php 
//LOCAL PHP MY ADMIN CONNECTION
// $host = "localhost";
// $username = "root";
// $password = "";
// $database = "project-read-it";
// // $database = "phpmyadmin";


$host = "cosc360.ok.ubc.ca";
$username = "20489167";
$password = "20489167";
$dbname = "db_20489167";
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