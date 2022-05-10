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
<p> Name; Benutzername; E-Mail; Passwort ändern </p>
<?php
require("../includes/navbar_include.php");
?>
<?php
if (isset($_SESSION['id'])){
    $id=$_SESSION['id'];
    $statement = $pdo->prepare("SELECT * from Nutzer WHERE id=$id");
    if($statement->execute()){
        while($row=$statement->fetch()){
            echo "<a href='change.php?id=".$id."'> Profil bearbeiten</a> <br>";
            if($row["bild"]==""){
                echo "<img height='10%' width='10%' src='../../pictures/placeholder.png'alt='bild'><br>";
            }else {
                echo "<img height='100%' width='100%' src='../pictures/".$row["bild"]."'alt='bild'><br>";}
            echo"<br>";

            echo $row["vorname"]." ".$row["nachname"]."<br>";
            echo "@".$row["username"]."<br>";

            echo "Geburtstdatum: ".$row["geburtsdatum"]."<br>"."<br>";

            echo "Bio: ".$row["bio"];
        }

    }else{
        die("Datenbank-Fehler");}
    }else{
        echo "Bitte erst <a href='login.php'>registrieren</a>";
    }


?>

</body>
</html>