<?php
    // echo "This is update.php";

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

    // //USAGE OF WHERE CLAUSE TO FTETCH DATA FROM DATABASE
    // $sql="SELECT * FROM `firstTable` WHERE `dest`='Ranchi' ";
    // $result=mysqli_query($conn,$sql);

    //USAGE OF WHERE CLAUSE TO UPDATE DATA OF DATABASE
    
      $sql="UPDATE `firstTable` SET `name` = 'Omee' WHERE `firstTable`.`dest` = 'Ranchi'";
      $result=mysqli_query($conn,$sql);  ///returns true or false
      $aff=mysqli_affected_rows($conn);
      echo "<br>No of affected rows--> $aff";

      if($result){
          echo "<br>upadted successfully";
      }
      else{
          echo "<br>Update failed";
      }


?>