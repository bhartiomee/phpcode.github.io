<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>e-panel-Coding Forums</title>
</head>
<style>
#ques {
    min-height: 433px;
}
</style>

<body>
    <?php
     require 'partials/_headers.php';
   ?>
    <?php require 'partials/_dbconnect.php'; ?>
    <?php
        $cat_id = $_GET['catid'];//which we pass in the url
        $sql="SELECT * FROM `categories` WHERE category_id='$cat_id'";
        $result=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_assoc($result)){
            $cat_name=$row['category_name'];
            $cat_des=$row['category_description'];

        }
    ?>
    <?php
        $showAlert = false;
        $method = $_SERVER['REQUEST_METHOD'];
        if($method=='POST'){
            // Insert into comment db
            $thread_title=$_POST['title'];
            $thread_desc=$_POST['description'];
            $thread_desc = str_replace("<","&lt;", $thread_desc);
            $thread_desc = str_replace("<","&gt;", $thread_desc);
            $sno=$_POST['sno'];


            $sql = "INSERT INTO `thread` (`thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `timestamp`) VALUES ('$thread_title', '$thread_desc', '$cat_id', '$sno', CURRENT_TIMESTAMP)";

            
            $result = mysqli_query($conn, $sql);
            $showAlert = true;
            if($showAlert){
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Success!</strong> Your thread has been added! Please wait for community to respond
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>';
            } 
        }
    ?>




    <div class="container my-3">
        <div class="jumbotron">
            <h1 class="display-4">Welcome to <?php echo $cat_name ?> forums</h1>
            <p class="lead"><?php echo $cat_des?></p>
            <hr class="my-4">
            <p>Ths is peer to peer forum.No Spam / Advertising / Self-promote in the forums.
                Do not post copyright-infringing material.
                Do not post “offensive” posts, links or images.
                Do not cross post questions.
                Remain respectful of other members at all times.</p>
            <a class="btn btn-info btn-lg" href="#" role="button">Learn more</a>
        </div>
    </div>

    <!-- form -->
    <?php
        if(isset($_SESSION['loggedin']) &&( $_SESSION['loggedin']=true)){
          echo '<div class="container">
                <h1 class="py-2">Start a Discussion</h1>
                <form action="'.$_SERVER["REQUEST_URI"].' " method="POST">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Problem Title</label>
                        <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp">
                        <small id="emailHelp" class="form-text text-muted">Keep your title as short and crisp as
                            possible</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Ellaborate Your Concern</label>
                        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                        <input type="hidden" name="sno" value="'.$_SESSION["sno"].'">
                    </div>
                    <button type="submit" class="btn btn-info mb-2">Submit</button>
                </form>
            </div>';
        }
        else{
            echo '<div class="container my-2">
                    <h1 class="py-2">Start a Discussion</h1>
                    <div class="card text-dark bg-info w-75">
                        <div class="card-body">
                        <h5 class="card-title">Log in to start a discussion.</h5>
                        <button type="button" class="btn btn-outline-dark ml-2" data-toggle="modal" data-target="#loginModal">Login</button>
                        </div>
                    </div>
            </div>';
        }
    ?>

    <div class="container" id="ques">
        <h1>Browse Questions</h1>
        <?php
            
            $cat_id=$_GET['catid']; //which we pass in the url
            $sql="SELECT * FROM `thread` WHERE `thread_cat_id`='$cat_id'";
            $result=mysqli_query($conn,$sql);
            $noResult=true;
            while($row=mysqli_fetch_assoc($result)){
                $noResult=false;
                $thread_title=$row['thread_title'];
                $thread_desc=$row['thread_desc'];
                $thread_id=$row['thread_id'];
                $thread_time=$row['timestamp'];
                $thread_user_id=$row['thread_user_id'];
                $sql2="SELECT username FROM `users` WHERE sno='$thread_user_id'";
                $result2=mysqli_query($conn,$sql2);
                $row2=mysqli_fetch_assoc($result2);
                $thread_user_name=$row2['username'];

                echo '
                <div class="media my-3">
                    <img src="img/two.svg" class="mr-3" alt="..." style="height: 57px; width: 97px;">
                    <div class="media-body">
                        <h5 class="mt-0 my-0"> <a class="text-info" href="thread.php?threadid='.$thread_id.'" target="_blank">
                        '.$thread_title.'</a></h5>
                        '.$thread_desc.'
                    </div>
                    <p class="font-weight-bold my-0">Posted By:- '.$thread_user_name. ', '.$thread_time.'</p>
                </div>';
            }
            if($noResult){
                echo ' <div class="jumbotron jumbotron-fluid">
                            <div class="container">
                            <p class="display-4">No threads founds!</p>
                            <p class="lead"><b> Be the first person to ask a question </b></p>
                            </div>
                        </div>'; 
            }
           
          ?>

    </div>

    <?php
        include 'partials/_footer.php';
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