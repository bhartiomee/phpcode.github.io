<?php 
    // echo "This is stringFunctions.php"

    $name="Omee";
    $string="My name is Omee Bharti";

    echo $name;
    echo "<br>";

    echo "The length of" ." my string is" .strlen($name)."<br>"; //to merge two string we need to write '.'

    echo "$string has ".str_word_count($string)." words<br>";

    echo strrev($string)."<br>"; //revrese the string

    echo "Position of NAME in $string is ".strpos($string,"name")."<br>";

    echo str_replace('Omee','omi',$string)."<br>";

    echo str_repeat($name,6);

    echo "<pre>"; //it allow us to give more than one space
    echo rtrim("  hello world  ");//trims the spaces at right of the string
    echo "<br>";
    echo ltrim("  hello world  ");//trims the spaces at left of the string
    echo "<pre>";





?>