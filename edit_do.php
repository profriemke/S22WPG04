<?php
require("database_include.php");
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
    <meta name="viewport" content="width=device-width">
    <title>edit_do</title>

</head>

<?php
include("navbar_include.php")
?>

<body>

<p>

    <?php
    if (isset($_POST["Titel"]) and isset($_POST["Inhalt"])  and isset($_GET["ID"])) {
        $statement = $pdo->prepare("UPDATE Posts SET titel=?, post=? WHERE id=?");
        if ($statement->execute(array(htmlspecialchars($_POST["Titel"]), htmlspecialchars($_POST["Inhalt"]), htmlspecialchars($_GET["ID"])))){
            echo "<h1>Update erfolgreich</h1>";
        } else {
            die("<h1>Datenbank-Fehler</h1>");
        }
    }else{
        die("<h1>Formular-Fehler</h1>");
    }
    ?>

<p>

<h3><a href="index.php" class="btn btn-primary">Zurück</a></h3>
</body>
</html>


