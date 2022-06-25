<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Title</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/style.css">
</head>
<body>
<?php
require("../includes/database_include.php");
include("../includes/navbar_include.php");
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
<div class="content post">
        <h1>Neues Rezept</h1>

<form action="post_do.php" method="post" enctype="multipart/form-data">

    <h3>Titel:</h3>
    <input type="text" name="titel">

    <h3>Bild:</h3>
    <input type="file" class="form-control" id="inputGroupFile02" name="titelbild"> <!--Hier kann man vielleicht Drag and Drop nutzen?-->

    <h3>Inhalt:</h3>
    <textarea name="inhalt" rows=”200″ cols="40"></textarea>

    <h3>Dauer:</h3>
    <input type="text" name="dauer">

    <h3>Autor:</h3>
    <input type="text" name="autor" value="<?php echo htmlspecialchars($row['username']);?>">

    <!-- <h3>Nutzer:</h3> -->
    <input type="hidden" name="nutzer" value="<?php echo htmlspecialchars($row['id']);?>">

    <h3>Zutaten:</h3>
    <input type="text" name="zutaten">
<?php
}

}else{
    die("Datenbank-Fehler");}
}else{
    echo "Bitte erst <a href='login.php'>einloggen</a>";
}


?>



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