<?php
require("../includes/database_include.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>profil</title>
    <link rel="stylesheet" href="../../css/style.css">
    <meta name="viewport" content="width=device-width">
</head>
<body>
<?php
require("../includes/navbar_include.php");
?>
<?php
if (isset($_SESSION['id'])){
    $id=$_SESSION['id'];
    $statement = $pdo->prepare("SELECT * from Sammlung WHERE nutzer_id=$id");
    if($statement->execute()){
        while($row=$statement->fetch())
            {$rezepte= $row["rezept_id"];
                $state = $pdo->prepare("SELECT * FROM Rezepte WHERE id=$rezepte");
                if($state->execute()){
                    while($row=$state->fetch()){
                        echo "<div class='titel'>";
                        echo "<h3>";
                        echo "<a href='./../rezepte/details.php?id=".$row["id"]." ' class='text'> ".htmlspecialchars($row['titel'])." </a>";
                        echo "</h3>";
                        echo "<br>";
                        echo "<p class='Inhalt'>";
                        echo htmlspecialchars($row['inhalt']);
                        echo "</p>";
                        echo "<br>";
                    }

                }else{
                    die("Datenbank-Fehler");}


            }

    }else{
        die("Datenbank-Fehler");}


}else
    {echo "Bitte erst <a href='../nutzer_management/login.php'>anmelden</a>";}

?>

</body>
</html>
