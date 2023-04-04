<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>READ-IT - Dashboard</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="css/index.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <?php 
            //session_start();
            include "connection.php";

            // include "dp.php"; 
            include "session.php";
            // $search = $_GET["search"];
            global $connection;

            // if(isset($_SESSION["username"])) {
            //     $username = $_SESSION["username"];
            //     $sql = "SELECT username FROM users WHERE username = ?";
            //     $statement = mysqli_prepare($connection, $sql);
            //     $statement -> bind_param("s", $username);
            //     $statement -> execute();
            //     $result = $statement -> get_result();
            //     if($row = $result -> fetch_assoc()){
            //         // echo "User already logged in!";
            //         // header("Refresh: 5; URL = index.php");
            //     }
            // } else {
            //     // echo "<p>HELLO GUEST</p>";
            // }
        ?>
    </head>


  <body>
        <header id="masthead">
            <h1><a href="index.php">
                READ-IT
            </a></h1>

            <form method="GET" action="search.php" style="display: block; line-height: 5em;">
                <input class="form-control mr-sm-2" id="search" type="search" name="search" placeholder="Search READ-IT..." aria-label="Search" >
            </form>

            <?php
                if(isset($_SESSION["username"])) {
                    echo "<div id='logout'><a href='logout.php'>Logout</a></div><div id='user-profile-image'><a href='profile.php'>";
                    // $username = $_SESSION["username"];
                    // $sql = "SELECT Image FROM users WHERE username = ?";
                    // $statement = mysqli_prepare($connection, $sql);
                    // $statement -> bind_param("s", $username);
                    // $statement -> execute();
                    // $result = $statement -> get_result();
                    // if($row = $result -> fetch_assoc()){
                    //     echo "<img src='" . $row["Image"] . "'>";
                    // }
                    // else {
                    //     echo "<img src=''>";
                    // }
                    echo "</a></div>";                        
                } else {
                    echo "<div id='login'><a href='Login.php'>Login</a></div><div id='signup'><a href='signUp.php'>Sign Up</a></div>"; 
                }
            ?>
            
        </header>

        <div id="breadcrumb" style="margin-top: 1em; margin-left: 1em;">
            <a href="index.php">Home</a> -> <span style="text-decoration: underline;">Search</span>
        </div>

        <div id="main">
            <?php
                if(isset($_SESSION['username'])){
            ?>

            <nav id="right-sidebar-loggedIn"> <!-- recently viewed posts and create post button -->
                <div id="recent-posts">
                    <p>Recent</p>
                    <ul>
                        <li><a href="#">Recent Post 1</a></li>
                        <li><a href="#">Recent Post 2</a></li>
                        <li><a href="#">Recent Post 3</a></li>
                    </ul>
                </div>
                
                <div id="create-post">
                    <p>Post</p>
                    <button id = "create-post-button"class="btn btn-primary btn-lg" type="button" onclick= "window.location.href='createThread.php'" >Create Thread</button>   
                </div>
            </nav>

            <?php
                }
            ?>

            <?php
                if(!isset($_SESSION['username'])){
             ?>
                <nav id="right-sidebar-loggedOut"> 
                <div id="recent-posts">
                    <p>If you sign in you can:</p>
                    <ul>
                        <li>Create a Post</li>
                        <li>Comment On Posts</li>
                        <li>Customize Your Profile</li>
                    </ul>
                </div>
                
                 <div id="create-post">
                    <p>Post</p>
                    <button id = "create-post-button"class="btn btn-primary btn-lg"  disabled>Create Thread</button>
                </div> 
            </nav>
            <?php
                }
            ?>


           <div id="posts"> 

           <!-- main dashboard content -->
           <!-- <form method="GET" action="#">
                <select name="sort" id="sort" onchange="this.form.submit();">
                    <option value="Most Recent" <?php if(isset($_GET['sort'])) { if($_GET['sort'] == 'Most Recent') { ?>selected="true" <?php }}; ?>>Most Recent</option>
                    <option value="Most Popular" <?php if(isset($_GET['sort'])) { if($_GET['sort'] == 'Most Popular') { ?>selected="true" <?php }}; ?>>Most Popular</option>
                    <option value="Sports" <?php if(isset($_GET['sort'])) { if($_GET['sort'] == 'Sports') { ?>selected="true" <?php }}; ?>>Sports</option>
                    <option value="Film" <?php if(isset($_GET['sort'])) { if($_GET['sort'] == 'Film') { ?>selected="true" <?php }}; ?>>Film</option>
                    <option value="Music" <?php if(isset($_GET['sort'])) { if($_GET['sort'] == 'Music') { ?>selected="true" <?php }}; ?>>Music</option>
                    <option value="Travel" <?php if(isset($_GET['sort'])) { if($_GET['sort'] == 'Travel') { ?>selected="true" <?php }}; ?>>Travel</option>
                    <option value="Science" <?php if(isset($_GET['sort'])) { if($_GET['sort'] == 'Science') { ?>selected="true" <?php }}; ?>>Science</option>
                    <option value="Art" <?php if(isset($_GET['sort'])) { if($_GET['sort'] == 'Art') { ?>selected="true" <?php }}; ?>>Art</option>
                    <option value="Health" <?php if(isset($_GET['sort'])) { if($_GET['sort'] == 'Health') { ?>selected="true" <?php }}; ?>>Health</option>
                    <option value="Food" <?php if(isset($_GET['sort'])) { if($_GET['sort'] == 'Food') { ?>selected="true" <?php }}; ?>>Food</option>
                    <option value="Career" <?php if(isset($_GET['sort'])) { if($_GET['sort'] == 'Career') { ?>selected="true" <?php }}; ?>>Career</option>
                </select>
            </form> -->
            
                <div id="threadsBox">
                    <?php

                    // if(isset($_GET["sort"])) {
                    //     $category = $_GET["sort"];
                    //     $sql = "SELECT * FROM threads WHERE Category = ?";
                    //     if ($category == "Most Recent") {
                    //         $sql = "SELECT * FROM threads ORDER BY Date DESC"; 
                    //         $statement = mysqli_prepare($connection, $sql);
                    //         $statement -> execute();
                    //         $result = $statement -> get_result(); 
                    //     } else if ($category == "Most Popular") {
                    //         $sql = "SELECT * FROM threads ORDER BY Likes DESC"; 
                    //         $statement = mysqli_prepare($connection, $sql);
                    //         $statement -> execute();
                    //         $result = $statement -> get_result(); 
                    //     } else {
                    //         $statement = mysqli_prepare($connection, $sql);
                    //         $statement -> bind_param("s", $category);
                    //         $statement -> execute();
                    //         $result = $statement -> get_result();
                    //     }
                    //     $numPosts = 0;
                    //     while($row = $result -> fetch_assoc()) {
                    //        $numPosts++;
                    //        $date = date("F j, Y g:i:s A", strtotime($row["Date"]));
                    //         echo "<a href='post.php?post=" . $row['ThreadId'] . "'><div class='post-container'><h3>" . $row["Title"] . "</h3><article class='post-content'>" . $row["Text"] . "</article><div style='float: left; margin-top: 1em; margin-left: 1em;'>" . $date . "</div><div style='float: right; margin-top: 1em; margin-right: 2em;'>" . $row["Likes"] . " Likes</div></div></a>";
                    //         // echo "<a href='post.php'><div class='post-container'><div class='post-profile-image'><a href='#'><img src=''></a></div><h3>" . $row["Title"] . "</h3><article class='post-content'></article></div></a>";
                    //     }
                    //     if($numPosts == 0) {
                    //         echo "<div style='margin-top: 5em;'><p>No posts!</p></div>";
                    //     }
                    //     mysqli_close($connection);
                    //     // die("Closed connection");
                    // } else {
                    //     $sql = "SELECT * FROM threads ORDER BY Date DESC";
                    //     $statement = mysqli_prepare($connection, $sql);
                    //     $statement -> execute();
                    //     $result = $statement -> get_result();
                    //     $numPosts = 0;
                    //     while($row = $result -> fetch_assoc()) {
                    //        $numPosts++;
                    //        $date = date("F j, Y g:i:s A", strtotime($row["Date"]));
                    //         echo "<a href='post.php?post=" . $row['ThreadId'] . "'><div class='post-container'><h3>" . $row["Title"] . "</h3><article class='post-content'>" . $row["Text"] . "</article><div style='float: left; margin-top: 1em; margin-left: 1em;'>" . $date . "</div><div style='float: right; margin-top: 1em; margin-right: 2em;'>" . $row["Likes"] . " Likes</div></div></a>";
                    //     }
                    //     if($numPosts == 0) {
                    //         echo "<div style='margin-top: 5em;'>No posts!</div>";
                    //     }

                    // }


                    if(isset($_GET["search"])) {
                        $search = $_GET["search"];
                        $search = "%$search%";
                        $sql = "SELECT * FROM threads WHERE Title LIKE ? OR Text LIKE ?";
                        $statement = mysqli_prepare($connection, $sql);
                        $statement -> bind_param("ss", $search, $search);
                        $statement -> execute();
                        $result = $statement -> get_result();
                        while($row = $result -> fetch_assoc()) {
                            // if(isset($_GET["sort"])) {
                            //     $category = $_GET["sort"];
                            //     $search = "%$search%";
                            //     $sql = "SELECT * FROM threads WHERE (Title LIKE ? OR Text LIKE ?) AND Category = ?";
                            //     if ($category == "Most Recent") {
                            //         $sql = "SELECT * FROM threads WHERE Title LIKE ? OR Text LIKE ? ORDER BY Date DESC"; 
                            //         $statement = mysqli_prepare($connection, $sql);
                            //         $statement -> bind_param("ss", $search, $search);
                            //         $statement -> execute();
                            //         $result = $statement -> get_result(); 
                            //     } else if ($category == "Most Popular") {
                            //         $sql = "SELECT * FROM threads WHERE Title LIKE ? OR Text LIKE ? ORDER BY Likes DESC"; 
                            //         $statement = mysqli_prepare($connection, $sql);
                            //         $statement -> bind_param("ss", $search, $search);
                            //         $statement -> execute();
                            //         $result = $statement -> get_result(); 
                            //     } else {
                            //         $statement = mysqli_prepare($connection, $sql);
                            //         $statement -> bind_param("sss", $search, $search, $category);
                            //         $statement -> execute();
                            //         $result = $statement -> get_result();
                            //     }
                            //     $numPosts = 0;
                            //     while($row = $result -> fetch_assoc()) {
                            //     $numPosts++;
                            //     $date = date("F j, Y g:i:s A", strtotime($row["Date"]));
                            //         echo "<a href='post.php?post=" . $row['ThreadId'] . "'><div class='post-container'><h3>" . $row["Title"] . "</h3><article class='post-content'>" . $row["Text"] . "</article><div style='float: left; margin-top: 1em; margin-left: 1em;'>" . $date . "</div><div style='float: right; margin-top: 1em; margin-right: 2em;'>" . $row["Likes"] . " Likes</div></div></a>";
                            //         // echo "<a href='post.php'><div class='post-container'><div class='post-profile-image'><a href='#'><img src=''></a></div><h3>" . $row["Title"] . "</h3><article class='post-content'></article></div></a>";
                            //     }
                            //     if($numPosts == 0) {
                            //         echo "<div style='margin-top: 5em;'><p>No posts!</p></div>";
                            //     }
                            //     mysqli_close($connection);
                            //     // die("Closed connection");

                            // } else {
                                $date = date("F j, Y g:i:s A", strtotime($row["Date"]));
                                echo "<a href='post.php?post=" . $row['ThreadId'] . "'>
                                <div class='post-container'><h3>" . $row["Title"] . "</h3>
                                <article class='post-content'>" . $row["Text"] . "</article>
                                <div class='date'>" . $date . "</div>
                                <div class='likes'>" . $row["Likes"] . " Likes</div></div></a>";
                            }
                        } else {
                            echo "<p>No posts!</p>";
                        }
                    // }
                    ?>
                </div>
            </div>
        </div>

        <footer>
            <span>&copy; COSC 360 - Project READ-IT</span>
        </footer>
      </body>
</html>
