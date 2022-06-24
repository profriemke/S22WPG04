<?php
require("../includes/database_include.php");
session_start();
/* if (!isset($_SESSION["id"])){
    echo "Nutzer nicht angemeldet";
    echo "<h3><a href='index.php'>Zurück</a></h3>";
    die("<h3>Hier zum <a href=''>Login</a></h3>");

}

*/ //Falls man angemeldet sein muss um bearbeiten zu können

?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>edit_do</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/style.css">

</head>

<?php
include("../includes/navbar_include.php")
?>

<body>

<p>

    <?php
    if (isset($_POST["titel"]) and isset($_POST["inhalt"]) and isset($_POST["dauer"]) and isset($_POST["zutaten"]) and isset($_FILES["titelbild"]) and isset($_GET["id"])) {
        $statement = $pdo->prepare("UPDATE Rezepte SET titel=?, SET dauer=?, SET zutaten=?, SET titelbild=?, SET inhalt=? WHERE id=?");
        if ($statement->execute(array(htmlspecialchars($_POST["titel"]), htmlspecialchars($_POST["inhalt"]), htmlspecialchars($_POST["zutaten"]), htmlspecialchars($_POST["dauer"]), htmlspecialchars($_POST["titelbild"]), htmlspecialchars($_GET["id"])))){
            echo "<h1>Update erfolgreich</h1>";
        } else {
            echo $statement->errorInfo()[2];
            die("<h1>Datenbank-Fehler</h1>");
        }
    }else{
        die("<h1>Formular-Fehler</h1>");
    }
    ?>

<p>

<h3><a href="../oeffentliche_seiten/index.php" class="btn btn-primary">Zurück</a></h3>


<footer>
    <?php
    require("../includes/footer_include.php");
    ?>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>


