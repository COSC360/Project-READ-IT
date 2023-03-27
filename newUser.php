<?php
            // session_start();
            include "connection.php";
            //include "signup.php";
            $error_message ;

            if(isset($_POST['signup'])) {
                $name = trim($_POST["username"]);
                $password = trim($_POST["password"]);
                $date = date("Y-m-d");
                $image = $_POST["image"];
                $email = $_POST["email"];
                $admin = 0;
                
                $isValid = true;



                if($isValid){
                $sqlchecker = "SELECT * FROM users;";
                $checker = mysqli_query($connection, $sqlchecker);		// get results of the query
                while ($row = mysqli_fetch_assoc($checker)){
                    if($row['Username'] === $name ){ // check to see if user already exists
                        $isValid = false;
                        $error_message = "User Already Exists.";
                    }
            }
            }
            if($isValid){
                $sqlchecker = "SELECT * FROM users;";
                $checker = mysqli_query($connection, $sqlchecker);		// get results of the query
                while ($row = mysqli_fetch_assoc($checker)){
                    if($row['Email'] === $email ){ // check to see if user already exists
                        $isValid = false;
                        $error_message = "User Email Already Exists.";
                    }
            }
            }

                if($isValid){
                $sql = "INSERT INTO users (Username, Email, Password, DateCreated, Image) VALUES ('$name','$email','$password','$date', '$image', '$admin' )";
                if (mysqli_query($connection, $sql)) {
                    session_start();
                // $_SESSION["username"] = $username;
                header("Refresh: 0; URL = Login.php");
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($connection);
                }   
                }else {
                    header("Refresh: 3; URL = signUp.php");
                    echo "<p class='alert alert-danger' role='alert'>".$error_message. ". . Reloading Page<p>";
                }
                

                
            }
            
?>