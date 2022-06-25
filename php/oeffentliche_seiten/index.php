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
            <img src="./home/ju009/public_html/pictures/website_pictures" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5>First slide label</h5>
                <p>Some representative placeholder content for the first slide.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="/home/ju009/public_html/pictures/website_pictures" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5>Second slide label</h5>
                <p>Some representative placeholder content for the second slide.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="/home/ju009/public_html/pictures/website_pictures" class="d-block w-100" alt="...">
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



<div class="recipe_preview">
    <?php
    //Alle Rezepte
    echo " <h1> Entdecken </h1>";
    $statement = $pdo->prepare('SELECT * FROM Rezepte');
    if ($statement->execute()) {
    while ($row = $statement->fetch()) {

    echo "<div class='titel'>";
    echo "<h3>";
    echo "<a href='./../rezepte/details.php?id=".$row["id"]." ' class='text'> ".htmlspecialchars($row['titel'])." </a>";
    echo "</h3>";
    echo "<br>";
    echo "<p class='Inhalt'>";
    echo htmlspecialchars($row['inhalt']);
    echo "</p>";
    echo "<br>";
    echo($row['rating']);
    if (!empty($row["Titelbild"])){
    echo "<img src='https://mars.iuk.hdm-stuttgart.de/~ap121//webprojekt_gruppe/rezept_bilder/".$row["titelbild"]. "'>";
     }

    #echo "</div>";
    #echo "<br>";
    echo "<a href='./../rezepte/edit.php?id=".$row["id"]." ' class='button'> Rezept bearbeiten </a>";?>
    <form action="../rezepte/sammlung_do.php" method="post">
        <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
        <br>
        <button type="submit" id="absenden">Rezept zur Sammlung hinzufügen</button>
    </form>
    <?php
            #echo "<a href='../post/delete_do.php?id=".$row["id"]."' class='button'> Post löschen </a>";
            #echo "</div>";
        }
    }
    else {
        die("Dieses Rezept ist aktuell leider nicht verfügbar.");
    }
    ?>
</div>
</body>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

<?php
include("./../includes/footer_include.php");

?>
</html>
