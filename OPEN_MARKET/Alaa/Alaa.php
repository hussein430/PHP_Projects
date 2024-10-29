<?php
// $Ali = "localhost" ; //host
// $Mohammed = "root" ; //user 
// $Hussein = "" ;      //passowrd



$Alex = mysqli_connect("localhost", "root", "", "Learn");

if (!$Alex) {
    die("Connection failed: " . mysqli_connect_error());
}

?>