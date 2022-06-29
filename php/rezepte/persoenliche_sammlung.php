<?php
require("../includes/database_include.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>profil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/style.css">


</head>
<body>
<?php
require("../includes/navbar_include.php");
?>
<div class="content post" style="text-align: center">

        <h2>Persönliche Sammlung</h2><br>

    <div class="container mx-auto">
        <div class="row row-cols-2">
<?php
if (isset($_SESSION['id'])){
    $statement = $pdo->prepare("SELECT * from Sammlung WHERE nutzer_id=:id");
    $statement->bindParam(":id",$_SESSION['id']);
    if($statement->execute()){
        while($row=$statement->fetch())
            {$rezepte= $row["rezept_id"];
                $state = $pdo->prepare("SELECT * FROM Rezepte WHERE id=$rezepte");
                if($state->execute()){
                    $row=$state->fetch();{
                        ?>
                    <div class="col">
                        <div class="card mb-3" style="max-width: 740px; margin-right: auto; margin-left: auto;">
                            <div class="row g-0">
                                <div class="col-md-4" >
                                    <?php echo "<img src='https://mars.iuk.hdm-stuttgart.de/~ap121//webprojekt_gruppe/rezept_bilder/".$row['titelbild']."' class='img-fluid rounded-start' alt='bild' style='object-fit: cover; object-position: 50%; width: 245px; height:325px;'>"; ?>
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo "<a href='./../rezepte/details.php?id=".$row["id"]." ' class='text'> ".htmlspecialchars($row['titel'])." </a>";?></h5>

                                        <p class="card-text"><?php echo htmlspecialchars($row['dauer']);?> </p>
                                        <div>
                                        <?php echo "<a href='./../rezepte/details.php?id=".$row["id"]."' class='btn btn-primary' style='background-color: #d17609; border-color:#d17609;'>Zum Rezept</a>" ?> </div><br>
                                        <div>
                                        <?php echo "<a href='./../rezepte/loeschen_sammlung.php?id=".$row["id"]."' class='btn btn-primary' style='background-color: #d17609; border-color:#d17609;'>Aus Sammlung löschen</a>" ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>






    <?php }

                    #echo "<img height='30%' width='30%' src='https://mars.iuk.hdm-stuttgart.de/~ap121//webprojekt_gruppe/rezept_bilder/".$row['titelbild']."' alt='bild'><br>";
                }else{
                    die("Datenbank-Fehler");}
            }

    }else{
        die("Datenbank-Fehler");}


}else
    {echo "Bitte erst <a href='../nutzer_management/login.php'>anmelden</a>";}

?>
        </div>
    </div>
</div>

<footer>
    <?php
    require("../includes/footer_include.php");
    ?>
</footer>
</body>
</html>
