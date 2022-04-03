<?php
require("./database_include.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Webprojekt</title>
</head>

<body>

    <?php
    $statement = $pdo->prepare('SELECT * FROM Rezepte');
    if($statement->execute()) {
        header("Content-Type: application/json");
        $data=$statement->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
    } else {
        echo 'Datenbank-Fehler:';
        echo $statement->errorInfo()[2];
        echo $statement->queryString;
        die();
    }
    ?>

</body>

</html>

