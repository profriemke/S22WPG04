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

if (!isset($_POST["vorname"]) or !isset($_POST["nachname"]) or !isset($_POST["geburtsdatum"]) or !isset($_POST["passwort"]) or !isset($_POST["username"]) or !isset($_POST["email"]) and !isset($_POST["file"])) {
    die("Fehler im Formular");
}
if($_FILES["file"]["name"]=="")
{echo " ";
}else{
    $fileName=$_FILES["file"]["name"];
    $fileSplit= explode(".",$fileName);
    $fileType=$fileSplit[sizeof($fileSplit)-1];

    for ($i=0; $i<=sizeof($fileSplit)-2; $i++){
        $fileName=$fileName.$fileSplit[$i];
    }

    if ($_FILES["file"]["size"] > 8000000) {
        echo"Datei zu groß. Maximale größe beträgt 8 MB ";
        die();
    }

    if (!$fileType == "jpg" OR !$fileType=="png" OR !$fileType== "jpeg" OR !$fileType=="heic") {
        echo"Dateiart nicht gültig. Folgende Dateiarten sind zugelassen : JPG; PNG; JPEG";
        die();
    }

    if (!move_uploaded_file($_FILES["file"]["tmp_name"], "../../pictures".$_FILES["file"]["name"])) {
        echo "Datei wurde nicht hochgeladen. Bitte erneut versuchen";
        die();
    }}
$statement = $pdo->prepare("INSERT INTO Nutzer (vorname, nachname, geburtsdatum, passwort, username, email) VALUES (?,?,?,?,?,?)");
if ($statement->execute(array(htmlspecialchars($_POST["vorname"]),htmlspecialchars($_POST["nachname"]), htmlspecialchars($_POST["geburtsdatum"]), password_hash($_POST["passwort"], PASSWORD_BCRYPT), htmlspecialchars($_POST["username"]), htmlspecialchars($_POST["email"])))) {
    echo "erfolgreich angemeldet";
} else {
    echo $statement->errorInfo()[2];
    die("Datenbank-Fehler");

}
?>
</body>
