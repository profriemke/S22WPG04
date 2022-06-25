<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <title>Delete</title>
</head>

<?php
include ("../includes/database_include.php");
require("../includes/navbar_include.php");
session_start();
if (!isset($_SESSION["id"])){
    echo "<h1>Nutzer nicht angemeldet</h1>";
    echo "<h3>Hier zum <a href='../nutzer_management/login.php' class='btn btn-primary'>Login</a></h3>";
    die("<h3><a href='../oeffentliche_seiten/index.php' class='btn btn-primary'>Zurück</a></h3>");

}

?>

<body>




<p>

<?php
if (isset($_GET["id"])) {
    $statement = $pdo->prepare("DELETE FROM Rezepte WHERE id=?");
    if ($statement->execute(array(htmlspecialchars($_GET["id"])))){
        echo "<h1>Rezept gelöscht</h1>";
    }else{
        die("<h1>Datenbank-Fehler</h1>");
    }
}

?>

<h3><a href="../oeffentliche_seiten/index.php" class="btn btn-primary">Zurück</a></h3>

<footer>
    <?php
    require("../includes/footer_include.php");
    ?>
</footer>
</body>
</html>


