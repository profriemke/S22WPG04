<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
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
$statement = $pdo->prepare("SELECT * FROM Rezepte WHERE id=?");
if ($statement->execute(array(htmlspecialchars($_GET["id"])))){
    if($row = $statement->fetch()){

    echo "<h2>";
    echo htmlspecialchars($row["id"]);
    echo htmlspecialchars($row["titel"]);
    echo "</h2>";
    echo "<h4>";
    echo htmlspecialchars($row["zutaten"]);
    echo "</h4>";
    echo htmlspecialchars($row["inhalt"]);

    }else{
        echo ("Rezept nicht vorhanden");
    }
}else{
    die("Datenbank-Fehler");
}
?>

</body>
</html>