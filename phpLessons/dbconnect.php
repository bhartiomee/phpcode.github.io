<?php
    
    //Connecting to the database
    $servername="localhost";
    $username="root";
    $passowrd="";
    $database="dbOmee";
    
    //Create a connection
    $conn=mysqli_connect($servername,$username,$passowrd,$database);


    //die if connection failed
    if (!$conn){
        die("<br>failed to connect".mysqli_connect_error()); //try this after giving a pswrd on line 7
    }
    else{
        echo "<br>Connection was successful<br>";
    }
?>