<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>READ-IT - Post</title>

    <link rel="stylesheet" href="css/post.css">
    <?php 
        include "connection.php";
    ?>
  </head>

  <body>
        <header id="masthead">
            <h1>READ-IT</h1>
            
            <div id="user-profile-image">
                <a href="#"> <!-- link to user profile page -->
                    <img src=""> <!-- add user profile picture when logged in -->
                </a>
            </div>
        </header>

        <div id="main">
            <div id="post">
                <div class="post-container"> <!-- example post -->
                    <article class="post-content">
                        <h3>Post Title</h3>
                        <a href="#">
                            <img src="images/166.jpg">
                        </a>
                        orem ipsum dolor sit amet, consectetur adipiscing elit. Nam at velit nec nisl feugiat convallis id at neque. Maecenas convallis eleifend nisl, at ultricies tellus bibendum ac. Morbi in eros efficitur, efficitur sapien a, egestas mauris
                    </article>
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
                    <div id="poster-profile-image">
                        <a href="#"> <!-- link to poster's profile page -->
                            <img src=""> <!-- add profile picture of poster -->
                        </a>
                    </div>
                    <a href="#" id="poster-username">Username</a>
                </section>
                <section id="poster-description">
                    <b>Description</b><br>This user doesn't exist yet :)
                </section>
                <section id="account-created">
                    <b>Account created:</b><br>July 17, 2023
                </section>
            </div>
        </div>

        <footer>
            <span>&copy; COSC 360 - Team Luca + Fareeha</span>
        </footer>

      </body>
</html>