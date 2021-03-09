<?php

    // what is sessions?
    // It is used to manage information across different pages

    session_start();
    $_SESSION['username']="Omee";
    $_SESSION['favCat']="Books";

    echo "We have saved your sessions";


?>