<?php
require("../includes/database_include.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>profil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/style.css">
    <meta name="viewport" content="width=device-width">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<?php
require("../includes/navbar_include.php");
?>
<div class="content post" style="text-align: center; width: 70vw;">

    <h2>Persönliche Sammlung</h2><br>

            <?php
            if (isset($_SESSION['id'])){# Überprüfen ob man angemeldet ist
                $statement = $pdo->prepare("DELETE FROM Sammlung WHERE nutzer_id=? AND rezept_id=?"); #Doppelte Abfrage, da nur wenn beides erfüllt das richtige Rezept gelöscht wird
                if ($statement->execute(array(htmlspecialchars($_SESSION["id"]), htmlspecialchars($_GET["id"])))){
                    echo "Rezept erfolgreich gelöscht! Zurück zur <a href='persoenliche_sammlung.php'>persönlichen Sammlung</a>";
                }
                else{
                    echo $statement->errorInfo()[2];
                    echo"Datenbank-Fehler";
                    }


            }else
            {echo "Bitte erst <a href='../nutzer_management/login.php'>anmelden</a>";}

            ?>
        </div>

        <footer>
            <?php
            require("../includes/footer_include.php");
            ?>
        </footer>
</body>
</html>
