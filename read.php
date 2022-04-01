<?php
    include("./Functions.php");
    include("./connect_db.php");
    ob_start();
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "DB";

    try {

        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare("SELECT id, buritoformaat, saus, Bonen, Rijst FROM Burrito");
        $stmt->execute();

        $result = $stmt->setFetchMode(PDO::FETCH_OBJ);

        $tableRow = "";
        foreach ($stmt->fetchAll() as $key=>$value) {
            $tableRow .= "<tr> 
                            <td>$value->id</td>
                            <td>$value->buritoformaat</td>
                            <td>$value->saus</td>
                            <td>$value->Bonen</td>
                            <td>$value->Rijst</td>
                            
                            <td> <a href='./delete.php?id=" . $value->id . "'><i class='fa-solid fa-x'></i> </a> </td>
                           
                            <td><a href='./update.php?id=" . $value->id . "'><i class='fa-solid fa-edit color'></i></a</td>
                        </tr>";
        }
    } 
    catch(PDOException $e) {
        echo $e->getMessage();
      //  header("Location: ./index.php");   
    }
    $conn = null;

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous">
    <title>Maak je eigen Pizza</title>
  </head>
  <body>
    
    <div class="container">
    <h1><a href="./index.php"> burritos</a></h1>
        <div class="row">
            <div class="col-3"></div>
            <div class="col-3">
                <table class="table my-5">
                    <thead>
                        <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Formaat</th>
                        <th scope="col">Saus</th>
                        <th scope="col">Kruiden</th>
                        <th scope="col">Update</th>
                        <th scope="col">Delete</th>
                        </tr>
                    </thead>
                <tbody>
                    <?php echo $tableRow; ?>
                </tbody>
                </table>

                <?php
        



/*
            $sql = "SELECT * FROM `burrito` order by `id` ";
            $result = mysqli_query($conn, $sql);
            $record = mysqli_fetch_assoc($result);


            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    echo ($row["id"] . " " . $row["name"] . " " . $row["email"] . " " . $row["date"] . " " . $row["timeslot"] . "<br>");
                }
            } else {
                echo "0 results";
            }

/* */
                ?>
            </div>

        </div>
    </div>


    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>