
<?php
   session_start();
   if(isset($_SESSION["username"])) {
      unset($_SESSION["username"]);
      unset($_SESSION["password"]);
      echo "Logged out!";
      header("Refresh: 3; URL = index.php");
  } else {
      header("Refresh: 0; URL = index.php");
  }
?>
