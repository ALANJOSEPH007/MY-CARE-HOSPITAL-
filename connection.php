<?php

    $database= new mysqli("localhost","root","","mchos");
    if ($database->connect_error){
        die("Connection failed:  ".$database->connect_error);
    }

?>