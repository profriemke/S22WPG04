<?php
require("../../database_include.php");
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
include("./../includes/navbar_include.php")
?>

<body>

<p>

    <?php
    if (isset($_POST["titel"]) and isset($_POST["inhalt"])  and isset($_GET["id"])) {
        $statement = $pdo->prepare("UPDATE Posts SET titel=?, post=? WHERE id=?");
        if ($statement->execute(array(htmlspecialchars($_POST["titel"]), htmlspecialchars($_POST["inhalt"]), htmlspecialchars($_GET["id"])))){
            echo "<h1>Update erfolgreich</h1>";
        } else {
            die("<h1>Datenbank-Fehler</h1>");
        }
    }else{
        die("<h1>Formular-Fehler</h1>");
    }
    ?>

<p>

<h3><a href="../public_sites/index.php" class="btn btn-primary">Zurück</a></h3>
</body>
</html>


