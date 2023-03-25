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
    ?>
  </head>

  <body>
        <header id="masthead">
            <h1>READ-IT</h1>
        </header>

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
                    <div class="PostDatabase">
                       <div class="Post-Information">
                        <p class = "Post-Title-Database">Title: </p><br> <br>
                        <p class = "Post-Text-Database">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut dapibus felis risus, sit amet vestibulum urna placerat quis. Aenean at tortor viverra, elementum lectus sit amet, ornare mauris. Phasellus venenatis purus at vehicula interdum. Nam faci</p>
                        <p class = "Post-Date_Dataabse"> 00/00/00</p>
                       </div> 
                       <div class="Post-Information">
                        <p class = "Post-Title-Database">Title: </p><br> <br>
                        <p class = "Post-Text-Database">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut dapibus felis risus, sit amet vestibulum urna placerat quis. Aenean at tortor viverra, elementum lectus sit amet, ornare mauris. Phasellus venenatis purus at vehicula interdum. Nam faci</p>
                        <p class = "Post-Date_Dataabse"> 00/00/00</p>
                       </div> 
                       <div class="Post-Information">
                        <p class = "Post-Title-Database">Title: </p><br> <br>
                        <p class = "Post-Text-Database">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut dapibus felis risus, sit amet vestibulum urna placerat quis. Aenean at tortor viverra, elementum lectus sit amet, ornare mauris. Phasellus venenatis purus at vehicula interdum. Nam faci</p>
                        <p class = "Post-Date_Dataabse"> 00/00/00</p>
                       </div> 
                       <div class="Post-Information">
                        <p class = "Post-Title-Database">Title: </p><br> <br>
                        <p class = "Post-Text-Database">orci eros vitae neque. Morbi ac turpis magna. Maecenas magna nulla, sagittis non diam sed, scelerisque efficitur metus. Nam a urna dapibus, maximus ante id, volutpat elit. Fusce vestibulum sapien nec nibh tincidunt molestie. Mauris aliquet molestie convallis. Nam sit amet porta velit. Nulla ornare quis justo quis pellentesque.</p>
                        <p class = "Post-Date_Dataabse"> 00/00/00</p>
                       </div> 
                       <div class="Post-Information">
                        <p class = "Post-Title-Database">Title: </p><br> <br>
                        <p class = "Post-Text-Database">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut dapibus felis risus, sit amet vestibulum urna placerat quis. Aenean at tortor viverra, elementum lectus sit amet, ornare mauris. Phasellus venenatis purus at vehicula interdum. Nam faci</p>
                        <p class = "Post-Date_Dataabse"> 00/00/00</p>
                       </div> 
                       <div class="Post-Information">
                        <p class = "Post-Title-Database">Title: </p><br> <br>
                        <p class = "Post-Text-Database">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut dapibus felis risus, sit amet vestibulum urna placerat quis. Aenean at tortor viverra, elementum lectus sit amet, ornare mauris. Phasellus venenatis purus at vehicula interdum. Nam faci</p>
                        <p class = "Post-Date_Dataabse"> 00/00/00</p>
                       </div> 
                    </div>
                </div>
            </div>

            <div id="poster-info">
                <section id="poster-profile">
                    <div id="poster-profile-image">
                        <a href="#"> <!-- link to poster's profile page -->
                            <img src=""> <!-- add profile picture of poster -->
                        </a>
                    </div>
                    <a href="#" id="poster-username">Username</a>
                </section>
                <section id="poster-description">
                    <form id="Update-About-Me">
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        <input id= "updateProfile" class="btn btn-primary " type="submit" value="Submit">
                    </form>
                    <p id="Account-Created"> <b>Account created:</b><br>July 17, 2023</p>
                </section>
                <section id="New-Post">
                    <form class = "New-Post"> 
                        <input id= "Newpost" class="btn btn-primary " type="submit" value="NewPost">
                    </form>
                </section>
            </div>
        </div>

        <footer>
            <span>&copy; COSC 360 - Team Luca + Fareeha</span>
        </footer>

      </body>
</html>