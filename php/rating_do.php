<?php
#include("./includes/database_include.php");
$pdo=new PDO('mysql:: host=mars.iuk.hdm-stuttgart.de; dbname=u-ap121', 'ap121', 'evi7ohS5ea', array('charset'=>'utf8'));

session_start();

//if (!isset($_SESSION["id"])) {
//    echo "<a href='../public_sites/index.php'> Zurück zur Startseite <br></a>";
//    die("Um diese Aktion ausführen zu können musst du angemeldet sein!");

//}
$rating = $_POST["rating"];
$nutzer_id=$_SESSION['id'];
$rezept_id=$_POST['rezept_id'];
if (isset($_POST["kommentar"]) && isset($_POST["rating"])) {
    $statement = $pdo->prepare("INSERT INTO Bewertungen (rezept_id, nutzer_id, rating, kommentar, timestamp) VALUES  ($rezept_id, $nutzer_id, ?, ?, NOW())"); #hier sterne zu rating angleichen, vorher datenbank überprüfen
    if ($statement->execute(array( htmlspecialchars($_POST["rezept_id"]), htmlspecialchars($_POST["id"]), htmlspecialchars($_POST["rating"]), htmlspecialchars($_POST["kommentar"]))))
        echo("Bewertung eingefügt");

    else{
        echo $statement->errorInfo()[2];
        echo $statement->queryString;
        die("Fehler beim Einfügen");
    }
        }
/*
 if(isset($_POST["rating"])&& isset($_POST["comment"])){
    $rating = $_POST["rating"];
    $comment = $_POST["comment"];
    #$id=$_SESSION['id'];

    $statement = $pdo->prepare("INSERT INTO Bewertungen (sterne, kommentar, nutzer_id) VALUES (:rating, :comment)");

    $statement->bindParam(':rating', $rating);
    $statement->bindParam(':comment', $_comment);


    if($statement->execute() ){
        echo "Upload erfolgreich";
    }
    else {
        echo $statement->errorInfo()[2];
        echo $statement->queryString;
        echo "</div>";
        die();
    }
    }
*/

