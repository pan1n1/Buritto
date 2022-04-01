<?php

    ob_start();
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "db";

    try {

        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 

        $sql = "DELETE FROM burrito WHERE id=:id";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);

        if (!isset($_GET['id'])) {
            header("Location: ./index/php");
            exit();
        }

        $id = $_GET['id'];
        $stmt->execute();

    }   catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
           
    }
    header("Location: ./read.php");
    $conn = NULL

    
?>