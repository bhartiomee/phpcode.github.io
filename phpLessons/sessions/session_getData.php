<?php
    //start session
    session_start();
    if(isset($_SESSION['username']))
   { 
       echo "Welcome ".$_SESSION['username'];
        echo "<br>Your fav category is ".$_SESSION['favCat'];
        echo "<br>";
    }
    else{
        echo "Please login to continue";
    }
?>