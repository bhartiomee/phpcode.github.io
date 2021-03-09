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
        echo "<br>Connection was successful";
    }

    //variables to be inserted
    $name="Rudra";
    $destination="America";
    $age=10;
    
    $sql="INSERT INTO `firstTable` (`name`, `dest`, `age`) VALUES ('$name', '$destination', '$age')";

    $result=mysqli_query($conn,$sql);

    //check data insertion success
    if($result){
        echo "<br>Record inserted successfully";
    }
    else{
        echo "<br>Insertion failed due to--->".mysqli_error($conn);
    }
?>