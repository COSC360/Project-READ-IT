<?php
    include "connection.php";
    // include "dp.php"; 
    include "session.php";
    
            if(isset($_GET["sort"])) {
                $category = $_GET["sort"];
                $sql = "SELECT * FROM threads WHERE Category = ?";
                if ($category == "Most Recent") {
                    $sql = "SELECT * FROM threads ORDER BY Date DESC"; 
                    $statement = mysqli_prepare($connection, $sql);
                    $statement -> execute();
                    $result = $statement -> get_result(); 
                } else if ($category == "Most Popular") {
                    $sql = "SELECT * FROM threads ORDER BY Likes DESC"; 
                    $statement = mysqli_prepare($connection, $sql);
                    $statement -> execute();
                    $result = $statement -> get_result(); 
                } else {
                    $statement = mysqli_prepare($connection, $sql);
                    $statement -> bind_param("s", $category);
                    $statement -> execute();
                    $result = $statement -> get_result();
                }
                $numPosts = 0;
                while($row = $result -> fetch_assoc()) {
                   $numPosts++;
                   $posts[] = array(
                        'ThreadId' => $row['ThreadId'],
                        'Title' => $row['Title'],
                        'Text' => $row['Text'],
                        'Likes' => $row['Likes']
                    );
                }
                if($numPosts == 0) {
                    echo "<div style='margin-top: 5em;'><p>No posts!</p></div>";
                }
                mysqli_close($connection);
                // die("Closed connection");
            } else {
                $sql = "SELECT * FROM threads ORDER BY Date ASC";
                $statement = mysqli_prepare($connection, $sql);
                $statement -> execute();
                $result = $statement -> get_result();
                while($row = $result -> fetch_assoc()) {
                    $posts[] = array(
                        'ThreadId' => $row['ThreadId'],
                        'Title' => $row['Title'],
                        'Text' => $row['Text'],
                        'Likes' => $row['Likes']
                    );
                }
            }
            echo json_encode($posts);

            

            ?>
