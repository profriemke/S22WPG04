<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rezept</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/rating.css">
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
<div class="content post" style="text-align: center">
<?php
//Rezept
$statement = $pdo->prepare("SELECT * FROM Rezepte WHERE id=?");
if ($statement->execute(array(htmlspecialchars($_GET["id"])))){
    if($row = $statement->fetch()){
    $rezepte_id=$row["id"];
    ?>
        <div class="card mb-3" style="max-width: 740px; margin-right: auto; margin-left: auto;">
            <div class="row g-0">
                <div class="col-md-4">
                    <?php echo "<img src='https://mars.iuk.hdm-stuttgart.de/~ap121//webprojekt_gruppe/rezept_bilder/".$row['titelbild']."' class='img-fluid rounded-start' alt='bild'>"; ?>
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h2 class="card-title"><?php echo htmlspecialchars($row['titel']);?></h2>
                        <p class="card-text"><small class="text-muted"><i class="fa-solid fa-clock"></i> <?php echo  htmlspecialchars($row['dauer']);?></small></p>
                        <ul class="list-group">
                            <li class="list-group-item"><?php echo htmlspecialchars($row['zutaten']);?></li>
                        </ul>
                        <p class="card-text"><?php echo htmlspecialchars($row['inhalt']);?></p>
                        <p class="card-text"><small class="text-muted"><?php echo htmlspecialchars($row['timestamp']);?></small></p>
                    </div>
                </div>
            </div>
        </div>


    <form action="../rezepte/sammlung_do.php" method="post">
        <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
        <br>
        <button type="submit" id="absenden" class="btn btn-primary">Rezept zur Sammlung hinzufügen</button>
    </form>

    <?php echo "<a href='./../rezepte/edit.php?id=".$row["id"]." ' class='btn btn-primary'> Rezept bearbeiten </a>";
        echo "<a href='./../rezepte/delete.php?id=" . $row["id"] . " ' class='btn btn-primary'> Rezept löschen </a>";

        //Durchschnittsbewertung
        $statement = $pdo->prepare("SELECT AVG(rating) AS average FROM Bewertungen ");
        if($statement->execute()) {
            if ($row = $statement->fetch()) {
                echo('<div class="rating-average">');
                echo ('<div class ="rating-average-text" style="font-size: 40px">'.round($row['average']).'/5'.'<i class="fa-solid fa-star" style="color: #d17609" ></i>'.'</div>');
                echo("</div>");
            }
            else {
                echo("Leider ist die Bewertung aktuell nicht verfügbar.");
            }
        }


        //Eingabefeld Bewertung
        include("rating.php");






//Kommentarsektion

            $statement = $pdo->prepare("SELECT * FROM Bewertungen WHERE rezept_id=$rezepte_id");

            if($statement->execute()) {
                while ($row = $statement->fetch()) {
                    /*echo "<div style='border-width: 5px; border-color: dimgrey'>";*/
                    echo('<div class="kommentar" >');
                        echo"<p class='user' style='font-size: 30px'>";
                        echo htmlspecialchars($row["nutzer_id"]);
                        echo "</p>";
                        echo "<p class='block-rating' style='font-size: 20px'>";
                        echo ($row['rating'].'/'.'5'.'<i class="fa-solid fa-star" style="color: #d17609" ></i>');
                        echo "</p>";
                        echo "<br>";
                        echo "<p class='Inhalt' style='font-size: 15px'>";
                        echo htmlspecialchars($row['kommentar']);
                        echo "</p>";
                        echo "<br>";
                    echo('</div>');
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