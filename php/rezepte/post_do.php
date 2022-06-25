<?php
require("../includes/database_include.php");
session_start();
/*if (!isset($_SESSION["id"])){
    echo "Nutzer nicht angemeldet";
    echo "<h3><a href='../public/index.php'>Zurück</a></h3>";
    die("<h3>Hier zum <a href='../account/login.php'>Login</a></h3>");

}
*/
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>post_do</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/style.css">
</head>

<?php
include("../includes/navbar_include.php")
?>

<body>


<?php
if (!isset($_POST["titel"]) and !isset($_POST["inhalt"]) and !isset($_POST["titelbild"]) and !isset($_POST["zutaten"]) and !isset($_POST["autor"]) and !isset($_POST["dauer"])) {
    die("Fehler im Formular: Nicht alle Felder ausgefüllt");}
else{
    $number= rand();
    if($_FILES["titelbild"]["name"]=="")
    {echo "Kein Bild hinzugefügt";
    }else{
        $fileName=$_FILES["titelbild"]["name"];
        $fileSplit= explode(".",$fileName);
        $fileType=$fileSplit[sizeof($fileSplit)-1];

        for ($i=0; $i<=sizeof($fileSplit)-2; $i++){
            $fileName=$fileName.$fileSplit[$i];
        }

        if ($_FILES["titelbild"]["size"] > 8000000) {
            echo"Datei zu groß. Maximale größe beträgt 8 MB ";
            die();
        }

        if (!$fileType == "jpg" OR !$fileType=="png" OR !$fileType== "jpeg" OR !$fileType=="heic") {
            echo"Dateiart nicht gültig. Folgende Dateiarten sind zugelassen : JPG; PNG; JPEG";
            die();
        }

        if (!move_uploaded_file($_FILES["titelbild"]["tmp_name"], "/home/ap121/public_html/webprojekt_gruppe/rezept_bilder/".$_FILES["titelbild"]["name"].$number)) {
            echo "Datei wurde nicht hochgeladen. Bitte erneut versuchen";
            die();
        }}

    $statement = $pdo->prepare("INSERT INTO Rezepte (titel, inhalt, zutaten, autor, dauer, titelbild) VALUES (?,?,?,?,?,?)");
    if ($statement->execute(array(htmlspecialchars($_POST["titel"]),
        htmlspecialchars($_POST["inhalt"]),
        htmlspecialchars($_POST["zutaten"]),
        htmlspecialchars($_POST["autor"]),
        htmlspecialchars($_POST["dauer"]),
        htmlspecialchars($_FILES["titelbild"]["name"].$number)))) {
        echo "erfolgreich hochgeladen";
        $_SESSION["id"] = $row["id"];

    }
    else {
        echo $statement->errorInfo()[2];

        die("Datenbank-Fehler");
    }}


?>

<h3><a href="edit.php" class="btn btn-primary">Neuer Post</a></h3>
<h3><a href="../oeffentliche_seiten/index.php" class="btn btn-primary">Zurück</a></h3>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

<footer>
    <?php
    require("../includes/footer_include.php");
    ?>
</footer>
</body>
</html>