<?php
require("../includes/database_include.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>profil bearbeiten do</title>
    <link rel="stylesheet" href="../../css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<?php

require("../includes/navbar_include.php");
?>
<div class="content post">

    <?php
if (isset($_SESSION['id'])){ #Abfrage ID
        $statement = $pdo->prepare("SELECT * FROM Nutzer WHERE id=:id"); #SQL Abfrage um im nächsten Schritt das aktuelle Passwort zu prüfen
        $statement->bindParam(":id",$_POST['id']);
        if($statement->execute()){
        if($row = $statement->fetch()) {
        if(password_verify($_POST["passwort"],$row["passwort"])){ #aktuelles Passwort auf Richtigkeit prüfen
             $statement = $pdo->prepare("UPDATE Nutzer SET passwort=? WHERE id=?"); #Wenn richtig: UPDATE mit neuem Passwort wird durchgeführt
                    if($statement->execute(array( password_hash($_POST["passwort_neu"], PASSWORD_BCRYPT),#der Passworthash wird durchgeührt damit das Paasswort gehasht in die DB eingespeichert wird
                        htmlspecialchars($_POST['id'])))) #id wird für das WHERE id=? nochmal hier eingefügt, hier ist die richtige Reihenfolge wie im SQL Befehl wichtig!
            {echo "Passwort erfolgreich geändert!<br> Zurück zum <a href='profil.php'>Profil.</a>";}}}

        } else {
            echo "Passwort falsch, bitte erneut versuchen";
            #hier habe ich nochmal den gleichen Code von "passwort_aendern" eingefügt, um erneutes Navigieren zur Seite durch viele Klicks zu vermeiden
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
            <?php }}}

}else
{die("Bitte erst <a href='login.php'>registrieren</a><br>Zurück zur <a href='../oeffentliche_seiten/index.php'>Startseite </a>");}
?>
</div>

<footer>
    <?php
    require("../includes/footer_include.php");
    ?>
</footer>
</body>
</html>