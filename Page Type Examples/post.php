<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>READ-IT - Post</title>

    <link rel="stylesheet" href="css/post.css">
    <?php 
        include "connection.php";
        include "session.php";
        $threadId = $_GET["post"];
        global $connection;
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

        <div id="main">
            <div id="post">
                <div class="post-container"> <!-- example post -->
                    <article class="post-content">
                        <?php
                            $sql = "SELECT * FROM threads WHERE ThreadId = ?";
                            $statement = mysqli_prepare($connection, $sql);
                            $statement -> bind_param("i", $_GET["post"]);
                            $statement -> execute();
                            $result = $statement -> get_result();
                            if($row = $result -> fetch_assoc()) {
                                echo "<h3>" . $row["Title"] . "</h3>";
                                if (isset($row["File"])) {
                                    // echo "<a href='" . $row["File"] . "'><img src='" . $row["File"] . "'></a>";
                                }
                                echo $row['Text'];
                            }
                        ?>
                    </article>
                    <?php
                    echo "<div style='float: right; margin-top: 1em; margin-right: 2em;'>" . $row["Likes"] . " Likes</div>";
                    ?>
                </div>

                <div id="comment-section">
                    <div id="add-comment">
                        <form id="post-comment">
                            <textarea placeholder="Add a comment..."></textarea>
                            <input type="submit" value="Post">
                        </form>
                    </div>

                    <div id="comments">
                        <div class="comment">
                            <div id="comment-profile-image">
                                <a href="#"> <!-- link to commenter's profile page -->
                                    <img src=""> <!-- add commenter's profile image -->
                                </a>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. CurLorem ipsum dolor sit amet, consectetur adipiscing elit. CurLorem ipsum dolor sit amet, consectetur adipiscing elit. CurLorem ipsum dolor sit amet, consectetur adipiscing elit. Cur</p>
                            <div id="vertical-line"></div>
                        </div>

                        <div class="comment">
                            <div id="comment-profile-image">
                                <a href="#"> <!-- link to commenter's profile page -->
                                    <img src=""> <!-- add commenter's profile image -->
                                </a>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            <div id="vertical-line"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="poster-info">
                <section id="poster-profile">
                    <?php
                        $sql = "SELECT * FROM users LEFT JOIN threads ON users.UserId = threads.UserId WHERE threads.UserId = ?";
                        $statement = mysqli_prepare($connection, $sql);
                        $statement -> bind_param("i", $row["UserId"]);
                        $statement -> execute();
                        $result = $statement -> get_result();
                        if($row = $result -> fetch_assoc()) {
                            if (isset($row["Image"])) {
                                // echo "<div id='poster-profile-image'><a href='#'> <!-- link to poster's profile page --><img src='" . $row["Image"] . "'></a></div>";
                            }
                            echo "<a href='#' id='poster-username'>" . $row["Username"] . "</a>";
                        
                    ?>
                </section>
                <section id="poster-description">
                    <b>Description</b><br>
                    <!-- This user doesn't exist yet :) -->
                    <?php
                            echo $row["Description"];
                    ?>
                </section>
                <section id="account-created">
                    <b>Account created:</b><br>
                    <!-- July 17, 2023 -->
                    <?php
                            echo date("F d, Y", strtotime($row["DateCreated"]));
                        }
                    ?>
                </section>
            </div>
        </div>

        <footer>
            <span>&copy; COSC 360 - Project READ-IT</span>
        </footer>

      </body>
</html>