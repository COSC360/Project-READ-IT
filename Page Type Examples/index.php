<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>READ-IT - Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/index.css">
    <?php 
        //session_start();
        include "connection.php";
        include "dp.php"; 
        include "session.php";

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

            <input id="search" type="text" placeholder="Search READ-IT...">

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
                <!-- <select name="sort" id="sort">
                    <option value="recent">Most Recent</option>
                    <option value="popular">Most Popular</option>
                </select>
            
                <div class="post-container"> 
                    <div class="post-profile-image">
                        <a href="#"> // link to user profile page
                            <img src=""> 
                        </a>
                    </div>

                    <h3>Post Title</h3>

                    <article class="post-content">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam at velit nec nisl feugiat convallis id at neque. Maecenas convallis eleifend nisl, at ultricies tellus bibendum ac. Morbi in eros efficitur, efficitur sapien a, egestas mauris. Proin eu diam a mauris egestas iaculis sed sit amet urna. In sit amet ultrices lacus, at accumsan massa. Sed sed commodo justo, sed fermentum sapien. Phasellus venenatis tempor arcu a faucibus. Suspendisse quam sem, maximus ut quam ac, cursus lobortis elit. Mauris feugiat lacus eu efficitur dapibus. Morbi aliquet ligula vestibulum mi commodo, sit amet interdum ipsum dignissim.
                    </article>
                </div>

                <div class="post-container"> 
                    <div class="post-profile-image">
                        <a href="#">
                            <img src="">
                        </a>
                    </div>

                    <h3>Post Title</h3>

                    <article class="post-content">
                        <img src="images/166.jpg">
                        orem ipsum dolor sit amet, consectetur adipiscing elit. Nam at velit nec nisl feugiat convallis id at neque. Maecenas convallis eleifend nisl, at ultricies tellus bibendum ac. Morbi in eros efficitur, efficitur sapien a, egestas mauris
                    </article>
                </div> -->
            </div>
        </div>

        <footer>
            <span>&copy; COSC 360 - Team Luca + Fareeha</span>
        </footer>

      </body>
</html>