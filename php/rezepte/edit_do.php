<?php
require("../includes/database_include.php");
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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>edit_do</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/style.css">

</head>

<?php
include("../includes/navbar_include.php")
?>

<body>

<p>

    <?php /*
    if (isset($_POST["titel"]) and isset($_POST["inhalt"]) and isset($_POST["dauer"]) and isset($_POST["zutaten"]) and isset($_FILES["titelbild"]) and isset($_GET["id"])) {
        $statement = $pdo->prepare("UPDATE Rezepte SET titel=?, SET dauer=?, SET zutaten=?, SET titelbild=?, SET inhalt=? WHERE id=?");
        if ($statement->execute(array(htmlspecialchars($_POST["titel"]), htmlspecialchars($_POST["inhalt"]), htmlspecialchars($_POST["zutaten"]), htmlspecialchars($_POST["dauer"]), htmlspecialchars($_POST["titelbild"]), htmlspecialchars($_GET["id"])))){
            echo "<h1>Update erfolgreich</h1>";
        } else {
            echo $statement->errorInfo()[2];
            die("<h1>Datenbank-Fehler</h1>");
        }
    }else{
        die("<h1>Formular-Fehler</h1>");
    }
   */ ?>

    <?php
    if (isset($_SESSION['id'])){ #Abfrage I
        if (!isset($_POST["titel"]) #Abfrage alle Felder gefüllt?
            and !isset($_POST["inhalt"])
            and !isset($_POST["dauer"])
            and !isset($_POST["titelbild"])
            #and !isset($_POST[""])
            and !isset($_POST["id"]))
        {die("Fehler im Formular: Nicht alle Felder ausgefüllt");}
        else{
            if($_FILES["titelbild"]["name"]=="")
            {echo "Kein Bild hinzugefügt <br>";}
            else {
                $fileName=$_FILES["titelbild"]["name"];
                $fileSplit= explode(".",$fileName);
                $fileType=$fileSplit[sizeof($fileSplit)-1];

                for ($i=0; $i<=sizeof($fileSplit)-2; $i++)
                {$fileName=$fileName.$fileSplit[$i];}

                if ($_FILES["titelbild"]["size"] > 8000000)
                {echo"Datei zu groß. Maximale größe beträgt 8 MB ";
                    die();}

                if (!$fileType == "jpg" OR !$fileType=="png" OR !$fileType== "jpeg" OR !$fileType=="heic")
                {echo"Dateiart nicht gültig. Folgende Dateiarten sind zugelassen : JPG; PNG; JPEG";
                    die();}

                if (!move_uploaded_file($_FILES["titelbild"]["tmp_name"], "/home/ap121/public_html/webprojekt_gruppe/rezept_bilder/".$_FILES["titelbild"]["name"]))
                {echo "Datei wurde nicht hochgeladen. Bitte erneut versuchen";
                    die();}}

            if(!empty($_FILES["titelbild"]["name"])) {
                $statement = $pdo->prepare("UPDATE Rezepte SET titel=?, inhalt=?, dauer=?, titelbild=? WHERE id=?");
                if($statement->execute(array(
                    htmlspecialchars($_POST["titel"]),
                    htmlspecialchars($_POST["inhalt"]),
                    htmlspecialchars($_POST["dauer"]),
                    htmlspecialchars($_FILES["titelbild"]["name"]),
                    htmlspecialchars($_POST["id"]))))
                {echo "Rezept erfolgreich geändert! mit bild". $_FILES["titelbild"]["name"]."<br> Zurück zum <a href='details.php'>Rezept.</a>";}}

            else{
                $statement = $pdo->prepare("UPDATE Rezepte SET titel=?, inhalt=?, dauer=? WHERE id=?");
                if($statement->execute(array(
                    htmlspecialchars($_POST["titel"]),
                    htmlspecialchars($_POST["inhalt"]),
                    htmlspecialchars($_POST["dauer"]),
                    htmlspecialchars($_POST["id"]))))
                {echo "Rezept erfolgreich geändert! ohne bild<br> Zurück zum <a href='details.php'>Rezept.</a>";}}}


    }else
    {die("Bitte erst <a href='login.php'>registrieren</a><br>Zurück zur <a href='../oeffentliche_seiten/index.php'>Startseite </a>");}
    ?>

<p>

<h3><a href="../oeffentliche_seiten/index.php" class="btn btn-primary">Zurück</a></h3>


<footer>
    <?php
    require("../includes/footer_include.php");
    ?>
</footer>
</body>
</html>


