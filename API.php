<?php
require("./database_include.php");
?>


<?php
$statement = $pdo->prepare("SELECT * FROM Rezepte");
if($statement->execute()) {
    $data=$statement->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($data, JSON_UNESCAPED_UNICODE);
} else {
    echo 'Datenbank-Fehler:';
    echo $statement->errorInfo()[2];
    echo $statement->queryString;
    die();
}
?>


