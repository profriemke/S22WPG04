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
if (!isset($_POST["username"]) or !isset($_POST["passwort"])) {
    die("Login oder Passwort falsch angegeben");
}
$statement = $pdo->prepare("SELECT * FROM Nutzer WHERE username=:username");
$statement->bindParam(":username",$_POST["username"]);
if($statement->execute()){
    if($row = $statement->fetch()) {
        if(password_verify($_POST["passwort"],$row["passwort"])){
            echo "Herzlich Willkommen ".$row["vorname"].$row["nachname"]."!";
            $_SESSION["id"] = $row["id"];
        } else {
            echo "Passwort falsch";
        }
    }else{
        echo"Nutzer nicht vorhanden";
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
