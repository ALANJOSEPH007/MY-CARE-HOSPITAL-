<?php

include("../connection.php");

$id = $_GET['id']; // get id through query string
$app = mysqli_query($database,"UPDATE `leave_tbl` SET `status`='-1' where id = '$id'"); // delete query

if($app)
{
    mysqli_close($database); // Close connection
    header("location:docleave.php"); // redirects to all records page
    exit; 
}
else
{
    echo "Error deleting record"; // display error message if not delete
}
?>