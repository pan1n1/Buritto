<?php
    var_dump($_POST);

    ob_start();
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "DB";

    
    try {

        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
        
        $sql = "UPDATE Burrito SET buritoformaat = :buritoformaat, saus = :saus, Bonen = :Bonen, Rijst = :Rijst WHERE id = :id;"; 

        $stmt = $conn->prepare($sql);

        //pulled de vars
        $id = $_POST["submit"];
        $buritoformaat = $_POST["buritoformaat"];
        $saus = $_POST["Saus"];
        $Bonen = $_POST["Bonen"];
        $Rijst = $_POST["Rijst"];


        //bind de vars and de querry
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':buritoformaat', $buritoformaat);
        $stmt->bindParam(':saus', $saus);
        $stmt->bindParam(':Bonen', $Bonen);
        $stmt->bindParam(':Rijst', $Rijst);


    

        //exectute de line
        $stmt->execute();

    }   catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
           
    }
    header("Location: ./read.php");
    $conn = NULL
?>
