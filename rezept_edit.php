<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <title>Edit</title>
</head>

<?php
require("database_include.php");
session_start();
/*if (!isset($_SESSION["id"])){
    echo "<h1>Nutzer nicht angemeldet</h1>";
    echo "<h3>Hier zum <a href='../account/login.php' class='btn btn-primary'>Login</a></h3>";
    die("<h3><a href='../public/index.php' class='btn btn-primary'>Zurück</a></h3>");

}
*/ // Falls man angemeldet sein muss um bearbeiten zu können

?>

<?php
include("navbar_include.php")
?>

<body>

<h1>Rezept</h1>

<?php
$statement = $pdo->prepare("SELECT * FROM Rezepte WHERE id=?");
if ($statement->execute(array(htmlspecialchars($_GET["id"])))){
    if($row = $statement->fetch()){
        ?>
        <form action="edit_do.php?id=<?php echo htmlspecialchars($row["ID"]); ?>" method="post">
            <h2>Titel:</h2>
            <input type="text" name="titel" value="<?php echo htmlspecialchars($row["Titel"]); ?>">
            <h2>Post:</h2>
            <textarea name="post" rows=”200″ cols="40"><?php echo htmlspecialchars($row["Inhalt"]); ?></textarea> <p>
            <p>
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

<h3><a href="index.php" class="btn btn-primary">Zurück</a></h3>

</body>
</html>

