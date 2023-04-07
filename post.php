<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>READ-IT - Post</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/post.css">
    <?php 
        include "connection.php";
        include "session.php";
        $threadId = $_GET["post"];
        global $connection;
        
         

            $usernameID = $_SESSION["username"];
            $sql = "SELECT IsAdmin FROM users WHERE username = '$usernameID'";
              $statementAdmin = mysqli_prepare($connection, $sql);
              $statementAdmin -> execute();
              $resultAdmin = $statementAdmin -> get_result();
              $rowAdmin = $resultAdmin -> fetch_assoc();
              $isadmin = $rowAdmin["IsAdmin"];
              if($isadmin == 0){
                $ISUSERADMIN = false;
              }else {
                $ISUSERADMIN = true;
              }
            
       

    ?>

    <?php
        if(isset($_POST['DeletePost'])){
        $sqlDeletePost = "DELETE FROM threads WHERE threadId = ?";
        $statementuB = mysqli_prepare($connection, $sqlDeletePost);
        mysqli_stmt_bind_param($statementuB, 'i', $threadId);
        mysqli_stmt_execute($statementuB);
        mysqli_stmt_close($statementuB);
        header("Refresh: 0;index.php");
        }

    if(isset($_POST['DeletComment'])){
        $comId = $_POST['DeletComment'];
        $sqlDeleteBanned = "DELETE FROM comments WHERE CommentId = ?";
        $statementuB = mysqli_prepare($connection, $sqlDeleteBanned);
        mysqli_stmt_bind_param($statementuB, 'i', $comId);
        mysqli_stmt_execute($statementuB);
        mysqli_stmt_close($statementuB);
        echo $_POST['DeletComment'];
        }
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

        <!-- <div id="breadcrumb" style="margin-top: 1em; margin-left: 1em;">
            <a href="index.php">Home</a> -> <span style="text-decoration: underline;">Post</span>
        </div> -->

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Post</li>
            </ol>
        </nav>

        <div id="main">
            <div id="post">
                <div class="container-md post-container " > <!-- example post -->
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
                    $dateCreated = date("F j, Y g:i:s A", strtotime($row["Date"]));
                    echo "
                    <div class='date'>" . $dateCreated . "</div>
                    <div class='likes'>" . $row["Likes"] . " Likes</div>";
                    ?>
                </div>

                <div id="comment-section">
                    <?php 
                            if(isset($_SESSION["username"])) {
                                $username = $_SESSION["username"];
                                echo "<div id='add-comment'><form id='post-comment' method='POST' action='#'><textarea name='add-comment' placeholder='Add a comment...'></textarea><input type='submit' value='Post'></form></div>";
                    
                                if(isset($_POST["add-comment"])) {
                                $isValid = true;
                                $addComment = trim($_POST["add-comment"]);
                                    if($addComment == "") {
                                        $isValid = false;
                                        echo "<p>Comment cannot be empty!</p>";
                                    }
                                    if($isValid) {
                                        date_default_timezone_set("America/Vancouver");
                                        $date = date("Y-m-d G:i:s");
                                        $sql = "SELECT UserId FROM users WHERE Username = ?";
                                        $statement = mysqli_prepare($connection, $sql);
                                        $statement -> bind_param("s", $username);
                                        $statement -> execute();
                                        $result0 = $statement -> get_result();
                                        if($row0 = $result0 -> fetch_assoc()) {
                                            $userId = $row0["UserId"];
                                            $sql = "INSERT INTO comments (Comment, ThreadId, UserId, CommentDate) VALUES (?, ?, ?, ?)";
                                            $statement = mysqli_prepare($connection, $sql);
                                            $statement -> bind_param("siis", $addComment, $threadId, $userId, $date);
                                            $statement -> execute(); 
                                        }
                                    }
                                }
                            } else {
                                
                            }
                    ?>

                    <div id="comments">
                        <?php
                            $sql = "SELECT * FROM comments WHERE ThreadId = ? ORDER BY CommentDate DESC";
                            $statement = mysqli_prepare($connection, $sql);
                            $statement -> bind_param("i", $threadId);
                            $statement -> execute();
                            $result2 = $statement -> get_result();
                            while($row2 = $result2 -> fetch_assoc()) {
                                $comment = $row2["Comment"];
                                $commentDate = date("F j, Y g:i:s A", strtotime($row2["CommentDate"]));
                                $userId = $row2["UserId"];
                                $sql = "SELECT Username, comments.CommentId AS comID FROM users LEFT JOIN comments ON users.UserId = comments.UserId WHERE comments.UserId = ?";
                                $statement = mysqli_prepare($connection, $sql);
                                $statement -> bind_param("i", $userId);
                                $statement -> execute();
                                $result3 = $statement -> get_result();
                                if($row3 = $result3 -> fetch_assoc()) {
                                     if($ISUSERADMIN){
                                        echo "<div class='comment'><p class='comment-username' style='border: none; margin-bottom: 0; padding: 0; padding-left: 1em; padding-bottom: 0.25em; background-color: unset; color: #472183'>" . $row3["Username"] . "<br>" . $commentDate . "</p><p>" . $comment . "</p><form method= 'POST'> <button class='btn btn-danger btn-sm' id= 'delete-post' name ='DeletComment' type = 'submit' value ='".$row3['comID']."'>Delete Comment </button></form></div>";
                                        }else
                                         echo "<div class='comment'><p class='comment-username' style='border: none; margin-bottom: 0; padding: 0; padding-left: 1em; padding-bottom: 0.25em; background-color: unset; color: #472183'>" . $row3["Username"] . "<br>" . $commentDate . "</p><p>" . $comment . "</p></div>";
                                }
                            }
                        ?>

                        <!-- <div class="comment">
                            <div id="comment-profile-image">
                                <a href="#">
                                    <img src="">
                                </a>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. CurLorem ipsum dolor sit amet, consectetur adipiscing elit. CurLorem ipsum dolor sit amet, consectetur adipiscing elit. CurLorem ipsum dolor sit amet, consectetur adipiscing elit. Cur</p>
                            <div id="vertical-line"></div>
                        </div>

                        <div class="comment">
                            <div id="comment-profile-image">
                                <a href="#">
                                    <img src="">
                                </a>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            <div id="vertical-line"></div>
                        </div> -->
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
                        $result4 = $statement -> get_result();
                        if($row4 = $result4 -> fetch_assoc()) {
                            if (isset($row3["Image"])) {
                                // echo "<div id='poster-profile-image'><a href='#'> <!-- link to poster's profile page --><img src='" . $row["Image"] . "'></a></div>";
                            }
                            echo "<a href='#' id='poster-username'>" . $row4["Username"] . "</a>";
                    ?>

                </section>
                <section id="poster-description">
                    <b>Description</b><br>
                    <!-- This user doesn't exist yet :) -->
                    <?php
                            echo $row4["Description"];
                    ?>
                </section>
                <section id="account-created">
                    <b>Account created:</b><br>
                    <!-- July 17, 2023 -->
                    <?php
                            echo date("F j, Y", strtotime($row4["DateCreated"]))."<br>";
                        }
                    ?>
                    <b style = "">Last Online:</b><br>
                    <?php
                            echo date("F j, Y", strtotime($row4["LastOnline"]));
                        
                    ?>
                </section>
                <div id= "delete-post">

                        <?php  if($ISUSERADMIN){
                        echo"<form method='POST'> <button class='btn btn-danger btn-lg' id= 'delete-post' name ='DeletePost' type = 'submit' value ='".$threadId."'>Delete Post </button></form>"; 
                        }
                        ?>

                </div>
               
            </div>
                
            </div>
           
            

        <footer>
            <span>&copy; COSC 360 - Project READ-IT</span>
        </footer>

      </body>
</html>