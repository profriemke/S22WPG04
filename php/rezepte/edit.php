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
require("../includes/database_include.php");
session_start();
/*if (!isset($_SESSION["id"])){
    echo "<h1>Nutzer nicht angemeldet</h1>";
    echo "<h3>Hier zum <a href='../account/login.php' class='btn btn-primary'>Login</a></h3>";
    die("<h3><a href='../public/index.php' class='btn btn-primary'>Zurück</a></h3>");

}
*/ // Falls man angemeldet sein muss um bearbeiten zu können

?>

<?php
include("../includes/navbar_include.php")
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
<body>

<h1>Rezept</h1>

<?php
$statement = $pdo->prepare("SELECT * FROM Rezepte WHERE id=?");
if ($statement->execute(array(htmlspecialchars($_GET["id"])))){
    if($row = $statement->fetch()){
        ?>
        <input action="edit_do.php?id=<?php echo htmlspecialchars($row["id"]); ?>" method="post">

            <h2>Titel:</h2>
            <input type="text" name="titel" value="<?php echo htmlspecialchars($row["titel"]); ?>">

            <h2>Post:</h2>
            <textarea name="inhalt" rows=”200″ cols="100"><?php echo htmlspecialchars($row["inhalt"]); ?></textarea>

            <h2>Zutaten:</h2>
            <textarea name="zutaten" rows=”200″ cols="100"><?php echo htmlspecialchars($row["zutaten"]); ?></textarea>

            <h2>Dauer:</h2>
            <textarea name="dauer" rows=”200″ cols="100"><?php echo htmlspecialchars($row["dauer"]); ?></textarea>

            <h2>Titelbild:</h2>
            <input type="file" name="titelbild" value="<?php echo htmlspecialchars($row["titelbild"]); ?>">

            <button input type="submit" class='btn btn-primary'>Edit</button>
        </form>
        <?php
    }else{
        echo ("Rezept nicht vorhanden");
    }
}else{
    die("Datenbank-Fehler");
}
?>
<h3><a href="../oeffentliche_seiten/index.php" class="btn btn-primary">Zurück</a></h3>

<footer>
    <?php
    require("../includes/footer_include.php");
    ?>
</footer>
</body>
</html>

