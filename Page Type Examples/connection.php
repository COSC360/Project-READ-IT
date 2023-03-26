<?php 

$host = "localhost";
$username = "root";
$password = "";
//$database = "project-read-it";
$database = "phpmyadmin";

$connection = new mysqli($host, $username, $password, $database);

if(mysqli_connect_error()) {
    die("Server error");
}

?>