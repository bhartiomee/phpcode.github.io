<?php
    // echo "This is include_require.php";

    include 'dbconnect.php';
    // require 'dbconnect1.php';

    // echo include 'dbconnect.php';
    // require 'dbconnect1.php';

    // echo "This is will not be printed if you give wrong file name in REQUIRE"


    $sql="SELECT * FROM `firstTable` ";
    $result=mysqli_query($conn,$sql);
     //find the number of records return

     $num= mysqli_num_rows($result);
     echo "No of rows returned are:- $num <br>";


     while($row=mysqli_fetch_assoc($result)){
        // echo var_dump($row);
        echo $row['sno'].".Hello!My name is ".$row['name']." and my age is ".$row['age'].
        " my dream destination is ".$row['dest']."<br>";
        echo "<br>";

    }

?>