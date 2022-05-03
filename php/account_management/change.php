<?php
require("../includes/database_include.php");
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
if (isset($_SESSION['id'])){
    $id=$_SESSION['id'];
    $statement = $pdo->prepare("SELECT * from Nutzer WHERE id=$id");
    if($statement->execute(array($_GET["id"]))) {
        if($row=$statement->fetch()){
            ?>
            <form action="change_do.php" method="post">

                <label for="vorname">Vorname:</label>
                <input type="vorname" name="vorname" value="<?php echo $row["vorname"]; ?>">
                <br>

                <label for="nachname">Nachname:</label>
                <input type="nachname" name="nachname" value="<?php echo $row["nachname"]; ?>">
                <br>

                <label for="geburtstag">Geburtstag:</label>
                <input type="date" name="geburtstag" value="<?php echo $row["geburtstag"]; ?>">

                <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
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