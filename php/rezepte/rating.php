<?php
if (isset($_SESSION['id'])) {
    $nutzer_id = $_SESSION['id'];
}
else {
    echo("Fehler");
}
?>

<form action="rating_do.php" method="post" >
    <input type="hidden" name ="user_id" value="<?php echo($nutzer_id);?>">

    <input type="hidden" name="rezept_id" value="<?php echo $row["id"]; ?>">


    <input type="radio" name="rating" value="5" id="rating-5">
    <label for="rating-5">5</label>
    <input type="radio" name="rating" value="4" id="rating-4">
    <label for="rating-4">4</label>
    <input type="radio" name="rating" value="3" id="rating-3">
    <label for="rating-3">3</label>
    <input type="radio" name="rating" value="2" id="rating-2">
    <label for="rating-2">2</label>
    <input type="radio" name="rating" value="1" id="rating-1">
    <label for="rating-1">1</label> <br>

    <textarea cols="20" name="kommentar" placeholder="Schreibe einen Kommentar" id="comment"></textarea>


    <input type="submit" value = "Bewertung abgeben" >

</form>
