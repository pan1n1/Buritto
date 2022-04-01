<?php

$SERVERNAME = ("localhost");
$USERNAME = ( "root");
$PASSWORD = ( "");
$DBNAME = ("DB");

$conn = mysqli_connect($SERVERNAME, $USERNAME, $PASSWORD, $DBNAME);



 
  function error() {
    global $conn;
    //  $mysqli = new mysqli("localhost","my_user","my_password","my_db");
     
    if(isset($conn -> error)){
    echo("Error description: " . $conn -> error);
    }
  }
?>