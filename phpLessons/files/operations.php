<?php

    // $fptr=fopen('file.txt','r'); //'r' for read
    // echo var_dump('$fptr');

    // if(!$fptr){
    //     die("Unable to process the data");
    // }
    // // $con=fread($fptr,5);
    // $con=fread($fptr,filesize('file.txt'));

    // echo $con;
    // // fclose($fptr); //to close the file

?>

<?php
    // //fgetc() and fgets()
    // $fptr=fopen('file.txt','r');
    // echo fgets($fptr); //reads one line at a time and sets the pointer to the next line.
    // echo '<br>';
    // echo fgets($fptr);
    // echo '<br>';
    // echo fgets($fptr);
    // echo '<br>';
    // echo var_dump(fgets($fptr));
    // echo '<br>';
    // echo fgetc($fptr); //reads one charcter of the line where pointer is.
    // echo var_dump(fgetc($fptr));

    // while($a=fgets($fptr)){
    //     echo $a;  
    // }
    // while($b=fgetc($fptr)){
    //     echo $b;
    // }

    // //Q. write a program to print a file till it find a '.'
    // while($b=fgetc($fptr)){
    //     echo $b;
    //     if($b=='.'){
    //     break;
    //     }
    // }

    // //Q. write a program to print a file till it find a 'l'
    // while($b=fgetc($fptr)){
    //     echo $b;
    //     if($b=='l'){
    //     break;
    //     }
    // }


    // fclose($fptr);
?>

<?php
    // //Writing and Appending the files

    // //WRITING
    // $fptr=fopen('file1.txt','w');
    // fwrite($fptr,"A computer is a machine that can be instructed to carry out sequences of arithmetic or logical 
    // operations automatically via computer programming.");
    // fwrite($fptr,"Another line.");

    // readfile('file1.txt');

    // //APPENDING
    $fptr=fopen('file1.txt','a');
    fwrite($fptr,"This is being appended.");
    readfile('file1.txt');




?>