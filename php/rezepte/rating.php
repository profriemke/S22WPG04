
<link rel="stylesheet" href="../../css/rating.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" >
<?php
if (isset($_SESSION['id'])) {
    $nutzer_id = $_SESSION['id'];
}

?>

<div class="widget-container">

    <form action="rating_do.php" method="post" >
        <input type="hidden" name ="user_id" value="<?php echo($nutzer_id);?>">

        <input type="hidden" name="rezept_id" value="<?php echo ($rezepte_id); ?>">



        <div class="sterne">
            <div class="sterne-inner">
            <input type="radio" name="rating" value="5" id="rating-5">
            <label for="rating-5" class="fas fa-star"></label>
            <input type="radio" name="rating" value="4" id="rating-4">
            <label for="rating-4" class="fas fa-star"></label>
            <input type="radio" name="rating" value="3" id="rating-3">
            <label for="rating-3" class="fas fa-star"></label>
            <input type="radio" name="rating" value="2" id="rating-2">
            <label for="rating-2" class="fas fa-star"></label>
            <input type="radio" name="rating" value="1" id="rating-1">
            <label for="rating-1" class="fas fa-star"></label>
            </div>
        </div>
        <textarea cols="20" rows="5" name="kommentar" placeholder="Sag uns deine Meinung" id="comment"></textarea>

        <br>
        <input type="submit" value = "Bewertung abgeben" class="btn btn-primary">
        </div>
    </form>
