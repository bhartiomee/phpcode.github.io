<?php 
    // echo "This is date.php"
    $day=date("l D"); //l-->saturday, D--->Sat
    echo "Todays day is $day <br>";

    $date=date("d j"); //d and j are same but d will print 01 02 but j will print 1 2;
    echo "Todays date is $date<br>";

    $day=date("l");
    echo "Todays day is $day <br>";

    $month=date("F");
    echo "Current Month is $month <br>";

    $leap=date("L");
    echo "Is this leap year: $leap <br>";

    $full_Time=date("r");
    echo "Current time is $full_Time <br>";

    $Time=date("g:i");//this will showtime of another time zone
    echo "Current time is $Time <br>";

    //for more see the documentation



?>
<?php
date_default_timezone_set('Asia/Kolkata');  //set the time zone

$dt2=date("Y-m-d H:i:s"); get the correct time.
echo $dt2;

?>