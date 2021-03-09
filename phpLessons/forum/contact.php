<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Contact</title>
</head>

<body>
<style>
.container {
    min-height: 81vh;
}
</style>
    <?php
        require'partials/_headers.php';
    ?>

  <!-- CODE FOR DATABASE   -->
    
  <?php
  
       $showAlert=false;
        require 'partials/_dbconnect.php';
        $method=$_SERVER['REQUEST_METHOD'];
        if($method="POST"){
            
            $email=$_POST['email'];
            $phone=$_POST['phone'];
            $message=$_POST['message'];

            $sql = "INSERT INTO `contacts` (`email`, `phone`, `message`,`tStamp`) VALUES ('$email', '$phone', '$message' ,CURRENT_TIMESTAMP)";
            $result = mysqli_query($conn, $sql);
            $showAlert = true;
        }
    

        if($showAlert){
            echo'<div class="alert alert-success alert-dismissible fade show  mb-0" role="alert">
                <strong>Success!</strong>Message sent.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>';
        }
   ?>





<!-- FORM STARTS HERE -->
    <?php

    if(isset($_SESSION['loggedin']) &&( $_SESSION['loggedin']=true)){
       echo '<div class="container mx-7 my-4" >
                <h1 class="text-center my-2 text-info">Contact Us</h1>
                <form method="post" action="'.$_SERVER["REQUEST_URI"].' ">
                    <div class="form-group my-4">
                        <label for="email">Email address</label>
                        <input aria-required="" type="email" class="form-control" id="contactEmail" name="email" placeholder="name@example.com" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone number</label>
                        <input aria-required="" type="number" class="form-control" id="contactEmail" name="phone">
                    </div>
                
                    <div class="form-group">
                        <label for="Query">Message</label>
                        <textarea aria-required="" class="form-control" id="Textarea1" name="message" rows="3" ></textarea>
                    </div>
                    <button type="submit" class="btn btn-info text-center">Submit</button>
                </form>

            </div>';
    }
    else{
        echo '<div class="container my-2">
                <h1 class="text-center my-2 text-info">Contact Us</h1>
                <div class="card text-dark bg-info w-75">
                    <div class="card-body">
                    <h5 class="card-title">Login to send us message.</h5>
                    <button type="button" class="btn btn-outline-dark ml-2" data-toggle="modal" data-target="#loginModal">Login</button>
                    </div>
                </div>
        </div>';
    }
    ?>


















    <?php
        require'partials/_footer.php';
    ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>
</body>

</html>