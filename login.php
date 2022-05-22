<?php
    $loggedIn = false;
    $showError = false;
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        require "./partial/_dbconnect.php";
        $username = $_POST["username"];
        $password = $_POST["password"];   


        $exists = false;
        $sql = "SELECT * FROM `users` WHERE uname ='$username' AND pass ='$password'";
        $result = mysqli_query($conn,$sql);
        $num = mysqli_num_rows($result);

        if($num == 1){
            $login = true;
            session_start();
            $_SESSION['username'] = $username;
            $_SESSION['loggedIn'] = true;
            header("location: welcome.php");

        }else{
            $showError = "Invalid Credentials!";
        }
    }
?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Login In!</title>
</head>

<body>
    <?php
    require "./partial/_nav.php";
    ?>

    <?php
        if($loggedIn){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>LoggedIn!</strong>Logged In successfully!.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>';
        }

        if($showError){
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> '. $showError .'    .
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>';
            }
    ?>
    
    

    <div class="container my-5">
        <div class="container text-center">

            <h1>Log In to Your Allsafe Account</h1>
        </div>
        <form action="/loginsystem/login.php" method="post">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp" placeholder="Enter username">

            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-primary">Log In</button>
        </form>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>