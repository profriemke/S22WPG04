<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/style.css">
</head>



<?php
include("../includes/navbar_include.php")
?>

<div class="content mx-auto" style="width: 90vw; text-align: center">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
<body>
<?php
require("../includes/database_include.php");
?>

<?php
session_start();
if (!isset($_SESSION["id"])){
    echo "<h1>Nutzer nicht angemeldet</h1>";
    echo "<h3>Hier zum <a href='../nutzer_management/login.php' class='btn btn-primary'>Login</a></h3>";
    die("<h3><a href='../oeffentliche_seiten/index.php' class='btn btn-primary'>Zurück</a></h3>");

} // Falls man angemeldet sein muss um bearbeiten zu können

?>
<h1>Rezept</h1>

<?php
$statement = $pdo->prepare("SELECT * FROM Rezepte WHERE id=?");
if ($statement->execute(array(htmlspecialchars($_GET["id"])))){
    if($row = $statement->fetch()){
        ?>

        <form class="signup-wrapper" action="edit_do.php" method="post" enctype="multipart/form-data">

            <label for="titel">Titel:</label>
            <input type="text" name="titel" value="<?php echo $row["titel"]; ?>">
            <br>

            <img height='10%' width='10%' src='https://mars.iuk.hdm-stuttgart.de/~ap121//webprojekt_gruppe/rezept_bilder/<?php echo $row["titelbild"];?>'alt='bild'><br>
            <input type ="file" name="titelbild" id="titelbild">

           <!-- <label for="titelbild">Titelbild:</label>
            <input type="file" name="titelbild" value="<?php #echo $row["titelbild"]; ?>">
            <br> -->

            <label for="zutaten">Zutaten:</label>
            <input type="text" name="zutaten" value="<?php echo $row["zutaten"]; ?>">
            <br>

            <label for="inhalt">Inhalt:</label>
            <input type="text" name="inhalt" value="<?php echo $row["inhalt"]; ?>">
            <br>

            <label for="dauer">Dauer:</label>
            <input type="text" name="dauer" value="<?php echo $row["dauer"]; ?>">
            <br>



          <!--  <label for="bio">Bio:</label>
            <p><#?php echo $row['bio']; ?></p>
            <label for="bio">ändern:</label> <br>
            <textarea type="text" name="bio" cols="40" rows="8">
                </textarea> <br> -->

            <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
            <br>

            <button class="action-button" type="submit" id="absenden">Rezept ändern</button>
            <br>
        </form>
        <?php

        echo "<a href='./../rezepte/delete.php?id=" . $row["id"] . " ' class='btn btn-danger'>Rezept löschen </a>";
    }else{
        echo ("Rezept nicht vorhanden");
    }
}else{
    die("Datenbank-Fehler");
}
echo "<a href='./../rezepte/details.php?id=".htmlspecialchars($row["id"])." ' class='btn btn-primary'>Zurück zu ".htmlspecialchars($row['titel'])." </a>";
?>


</div>
<footer>
    <?php
    require("../includes/footer_include.php");
    ?>
</footer>
</body>
</html>

