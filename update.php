<?php
    $id = $_GET["id"];
    ob_start();
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "DB";

    try {

        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
        
        $stmt = $conn->prepare("SELECT id, buritoformaat, Saus, Bonen, Rijst FROM pizza WHERE id=:id");

        $stmt->bindParam(':id', $id);
        $stmt->execute();

        $result = $stmt->setFetchMode(PDO::FETCH_OBJ);
        $pizza = $stmt->fetch();

    }   catch(PDOException $e) {
      //  echo $sql . "<br>" . $e->getMessage();
           
    }
    $conn = NULL
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <title>Maak je eigen pizza</title>
  </head>
  <body>
    
  <div class="container">
        <h1 class="text-center mt-2">Update je Burrito</h1>

        <br>
        <form action="update_script.php" method="post">
            <div class="input-group">
                <h5 class="col-12 my-3">Burito Formaat</h5>
                <select class="form-select" id="inputGrote" name="buritoformaat">
                    <option selected>Maak je keuze</option>
                    <option value="20">20 cm</option>
                    <option value="25">25 cm</option>
                    <option value="30">30 cm</option>

                </select>
            </div>  

            <!-- Saus -->
            <div class="input-group">
                <h5 class="col-12 my-3">Saus</h5>
                <select class="form-select" id="inputGroupSaus" name="Saus">
                    <option selected>Maak je keuze</option>
                    <option value="Salsa crudo">Salsa crudo</option>
                    <option value="Salsa verde">Salsa verde</option>
                    <option value="Salsa roja">Salsa roja</option>
                    <option value="Creme fraiche">Creme fraiche</option>
                </select>
            </div>  

            <!-- Bonen -->
            <h5 class="col-12 my-3">Bonen</h5>
               
            <div class="form-check">
                <input class="form-check-input"  name="Bonen" type="radio" value="Kidney Bonen" id="vegan">
                <label class="form-check-label" for="flexRadioDefault1">
                    Kidney Bonen
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input"  name="Bonen" type="radio" value="Zwarte Bonen" id="vegetarisch">
                <label class="form-check-label" for="flexRadioDefault2">
                    Zwarte Bonen
                </label>
            </div>

            <div class="form-check">
                <input class="form-check-input"  name="Bonen" type="radio" value="Bruine Bonen" id="vlees">
                <label class="form-check-label" for="flexRadioDefault3">
                    Bruine Bonen
                </label>
            </div>

            <!-- Rice from ice -->
            <h5 class="col-12 my-3">Rijst</h5>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="Rijst" value="Witte Rijst" id="Witte Rijst">
                <label class="form-check-label" for="flexCheckDefault">
                    Witte Rijst
                </label>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="radio" name="Rijst" value="Zwarte Rijst" id="ZwarteRijst">
                <label class="form-check-label" for="flexCheckChecked">
                    Zwarte Rijst
                </label>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="radio" name="Rijst" value="Bruine Rijst" id="BruineRijst">
                <label class="form-check-label" for="flexCheckChecked">
                    Bruine Rijst
                </label>
            </div>
            

            <button name="submit" type="submit" value="<?php echo($id) ?>" class="btn btn-primary my-3">Submit</button>
            </div>
          
            
        </form>
  </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>