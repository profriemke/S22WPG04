<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rezept</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" >


</head>
<?php
require("../includes/database_include.php");
session_start();
/*if (!isset($_SESSION["id"])){
    echo "<h1>Nutzer nicht angemeldet</h1>";
    echo "<h3>Hier zum <a href='../account/login.php' class='btn btn-primary'>Login</a></h3>";
    die("<h3><a href='../public/index.php' class='btn btn-primary'>Zurück</a></h3>");

}
*/ // Falls man angemeldet sein muss um bearbeiten zu können
?>

<body>
<?php
include("../includes/navbar_include.php")
?>
<div class="content post">
<?php
//Rezept
$statement = $pdo->prepare("SELECT * FROM Rezepte WHERE id=?");
if ($statement->execute(array(htmlspecialchars($_GET["id"])))){
    if($row = $statement->fetch()){
    $rezepte_id=$row["id"];
    echo "<h2>";
    echo htmlspecialchars($row["titel"]);
    echo "</h2>";
    echo "<img height='30%' width='30%' src='https://mars.iuk.hdm-stuttgart.de/~ap121//webprojekt_gruppe/rezept_bilder/".htmlspecialchars($row['titelbild'])."' alt='bild'><br>";

    echo "<h4>";
    echo htmlspecialchars($row["zutaten"]);
    echo "</h4>";
    echo htmlspecialchars($row["inhalt"]);

?>

    <form action="../rezepte/sammlung_do.php" method="post">
        <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
        <br>
        <button type="submit" id="absenden" class="btn btn-primary">Rezept zur Sammlung hinzufügen</button>
    </form>

    <?php echo "<a href='./../rezepte/edit.php?id=".$row["id"]." ' class='btn btn-primary'> Rezept bearbeiten </a>";
        //Eingabefeld Bewertung
        include("rating.php");
//Durchschnittsbewertung
$statement = $pdo->prepare("SELECT AVG(rating) AS average FROM Bewertungen ");
if($statement->execute()) {
    if ($row = $statement->fetch()) {
        echo (round($row['average'].'/5'.'<i class="fa-solid fa-star"></i>'));
    }
    else {
        echo("Leider ist die Bewertung aktuell nicht verfügbar.");
    }
}




//Kommentarsektion

            $statement = $pdo->prepare("SELECT * FROM Bewertungen WHERE rezept_id=$rezepte_id");

            if($statement->execute()) {
                while ($row = $statement->fetch()) {
                    /*echo "<div style='border-width: 5px; border-color: dimgrey'>";*/

                        echo "Bewertung:";
                        echo htmlspecialchars($row['rating']);
                        echo "<br>";
                        echo "Kommentar:";
                        echo "<p class='Inhalt'>";
                        echo htmlspecialchars($row['kommentar']);
                        echo "</p>";
                        echo "<br>";

                   /* echo "</div>";*/
                }

            }




    }else{
        echo ("Leider ist dieses Rezept aktuell nicht verfügbar.");
    }
}else{
    die("Datenbank-Fehler");
}
?>

<h3><a href="../oeffentliche_seiten/index.php" class="btn btn-primary">Zurück</a></h3>
</div>
<footer>
    <?php
    require("../includes/footer_include.php");
    ?>
</footer>

</body>
</html>