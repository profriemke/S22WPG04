<?php
#include("./includes/database_include.php");
$pdo=new PDO('mysql:: host=mars.iuk.hdm-stuttgart.de; dbname=u-ap121', 'ap121', 'evi7ohS5ea', array('charset'=>'utf8'));
session_start();
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Bewertung</title>
    <link rel="stylesheet" href="../../css/style.css">
</head>

<body>
<?php
    $nutzer_id=$_SESSION['id'];
    $recipe_id=$_POST['recipe_id'];
?>

    <form action="rating_do.php" method="post" >
        <input type="hidden" name = "user_id" value="<?php echo($nutzer_id);?>">

        <input type="hidden" name="recipe_id" value="<?php echo($recipe_id);?>">
        <input type="hidden" name="rezept_id" value=1>


        <input type="radio" name="rating" value="5" id="rating-5">
        <label for="rating-5">5</label>
        <input type="radio" name="rating" value="4" id="rating-4">
        <label for="rating-4">4</label>
        <input type="radio" name="rating" value="3" id="rating-3">
        <label for="rating-3">3</label>
        <input type="radio" name="rating" value="2" id="rating-2">
        <label for="rating-2">2</label>
        <input type="radio" name="rating" value="1" id="rating-1">
        <label for="rating-1">1</label>

        <textarea cols="20" name="comment" placeholder="Schreibe einen Kommentar" id="comment"></textarea>

        <input type ="hidden" name="timestamp" value="">

        <input type="submit" value = "Bewertung abgeben" >

    </form>
</body>
</html>