<?php
include("./../includes/navbar_include.php");
include("../../database_include.php");
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title> Coole Kochseite </title>
</head>
<body>
<?php
$statement = $pdo->prepare('SELECT * FROM Rezepte');
if ($statement->execute()) {
    while ($row = $statement->fetch()) {
        //$datei="../../files".$row["datei"];
        echo "<div class='titel'>";
        echo "<h3>";
        echo htmlspecialchars($row['Titel']);
        echo "</h3>";
        echo "<br>";
        echo "<p class='Inhalt'>";
        echo htmlspecialchars($row['Inhalt']);
        echo "</p>";
        echo "<br>";
       # echo "<div class='postpicture'>";
        #if (!empty($row["datei"])){
         #   echo "<img src='../../".$row["datei"]. "'>";
       # }

        #echo "</div>";
        #echo "<br>";
        echo "<a href='rezept_edit.php?id=".$row["ID"]." ' class='button'> Rezept bearbeiten </a>";
        #echo "<a href='../post/delete_do.php?id=".$row["id"]."' class='button'> Post löschen </a>";
        #echo "</div>";
    }
}
else {
    die("Dieses Rezept ist aktuell leider nicht verfügbar.");
}
?>

<?php

echo("Neuste Rezepte");
?>
?>

</body>