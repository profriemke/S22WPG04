<?php
require("../../database_include.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profil</title>
</head>
<p> Profilbild; Steckbrief </p>
<p> Name; Benutzername; E-Mail; Passwort ändern </p>
<?php
require("../includes/navbar_include.php");

if (isset($_SESSION['ID'])){
    $ID=$_SESSION['ID'];
    $statement = $pdo->prepare("SELECT * from Nutzer WHERE ID=$ID");
    if($statement->execute()){
        while($row=$statement->fetch()){
            echo $row["Vorname"];
            echo "<a href='change.php?id=".$ID."'> Ändern</a>";
            echo"<br>";
            echo $row["Nachname"];
            echo"<br>";
            echo $row["Geburtsdatum"];
        }

    }else{
        die("Datenbank-Fehler");}
    }else
        {echo "Bitte erst <a href='login.php'>registrieren</a>";
        }


?>
</body>
</html>