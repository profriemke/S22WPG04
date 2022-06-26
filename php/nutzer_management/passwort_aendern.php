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
                <form class="signup-wrapper" action="passwort_aendern_do.php" method="post">

                    <input type="password" name="passwort" id="passwort" placeholder="aktuelles Passwort eingeben"> <br>

                    <input type="password" name="passwort_neu" id="passwort_neu" placeholder="neues Passwort eingeben"> <br>

                    <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
                    <br>

                    <button class='btn btn-primary' style='background-color: #d17609; border-color:#d17609; ' type="submit" id="absenden">Passwort ändern</button>
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