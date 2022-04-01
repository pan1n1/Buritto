<?php
    include("./Functions.php");
    ob_start();
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "DB";

    try {
        var_dump($_POST);

        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if(isset($_POST["submit"])) {
            
            $id = NULL;
            $buritoformaat = $_POST["buritoformaat"];
            $saus = $_POST["Saus"];
            $Bonen = $_POST["Bonen"];
            $Rijst = $_POST["Rijst"];




            $stmt = $conn->prepare("INSERT INTO Burrito VALUES (:id, :buritoformaat, :saus, :Bonen, :Rijst)");
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':buritoformaat', $buritoformaat);
            $stmt->bindParam(':saus', $saus);
            $stmt->bindParam(':Bonen', $Bonen);
            $stmt->bindParam(':Rijst', $Rijst);

            //  Insert Row


            $stmt->execute();
            header("Location: ./read.php");
        }
        
    }
    catch(PDOException $e) {
        echo $e->getMessage();
        //header("Location: ./index.php");   
    }
    error();
    $conn = null;
?>