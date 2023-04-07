<!DOCTYPE html>
<html lang="en">
<head>
   
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/admin.css"/>
    <?php 
        include "connection.php";
        include "session.php";
            if(!isset($_SESSION["username"])){
                header("Refresh: 0; URL = index.php"); 
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
              }else {
                $adminUser = $_SESSION["username"];
              }
    ?>


    <title>Admin</title>
</head>
<body>

    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
              <a class="navbar-brand" href="#">READ-IT(ADMIN PAGE)</a>
            
              <ul class="navbar-nav ">
                <li class="nav-item ">
                  <a class="nav-link" href="AdminBanned.php">Banned<span class="sr-only"></span></a>
                </li>
                <!-- <li class="nav-item ">
                  <a class="nav-link" href="AdminSearch.php">Search<span class="sr-only"></span></a>
                </li> -->
                <li class="nav-item ">
                  <a class="nav-link" href="index.php">Return Home <span class="sr-only">(current)</span></a>
                </li>
              </ul>
            </div>
          </nav>
    </header>
</nav>

            <?php
              if(isset($_POST["addadmin"])) {

                $isValid = true;
                 $makeAdmin = trim($_POST["addadmin"]);

                if($makeAdmin == ""){
                    $isValid = false;
                    $error = true;
                    $error_message ="Username cannot be empty";
                }
                if($isValid){
                    $sql2 = "SELECT IsAdmin FROM users WHERE Username = '$makeAdmin'";
                    $statementAdmin = mysqli_prepare($connection, $sql2);
                    $statementAdmin -> execute();
                    $resultAdmin = $statementAdmin -> get_result();
                    $rowAdmin = $resultAdmin -> fetch_assoc();
                    $checkStatus = $rowAdmin["IsAdmin"];
                    if($checkStatus == 1){
                        $isValid = false;
                        $error = true;
                        $error_message ="User is already an admin";
                    }
                }

                if($isValid){
                    $sql3 = "UPDATE users SET IsAdmin = 1 WHERE Username = '$makeAdmin'";
                    $statementMakeAdmin = mysqli_prepare($connection, $sql3);
                    $statementMakeAdmin -> execute();
                    $success = "User is now an admin";
                    //header("Refresh: 5; URL = Admin.php");  
                }
               
              }



        
              
        if (!empty($error_message)) {
            ?>
                <div class="alert alert-danger" style="position:flex;">
                <strong>Error!</strong>
                <?= $error_message ?>
                </div>

            <?php
        }
    
        if (!empty($success)) {
            ?>
                <div class="alert alert-success" style="position:flex;">
                <strong>Success!</strong>
                <?= $success ?>
                </div>

            <?php
        }
        
        if (!empty($warning)) {
            ?>
                <div class="alert alert-warning" style="position:flex;">
                <strong>Warning!</strong>
                <?= $warning ?>
                </div>

            <?php
        }
    
        ?>


        
        <ol class="breadcrumb" style="background: transparent; !important;">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item"><a href="profile.php">Profile</a></li>
            <li class="breadcrumb-item " aria-current="page">Admin</li>
        </ol>


    <div id = "main"> 
        <div class="column-left"> 
                <ul class="list-group">
                    <li id = "title-groups-ex" class="list-group-item" >Statistics: 
                    <form method = "GET" style="display:inline-block; width:50%; margin-left: 5%;" >
                            <select id="inputState" name = "sort" class="form-control"  onchange="this.form.submit();">
                              <option value="Admin" <?php if(isset($_GET['sort'])) { if($_GET['sort'] == 'Admin') { ?>selected="true" <?php }}; ?>>AdminUsers</option>
                              <option value= "Website" <?php if(isset($_GET['sort'])) { if($_GET['sort'] == 'Website') { ?>selected="true" <?php }}; ?>>Website</option>
                              <option value="UserStats" <?php if(isset($_GET['sort'])) { if($_GET['sort'] == 'UserStats') { ?>selected="true" <?php }}; ?>>UserStats</option>
                           </select>
                           </form>
                    </li>
                    <li id ="Admin-Users-List" class="list-group-item list-group-item-action">
                        <ul>
                    <?php 
                    if(isset($_GET['sort'])){
                        $Option = $_GET["sort"];
                        if($Option == "Admin"){
                            $sql = "SELECT Username FROM users where IsAdmin = 1";
                            $statement = mysqli_prepare($connection, $sql);
                            $statement -> execute();
                            $result = $statement -> get_result();
                            $count =0;
                            while($row = $result -> fetch_assoc()) {
                                $count ++;
                                echo  "<li class='list-group-item list-group-item-action'>" .$count .": " . $row['Username'] ."</li>";
                            }
                        }else if($Option == "Website"){
                                    //get number of users
                                $sql1 = "SELECT COUNT(*) FROM users";
                                $statement1 = mysqli_prepare($connection, $sql1);
                                $statement1 -> execute();
                                $result1 = $statement1 -> get_result();
                                $row1 = $result1->fetch_assoc();
                                $row_count1 = $row1['COUNT(*)'];
                            //get number of Posts
                                $sql2 = "SELECT COUNT(*) FROM threads";
                                $statement2 = mysqli_prepare($connection, $sql2);
                                $statement2 -> execute();
                                $result2 = $statement2 -> get_result();
                                $row2 = $result2->fetch_assoc();
                                $row_count2 = $row2['COUNT(*)'];
                            //get number of Banned users
                                $sql3 = "SELECT COUNT(*) FROM Banned";
                                $statement3 = mysqli_prepare($connection, $sql3);
                                $statement3 -> execute();
                                $result3 = $statement3 -> get_result();
                                $row3 = $result3->fetch_assoc();
                                $row_count3 = $row3['COUNT(*)'];
                            //get number of users you have banned
                                // find admin id
                                $sql4 = "SELECT * FROM users WHERE Username = '$adminUser'";
                                $statement4 = mysqli_prepare($connection, $sql4);
                                $statement4 -> execute();
                                $result4 = $statement4 -> get_result();
                                $row4 = $result4 -> fetch_assoc();
                                $adminId = $row4["UserId"];

                                // get all baned users by admin id
                                $sql5 = "SELECT COUNT(*) FROM Banned WHERE AdminUserId = '$adminId'";
                                $statement5 = mysqli_prepare($connection, $sql5);
                                $statement5 -> execute();
                                $result5 = $statement5 -> get_result();
                                $row5 = $result5->fetch_assoc();
                                $row_count5 = $row5['COUNT(*)'];

                            echo "<li class=list-group-item list-group-item-action>Number of users: " . $row_count1 . "</li>";
                            echo "<li class=list-group-item list-group-item-action>Number of Threads made: " . $row_count2 . "</li>";
                            echo "<li class=list-group-item list-group-item-action>Number of users banned: " . $row_count3 . "</li>";
                                echo "<li class=list-group-item list-group-item-action>Number of users you have banned: " . $row_count5 . "</li>";
                        }else if($Option == "UserStats"){
                            
                                $sql0 = "SELECT * FROM users ";
                                $statement0 = mysqli_prepare($connection, $sql0);
                                $statement0 -> execute();
                                $result0 = $statement0 -> get_result();
                                while($row0 = $result0 -> fetch_assoc()) {
                                    $userId = $row0["UserId"]; 
                                    $username = $row0["Username"];
                                   
                                    $sql2 = "SELECT COUNT(*) AS Number_Of_Posts, SUM(Likes) AS Num_Likes FROM threads WHERE UserId = ?";
                                    $statement2 = mysqli_prepare($connection, $sql2);
                                    $statement2 -> bind_param("i", $userId);
                                    $statement2 -> execute();
                                    $result2 = $statement2 -> get_result();
                                    $row2 = $result2 -> fetch_assoc();
                                    if($row2['Number_Of_Posts'] ==0){
                                        echo "<ul class='list-group-item list-group-item-action'> <li > Name of users: " . $username. "</li><li> Number of Threads made: " .$row2['Number_Of_Posts']. "</li><li > Number of Likes: N/A</li> </ul>";
                                    }else
                                    echo "<ul class='list-group-item list-group-item-action'> <li > Name of users: " . $username. "</li><li> Number of Threads made: " .$row2['Number_Of_Posts']. "</li><li > Number of Likes: " .$row2['Num_Likes']. "</li> </ul>";

                                }
                                }
                            
                                    //get number of users

                    }else{

                    $sql = "SELECT Username FROM users where IsAdmin = 1";
                    $statement = mysqli_prepare($connection, $sql);
                    $statement -> execute();
                    $result = $statement -> get_result();
                    $count =0;
                    while($row = $result -> fetch_assoc()) {
                        $count ++;
                        echo  "<li class='list-group-item list-group-item-action'>" .$count .": " . $row['Username'] ."</li>";
                    }   
                        }
                    ?>
                        </ul>
                    
                  </ul>

                
        </div>






        <div class="column-right"> 
            <ul class="list-group">


                <li id = "title-groups" class="list-group-item disabled">Add Admin</li>
                <li class="list-group-item list-group-item-action">
                <form  id = "AddAdmin" method="post"> 
                <label class ="labelText" name = "addadmin" for="addadmin"> Username:</label><br>
                <input type="text" class="form-control" name ="addadmin" ><br>
                <div id =subButton> 
                    <button class="btn btn-primary btn-lg" type="submit">Add Admin</button>
                </div>
                </form>

            </ul>
            <ul class="list-group">
                <li id = "title-groups" class="list-group-item disabled">SearchUser</li>
                <ul class="list-group-item list-group-item-action">
                    <form post= "get">
                    <input class="form-control" name = "search" type="search" placeholder="Search" aria-label="Search" style= "display:inline-block; width:50%;">
                    <button class="btn btn-outline-light search" type="submit">Search</button>
                    </form>
                    </ul>
                    <ul class="list-group-item list-group-item-action" style = "height:15em; overflow: scroll;">
                        <?php
                    
                                    if (isset($_GET["search"])){
                                        $search = $_GET["search"];
                                        $search = "%$search%";
                                        $sql = "SELECT * FROM users WHERE Username LIKE ?";
                                        $statement = mysqli_prepare($connection, $sql);
                                        $statement -> bind_param("s", $search);
                                        $statement -> execute();
                                        $result = $statement -> get_result();
                                       while($row = $result -> fetch_assoc()){
                                        echo  "<a href='lookProfile.php?profile=" . $row['Username'] . "'><ul class='list-group-item list-group-item-action'> <li> Name: " . $row['Username'] ."</li> </ul><a>";
                                       }

                                    }else{
                                    $sql = "SELECT * FROM users";
                                    $statement = mysqli_prepare($connection, $sql);
                                    $statement -> execute();
                                    $result = $statement -> get_result();
                                    
                                    
                                    if($result -> num_rows == 0){
                                        echo  "<li class='list-group-item list-group-item-action'> No Users Banned</li>";
                                    }else {
                                        $count =0; 
                                        while($row = $result -> fetch_assoc()) {
                                            $count++;
                                            echo  "<a href='lookProfile.php?profile=" . $row['Username'] . "'><ul class='list-group-item list-group-item-action'> <li> Name: " . $row['Username'] ."</li> </ul><a>";
                                        }   
                                    }
                                }
                                    ?>
                                
                            </ul>

            </ul>
        </div>
    </div>
    
</body>
</html>