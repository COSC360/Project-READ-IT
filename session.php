<?php session_start();
require_once('connection.php');
?>
<?php

// echo "welcome, {$_SESSION['username']}";  
if(isset($_SESSION["username"])) {   
    $user = $_SESSION['username'];
}

//$lastThreePosts = array();

function getLastThread1(){

    global $lastThreePosts;
   return $lastThreePosts[0]; 
}
// Function to handle clicking on a post
function clickPost($post, $lastThreePosts) {
    // Remove the oldest post from the array
    if (count($lastThreePosts) >= 3) {
        array_shift($lastThreePosts);
    }
    // Add the new post to the end of the array
    array_push($lastThreePosts, $post);
}

?>


