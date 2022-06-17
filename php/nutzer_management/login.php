<?php
require("../includes/database_include.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/style.css">
</head>
<?php
require("../includes/navbar_include.php");
?>
<body>

<div class="content post">
    <h2> Bei eat.pray.eat anmelden </h2>
<form class="signup-wrapper" action="login_do.php" method="post">

    <input type="text" name="username" id="username" minlength="4" required placeholder="Username"><br>
    <input type="password" name="passwort" id="passwort"  minlength="4" required placeholder="Passwort"> <br>

    <button class="action-button" type="submit" id="absenden">anmelden</button>
</form>

<p> Noch kein Konto? Jetzt <a href="registrieren.php">registrieren</a>! </p>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>
