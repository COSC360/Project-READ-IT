<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>READ-IT - New Thread</title>

        <link rel="stylesheet" href="css/createThread.css">
        <?php
            include "connection.php";
            include "session.php";

            if(!isset($_SESSION["username"])) {
                header("Refresh: 0; URL = index.php");
            }

        ?>
    </head>

    <body>
        <header id="masthead">
            <input id="search" type="text" placeholder="Search READ-IT...">

            <h1><a href="index.php">
                READ-IT
            </a></h1>

            <?php
            if(isset($_SESSION["username"])) {
                echo "<div id='logout'><a href='logout.php'>Logout</a></div><div id='user-profile-image'><a href='profile.php'>";
                    // $username = $_SESSION["username"];
                    // $sql = "SELECT picture FROM users WHERE username = ?";
                    //     $statement = mysqli_prepare($connection, $sql);
                    //     $statement -> bind_param("s", $username);
                    //     $statement -> execute();
                    //     $result = $statement -> get_result();
                    //     if($row = $result -> fetch_assoc()){
                    //         echo "<img src='" . $row["picture"] . "'>";
                    //     }
                    // } else {
                    //     echo "<img src=''>";
                echo "</a></div>";                        
            } else {
                echo "<div id='login'><a href='Login.php'>Login</a></div><div id='signup'><a href='signUp.php'>Sign Up</a></div>"; 
            }
            ?>
        </header>

        <div id="breadcrumb" style="margin-top: 1em; margin-left: 1em;">
            <a href="index.php">Home</a> -> <span style="text-decoration: underline;">Create Thread</span>
        </div>

        <br>
        <div id="new-thread-title">
            New Thread
        </div>
        <br>

        <form method="POST">
            <input type="text" name="title" placeholder="Title">
            <textarea name="text" placeholder="Type text here..." maxlength="1000"></textarea>
            <label for="category" name="category" style="color: #472183; font-weight: bold;">Category: </label>
            <select name="category" id="category" style="margin-top: 1em; margin-right: 5em;">
                <option value="Sports">Sports</option>
                <option value="Film">Film</option>
                <option value="Music">Music</option>
                <option value="Travel">Travel</option>
                <option value="Science">Science</option>
                <option value="Art">Art</option>
                <option value="Health">Health</option>
                <option value="Food">Food</option>
                <option value="Career">Career</option>
            </select>
            <input id="file-upload" type="file" name="file" accept="image/*"></label>
            <input type="submit" name="submit" value="Post Thread">
        </form>

        <?php
            if(isset($_REQUEST["title"]) && isset($_REQUEST["text"]) && isset($_REQUEST["category"])) {
                if($_SERVER["REQUEST_METHOD"] == "GET") {
                    die("Bad data");
                }
            
                if($_SERVER["REQUEST_METHOD"] == "POST") {
                    $username = $_SESSION["username"];
                    $sql = "SELECT UserId FROM users WHERE Username = ?";
                    $statement = mysqli_prepare($connection, $sql);
                    $statement -> bind_param("s", $username);
                    $statement -> execute();
                    $result = $statement -> get_result();
                    if($row = $result -> fetch_assoc()) {
                        $title = $_POST["title"];
                        $text = $_POST["text"];
                        $category = $_POST["category"];
                        $userId = $row["UserId"];
                        $tempLikes = 0;
                    
                        if(isset($_POST["file"])) {
                            $file = $_POST["file"];
                            date_default_timezone_set("America/Vancouver");
                            $date = $date = date("Y-m-d G:i:s");

                            $sql = "INSERT INTO threads (Title, Text, Category, File, Date, UserId, Likes) VALUES (?, ?, ?, ?, ?, ?, ?)";
                            $statement = mysqli_prepare($connection, $sql);

                            $statement -> bind_param("sssssii", $title, $text, $category, $file, $date, $userId, $tempLikes);
                            $statement -> execute();
                        } else {
                            $sql = "INSERT INTO threads (Title, Text, Category, Date, UserId, Likes) VALUES (?, ?, ?, ?, ?, ?)";
                            $statement = mysqli_prepare($connection, $sql);

                            $statement -> bind_param("ssssii", $title, $text, $category, $date, $userId, $tempLikes);
                            $statement -> execute();
                            // $result = $statement -> get_result();
                            // if($row = $result -> fetch_assoc()) {
                            //     echo "<p>Thread titled " . $row["Title"] . "successfully posted</p>";
                            //     header("Refresh: 2; URL = index.php");
                            // } else {
                            //     echo "<p>Could not post thread, try again</p>";
                            //     header("Refresh: 2; URL = createThread.php");
                            // }
                        }
                        echo "<p style='display: block; text-align: center;'>Created post!<p>";
                    } else {
                        echo "<p>FALSE<p>";
                    }
                }
                mysqli_close($connection);
                header("Refresh: 2; URL = index.php");
            }
        ?>

        <footer>
            <span>&copy; COSC 360 - Project READ-IT</span>
        </footer>

    </body>
</html>