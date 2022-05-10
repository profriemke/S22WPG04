<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Logout</title>
</head>
<body>

    <?php
    require("../includes/database_include.php");
    session_start();


    require("../includes/navbar_include.php");

    if (isset($_SESSION['id'])) {
        session_destroy();
        echo "Logout erfolgreich";
    }
    ?>
</body>

</html>
