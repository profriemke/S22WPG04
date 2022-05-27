<?php
require("../includes/database_include.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>profil</title>
    <link rel="stylesheet" href="../../css/style.css">
    <meta name="viewport" content="width=device-width">
</head>
<body>
<?php
require("../includes/navbar_include.php");
?>
<?php
if (isset($_SESSION['id'])){
    $id=$_SESSION['id'];
    $statement = $pdo->prepare("SELECT * from Nutzer WHERE id=$id");
    if($statement->execute()){
        while($row=$statement->fetch()){
            echo "<a href='profil_bearbeiten.php?id=".$id."'> Profil bearbeiten</a> <br>";
            if($row["bild"]==""){
                echo "<img height='10%' width='10%' src='https://mars.iuk.hdm-stuttgart.de/~ap121//webprojekt_gruppe/profil_bilder/placeholder.png' alt='bild'><br>";
            }else {
                echo "<img height='10%' width='10%' src='https://mars.iuk.hdm-stuttgart.de/~ap121//webprojekt_gruppe/profil_bilder/".$row['bild']."' alt='bild'><br>";}
            echo"<br>";

            echo $row["vorname"]." ".$row["nachname"]."<br>";
            echo "@".$row["username"]."<br>";

            #echo "E-Mail: ".$row["email"]."<br>"."<br>";

            echo "Bio: ".$row["bio"];
        }

    }else{
        die("Datenbank-Fehler");}
    }else{
        echo "Bitte erst <a href='login.php'>anmelden</a>";
    }


?>

</body>
</html>