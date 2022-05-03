<?php
require("../../database_include.php");
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<?php
require("../includes/navbar_include.php");

if (!isset($_POST["username"]) or !isset($_POST["passwort"])) {
    die("Login oder Passwort falsch angegeben");
}
$statement = $pdo->prepare("SELECT * FROM Nutzer WHERE username=:username");
$statement->bindParam(":username",$_POST["username"]);
if($statement->execute()){
    if($row = $statement->fetch()) {
        if(password_verify($_POST["passwort"],$row["passwort"])){
            echo "Herzlich Willkommen ".$row["username"];
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
</body>
