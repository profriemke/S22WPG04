<?php
require("../../database_include.php");
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<a href="profile.php"> Profilseite </a>
<?php

if (!isset($_POST["vorname"]) or !isset($_POST["nachname"]) or !isset($_POST["geburtsdatum"]) or !isset($_POST["passwort"]) or !isset($_POST["username"]) or !isset($_POST["email"])) {
    die("Fehler im Formular");
}
$statement = $pdo->prepare("INSERT INTO Nutzer (vorname, nachname, geburtsdatum, passwort, username, email) VALUES (?,?,?,?,?,?)");
if ($statement->execute(array(htmlspecialchars($_POST["vorname"]),htmlspecialchars($_POST["nachname"]), htmlspecialchars($_POST["geburtsdatum"]), password_hash($_POST["passwort"], PASSWORD_BCRYPT), htmlspecialchars($_POST["username"]), htmlspecialchars($_POST["email"])))) {
    echo "erfolgreich angemeldet";
} else {
    echo $statement->errorInfo()[2];
    die("Datenbank-Fehlerc");

}
?>
</body>
