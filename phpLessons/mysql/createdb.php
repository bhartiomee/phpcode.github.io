<?php   
    echo "This is sql.php";

    //Connecting to the database
    $servername="localhost";
    $username="root";
    $passowrd="";
    
    //Create a connection
    $conn=mysqli_connect($servername,$username,$passowrd);

    //die if connection failed
    if (!$conn){
        die("<br>failed to connect".mysqli_connect_error()); //try this after giving a pswrd on line 7
    }
    else{
        echo "<br>Connection was successful";
    }

     //create a db

     $sql="CREATE DATABASE dbOmee";
     $result=mysqli_query($conn,$sql);

     //check for the database creation success
     if($result){
         echo "the db was created successfully<br>";
     }
     else
     {
        echo "the db was created successfully<br>".mysqli_error($conn);
     };
     
?>