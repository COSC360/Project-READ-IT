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
                  <a class="nav-link" href="#">Return Home <span class="sr-only">(current)</span></a>
                </li>
              </ul>
            </div>
          </nav>
    </header>
    <div id = "main"> 
        <div class="column-left"> 
                <ul class="list-group">
                    <li id = "title-groups" class="list-group-item disabled">Website Statistics</li>
                    <li class="list-group-item list-group-item-action">Number of Users: 50</li>
                    <li class="list-group-item list-group-item-action">Logged In Users: 25</li>
                    <li class="list-group-item list-group-items-action">Number of Threads made: 500</li>
                    <li class="list-group-item list-group-item-action">Number of users Baned: 30</li>
                    <li class="list-group-item list-group-item-action">Number of Users You Have Banned: 1</li>
                  </ul>
        </div>
        <div class="column-right"> 
            <ul class="list-group">
                <li id = "title-groups" class="list-group-item disabled">Banned Users Terminal</li>
                <li class="list-group-item list-group-item-action">
                    <form  id = BanUser> 
                    <label class ="labelText" for="Username"> Username:</label><br>
                    <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm"><br>
                    <label class ="labelText" for="reason"> Reason:</label><br>
                    <input type="text" class="form-control" id="reason" ><br>
                    <div id =subButton> 
                        <button class="btn btn-danger btn-lg" type="submit">BAN</button>
                    </div>
                 </form>
                </li>
                <li id ="sublist" class="list-group-item list-group-item-action">Banned Users: </li>
                <li id ="Banned-Users-List" class="list-group-item list-group-item-action">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <ul>
                                <li>Name: jack</li>
                                <li>Reason: because I can</li>
                                <li>Date: 00/00/00</li>
                            </ul>
                        </li>
                        <li class="list-group-item list-group-item-action"><ul>
                            <li>Name: Joe</li>
                            <li>Reason: because I can</li>
                            <li>Date: 00/00/00</li>
                        </ul></li>
                        <li class="list-group-item list-group-item-action"><ul>
                            <li>Name: Luca</li>
                            <li>Reason: because I can</li>
                            <li>Date: 00/00/00</li>
                        </ul></li>
                        <li class="list-group-item list-group-items-action"><ul>
                            <li>Name: orvin</li>
                            <li>Reason: because I can</li>
                            <li>Date: 00/00/00</li>
                        </ul></li>
                        <li class="list-group-item list-group-item-action"><ul>
                            <li>Name: Anshul</li>
                            <li>Reason: because I can</li>
                            <li>Date: 00/00/00</li>
                        </ul></li>
                        <li class="list-group-item list-group-item-action"><ul>
                            <li>Name: Fareeha</li>
                            <li>Reason: because I can</li>
                            <li>Date: 00/00/00</li>
                        </ul></li>
                      </ul>
                </li>

              </ul>
        </div>
    </div>
    
</body>
</html>