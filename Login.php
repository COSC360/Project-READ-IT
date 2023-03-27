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
        
        if(isset($_SESSION["username"])) {
            echo "User already logged in!";
            header("Refresh: 0; URL = index.php");
        }

        if(isset($_REQUEST["username"]) && isset($_REQUEST["password"])) {
            if($_SERVER["REQUEST_METHOD"] == "GET") {
                die("Bad data");
                header("Refresh: 0; URL = index.php");
            }
    
            if($_SERVER["REQUEST_METHOD"] == "POST") {
                $username = $_POST["username"];
                $password = $_POST["password"];

                $sql = "SELECT username FROM users WHERE username = ? AND password = ?";
                $statement = mysqli_prepare($connection, $sql);
                // $password = md5($password);
                $statement -> bind_param("ss", $username, $password);
                $statement -> execute();
                $result = $statement -> get_result();
                if($row = $result -> fetch_assoc()) {
                    echo "<p>" . $row["username"] . " successfully logged in</p>";
                    $_SESSION["username"] = $row["username"];
                    header("Refresh: 1; URL = index.php");
                } else {
                    echo "<p>Invalid username and/or password</p>";
                    header("Refresh: 1; URL = Login.php");
                }
            }
            mysqli_close($connection);
            die();
            // die("Closed connection");
        } else {
            // echo "<p>NO CREDENTIALS</p>";
        }
    ?>


    <title>Login</title>
</head>
<body>
    <div id="breadcrumb" style="margin-top: 1em; margin-left: 1em;">
        <a href="index.php">Home</a> -> <span style="text-decoration: underline;">Login</span>
    </div>

    <div id = "SignUpBody">

        <div class="alert alert-danger" id = "error" style="position:flex; top:1em; display: none;">
                <p id= "error"> <p>
            </div>

        <div id="Title">
            Login
        </div>
        <div id = SignUpForm>
            <form id="form" method="POST" > 
                <label class ="labelText" for="username" id = usernameText> Username:</label><br>
                <input type="text" name="username" class="form-control" id= "username" required><br>
                <label class ="labelText" for="password" id = "passwordText"> Password:</label><br>
                <input type="password" name="password" class="form-control" id="password" required><br>
                <div id =subButton> 
                    <button class="btn btn-primary btn-lg" type="submit">Login</button>
                </div>
            </form>
        </div>
        <p id =login>Don't Have an Account?&nbsp;<a href="signUp.php">Sign Up</a></p>
    </div>
    
</body>
</html>