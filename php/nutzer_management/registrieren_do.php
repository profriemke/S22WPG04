<?php
require("../includes/database_include.php");
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>signup_do</title>
    <link rel="stylesheet" href="../../css/style.css">
</head>
<body>

<?php
require("../includes/navbar_include.php");

if (!isset($_POST["vorname"]) and !isset($_POST["nachname"]) and !isset($_POST["passwort"]) and !isset($_POST["username"]) and !isset($_POST["email"]) and !isset($_POST["file"])) {
    die("Fehler im Formular: Nicht alle Felder ausgefüllt");}
else{
    if($_FILES["file"]["name"]=="")
    {echo "Kein Profilbild hinzugefügt";
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

        if (!move_uploaded_file($_FILES["file"]["tmp_name"], "/home/ap121/public_html/webprojekt_gruppe/profil_bilder/".$_FILES["file"]["name"])) {
            echo "Datei wurde nicht hochgeladen. Bitte erneut versuchen";
            die();
        }}

$statement = $pdo->prepare("INSERT INTO Nutzer (vorname, nachname, passwort, username, email, bild) VALUES (?,?,?,?,?,?)");
        if ($statement->execute(array(htmlspecialchars($_POST["vorname"]),htmlspecialchars($_POST["nachname"]),
            password_hash($_POST["passwort"], PASSWORD_BCRYPT), htmlspecialchars($_POST["username"]),
            htmlspecialchars($_POST["email"]), htmlspecialchars($_FILES["file"]["name"])))) {
            echo "erfolgreich angemeldet";
            $_SESSION["id"] = $row["id"];
        }
        else {
            echo $statement->errorInfo()[2];

            die("Datenbank-Fehler");
        }}


?>
</body>
</html>
