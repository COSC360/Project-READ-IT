<?php 

// $host = "localhost";
// $username = "root";
// $password = "";
// $database = "project-read-it";
$host = "cosc360.ok.ubc.ca";
$username = "81822173";
$password = "newpassword";
$database = "db_81822173";
// $database = "phpmyadmin";

$connection = new mysqli($host, $username, $password, $database);

if(mysqli_connect_error()) {
    die("Server error");
}

?>