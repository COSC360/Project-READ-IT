<?php session_start();
require_once('connection.php');
?>
<?php
// echo "welcome, {$_SESSION['username']}";  
if(isset($_SESSION["username"])) {   
    $user = $_SESSION['username'];
}

// echo "Welcome $user";

?>


