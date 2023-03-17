<?php
define('DBHOST', 'cosc360.ok.ubc.ca');
define('DBNAME', 'db_28723147');
define('DBUSER', '28723147');
define('DBPASS', '28723147');

			$connection = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);
			$error = mysqli_connect_error();
			if($error != null){
				exit("<p>Unable to connect to database</p>". $error);
			} else {
                echo "Connected to database";
            }

?>