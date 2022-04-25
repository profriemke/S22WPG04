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
    $statement = $pdo->prepare("SELECT * FROM Nutzer WHERE ID=?");
    if($statement->execute(array($_GET["ID"]))) {
        if($row=$statement->fetch()){
            ?>
            <form action="change_do.php" method="post">
                <label for="titel">Titel:</label>
                <input type="titel" name="titel" value="<?php echo $row["titel"]; ?>"> <br>

                <label for="post">Text:</label>
                <textarea name="post" cols="80" rows="8" value="<?php echo $row["post"]; ?>">
                    </textarea>

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