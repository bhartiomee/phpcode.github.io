<?php
    $showAlert = false;
    $showError=false;
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        include 'partials/_dbconnect.php';
        $username = $_POST["username"];
        $password = $_POST["password"];
        $cpassword = $_POST["cpassword"];

        //chekc whether username exist or not
        $existsSql="SELECT * FROM `users` WHERE username ='$username'";
        $result = mysqli_query($conn,$existsSql);
        $existsRow=mysqli_num_rows($result);
        if($existsRow >0){
            // $exists=true;
            $showError="Username already exists.";
             
        }
        else
        {
            // $exists=false;
            if($password == $cpassword)
            {
                $hash=password_hash($password,PASSWORD_DEFAULT);
                $sql = "INSERT INTO `users` ( `username`, `password`, `dt`) 
                VALUES ('$username', '$hash', CURRENT_TIMESTAMP)";
                $result = mysqli_query($conn, $sql);
                if ($result)
                {
                    $showAlert = true;
                }
                
            }
            else
            {
                $showError="Passwords do not match.";
            }
            
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>SignUp</title>
</head>

<body>
 <!-- include _nav.php -->
    <?php
        require 'partials/_nav.php';
    ?>
 <!-- SHOW DISMISSIBLE ALERT -->
    <?php
    if($showAlert){
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Your account is now created and you can login
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">??</span>
        </button>
       </div> ';
    }
    if($showError)
    {
        echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong>' .$showError.'
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">??</span>
            </button>
           </div> ';
    }
    ?>
    <div class="container my-4">
        <h1 class="text-center">Signup to our website</h1>
        <form action="/phpLessons/login _system/signup.php" method="post">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp" maxlength="11" minlength="4">
                <small id="usernameHelpInline" class="text-muted">
                 Must be 4-11 characters long.
                </small>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password"  minlength="4" maxlength="23">
                <small id="usernameHelpInline" class="text-muted">
                 Must be 4-23 characters long.
                </small>
            </div>
            <div class="form-group">
                <label for="cpassword">Confirm Password</label>
                <input type="password" class="form-control" id="cpassword" name="cpassword">
                <small id="emailHelp" class="form-text text-muted">Make sure to type the same password</small>
            </div>
            
            <button type="submit" class="btn btn-primary">SignUp</button>
        </form>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
        crossorigin="anonymous"></script>
</body>

</html>