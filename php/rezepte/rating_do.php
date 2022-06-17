<?php
require("../includes/database_include.php");
session_start();
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>profil</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <link rel="stylesheet" href="../../css/style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
<?php
require("../includes/navbar_include.php");


//if (!isset($_SESSION["id"])) {
//    echo "<a href='../public_sites/index.php'> Zurück zur Startseite <br></a>";
//    die("Um diese Aktion ausführen zu können musst du angemeldet sein!");

//}
if (isset($_SESSION['id'])) {
    // $rating = $_POST["rating"];
    // $nutzer_id = $_SESSION['id'];
    //$rezept_id = $_POST['rezept_id'];
    if (!isset($_POST["rezept_id"])
        and !isset($_POST["nutzer_id"])
        and !isset($_POST["rating"])
        and !isset($_POST["kommentar"]))
    {die("Fehler im Formular");}


    else {
        $statement = $pdo->prepare("INSERT INTO Bewertungen (rezept_id, nutzer_id, rating, kommentar) VALUES (?, ?, ?, ?)"); #hier sterne zu rating angleichen, vorher datenbank überprüfen
        if ($statement->execute(array(htmlspecialchars($_POST["rezept_id"]), htmlspecialchars($_POST["user_id"]), htmlspecialchars($_POST["rating"]), htmlspecialchars($_POST["kommentar"]))))
        {echo("Bewertung eingefügt");}

        else{
            echo $statement->errorInfo()[2];
            echo $statement->queryString;
            die("Fehler beim Einfügen");}
    }
}
else{
    echo ("Fehler");
}
?>
    </body>
</html>

