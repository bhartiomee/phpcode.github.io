<?php   
    echo "This is sql.php";

    //Connecting to the database
    $servername="localhost";
    $username="root";
    $passowrd="";
    
    //Create a connection
    $conn=mysqli_connect($servername,$username,$passowrd);

    //die if connection failed
    if(!$conn){
        die("<br>failed to connect"); //try this after giving a pswrd on line 7
    }
    else{
        echo "<br>Connection was successful";
    }
?>
