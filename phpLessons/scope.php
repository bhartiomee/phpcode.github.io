<?php 
    // echo "This is scope.php";
    $a=98; //global variable
    

    function printValue(){
        //  $a=97; //local variable
         global $a;
         $a=1010;
        echo "<br>The value of your variable is $a";
    }

    //IN PHP THE VALUE OF GLOBAL VARIABLE CAN BE CHANGED BY THE FUNCTION
    echo $a;
    printValue();
    echo "<br>The value of your variable is $a <br>";  //this will give the changed value

    echo var_dump($GLOBALS["a"]);


?>