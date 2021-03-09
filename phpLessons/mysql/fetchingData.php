<?php
    // echo "This is display data.php";


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

    $sql="SELECT * FROM `firstTable` ";
    $result=mysqli_query($conn,$sql);

    //find the number of records return

    $num= mysqli_num_rows($result);
    echo "No of rows returned are:- $num <br>";

    if($num>0){
        // $row=mysqli_fetch_assoc($result);
        // echo var_dump($row);
        // echo "<br>";

        // $row=mysqli_fetch_assoc($result);
        // echo var_dump($row);
        // echo "<br>";

        // $row=mysqli_fetch_assoc($result);
        // echo var_dump($row);
        // echo "<br>";

        // $row=mysqli_fetch_assoc($result);
        // echo var_dump($row);
        // echo "<br>";

        // $row=mysqli_fetch_assoc($result);
        // echo var_dump($row);

        //better way to fetch with whileloop

        while($row=mysqli_fetch_assoc($result)){
            // echo var_dump($row);
            echo $row['sno'].".Hello!My name is ".$row['name']." and my age is ".$row['age'].
            " my dream destination is ".$row['dest']."<br>";
            echo "<br>";

        }
    }
    

?>

<?php

    // //USAGE OF WHERE CLAUSE TO FTETCH DATA FROM DATABASE
    // $sql="SELECT * FROM `firstTable` WHERE `dest`='Ranchi' ";
    // $result=mysqli_query($conn,$sql);

    // //find the number of records return

    // $num= mysqli_num_rows($result);
    // echo "<br>No of rows returned are:- $num <br>";
    // $no=1;
    // if($num>0){
    //     while($row=mysqli_fetch_assoc($result)){
    //         // echo var_dump($row);
    //         // echo $row['sno']."Hello!My name is ".$row['name']." and my age is ".$row['age'].
    //         // " my dream destination is ".$row['dest'];

    //         echo $no.".Hello!My name is ".$row['name']." and my age is ".$row['age'].
    //         " my dream destination is ".$row['dest'];
    //         echo "<br>";
    //         $no=$no+1;

    //     }
    // }
?>