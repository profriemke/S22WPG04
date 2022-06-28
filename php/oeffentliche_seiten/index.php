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


<div class="container">
     <div class="row">

             <?php
    $statement = $pdo->prepare('SELECT * FROM Rezepte');
    if ($statement->execute()) {
    while ($row = $statement->fetch()) {
?>
         <div class="col-md-6">

                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <?php echo "<img src='https://mars.iuk.hdm-stuttgart.de/~ap121//webprojekt_gruppe/rezept_bilder/".$row['titelbild']."' class='img-fluid rounded-start' alt='Bild zum Rezept'style='object-fit: cover; object-position: 50%; width: 240px; height:325px;'>"; ?>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo "<a href='./../rezepte/details.php?id=".$row["id"]." ' class='text'> ".htmlspecialchars($row['titel'])." </a>";?></h5>
                                <p class="card-text"><?php echo htmlspecialchars($row['dauer']);?> </p>
                                <p class="card-text"> <?php  echo htmlspecialchars(round($row['average'].'/5'.'<i class="fa-solid fa-star"></i>')) ;?></p>
                            <div>
                                    <?php echo "<a href='./../rezepte/details.php?id=".$row["id"]."' class='btn btn-primary' style='background-color: #d17609; border-color:#d17609;'>Zum Rezept</a>" ?>
                            </div>
                           </div>
                        </div>
                    </div>
                </div>

         </div>

<?php
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
