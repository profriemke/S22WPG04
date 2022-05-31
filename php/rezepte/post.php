<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <title>Title</title>
    <link rel="stylesheet" href="../../css/style.css">
</head>

<?php
require("../../database_include.php");
session_start();
/*if (!isset($_SESSION["id"])){
    echo "<h1>Nutzer nicht angemeldet</h1>";
    echo "<h3>Hier zum <a href='../account/login.php' class='btn btn-primary'>Login</a></h3>";
    die("<h3><a href='../public/index.php' class='btn btn-primary'>Zurück</a></h3>");

}
*/
?>

<?php
include("./../includes/navbar_include.php")
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
    echo "Bitte erst <a href='login.php'>registrieren</a>";
}


?>

<body>







    </div>


    <h3><button type="submit" class="btn btn-primary">Post hochladen</button></h3>
</form>
<br>

<h3><a href="../oeffentliche_seiten/index.php" class="btn btn-primary">Zurück</a></h3>

</body>
</html>