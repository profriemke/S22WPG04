<?php

include("../includes/database_include.php");
session_start();
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> eat.pray.eat </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" >


</head>
<body>
<?php
include("../includes/navbar_include.php");
?>
<!-- Karussell -->
<!--Aus Bootstrap-Template-->
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false" style="margin-bottom: 20px">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="https://mars.iuk.hdm-stuttgart.de/~ap121//webprojekt_gruppe/website_bilder/Eat.Pray.Eat4.jpg" class="d-block w-100" alt="bild">
            <div class="carousel-caption d-none d-md-block">
                <h5>eat pray eat</h5>
                <p>Die besten Rezepte gibt es hier!</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="https://mars.iuk.hdm-stuttgart.de/~ap121//webprojekt_gruppe/website_bilder/blueberries-2278921 (1).jpg" class="d-block w-100" alt="bild">
            <div class="carousel-caption d-none d-md-block">
                <h5>Täglich neue Rezepte</h5>
                <p>Frisch und regional</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="https://mars.iuk.hdm-stuttgart.de/~ap121//webprojekt_gruppe/website_bilder/burgers-1839090 (1).jpg" class="d-block w-100" alt="bild">
            <div class="carousel-caption d-none d-md-block">
                <h5>Für jeden etwas dabei!</h5>
                <p>Von Snack bis Festmahl findest du alles!</p>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>


<div class="content mx-auto" style="width: 90vw; text-align: center">
     <div class="row">

             <?php
    $statement = $pdo->prepare('SELECT * FROM Rezepte '); //Abfrage aller Rezepte
    if ($statement->execute()) {
    while ($row = $statement->fetch()) {
        //hier Speicherung aller Variablen, da sonst nicht alle Rezepte abgerufen werden
            $rezept=$row["id"];
            $titelbild=$row['titelbild'];
            $rezept_id=$row["id"];
            $rezept_dauer=$row['dauer'];
            $rezept_titel=$row['titel'];

             $state = $pdo->prepare("SELECT AVG(rating) AS average FROM Bewertungen WHERE id=$rezept"); //fragt durchschnittliche Bewertungen der Rezepte ab
             if($state->execute()) {
                 if ($row = $state->fetch()) {
                     $average=$row["average"];
?>
<!-- Karten für Rezepte -->
         <div class="col-md-4"> <!-- Zeigt 3 Karten pro Reihe an-->
<!--Aus Bootstrap-Template-->
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <?php echo "<img src='https://mars.iuk.hdm-stuttgart.de/~ap121//webprojekt_gruppe/rezept_bilder/".$titelbild."' class='img-fluid rounded-start' alt='Bild zum Rezept'style='object-fit: cover; object-position: 50%; width: 240px; height:325px;'>"; ?>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo "<a href='./../rezepte/details.php?id=".$rezept_id." ' class='text'> ".$rezept_titel ."</a>";?></h5>
                                <p class="card-text"><?php echo $rezept_dauer;?> </p>
                                <p class="card-text"> <?php echo (round($average).'/5'.'<i class="fa-solid fa-star" style="color: #d17609" ></i>') ;?></p>
                            <div>
                                    <?php echo "<a href='./../rezepte/details.php?id=".$rezept_id."' class='btn btn-primary' style='background-color: #1a5e5d; border-color:#1a5e5d;'>Zum Rezept</a>" ?>
                            </div>
                           </div>
                        </div>
                    </div>
                </div>

         </div>

<?php
}}
        }}

    else {
        die("Dieses Rezept ist aktuell leider nicht verfügbar.");
    }
    ?>
         </div>
     </div>

</div>

<footer>
<?php
include("./../includes/footer_include.php");
?>
</footer>
</body>

</html>
