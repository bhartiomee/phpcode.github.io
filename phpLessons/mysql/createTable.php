<?php   
    echo "This is sql.php";

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

    //create a table
    $sql="CREATE TABLE `phpTable` ( `sno` INT NOT NULL AUTO_INCREMENT , `name` VARCHAR(11) NOT NULL ,
        `dest` VARCHAR(11) NOT NULL , `age` INT NOT NULL ,
        PRIMARY KEY (`sno`))" ;

    $result=mysqli_query($conn,$sql);


    //check for table creation success
    if($result){
        echo "<br> table created successfully";
    }
    else{
        echo "<br>Table creation failed ".mysqli_error($conn);
    }


     
?>