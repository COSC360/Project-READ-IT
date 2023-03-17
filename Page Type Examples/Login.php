<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- BootStrap call-->

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/SignupandLogin.css"/>



    <title>Login</title>
</head>
<body>
    <div id = "SignUpBody">
        <div id="Title">
            Login
        </div>
        <div id = SignUpForm>
            <form  id = form> 
                <label class ="labelText" for="Username"> Username:</label><br>
                <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" required><br>
                <label class ="labelText" for="Password"> Password:</label><br>
                <input type="password" class="form-control" id="inputPassword2" required><br>
                <div id =subButton> 
                    <button class="btn btn-primary btn-lg" type="submit">Login</button>
                </div>
            </form>
        </div>
        <p id =login>Don't Have an Account?&nbsp;<a href="signUp.html">Sign Up</a></p>
    </div>
    
</body>
</html>