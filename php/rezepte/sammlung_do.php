<?php
require("../includes/database_include.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sammlung</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/style.css">
</head>
<body>
<?php
require("../includes/navbar_include.php");

if (isset($_SESSION['id'])){
    $nutzer_id = $_SESSION['id'];
    if (!isset($_POST["id"]))
            {die("Fehler im Formular");}

    else{$statement = $pdo->prepare("INSERT INTO Sammlung (nutzer_id, rezept_id) VALUES ($nutzer_id,?)");
            if ($statement->execute(array(htmlspecialchars($_POST["id"]))))
                {echo "erfolgreich zur Sammlung hinzugefügt";}
            else
                {echo $statement->errorInfo()[2];
                 die("Datenbank-Fehler");}
        }
}else
    {die("Bitte erst <a href='../nutzer_management/login.php'>anmelden</a><br>Zurück zur <a href='../oeffentliche_seiten/index.php'>Startseite </a>");}
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

<footer>
    <?php
    require("../includes/footer_include.php");
    ?>
</footer>
</body>
</html>