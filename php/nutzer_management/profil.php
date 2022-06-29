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

<div class="content">

<?php

if (isset($_SESSION['id'])){#Abfrage ob man angemeldet it
    $statement = $pdo->prepare("SELECT * from Nutzer WHERE id=:id");#SQL Abfrage für Nutzerdaten
    $statement->bindParam(":id",$_SESSION['id']);
    if($statement->execute()){
        while($row=$statement->fetch()){#Ausgabe der Nutzerdaten
            echo "<div style='height: 350px'>";
            if($row["bild"]==""){
                echo "<img class='profilbild' src='https://mars.iuk.hdm-stuttgart.de/~ap121//webprojekt_gruppe/profil_bilder/placeholder.png' alt='bild'><br>";#Placeholder Bild falls kein Profilbild angegeben wurde
            }else {
                echo "<img class='profilbild' src='https://mars.iuk.hdm-stuttgart.de/~ap121//webprojekt_gruppe/profil_bilder/".$row['bild']."' alt='bild'><br>";}#Abrufen Profilbild
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
            <hr>
            <h3>";
            echo $row["vorname"]." ".$row["nachname"]."<br>";
            echo"</h3>";
            echo "@".$row["username"];
            echo "<hr>";
            echo "<div class='bio'>";
            echo"<h3> Bio:</h3> <div style='width: 70%; hyphens: auto; text-align: justify'>".$row['bio']."
            </div>
            </div><hr>
            <h3> Meine Rezepte:</h3>";
        }
    }else{
        die("Datenbank-Fehler");}
    }else{
        echo "Bitte erst <a href='login.php'>anmelden</a>";}
    ?>
    <div class="container">
        <div class="row">
            <?php
    #Abfrage der Rezepte, die von dem Nutzer erstellt wurden.
    $statement = $pdo->prepare("SELECT * from Rezepte WHERE nutzer_id=:id"); #SQL Abfrage Rezepte wo die aktuelle Session ID der Ersteller ist
    $statement->bindParam(":id",$_SESSION['id']);
    if($statement->execute()){
    while($row=$statement->fetch()){
            $rezept=$row["id"];
            $titelbild=$row['titelbild'];
            $rezept_id=$row["id"];
            $rezept_dauer=$row['dauer'];
            $rezept_titel=$row['titel'];

            $state = $pdo->prepare("SELECT AVG(rating) AS average FROM Bewertungen WHERE id=$rezept"); #Rating des Rezeptes
            if($state->execute()) {
            if ($row = $state->fetch()) {
            $average=$row["average"];
                #Ausgabe des Rezeptes
            ?>
            <div class="col-md-6">

                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <?php echo "<img src='https://mars.iuk.hdm-stuttgart.de/~ap121//webprojekt_gruppe/rezept_bilder/".$titelbild."' class='img-fluid rounded-start' alt='Bild zum Rezept'style='object-fit: cover; object-position: 50%; width: 240px; height:325px;'>"; ?>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo "<a href='./../rezepte/details.php?id=".$rezept_id." ' class='text'> ".$rezept_titel." </a>";?></h5>
                                <p class="card-text"><?php echo $rezept_dauer;?> </p>
                                <p class="card-text"> <?php  echo (round($average.'/5'.'<i class="fa-solid fa-star"></i>')) ;?></p>
                                <div>
                                    <?php echo "<a href='./../rezepte/details.php?id=".$rezept_id."' class='btn btn-primary' style='background-color: #d17609; border-color:#d17609;'>Zum Rezept</a>" ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
    }}}}

      ?>
        </div>
    </div>
</div>
    <footer>
        <?php
        require("../includes/footer_include.php");
        ?>
    </footer>
</body>
</html>