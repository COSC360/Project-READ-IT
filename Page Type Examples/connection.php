<?php 

$host = "localhost";
$username = "root";
$password = "";
$database = "project-read-it";

$connection = new mysqli($host, $username, $password, $database);

if(mysqli_connect_error()) {
    die("Server error");
}

?>