<?php 
// LOCAL PHPMYADMIN CONNECTION
$host = "localhost";
$username = "root";
$password = "";
$dbname = "project-read-it";

// SEVER PHPMYADMIN CONNECTION
// $host = "cosc360.ok.ubc.ca";
// $username = "20489167";
// $password = "20489167";
// $dbname = "db_20489167";
// $password = "newpassword"; (NEW PASSWORD NOT WORK)

$connection = new mysqli($host, $username, $password, $dbname);

if(mysqli_connect_error()) {
    die("Server error");
}
// try {
//     $connection = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
//     echo "Connected to $dbname at $host successfully.";
//     } catch (PDOException $pe) {
//     die ("Could not connect to the database $dbname :" . $pe->getMessage());
//     }




?>