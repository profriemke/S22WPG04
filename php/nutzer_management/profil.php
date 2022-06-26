<?php
require("../includes/database_include.php");
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/style.css">
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
            echo "<div style='height: 350px'>";
            if($row["bild"]==""){
                echo "<img class='profilbild' src='https://mars.iuk.hdm-stuttgart.de/~ap121//webprojekt_gruppe/profil_bilder/placeholder.png' alt='bild'><br>";
            }else {
                echo "<img class='profilbild' src='https://mars.iuk.hdm-stuttgart.de/~ap121//webprojekt_gruppe/profil_bilder/".$row['bild']."' alt='bild'><br>";}
            echo
            "
            <div style='display: flex; flex-direction: column'>
            <button class='btn btn-primary' style='background-color: #d17609; border-color:#d17609; margin: 0 0 5px auto'>
                <a href='profil_bearbeiten.php?' style='color:white;'> Profil bearbeiten</a>
            </button>
            <button class='btn btn-primary' style='background-color: #d17609; border-color:#d17609; margin: 0 0 5px auto'>
                <a href='passwort_aendern.php?' style='color:white;'> Passwort ändern</a>
            </button>
            </div>
            </div>
            ";
            echo"<h3>";
            echo $row["vorname"]." ".$row["nachname"]."<br>";
            echo"</h3>";
            echo "@".$row["username"]."<br>";
            echo "<hr>";
            echo "<div class='bio'>";
            echo"<h3>";
            echo "Bio: <br>";
            echo"</h3>";
            echo $row['bio'];
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
</body>
</html>