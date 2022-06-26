<?php
require("../includes/database_include.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>profil bearbeiten do</title>
    <link rel="stylesheet" href="../../css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<?php

require("../includes/navbar_include.php");
?>
<div class="content post">

    <?php
if (isset($_SESSION['id'])){ #Abfrage ID
    if (!isset($_POST["vorname"]) #Abfrage alle Felder gefüllt?
        and !isset($_POST["nachname"])
        and !isset($_POST["email"])
        and !isset($_POST["bio"])
        and !isset($_POST["file"])
        and !isset($_POST["id"]))
        {die("Fehler im Formular: Nicht alle Felder ausgefüllt");}
    else{
        if($_FILES["file"]["name"]=="")
        {echo "<br>";}
        else {
            $fileName=$_FILES["file"]["name"];
            $fileSplit= explode(".",$fileName);
            $fileType=$fileSplit[sizeof($fileSplit)-1];

            for ($i=0; $i<=sizeof($fileSplit)-2; $i++)
            {$fileName=$fileName.$fileSplit[$i];}

            if ($_FILES["file"]["size"] > 8000000)
            {echo"Datei zu groß. Maximale Größe beträgt 8 MB ";
                die();}

            if (!$fileType == "jpg" OR !$fileType=="png" OR !$fileType== "jpeg" OR !$fileType=="heic")
            {echo"Dateiart nicht gültig. Folgende Dateiarten sind zugelassen : JPG; PNG; JPEG";
                die();}

            if (!move_uploaded_file($_FILES["file"]["tmp_name"], "/home/ap121/public_html/webprojekt_gruppe/profil_bilder/".$_FILES["file"]["name"]))
            {echo "Datei wurde nicht hochgeladen. Bitte erneut versuchen";
                die();}}

        if(!empty($_FILES["file"]["name"])) {
            $statement = $pdo->prepare("UPDATE Nutzer SET vorname=?, nachname=?, email=?, bio=?, bild=? WHERE id=?");
            if($statement->execute(array(
                        htmlspecialchars($_POST["vorname"]),
                        htmlspecialchars($_POST["nachname"]),
                        htmlspecialchars($_POST["email"]),
                        htmlspecialchars($_POST["bio"]),
                        htmlspecialchars($_FILES["file"]["name"]),
                        htmlspecialchars($_POST['id']))))
        {echo "Profil erfolgreich geändert! mit bild". $_FILES["file"]["name"]."<br> Zurück zum <a href='profil.php'>Profil.</a>";}}

        else{
            $statement = $pdo->prepare("UPDATE Nutzer SET vorname=?, nachname=?, email=?, bio=? WHERE id=?");
                    if($statement->execute(array(htmlspecialchars($_POST["vorname"]),
                        htmlspecialchars($_POST["nachname"]),
                        htmlspecialchars($_POST["email"]),
                        htmlspecialchars($_POST["bio"]),
                        htmlspecialchars($_POST['id']))))
            {echo "Profil erfolgreich geändert!<br> Zurück zum <a href='profil.php'>Profil.</a>";}}}


}else
{die("Bitte erst <a href='login.php'>registrieren</a><br>Zurück zur <a href='../oeffentliche_seiten/index.php'>Startseite </a>");}
?>
</div>

<footer>
    <?php
    require("../includes/footer_include.php");
    ?>
</footer>
</body>
</html>
