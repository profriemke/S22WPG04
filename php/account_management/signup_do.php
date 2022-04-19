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

if (!isset($_POST["Vorname"]) or !isset($_POST["Nachname"]) or !isset($_POST["Geburtsdatum"]) or !isset($_POST["Passwort"]) or !isset($_POST["Username"])) {
    die("Fehler im Formular");
}
$statement = $pdo->prepare("INSERT INTO Nutzer (Vorname, Nachname, Geburtsdatum, Passwort, Username) VALUES (?,?,?,?,?)");
if ($statement->execute(array(htmlspecialchars($_POST["Vorname"]),htmlspecialchars($_POST["Nachname"]), htmlspecialchars($_POST["Geburtsdatum"]), password_hash($_POST["Passwort"], PASSWORD_BCRYPT), htmlspecialchars($_POST["Username"])))) {
    echo "erfolgreich angemeldet";
} else {
    echo $statement->errorInfo()[2];
    die("Datenbank-Fehlerc");

}
?>
</body>
