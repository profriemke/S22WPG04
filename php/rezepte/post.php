<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Title</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/style.css">
</head>

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

        <h1>Neues Rezept</h1>

<form action="post_do.php" method="post" enctype="multipart/form-data">

    <h3>Titel:</h3>
    <p><input type="text" name="titel"></p>

    <h3>Bild:</h3>
    <div class="input-group mb-3">
        <input type="file" class="form-control" id="inputGroupFile02" name="titelbild"> <!--Hier kann man vielleicht Drag and Drop nutzen?-->

    <h3>Inhalt:</h3>
    <p><textarea name="inhalt" rows=”200″ cols="40"></textarea></p>

    <h3>Dauer:</h3>
    <p><input type="text" name="dauer"></p>

    <h3>Autor:</h3>
    <p><input type="text" name="autor" value="<?php echo htmlspecialchars($row['username']);?>"></p>

    <h3>Nutzer:</h3>
    <p><input type="text" name="nutzer" value="<?php echo htmlspecialchars($row['id']);?>"></p>

    <h3>Zutaten:</h3>
    <p><input type="text" name="zutaten"></p>
<?php
}

}else{
    die("Datenbank-Fehler");}
}else{
    echo "Bitte erst <a href='login.php'>einloggen</a>";
}


?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
<body>







    </div>


    <h3><button type="submit" class="btn btn-primary">Post hochladen</button></h3>
</form>
<br>

<h3><a href="../oeffentliche_seiten/index.php" class="btn btn-primary">Zurück</a></h3>

<footer>
    <?php
    require("../includes/footer_include.php");
    ?>
</footer>
</body>
</html>