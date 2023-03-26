<?php 

$host = 'cosc360.ok.ubc.ca';
$username = '20489167';
$password = 'newpassword';
$database = 'db_20489167';
// $database = "phpmyadmin";

$connection = new mysqli($host, $username, $password, $database);

if(!$connection()) {
    die(mysqli_connect_error());
}

?>