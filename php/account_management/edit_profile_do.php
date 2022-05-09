<?php
require("../includes/database_include.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Aendern</title>
</head>
<body>
<?php
if (isset($_SESSION['id'])){
    if (isset($_POST["vorname"]) and isset($_POST["nachname"]) and isset($_POST["email"]) and isset($_POST["bio"]) and isset($_POST["id"])) {
        $statement = $pdo->prepare("UPDATE Nutzer SET vorname=?, nachname=?, email=?, bio=? WHERE id=?");
        if($statement->execute(array(htmlspecialchars($_POST["vorname"]), htmlspecialchars($_POST["nachname"]), htmlspecialchars($_POST["email"]), htmlspecialchars($_POST["bio"]), htmlspecialchars($_POST["id"])))){
            echo "Profil erfolgreich geändert! Zurück zum <a href='profile.php'>Profil. </a>";
        }}else
    {die("Datenbank-Fehler");
    }
}else {
    die("Bitte erst <a href='login.html'>registrieren</a><br>Zurück zur <a href='index.php'>Startseite </a>");
}
?>
</body>
</html>