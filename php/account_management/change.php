<?php
require("../../database_include.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Aendern</title>
</head>
<body>
<?php
if (isset($_SESSION['ID'])){
    $ID=$_SESSION['ID'];
    $statement = $pdo->prepare("SELECT * from Nutzer WHERE ID=$ID");
    if($statement->execute(array($_GET["ID"]))) {
        if($row=$statement->fetch()){
            ?>
            <form action="change_do.php" method="post">

                <label for="Vorname">Vorname:</label>
                <input type="Vorname" name="Vorname" value="<?php echo $row["Vorname"]; ?>">
                <br>

                <label for="Nachname">Nachname:</label>
                <input name="Nachname" value="<?php echo $row["Nachname"]; ?>">

                <label for="Geburtstag">Geburtstag:</label>
                <input name="Geburtstag" value="<?php echo $row["Geburtstag"]; ?>">

                <input type="hidden" name="ID" value="<?php echo $row["ID"]; ?>">
                <br>

                <button type="submit" id="absenden">Post ändern</button>
            </form>
            <?php
        }else
        {echo("Post nicht vorhanden");
        }
    }else
    {die("Datenbank-Fehler");
    }
}else
{echo "Bitte erst <a href='login.php'>registrieren</a>";
}
?>
</body>
</html>