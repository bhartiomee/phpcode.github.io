<?php 
    // echo "This is array.php <br>";

    $friends = array("rohan", "shubham", "skillf", "Larry");
        echo "<br>";
        echo $friends[0];
        echo "<br>";
        echo $friends[1];
        echo "<br>";
        echo $friends[2];
        echo "<br>";
        echo $friends[3];
        echo "<br>";


        //assocaitive array

        $favCol=array('rohan'=>'violet','shubham'=>'indigo','skillf'=>'orange','Larry'=>'red',1=>'one');

        echo "Favourite color of rohan is ".$favCol['rohan']."<br>";
        echo "1 is spelld as ".$favCol[1]."<br>";

        foreach ($favCol as $key => $value) {
            echo "Favorite color of $key is $value  <br>";
        }
?>