<?php

include("../includes/database_include.php");

?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> eat.pray.eat </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/style.css">

    <style>
        img{
            max-height: 500px;
        }

        .recipe_preview{
            display: flex;
        }

    </style>
</head>
<body>
<?php
include("../includes/navbar_include.php");
?>

<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="https://mars.iuk.hdm-stuttgart.de/~ap121//webprojekt_gruppe/website_bilder/Titelbild.png" class="d-block w-100" alt="bild">
            <div class="carousel-caption d-none d-md-block">
                <h5>First slide label</h5>
                <p>Some representative placeholder content for the first slide.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="https://mars.iuk.hdm-stuttgart.de/~ap121//webprojekt_gruppe/website_bilder/Eat.Pray.Eat.png" class="d-block w-100" alt="bild">
            <div class="carousel-caption d-none d-md-block">
                <h5>Second slide label</h5>
                <p>Some representative placeholder content for the second slide.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="https://mars.iuk.hdm-stuttgart.de/~ap121//webprojekt_gruppe/website_bilder/Eat.Pray.Eat.png" class="d-block w-100" alt="bild">
            <div class="carousel-caption d-none d-md-block">
                <h5>Third slide label</h5>
                <p>Some representative placeholder content for the third slide.</p>
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



<div class="content post">
    <?php
    //Alle Rezepte
    echo " <h1> Entdecken </h1>";
    $statement = $pdo->prepare('SELECT * FROM Rezepte');
    if ($statement->execute()) {
    while ($row = $statement->fetch()) {

    echo "<h3>";
    echo "<a href='./../rezepte/details.php?id=".$row["id"]." ' class='text'> ".htmlspecialchars($row['titel'])." </a>";
    echo "</h3>";
    echo "<br>";
    echo "<p class='Inhalt'>";
    echo htmlspecialchars($row['inhalt']);
    echo "</p>";
    echo "<img height='30%' width='30%' src='https://mars.iuk.hdm-stuttgart.de/~ap121//webprojekt_gruppe/rezept_bilder/".htmlspecialchars($row['titelbild'])."' alt='bild'><br>";
    echo "<br>";
    echo($row['rating']);


        }
    }
    else {
        die("Dieses Rezept ist aktuell leider nicht verfügbar.");
    }
    ?>
</div>

<footer>
<?php
include("./../includes/footer_include.php");
?>
</footer>
</body>

</html>
