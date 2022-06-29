<?php
require("../includes/database_include.php");
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>login_do</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/style.css">
</head>
<body>
<?php
require("../includes/navbar_include.php");
?>
<div class="content post">
<?php
if (!isset($_POST["username"]) or !isset($_POST["passwort"])) { #Abfrage ob beide input Felder ausgefüllt wurden
    echo "<div style='text-align: center;'>"; #damit Text in der Mitte angezeigt wird, sieht schöner aus
    die("Login oder Passwort falsch angegeben");
    echo "</div>";
}
$statement = $pdo->prepare("SELECT * FROM Nutzer WHERE username=:username"); #SQL Abfrage Tabelle "Nutzer", filter nach username
$statement->bindParam(":username",$_POST["username"]); #einfügen username aus form
if($statement->execute()){
    if($row = $statement->fetch()) {
        if(password_verify($_POST["passwort"],$row["passwort"])){ #Überprüfung ob Passwort richtig eingegeben wurde
            echo "<div style='text-align: center;'>"; #Wenn Passwort richtig eingegeben wurde, wird der Nutzer angemeldet
            echo "Herzlich Willkommen ".$row["vorname"]." ".$row["nachname"]."!";
            echo "</div>";
            $_SESSION["id"] = $row["id"]; #über Session wird die ID gespeichert, wichtig da an vielen Stellen benötigt.
            $_SESSION["username"] = $row["username"];
        } else {
            echo "Passwort falsch";
        }
    }else{ #Wenn der Nutzername nicht vorhanden ist, wird dies ausgeführt.
        echo "<div style='text-align: center;'>";
        echo"Nutzer nicht vorhanden";
        echo "</div>";
    }
}else {
    die("Datenbank-Fehler");
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
