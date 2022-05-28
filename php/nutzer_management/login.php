<?php
require("../includes/database_include.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="../../css/style.css">
</head>
<?php
require("../includes/navbar_include.php");
?>
<body>
<h2> Bei eat.pray.eat anmelden </h2>
<div>
<form action="login_do.php" method="post">

    <input type="text" name="username" id="username" placeholder="Username"><br>
    <input type="password" name="passwort" id="passwort" placeholder="Passwort"> <br>

    <button type="submit" id="absenden">anmelden</button>
</form>
</div>
<div>
<p> Noch kein Konto? Jetzt <a href="registrieren.php">registrieren</a>! </p>
</div>
</body>
</html>