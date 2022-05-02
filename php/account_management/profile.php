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

if (isset($_SESSION['id'])){
    $id=$_SESSION['id'];
    $statement = $pdo->prepare("SELECT * from Nutzer WHERE id=$id");
    if($statement->execute()){
        while($row=$statement->fetch()){
            echo $row["vorname"];
            echo "<a href='change.php?id=".$id."'> Ändern</a>";
            echo"<br>";
            echo $row["nachname"];
            echo "<a href='change.php?id=".$id."'> Ändern</a>";
            echo"<br>";
            echo $row["geburtsdatum"];
            echo "<a href='change.php?id=".$id."'> Ändern</a>";
        }

    }else{
        die("Datenbank-Fehler");}
    }else
        {echo "Bitte erst <a href='login.php'>registrieren</a>";
        }


?>
</body>
</html>