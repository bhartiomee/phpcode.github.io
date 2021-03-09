<?php
    // echo "This is function.php";

    function processMarks($marks){
        $sum=0;
        foreach ($marks as $key) {
            $sum+=$key;
        }
        return $sum;
    }

    $student=[23,12,90,98,67,58];
    $sumMarks=processMarks($student);
    echo "Total marks is $sumMarks";

?>