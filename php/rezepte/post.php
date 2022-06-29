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

<?php
if (isset($_SESSION['id'])){
    $id=$_SESSION['id'];
    $statement = $pdo->prepare("SELECT * from Nutzer WHERE id=$id");
    if($statement->execute()){
        while($row=$statement->fetch()){
 ?>

<h1>Neues Rezept</h1>




<form class="signup-wrapper" action="post_do.php" method="post" enctype="multipart/form-data">

    <h3>Titel:</h3>
    <input type="text" name="titel">

    <h4>Titelbild:</h4>
    <input type="file" class="form-control" id="inputGroupFile02" name="titelbild"> <!--Hier kann man vielleicht Drag and Drop nutzen?-->

    <!-- <h4>Bild:</h4>
    <input type="file" class="form-control" id="inputGroupFile02" name="bild"> Hier kann man vielleicht Drag and Drop nutzen?-->

    <h4>Inhalt:</h4>
    <textarea name="inhalt" rows=”200″ cols="40"></textarea>

    <h4>Dauer:</h4>
    <input type="text" name="dauer">

    <h4>Autor:</h4>
    <input type="text" name="autor" value="<?php echo htmlspecialchars($row['username']);?>">

    <!-- <h3>Nutzer:</h3> -->
    <input type="hidden" name="nutzer_id" value="<?php echo htmlspecialchars($row['id']);?>">

    <h4>Zutaten:</h4>
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