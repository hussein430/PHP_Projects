<?php
// $Ali = "localhost" ; //host
// $Mohammed = "root" ; //user 
// $Hussein = "" ;      //passowrd



$Alex = mysqli_connect("localhost", "root", "", "Learn");

if (!$Alex) {
    die("Error in the connection: " . mysqli_connect_error());
} else {
    echo "Connection successful!";
}

?>