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
                
                header("Refresh: 0; URL = error.php"); 
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
              <a class="navbar-brand" href="#">READ-IT(BANNED PAGE)</a>
              <ul class="navbar-nav ">
              <li class="nav-item ">
                  <a class="nav-link" href="Admin.php">Admin<span class="sr-only"></span></a>
                </li>
                <!-- <li class="nav-item ">
                  <a class="nav-link" href="AdminBanned.php">Search<span class="sr-only"></span></a>
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



              if(isset($_POST['banUser'])){
              if(isset($_POST['username']) && isset($_POST['reason'])){
                $isValid = true;
                $usernameBan = trim($_POST['username']);
                $reason = trim($_POST['reason']);
                $date = date("Y-m-d");
                $UserBanId = "";
                $adminId = "";

               
                if($usernameBan == ""){
                    $isValid = false;
                    $error = true;
                    $error_message = "Username cannot be empty";
                }
                if($reason == ""){
                    $isValid = false;
                    $error = true;
                    $error_message = "Reason cannot be empty";
                }
                if($isValid){
                    $sqlUID = "SELECT * FROM users WHERE Username = '$usernameBan'";
                    $statement = mysqli_prepare($connection, $sqlUID);
                    $statement -> execute();
                    $result = $statement -> get_result();
                    $row = $result -> fetch_assoc();
                    $count = $result -> num_rows;
                    if($count == 0){
                        $isValid = false;
                        $error = true;
                        $error_message = "User does not exist";
                    }else{
                        $UserBanId = $row["UserId"];
                    }
                }

                if($isValid){
                    $sqlAdID = "SELECT * FROM users WHERE Username = '$adminUser'";
                    $statement = mysqli_prepare($connection, $sqlAdID);
                    $statement -> execute();
                    $result = $statement -> get_result();
                    $row = $result -> fetch_assoc();
                    $count = $result -> num_rows;
                    if($count == 0){
                        $isValid = false;
                        $error = true;
                        $error_message = "User does not exist";
                    }else{
                        $adminId = $row["UserId"];
                    }
                }


                if($isValid){

                    $sqlBANN = "INSERT INTO Banned (UserId, AdminUserId, Reason, DateBanned) VALUES ('$UserBanId', '$adminId' , '$reason', '$date')";
                    $statementToBan = mysqli_prepare($connection, $sqlBANN);
                    $statementToBan -> execute();
                    $sqlUpdpateUsers = "UPDATE users SET IsBanned = 1 WHERE UserId = '$UserBanId'";
                    $statementuu = mysqli_prepare($connection, $sqlUpdpateUsers);
                    $statementuu -> execute();
                    $success = "User has been banned";
                    //header("Refresh: 1; URL = Admin.php");  
                }


                }elseif (isset($_POST['username']) && !isset($_POST['reason'])){
                    $isValid = false;
                    $error = true;
                    $error_message = "Reason cannot be empty";

                }elseif (!isset($_POST['username']) && isset($_POST['reason'])){
                    $isValid = false;
                    $error = true;
                    $error_message = "Username cannot be empty";
                }
            }
            if(isset($_POST['cancelBan'])){
               $warning = "Ban has been cancelled";
            }

       

        if(isset($_POST['UnBan'])){
            $userUnban = $_POST['UnBan'];
            //change banned to 0 in users 
            $sqlUnUsers = "UPDATE users SET IsBanned = 0 WHERE Username = '$userUnban'";
                    $statementubu = mysqli_prepare($connection, $sqlUnUsers);
                    $statementubu -> execute();
             //get User ID
            $sqlGetUID = "SELECT UserId FROM users WHERE Username = '$userUnban'";
                    $statementu = mysqli_prepare($connection, $sqlGetUID);
                    $statementu -> execute();
                    $resultu = $statementu -> get_result();
                    $rowu = $resultu -> fetch_assoc();
                    $UserUnbanId = $rowu["UserId"];
            // Delete from Banned table
                    // Step 1: Prepare the SQL query with a placeholder
                        $sqlDeleteBanned = "DELETE FROM Banned WHERE UserId = ?";
                        $statementuB = mysqli_prepare($connection, $sqlDeleteBanned);
                        mysqli_stmt_bind_param($statementuB, 'i', $UserUnbanId);
                        mysqli_stmt_execute($statementuB);
                        mysqli_stmt_close($statementuB);
                    $success = "User has been Unbanned";

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
            <li class="breadcrumb-item " aria-current="page">AdminBanned</li>
        </ol>


    <div id = "main"> 
        <div class="column-left"> 
                <ul class="list-group">
                <li id = "title-groups" class="list-group-item disabled">Banned Users:
                </li>

                <li id ="Banned-Users-List" class="list-group-item list-group-item-action">
                    <form class="form-inline">
                    <input class="form-control" name = "search" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-light search" type="submit">Search</button>
                    </form>
                    <ul class="list-group-item list-group-item-action">
                            
                            <?php 

                                    if (isset($_GET["search"])){
                                        $search = $_GET["search"];
                                        $search = "%$search%";
                                        $sql = "SELECT * FROM users JOIN Banned WHERE users.Username LIKE ? and users.UserId = Banned.UserId";
                                        $statement = mysqli_prepare($connection, $sql);
                                        $statement -> bind_param("s", $search);
                                        $statement -> execute();
                                        $result = $statement -> get_result();
                                       while($row = $result -> fetch_assoc()){
                                        echo  "<ul class='list-group-item list-group-item-action'> <li> Name: " . $row['Username'] ."</li> <li> Reason: " . $row['Reason'] ."</li> <li> Date:". $row['DateBanned'] ." <form method ='post' name ='UnbanUser' style = 'display: block'> <button class='btn btn-danger btn-sm'  name ='UnBan' type = 'submit' value ='".$row['Username']."'>Unban </button> </form></li> <li style = 'visibility: hidden'>PlaceHoder </li> </ul>";
                                       }

                                    }else{
                                    $sql = "SELECT * FROM users Join Banned where users.UserId = Banned.UserId";
                                    $statement = mysqli_prepare($connection, $sql);
                                    $statement -> execute();
                                    $result = $statement -> get_result();
                                    
                                    
                                    if($result -> num_rows == 0){
                                        echo  "<li class='list-group-item list-group-item-action'> No Users Banned</li>";
                                    }else {
                                        $count =0; 
                                        while($row = $result -> fetch_assoc()) {
                                            $count++;
                                            echo  "<ul class='list-group-item list-group-item-action'> <li> Name: " . $row['Username'] ."</li> <li> Reason: " . $row['Reason'] ."</li> <li> Date:". $row['DateBanned'] ." <form method ='post' name ='UnbanUser' style = 'display: block'> <button class='btn btn-danger btn-sm'  name ='UnBan' type = 'submit' value ='".$row['Username']."'>Unban </button> </form></li> <li style = 'visibility: hidden'>PlaceHoder </li> </ul>"; 
                                        }   
                                    }
                                }

                                    ?>
                            

                      
                </li>
                    
                  </ul>

        </div>






        <div class="column-right"> 

            <ul class="list-group">
                <li id = "title-groups" class="list-group-item disabled">Banned Users Terminal</li>
                <li class="list-group-item list-group-item-action">
                    <form  id = BanUse method = "post"> 
                    <label class ="labelText" for="Username" name ="username"> Username:</label><br>
                    <input type="text" class="form-control" name ="username" aria-label="Small" aria-describedby="inputGroup-sizing-sm"><br>
                    <label class ="labelText" for="reason" name = "reason"> Reason:</label><br>
                    <input type="text" class="form-control" id="reason" name = "reason"><br>
                    <div id =subButton> 
                        <h5 id ="question" style="display: none">Are you sure you wanna ban this user</h5>
                        <button class="btn btn-primary btn-lg" type="submit" name = "banUser" id="banUser"  style="display: none">Ban User</button>
                        <button class="btn btn-danger btn-lg"  name = "cancelBan"
                        id="cancelBan" style="display: none; margin-right: 1em;" onclick ="GetOtherButton()">Cancel</button>
                    </div>
                 </form>
                    <div id =subButton> 
                        <button class="btn btn-danger btn-lg"  id="banAdvance" onclick='GetBanButton()'>BAN</button>
                    </div>

                </li>
                <script> 
                    function GetBanButton(){
                        document.getElementById("banUser").style.display = "block";
                        document.getElementById("cancelBan").style.display = "block";
                        document.getElementById("banAdvance").style.display = "none";
                        document.getElementById("question").style.display = "block";
                    }
                    function GetOtherButton(){
                        document.getElementById("banUser").style.display = "none";
                        document.getElementById("cancelBan").style.display = "none";
                        document.getElementById("banAdvance").style.display = "block";
                        document.getElementById("question").style.display = "none";
                    }
                </script>

              </ul>
        </div>
    </div>
    
</body>
</html>