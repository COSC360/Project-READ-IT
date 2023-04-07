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
      $usernameID = $_SESSION["username"];
      $sql = "SELECT IsAdmin FROM users WHERE username = '$usernameID'";
        $statementAdmin = mysqli_prepare($connection, $sql);
        $statementAdmin -> execute();
        $resultAdmin = $statementAdmin -> get_result();
        $rowAdmin = $resultAdmin -> fetch_assoc();
        $isadmin = $rowAdmin["IsAdmin"];
        if($isadmin == 0){
          header("Refresh: 0; URL = index.php"); 
        }

    ?>
    



  </head>

  <body>
    <?php
    // get the date created
        
            $username = $_GET["profile"];
            $sql = "SELECT * FROM users WHERE username = ?";
            $statement = mysqli_prepare($connection, $sql);
            $statement -> bind_param("s", $username);
            $statement -> execute();
            $result = $statement -> get_result();
            $row = $result -> fetch_assoc();
            $date_created = date("F j, Y", strtotime($row["DateCreated"]));
            $about_me = $row["Description"];
            $isadmin = $row["IsAdmin"];
            $last_login = date("F j, Y", strtotime($row["LastOnline"]));

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
        <?php 
        if(isset($_POST['DeleteThread'])){
          $ThreadId = $_POST['DeleteThread'];
      //Delete threadId from table Threads
                  $sqlDelete = "DELETE FROM threads WHERE ThreadId = ?";
                  $statementD = mysqli_prepare($connection, $sqlDelete);
                  mysqli_stmt_bind_param($statementD, 'i', $ThreadId);
                  mysqli_stmt_execute($statementD);
                  mysqli_stmt_close($statementD);
                $success = "Thread has been Deleted";

  }
              if (!empty($success)) {
                  ?>
                      <div class="alert alert-success" style="position:flex;">
                      <strong>Success!</strong>
                      <?= $success ?>
                      </div>

                  <?php
              }

        ?>

        <ol class="breadcrumb" style="background: transparent; !important;">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">Profile</li>
        </ol>

        <div id="main">
            <div id="post">
                <div class="InternalNav"> <!-- example post -->
                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <a class="navbar-brand" href="#">MyPosts</a>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                          <ul class="navbar-nav mr-auto">
                          <form method = "GET">
                            <select id="inputState" name = "sort" class="form-control" onchange="this.form.submit();">
                              <option value="Most Recent" <?php if(isset($_GET['sort'])) { if($_GET['sort'] == 'Most Recent') { ?>selected="true" <?php }}; ?>>Recent</option>
                              <option value= "Oldest" <?php if(isset($_GET['sort'])) { if($_GET['sort'] == 'Oldest') { ?>selected="true" <?php }}; ?>>Oldest</option>
                              <option value="Most Popular" <?php if(isset($_GET['sort'])) { if($_GET['sort'] == 'Most Popular') { ?>selected="true" <?php }}; ?>>Popular</option>
                           </select>
                           </form>
                            <form class="form-inline">
                            <input class="form-control texfiled" name = "search" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-light search" type="submit">Search</button>
                            </form>
                      
                        </div>
                      </nav>
                </div>

                <div id="Posts-By-User">
                <ul class="list-group">
                    <li id = "title-groups" class="list-group-item disabled " style= "background-color: #472183; color: white;"><?php echo  $username ?> Posts: </li>
                    
                     <?php 
                     //getID
                        $sqlUID = "SELECT UserId FROM users WHERE username = '$username'";
                        $statementUID = mysqli_prepare($connection, $sqlUID);
                        $statementUID -> execute();
                        $resultUID = $statementUID -> get_result();
                        $rowUID = $resultUID -> fetch_assoc();
                        $UID = $rowUID['UserId'];
                        //get threads
                        if(isset($_GET["sort"])){
                        $Option = $_GET["sort"];
                        if($Option == "Most Recent"){
                        $sql = "SELECT * FROM threads where threads.UserId = $UID Order BY threads.Date DESC ";
                        $statement = mysqli_prepare($connection, $sql);
                        $statement -> execute();
                        $result = $statement -> get_result();
                        }else if($Option == "Oldest"){
                        $sql = "SELECT * FROM threads where threads.UserId = $UID Order BY threads.Date ASC ";
                        $statement = mysqli_prepare($connection, $sql);
                        $statement -> execute();
                        $result = $statement -> get_result();
                        }else if($Option == "Most Popular"){
                          $sql = "SELECT * FROM threads where threads.UserId = $UID ORDER BY Likes DESC"; 
                          $statement = mysqli_prepare($connection, $sql);
                          $statement -> execute();
                          $result = $statement -> get_result(); 
                        }
                        }else if (isset($_GET["search"])){
                          $search = $_GET["search"];
                          $search = $_GET["search"];
                          $search = "%$search%";
                          $sql = "SELECT * FROM threads WHERE Title LIKE ? OR Text LIKE ?";
                          $statement = mysqli_prepare($connection, $sql);
                          $statement -> bind_param("ss", $search, $search);
                          $statement -> execute();
                          $result = $statement -> get_result();
                        }
                        else{
                          $sql = "SELECT * FROM threads where threads.UserId = $UID Order BY threads.Date DESC ";
                          $statement = mysqli_prepare($connection, $sql);
                          $statement -> execute();
                          $result = $statement -> get_result();
                        }
                        if($result -> num_rows == 0){
                            echo  "<li class='list-group-item list-group-item-action'> No Threads Made </li>";
                        }else {
                            $count =0; 
                            while($row = $result -> fetch_assoc()) {
                                $count++;
                            echo   "<a href='post.php?post=" . $row['ThreadId'] . "' style = 'margin-bottom: 0; color: none;'><ul class='list-group-item list-group-item-action' > <li id= 'ThreadTitle'>" . $row['Title'] ."</li> <li id= 'ThreadDate'>". $row['Date']. "</li> <li> Likes: " . $row['Likes'] ." <form method ='post' name ='UnbanUser' style = 'display: block'> <button class='btn btn-danger btn-sm '  id = 'deleteThread' name ='DeleteThread' type = 'submit'  value ='".$row['ThreadId']."'>Delete </button> </form></li><li style = 'visibility: hidden'>PlaceHoder </li><li style = 'visibility: hidden'>PlaceHoder </li> </ul></a>"; 
                            }   
                        } 
                      

                    ?>
                    
                   


                    
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
                   <?php echo "<p id='Last-Login'><b>Last LoggedIn:</b><br>". $last_login ."</p>" ;?>
                </section>

                <section id="New-Post">

                    <form class = "New-Post" > 
                        <input id= "Newpost" class="btn btn-primary " value="New Thread " onclick= "window.location.href='createThread.php'" style="cursor: pointer;">
                    </form>

                    <div id = "update" style = "display: inline; "> 
                   <input id= "editProfile" class="btn btn-primary " onclick= "editProfile()" value=" Edit Profile" style="width: 10em; cursor: pointer;" >
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
