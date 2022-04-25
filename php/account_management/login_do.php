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
require("../navbar_include.php");

if (!isset($_POST["Username"]) or !isset($_POST["Username"])) {
    die("Login oder Passwort falsch angegeben");
}
$statement = $pdo->prepare("SELECT * FROM Nutzer WHERE Username=:Username");
$statement->bindParam(":Username",$_POST["Username"]);
if($statement->execute()){
    if($row = $statement->fetch()) {
        if(password_verify($_POST["Passwort"],$row["Passwort"])){
            echo "Herzlich Willkommen ".$row["Username"];
            $_SESSION["ID"] = $row["ID"];
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
