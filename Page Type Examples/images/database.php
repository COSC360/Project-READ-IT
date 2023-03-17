<?php
    define('DB_SERVER', 'cosc360.ok.ubc.ca');
    define('DB_Name', 'db_81822173');
    define('DB_USERNAME', '81822173');
    define('DB_PASSWORD', 'newpassword');
    $connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_USERNAME, DB_NAME);
    if(!$connection){
        die('Could not Connect My Sql:' .mysql_error());
    }else{
        <p> connected<p>
    }
?>