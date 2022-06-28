<?php
require("../includes/database_include.php");
session_start();
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Bewertung</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <link rel="stylesheet" href="../../css/style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
<?php
require("../includes/navbar_include.php");




    if (isset($_SESSION['id'])) {
        if (!isset($_POST["rezept_id"]) && !isset($_POST["nutzer_id"])  && !isset($_POST["rating"]) && !isset($_POST["kommentar"])) {
            echo("<div class='content'>");
            die("Fehler im Formular </div>");
        } else {
            $statement = $pdo->prepare("INSERT INTO Bewertungen (rezept_id, nutzer_id, rating, kommentar) VALUES (?,?,?,?)");
            if ($statement->execute(array(htmlspecialchars($_POST["rezept_id"]), htmlspecialchars($_POST["user_id"]) ,htmlspecialchars($_POST["rating"]), htmlspecialchars($_POST["kommentar"])))) {
                echo("Vielen Dank für deine Bewertung <br> ");
                echo(" Zurück zur <a href='../oeffentliche_seiten/index.php' >Startseite </a>");
            } else {
                echo("<div class='content'>");
                echo $statement->errorInfo()[2];
                echo $statement->queryString;
                die("Fehler beim Einfügen </div>");
            }
        }
    } else {
        echo("<div class='content' >");
        echo("Bitte zuerst <a href='../nutzer_management/login.php'>anmelden  </a>!");
        echo("</div>");

}
?>

<footer>
    <?php
    require("../includes/footer_include.php");
    ?>
</footer>
    </body>
</html>

