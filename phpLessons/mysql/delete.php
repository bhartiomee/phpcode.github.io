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
        echo "Connection was successful<br>";
    }

    // $sql="DELETE FROM `firstTable` WHERE `firstTable`.`dest` = 'America' ";
    $sql="DELETE FROM `firstTable` WHERE `firstTable`.`dest` = 'America' LIMIT 10"; //deletes only 10 entries from top
    $result=mysqli_query($conn,$sql);
    $aff=mysqli_affected_rows($conn);
    echo "<br>No of affected rows--> $aff <br>";

    echo var_dump($result);
    if($result){
        echo "Deleted sucessfully";
    }
    else{
        echo "failed";
    }
?>    