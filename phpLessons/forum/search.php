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
.container {
    min-height: 100vh;
}
</style>

<body>
    <?php
     require 'partials/_headers.php';
   ?>
    <?php require 'partials/_dbconnect.php'; ?>



    <!-- -----SEARCH RESULTS STARTS HERE---------------- -->
    <div class="container">
        <div class="search my-3 mx-3">
            <h1>Search results for <b><i>"<?php echo $_GET['search'] ?>"</i></b></h1>
        </div>
        <?php

            $noresults=true;
            $query=$_GET['search'];
            $sql="SELECT * FROM `thread` WHERE MATCH (thread_title,thread_desc) AGAINST('$query')";
            $result=mysqli_query($conn,$sql);
            while($row=mysqli_fetch_assoc($result)){
                $thread_title=$row['thread_title'];
                $thread_desc=$row['thread_desc'];
                $thread_id=$row['thread_id'];
                $url="thread.php?threadid=".$thread_id;
                $noresults=false; 
                
                echo '<div class="results my-3 mx-3">
                    
                    <h3><a class="text-info" href="'.$url.'">'.$thread_title.'</a></h3>
                    <p>'.$thread_desc.'</p>
                </div>';
            }
                if($noresults){
                    echo '<div class="container">
                        <div class="message mb-2">
                            Your search -<b>'.$query.'</b>- did not match any threads.
            
                            <p>
                                Suggestions:
                                <ul>
                                    <li> Make sure that all words are spelled correctly.</li>
                                    <li>Try different keywords.</li>
                                    <li>Try more general keywords.</li>
                                </ul>
                            </p>
            
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