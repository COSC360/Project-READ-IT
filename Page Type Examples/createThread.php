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

        <br>
        <div id="new-thread-title">
            New Thread
        </div>
        <br>

        <form action="" method="POST">
            <input type="text" placeholder="Title">
            <textarea placeholder="Type text here..." maxlength="1000"></textarea>
            <label for="category" style="color: #472183; font-weight: bold;">Category: </label>
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
            <input id="file-upload" type="file" name="file" accept="image/*, video/*"></label>
            <input type="submit" name="submit" value="Post Thread">
        </form>

        <footer>
            <span>&copy; COSC 360 - Project READ-IT</span>
        </footer>

    </body>
</html>