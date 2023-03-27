<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- BootStrap call-->

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/SignupandLogin.css" />
    <script type="text/javascript" src="Validator.js"></script>

    <title>Sign Up</title>

    <?php
    include "session.php";
    include "connection.php";
    include "newUser.php";
    // // include "db.php";
    // $error_message ;

    if(isset($_SESSION["username"])) {
        header("Refresh: 0; URL = index.php");
    }
    
    // if(isset($_POST['signup'])) {
    //     $name = trim($_POST["username"]);
    //     $password = trim($_POST["password"]);
    //     date_default_timezone_set("America/Vancouver");
    //     $date = date("Y-m-d");
    //     $image = $_POST["image"];
    //     $email = $_POST["email"];
    
    //     $isValid = true;
    

    // // Check fields are empty or not
    // if($name == '' || $password == ''|| $image == ''){
    // $isValid = false;
    //     $error_message = "Please fill all fields.";
    // }
    
    //     if($isValid){
    //     $sqlchecker = "SELECT * FROM users;";
    //     $checker = mysqli_query($connection, $sqlchecker);		// get results of the query
    //     while ($row = mysqli_fetch_assoc($checker)){
    //         if($row['Username'] === $name ){ // check to see if user already exists
    //             $isValid = false;
    //             $error_message = "User Already Exists.";
    //         }
    // }
    // }
    //     if($isValid){
    //     $sql = "INSERT INTO users (Username, Email, Password, DateCreated, Image) VALUES ('$name','$email','$password','$date', '$image' )";
    //     if (mysqli_query($connection, $sql)) {
    //         session_start();
    //     $_SESSION["username"] = $username;
    //     header("Refresh: 0; URL = index.php");
    //     } else {
    //         echo "Error: " . $sql . "<br>" . mysqli_error($connection);
    //     }   
    //     }
    
    // }
    
    ?>

</head>

<body>
    <div id="breadcrumb" style="margin-top: 1em; margin-left: 1em;">
        <a href="index.php">Home</a> -> <span style="text-decoration: underline;">Sign Up</span>
    </div>

    <div id="SignUpBody">
        <?php
        // Display Error message
        if (!empty($error_message)) {
            ?>
            <div class="alert alert-danger" style="position:flex; top:1em;">
                <strong>Error!</strong>
                <?= $error_message ?>
            </div>

            <?php
        }
        ?>
        <div class="alert alert-danger" id = "error" style="position:flex; top:1em; display: none;">
                <p id= "error"> <p>
            </div>


        <div id="Title">
            Sign Up
        </div>
        <div id=SignUp>
        <div id = SignUpForm>
                <form id ="form" method="post" action="newUser.php" onsubmit= 'return checkForm()' > 
                    <label class ="labelText" name = "username" for="Username" name = "username"> Username:</label><br>
                    <input type="text" name = "username" class="form-control" id="username"  required><br>
                    <label class ="labelText" name = "email" for="email" name = "email"> Email:</label><br>
                    <input type="email" name = "email" class="form-control" id="email"  required><br>
                    <label class ="labelText" for="Password" name = "password"  id = "passwordText" > Password:</label><br>
                    <input type="password" class="form-control" name = "password" id="password" required><br>
                    <label class ="labelText" for="Password" name = "passwordCheck" id="passwordCheckText">  Repeat Password:</label><br>
                    <input type="password" class="form-control" name = "passwordCheck" id="passwordCheck" required><br>
                    <label class="labelText" for="upload-image" name = "image">Profile Picture:</label><br>
                    <input type="file" id="upload-image" accept="image/*" name = "image" onchange="previewImage(event)" required>
                    <div id="profile-picture-container">
                        <img id="profile-picture" src="#"/>
                    </div>
                    <div id ="subButton"> 
                        <button class="btn btn-primary btn-lg" name="signup" type="submit">Sign Up</button>
                    </div>
                </form>
        </div>
        <p id=login>Already Have an Account?&nbsp;<a href="Login.php">Login</a></p>
    </div>

    <script>
        var previewImage = function (event) {
            var image = document.getElementById("profile-picture");
            image.src = URL.createObjectURL(event.target.files[0]);
        }
    </script>


</body>

</html>