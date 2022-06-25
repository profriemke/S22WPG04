<?php
require("../includes/database_include.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>profil bearbeiten</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<?php

require("../includes/navbar_include.php");
?>
<div class="content post">

<?php
if (isset($_SESSION['id'])){
    $statement = $pdo->prepare("SELECT * from Nutzer WHERE id=:id");
    $statement->bindParam(":id",$_SESSION['id']);
    if($statement->execute()){
        if($row=$statement->fetch()){
            ?>
            <form class="signup-wrapper" action="profil_bearbeiten_do.php" method="post" enctype="multipart/form-data">

                <label for="vorname">Vorname:</label>
                <input type="text" name="vorname" value="<?php echo $row["vorname"]; ?>">
                <br>

                <label for="nachname">Nachname:</label>
                <input type="text" name="nachname" value="<?php echo $row["nachname"]; ?>">
                <br>

                <label for="email">E-Mail:</label>
                <input type="text" name="email" value="<?php echo $row["email"]; ?>">
                <br>

                <label for="bio">Bio:</label>

                <textarea type="text" name="bio" cols="40" rows="8"><?php echo $row['bio']; ?>
                </textarea> <br>

                <img class='profilbild' height='40%' width='40%' src='https://mars.iuk.hdm-stuttgart.de/~ap121//webprojekt_gruppe/profil_bilder/<?php echo $row["bild"];?>'alt='bild'><br>
                <input type ="file" name="file" id="file">

                <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
                <br>

                <button class='btn btn-primary' style='background-color: #d17609; border-color:#d17609; ' type="submit" id="absenden">Profil ändern</button>
            </form>
            <?php
        }else
        {echo("Nutzer nicht vorhanden");
        }
    }else
    {die("Datenbank-Fehler");
    }
}else
{echo "Bitte erst <a href='login.php'>anmelden</a>";
}
?>
</div>

<footer>
    <?php
    require("../includes/footer_include.php");
    ?>
</footer>
</body>
</html>