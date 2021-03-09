<?php
    // echo "This is variable.php";

    //---VARIABLES----
    $name="Omee"; //vriables and case sensitive..name and Name will be treated differently
    $income=50000;

    echo "This is $name and her income is Rs. $income ";
    echo " This is $name and her <br> income is Rs. $income";

?>

<?php 
    //rules for creating variables
    // 1.Starts with a $sign
    // 2.Cannot start with a number
    // 3.Must start with a letter or an underscore character
    // 4.Can only contain alphanumeric characters and underscores
    // 5.Variables in php are Case sensitive. ($harry, $hArry and $Harry are different)
?>

<?php 
    //Data Types:-
        /*
        1. String
        2. Integer
        3. Float
        4. Boolean
        5. Object
        6. Array
        7. NULL
        */


    // String - sequence of characters
        $name = "Harry";
        $friend = 'Rohan';
        echo "$name ka friend is $friend";


    // Integer - Non decimal number
        $income = 455;
        $debts = -655;
        echo "<br>";
        echo $income;
        echo "<br>";
        echo $debts;
        echo "<br>";

    // Float - Decimal point number
        $income = 344.5;
        $debts = -45.5;
        echo $income;
        echo "<br>";
        echo $debts;
        echo "<br>";

    // Boolean - Can be either true or false
        $x = true;
        $is_friend = false;
        echo var_dump($x);
        echo "<br>";
        echo var_dump($is_friend); //var_dump will return the dataType with value.eg:-bool(false)
        echo "<br>";

    // Object - Instances of classes
    // Employee is a class ---> harry can be one object

    // Array - Used to store multiple values in a single variable
        $friends = array("rohan", "shubham", "skillf", "Larry");
        echo var_dump($friends);
        echo "<br>";
        echo $friends[0];
        echo "<br>";
        echo $friends[1];
        echo "<br>";
        echo $friends[2];
        echo "<br>";
        echo $friends[3];
        echo "<br>";
    //echo $friends[4]; // will throw an error as the size of array is 4

    // NULL
        $name = NULL;
        echo var_dump($name);
?>
