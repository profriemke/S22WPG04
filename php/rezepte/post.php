<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Neues Rezept</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/style.css">
</head>
<body>
<?php
require("../includes/database_include.php");
include("../includes/navbar_include.php");
?>

<div class="content mx-auto" style="width: 90vw; text-align: center">

<?php
session_start();

if (!isset($_SESSION["id"])){
    echo "<h1>Nutzer nicht angemeldet</h1>";
    echo "<h3>Hier zum <a href='../../php/nutzer_management/login.php'>Login</a></h3>";
    die("<h3><a href='../oeffentliche_seiten/index.php'>Zurück</a></h3>");

}
?>

    //Nutzer Datenbank wird abgefragt um somit den Nutzer direkt über die Session id zu fetchen und im Formular als Autor zu hinterlegen
<?php
if (isset($_SESSION['id'])){
    $id=$_SESSION['id'];
    $statement = $pdo->prepare("SELECT * from Nutzer WHERE id=$id");
    if($statement->execute()){
        while($row=$statement->fetch()){
 ?>

<h1>Neues Rezept</h1>




<form class="signup-wrapper" action="post_do.php" method="post" enctype="multipart/form-data">

    <label for="titel">Titel:</label>
    <input type="text" name="titel">
    <br>

    <label for="titelbild">Titelbild:</label>
    <input type="file" class="form-control" id="inputGroupFile02" name="titelbild"> <!--Hier kann man vielleicht Drag and Drop nutzen?-->
    <br>
    <!-- <h4>Bild:</h4>
    <input type="file" class="form-control" id="inputGroupFile02" name="bild"> Hier kann man vielleicht Drag and Drop nutzen?-->

    <label for="titel">Inhalt:</label>
    <textarea name="inhalt" rows=”200″ cols="40"></textarea>
    <br>

    <label for="dauer">Dauer:</label>
    <input type="text" name="dauer">
    <br>

    <label for="autor">Autor:</label>
    <input type="text" name="autor" value="<?php echo htmlspecialchars($row['username']);?>">
    <br>

    <!-- <h3>Nutzer:</h3> -->
    <input type="hidden" name="nutzer_id" value="<?php echo htmlspecialchars($row['id']);?>">

    <label for="zutaten">Zutaten:</label>
    <input type="text" name="zutaten">
<?php
}

}else{
    die("Datenbank-Fehler");}
}else{
    echo "Bitte erst <a href='login.php'>einloggen</a>";
}


?>


<br>
    <h3><button type="submit" class="btn btn-primary">Post hochladen</button></h3>
</form>
<br>

<h3><a href="../oeffentliche_seiten/index.php" class="btn btn-primary">Zurück</a></h3>
</div>
<footer>
    <?php
    require("../includes/footer_include.php");
    ?>
</footer>
</body>
</html>