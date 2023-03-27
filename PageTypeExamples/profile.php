<!DOCTYPE html>

<html lang="en">
  <head>

    <title>READ-IT - Profile</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/profile.css"/>
    <?php 
        include "connection.php";
        include "session.php";

    
        if(!isset($_SESSION["username"])){   
          header("Refresh: 0; URL = login.php"); 
      }
    


    ?>
  </head>

  <body>
    <?php
    // get the date created
              $username = $_SESSION["username"];
              $sql = "SELECT DateCreated FROM users WHERE username = '$username'";
              $statement = mysqli_prepare($connection, $sql);
              $statement -> execute();
              $result = $statement -> get_result();
              $row = $result -> fetch_assoc();
              $date_created = date("F d, Y", strtotime($row["DateCreated"]));
            
              /// get the user discription 
              $sql = "SELECT Description FROM users WHERE username = '$username'";
              $statementDes = mysqli_prepare($connection, $sql);
              $statementDes -> execute();
              $resultDes = $statementDes -> get_result();
              $rowDes = $resultDes -> fetch_assoc();
              $about_me = $rowDes["Description"];

              // get admin privalages
              $sql = "SELECT IsAdmin FROM users WHERE username = '$username'";
              $statementAdmin = mysqli_prepare($connection, $sql);
              $statementAdmin -> execute();
              $resultAdmin = $statementAdmin -> get_result();
              $rowAdmin = $resultAdmin -> fetch_assoc();
              $isadmin = $rowAdmin["IsAdmin"];
            ?>
            <?php
              if(isset($_POST["description"])) {
                $newAboutMe = trim($_POST["description"]);
                $sql = "UPDATE users SET Description = '$newAboutMe' WHERE username = '$username'";
                $statement = mysqli_prepare($connection, $sql);
                $statement -> execute();
                header("Refresh: 0; URL = profile.php");
              }
            ?>
            <script>
              function editProfile() {
                document.getElementById("About-Me").style.display = "none";
                document.getElementById("editProfile").style.display = "none";
                document.getElementById("Update-About-Me").style.display = "block";
              }
            </script>



        <header id="masthead">
            <h1><a href="index.php">
                READ-IT
            </a></h1>

            <?php
            if(isset($_SESSION["username"])) {
                echo "<div id='logout'><a href='logout.php'>Logout</a></div><div id='user-profile-image'><a href='profile.php'>";
                echo "</a></div>";                        
            } else {
                echo "<div id='login'><a href='Login.php'>Login</a></div><div id='signup'><a href='signUp.php'>Sign Up</a></div>"; 
            }
            ?>


        </header>

        <div id="breadcrumb" style="margin-top: 1em; margin-left: 1em;">
            <a href="index.php">Home</a> -> <span style="text-decoration: underline;">Profile</span>
        </div>

        <div id="main">
            <div id="post">
                <div class="InternalNav"> <!-- example post -->
                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <a class="navbar-brand" href="#">MyPosts</a>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                          <ul class="navbar-nav mr-auto">
                            <li class="nav-item active">
                              <a class="nav-link" href="#">Recent <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" href="#">Oldest</a>
                            </li>
                          </ul>
                          <form class="form-inline my-2 my-lg-0">
                            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
                          </form>
                        </div>
                      </nav>
                </div>

                <div id="Posts-By-User">
                <ul class="list-group">
                    <li id = "title-groups" class="list-group-item disabled"><?php echo  $username ?> Posts: </li>
                    <li class="list-group-item list-group-item-action">Number of Users: 50</li>
                    <!-- <?php 

                    // $sql = "SELECT Title Date FROM threads WHERE user_id = (SELECT id FROM users WHERE username = '$username')";
                    // $statement = mysqli_prepare($connection, $sql);
                    // $statement -> execute();
                    // $result = $statement -> get_result();
                    // while($row = $result -> fetch_assoc()) {
                    //     $count ++;
                    //     echo  "<li class='list-group-item list-group-item-action'> TITLE: ".$row['Title']. "Date Created". $row['Date'] ."</li>";
                    // }   

                    ?> -->

                    
                </ul>
                </div>
            </div>

            <div id="poster-info">
                <section id="poster-profile">
                    <div id="poster-profile-image">
                        <a href="#"> <!-- link to poster's profile page -->
                            <img src=""> 
                        </a>
                    </div>
                   <?php echo "<p id='poster-username'>".$username."</a>" ?>
                </section>


                <section id="poster-description">
                <p ><b>About Me:</b></p>
                 <?php if($about_me == NULL || $about_me == ""){
                  echo "<p id='About-Me'>This user has not added an about me section yet.</p>";
                 }else{
                  echo "<p id='About-Me'>". $about_me ."</p>" ;
                 }
                  ?>
                      
                    <form id="Update-About-Me" style = "display: none" method="post" >
                       <?php echo "<textarea class='form-control' id='description' name='description' rows='3'>". $about_me .  "</textarea>" ?>
                        <input id= "updateProfile" class="btn btn-primary" type="submit" value = "Update Profile" >
                    </form> 
                
                   <?php echo "<p id='Account-Created'><b>Account created:</b><br>". $date_created ."</p>" ;?>
                </section>

                <section id="New-Post">

                    <form class = "New-Post" > 
                        <input id= "Newpost" class="btn btn-primary " type="submit" value="New Thread">
                    </form>

                    <div id = "update" style = "display: inline; "> 
                   <input id= "editProfile" class="btn btn-primary " onclick= "editProfile()" value=" Edit Profile" style="width: 10em;">
                  </div>
                </section>
                <section id = "isadmin"> 

                  <?php
                  if ($isadmin == 1){
                  ?>
                  <form action="Admin.php">
                  <input id= "adminButton" class="btn btn-danger " type= "submit" value=" Admin Page" style="width: 10em;">
                  </form>
                  <?php
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
