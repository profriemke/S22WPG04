<?php
require("../includes/database_include.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sammlung</title>
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
</body>
</html>