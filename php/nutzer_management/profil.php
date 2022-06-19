<?php
require("../includes/database_include.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<?php
require("../includes/navbar_include.php");
?>
<div class="content post">
<?php
if (isset($_SESSION['id'])){
    $statement = $pdo->prepare("SELECT * from Nutzer WHERE id=:id");
    $statement->bindParam(":id",$_SESSION['id']);
    if($statement->execute()){
        while($row=$statement->fetch()){

            echo "<div class='profilbild'>";
            if($row["bild"]==""){
                echo "<img height='30%' width='30%' src='https://mars.iuk.hdm-stuttgart.de/~ap121//webprojekt_gruppe/profil_bilder/placeholder.png' alt='bild'><br>";
            }else {
                echo "<img height='30%' width='30%' src='https://mars.iuk.hdm-stuttgart.de/~ap121//webprojekt_gruppe/profil_bilder/".$row['bild']."' alt='bild'><br>";}
            echo"<br>";
            echo $row["vorname"]." ".$row["nachname"]."<br>";
            echo "@".$row["username"]."<br>";
            echo "</div>";

            #echo "E-Mail: ".$row["email"]."<br>"."<br>";
            echo "<div class='bio'>";
            echo "Bio: ".$row["bio"];
            echo "</div>";
            echo "<div class='action-button'>";
            echo "<a href='profil_bearbeiten.php?id=".$id."'> Profil bearbeiten</a> <br>";
            echo "</div>";
        }

    }else{
        die("Datenbank-Fehler");}
    }else{
        echo "Bitte erst <a href='login.php'>anmelden</a>";
    }


?>
</div>

    <footer>
        <?php
        require("../includes/footer_include.php");
        ?>
    </footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>