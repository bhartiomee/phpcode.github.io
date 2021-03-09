<?php 
    // echo "This is multi-dimesionsalArray.php";

    // $matrix=array(
    //                 array("00","01","02","03"),
    //                 array(10,11,12,13),
    //                 array(20,21,22,23),
    //                 array(30,31,32,33)
    //             );

    // //contents od matrix
    // for ($i=0; $i < count($matrix); $i++) { 
    //     echo var_dump($matrix[$i]);
    //     echo "<br>";
    // }

    // //values in the matrix
    // for ($i=0; $i < count($matrix); $i++) { 
    //     for ($j=0; $j < count($matrix[$i]); $j++) { 
            
    //         echo $matrix[$i][$j];
    //         echo " ";
    //     }
    //     echo "<br>";
    // }

?>

<?php 
    echo "three dimensional array<br>";

    $matrix=array(
                    array
                    (   array(100,200,300,400),
                        array(100,110,120,130),
                        array(200,210,220,230),
                        array(300,310,320,330)
                    ),
                    array
                    (   array(500,600,700,800),
                        array(101,111,112,113),
                        array(120,121,122,123),
                        array(130,131,132,133)
                    ),array
                    (   array(900,100,110,120),
                        array(210,211,212,213),
                        array(220,221,222,223),
                        array(230,231,232,233)
                    )
    );

    

  //values in the matrix
        for ($i=0; $i < count($matrix); $i++) { 
            for ($j=0; $j < count($matrix[$i]); $j++) { 
                for ($k=0; $k < count($matrix[$i][$j]); $k++) { 
                    echo $matrix[$i][$j][$k];
                    echo " ";
                }
                echo "<br>";
            }

        }


?>
