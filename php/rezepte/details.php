<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Title</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/style.css">
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

<?php
include("../includes/navbar_include.php")
?>

<body>

<?php
//Rezept
$statement = $pdo->prepare("SELECT * FROM Rezepte WHERE id=?");
if ($statement->execute(array(htmlspecialchars($_GET["id"])))){
    if($row = $statement->fetch()){

    echo "<h2>";
    echo htmlspecialchars($row["id"]);
    echo htmlspecialchars($row["titelbild"]);
    echo htmlspecialchars($row["titel"]);
    echo "</h2>";
    echo "<h4>";
    echo htmlspecialchars($row["zutaten"]);
    echo "</h4>";
    echo htmlspecialchars($row["inhalt"]);

//Durchschnittsbewertung
$statement = $pdo->prepare("SELECT AVG(rating) AS average FROM Bewertungen ");
if($statement->execute()) {
    if ($row = $statement->fetch()) {
        echo (round($row['average']));
    }
    else {
        echo("Leider ist die Bewertung aktuell nicht verfügbar.");
    }
}

//Eingabefeld Bewertung
include("rating.php");


//Kommentarsektion
/*
        $rezepte_id=$row["id"];

       # while($row = $statement){
            $statement = $pdo->prepare("SELECT * FROM Bewertungen WHERE rezept_id=$rezepte_id");

            if($statement->execute()) {
                while ($row = $statement->fetch()) {
                    echo "<h3>";
                    echo htmlspecialchars($row['rating']);
                    echo "</h3>";
                    echo "<br>";
                    echo "<p class='Inhalt'>";
                    echo htmlspecialchars($row['kommentar']);
                    echo "</p>";
                    echo "<br>";
                }

            }
      #  }

*/

    }else{
        echo ("Rezept nicht vorhanden");
    }
}else{
    die("Datenbank-Fehler");
}
?>

<footer>
    <?php
    require("../includes/footer_include.php");
    ?>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>