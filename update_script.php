<?php
    ob_start();
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "db";

    
    try {

        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
        
        $sql = "UPDATE pizza SET bodemformaat = :bodemformaat, saus = :saus, topping = :topping, kruiden = :kruiden, WHERE id = :id;"; 

        $stmt = $conn->prepare($sql);

        //pulled de vars
        $bodemformaat = $_POST["bodemformaat"];
        $saus = $_POST["inputGroupSaus"];
        $topping = $_POST["topping"];
        $kruiden = $_POST["kruiden"];
        $id = $_POST["id"];

        //bind de vars and de querry
        $stmt->bindParam(':bodemformaat', $bodemformaat);
        $stmt->bindParam(':saus', $saus);
        $stmt->bindParam(':topping', $topping);
        $stmt->bindParam(':kruiden', $kruiden);
        $stmt->bindParam(':id', $id);

    

        //exectute de line
        $stmt->execute();

    }   catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
           
    }
    $conn = NULL
?>
