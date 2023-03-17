<?php
define('DBHOST', 'cosc360.ok.ubc.ca');
define('DBNAME', 'db_81822173');
define('DBUSER', '81822173');
define('DBPASS', 'newpassword');

			$connection = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);
			$error = mysqli_connect_error();
			if($error != null){
				exit("<p>Unable to connect to database</p>". $error);
			} else {
                echo "Connected to database";
            }

?>