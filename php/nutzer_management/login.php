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
<body>

<?php
require("../includes/navbar_include.php");
?>

<div class="content post">

<form class="signup-wrapper" action="login_do.php" method="post">
    <h2> Bei eat.pray.eat anmelden </h2><br>
    <input type="text" name="username" id="username" minlength="1" required placeholder="Username"><br>
    <input type="password" name="passwort" id="passwort"  minlength="1" required placeholder="Passwort">
    <br>

    <button class='btn btn-primary' style='background-color: #d17609; border-color:#d17609;' type="submit" id="absenden" class='btn btn-primary' style='background-color: #d17609; border-color:#d17609; '>anmelden</button>
    <br>
    <p> Noch kein Konto? Jetzt <a href="registrieren.php">registrieren</a>! </p>
</form>
</div>


    <footer>
        <?php
        require("../includes/footer_include.php");
        ?>
    </footer>
</body>
</html>
