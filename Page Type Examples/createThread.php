<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>READ-IT - New Thread</title>

        <link rel="stylesheet" href="css/createThread.css">
        <?php 
            include "connection.php";
        ?>
    </head>

    <body>
        <header id="masthead">
            <h1><a href="index.php" style="display: block; font-family: Verdana, sans-serif; text-decoration: none; color: white; cursor: pointer;">
                READ-IT
            </a></h1>

            <div id="user-profile-image">
                <a href="profile.php"> <!-- link to user profile page -->
                    <img src=""> <!-- add user profile picture when logged in -->
                </a>
            </div>
        </header>

        <br>
        <div id="new-thread-title" style="display: block; position: relative; text-align: center; font-size: 24px;">
            New Thread
        </div>
        <br>

        <form>
            <input type="text" placeholder="Title">
            <textarea placeholder="Type text here..." maxlength="1000"></textarea>
            <input id="file-upload" type="file" accept="image/*, video/*">
            <input type="submit" value="Post Thread">
        </form>

    </body>
</html>