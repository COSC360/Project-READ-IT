<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- BootStrap call-->

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/SignupandLogin.css"/>
    <!-- <script type="text/javascript" src="LoginValidator.js"></script> -->
  
    <?php
        // session_start();
        include "session.php";
        include "connection.php";
        global $connection;
        global $BannedUser; 
        
       ?>

<?php
use PHPUnit\Framework\TestCase;

class LoginTest extends TestCase
{
    private $connection;
    private $session;

    public function testMyFunction()
    {
        // Arrange
        $expected = "Insession";

        // Act
        $result = checkSession();

        // Assert
        $this->assertEquals($expected, $result);
    }

}
