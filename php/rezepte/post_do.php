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
if(!isset($_POST["titel"])or !isset($_POST["inhalt"])or !isset($_FILES["titelbild"])) {
    die("<h1>Formula-Fehler</h1>");
}

$fileSplit = explode(".", $_FILES["titelbild"]["name"]);
$fileType = $fileSplit[sizeof($fileSplit)-1];
echo "<h3>".$fileType."</h3>";
echo " ";
if((strtolower($fileType) =="png") OR (strtolower($fileType) =="jpg") OR (strtolower($fileType) =="jpeg") OR(strtolower($fileType) =="mp4") OR (strtolower($fileType) =="")){
    echo "<h3>Dateiart in Ordnung</h3>";
}else{
    die("<h1>Nicht zugelassende Dateiart</h1>");
}
if($_FILES["uploadfile"]["size"]> 800000){
    die("<h1>Datei zu groß</h1>");
}

if (!move_uploaded_file($_FILES["titelbild"]["tmp_name"],"/home/ap121/public_html/webprojekt_gruppe/rezept_bilder".$_FILES["titelbild"]["name"])) {
    die("<h1>Upload_Fehler</h1>");

}

echo "<p>";
echo "<h1>".htmlspecialchars($_POST["titel"])."</h1>";
echo "<p>";
/*echo htmlspecialchars($_POST["post"]);
echo "<p>";*/ // falls auch der Post angezeigt werden soll beim hochladen

$statement= $pdo->prepare("INSERT INTO Rezepte (titel, inhalt, titelbild, dauer, autor, nutzer, zutaten) VALUES (:titel, :inhalt, :titelbild, :dauer, :autor, :nutzer, :zutaten)");
$statement->bindParam(":titel", htmlspecialchars($_POST["titel"]));
$statement->bindParam(":inhalt", htmlspecialchars($_POST["inhalt"]));
$statement->bindParam(":titelbild", htmlspecialchars($_FILES["titelbild"]["name"]));
$statement->bindParam(":dauer", htmlspecialchars($_POST["dauer"]));
$statement->bindParam(":autor", htmlspecialchars($_POST["autor"]));
$statement->bindParam(":nutzer", htmlspecialchars($_POST["nutzer"]));
$statement->bindParam(":zutaten", htmlspecialchars($_POST["zutaten"]));



if($statement->execute()){
    echo "<h2>Post hochgeladen</h2>";
}else{
    echo "<h1>Fehler Datenbank</h1>";
    echo $statement->errorInfo()[2];
}
?>

<h3><a href="edit.php" class="btn btn-primary">Neuer Post</a></h3>
<h3><a href="../oeffentliche_seiten/index.php" class="btn btn-primary">Zurück</a></h3>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>