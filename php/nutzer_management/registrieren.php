<?php
require("../includes/database_include.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>registrieren</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/style.css">
</head>
<body>
<?php
require("../includes/navbar_include.php");
?>

<div class="content post">

<form class="signup-wrapper" action="registrieren_do.php" method="post" enctype="multipart/form-data">
    <h2>Neues Konto erstellen</h2><br>
    <input type="text" name="vorname" id="vorname" placeholder="Vorname"><br>
    <input type="text" name="nachname" id="nachname" placeholder="Nachname"><br>
    <input type="text" name="email" id="email" placeholder="E-Mail"><br>
    <input type="password" name="passwort" id="passwort" placeholder="Passwort"> <br>
    <input type="text" name="username" id="username" placeholder="Username">  <br> <br>
    <label for="bio">Profilbild:</label><br>
    <input type ="file" name="file" id="file"> <br>

    <button class="action-button" type="submit" id="absenden">registrieren</button>
</form>
</div>
<footer>
    <?php
    require("../includes/footer_include.php");
    ?>
</footer>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</html>