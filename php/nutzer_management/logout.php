<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Logout</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/style.css">
</head>
<body>

    <?php
    require("../includes/database_include.php");
    session_start(); #Session start um sie im nächsten Schritt aufzulösen



    require("../includes/navbar_include.php");
    ?>

<div class="content post" style="text-align: center;">
    <?php
    if (isset($_SESSION['id'])) {
        session_destroy(); #Hiermit wird die Session aufgelöst, also der Nutzer abgemeldet
        echo "Logout erfolgreich";
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
