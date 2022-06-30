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
<!-- Form zum Registrieren -->
    <!-- Besonderheit: minlenght, so kann sichergestellt werden, dass Nutzer was eingeben muss, bevor er das form abschickt-->
<form class="signup-wrapper" action="registrieren_do.php" method="post" enctype="multipart/form-data">
    <h2>Neues Konto erstellen</h2><br>
    <input type="text" name="vorname" id="vorname" minlength="1" required placeholder="Vorname"><br>
    <input type="text" name="nachname" id="nachname" minlength="1" required placeholder="Nachname"><br>
    <input type="text" name="email" id="email" minlength="1" required placeholder="E-Mail"><br>
    <input type="password" name="passwort" id="passwort" minlength="1" required placeholder="Passwort"> <br>
    <input type="text" name="username" id="username" minlength="1" required placeholder="Username">  <br> <br>
    <label for="bio">Profilbild:</label><br>
    <input type ="file" name="file" id="file"> <br>

    <button class='btn btn-primary' style='background-color: #d17609; border-color:#d17609;' type="submit" id="absenden">registrieren</button>
</form>
</div>
<footer>
    <?php
    require("../includes/footer_include.php");
    ?>
</footer>
</body>
</html>