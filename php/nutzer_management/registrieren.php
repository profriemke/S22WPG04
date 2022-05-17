<?php
require("../includes/database_include.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>signup</title>
</head>
<body>
<?php
require("../includes/navbar_include.php");
?>

<form action="registrieren_do.php" method="post" enctype="multipart/form-data">
    <h2>Neues Konto erstellen</h2>
    <input type="text" name="vorname" id="vorname" placeholder="Vorname"><br>
    <input type="text" name="nachname" id="nachname" placeholder="Nachname"><br>
    <input type="text" name="email" id="email" placeholder="E-Mail"><br>
    <input type="password" name="passwort" id="passwort" placeholder="Passwort"> <br>
    <input type="text" name="username" id="username" placeholder="Username">  <br> <br>
    <input type ="file" name="file" id="file"> <br> <br>

    <button type="submit" id="absenden">registrieren</button>
</form>
</body>
</html>