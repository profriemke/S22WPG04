

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

<div class="content mx-auto" style="width: 90vw; text-align: center">
<body>

<?php
session_start();
if (!isset($_SESSION["id"])){
    echo "<h1>Nutzer nicht angemeldet</h1>";
    echo "<h3>Hier zum <a href='../nutzer_management/login.php' class='btn btn-primary'>Login</a></h3>";
    die("<h3><a href='../oeffentliche_seiten/index.php' class='btn btn-primary'>Zurück</a></h3>");

} // Falls man angemeldet sein muss um bearbeiten zu können

?>

<?php
if (!isset($_POST["titel"]) and !isset($_POST["inhalt"]) and !isset($_POST["titelbild"]) and !isset($_POST["zutaten"]) and !isset($_POST["autor"]) and !isset($_POST["dauer"]) and !isset($_POST["nutzer_id"])) {
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

    $statement = $pdo->prepare("INSERT INTO Rezepte (titel, inhalt, zutaten, autor, dauer, nutzer_id, titelbild) VALUES (?,?,?,?,?,?,?)");
    if ($statement->execute(array(htmlspecialchars($_POST["titel"]),
        htmlspecialchars($_POST["inhalt"]),
        htmlspecialchars($_POST["zutaten"]),
        htmlspecialchars($_POST["autor"]),
        htmlspecialchars($_POST["dauer"]),
        htmlspecialchars($_POST["nutzer_id"]),
        htmlspecialchars($_FILES["titelbild"]["name"].$number)))) {
        echo "<p>Erfolgreich hochgeladen</p>";

    }
    else {
        echo $statement->errorInfo()[2];

        die("Datenbank-Fehler");
    }}


?>

<h3><a href="post.php" class="btn btn-primary">Neuer Post</a></h3>
<p>
<h3><a href="../rezepte/details.php?id=<?php echo $pdo->lastInsertId()?>" class="btn btn-primary">Zum Rezept</a></h3>
</p>

</div>

<footer>
    <?php
    require("../includes/footer_include.php");
    ?>
</footer>
</body>
</html>