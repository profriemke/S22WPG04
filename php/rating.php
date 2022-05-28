<?php
include("./includes/database_include.php");
session_start();
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Bewertung</title>
    <link rel="stylesheet" href="../../css/style.css">
</head>

<body>

    <form action="rating_do.php" method="post" >
        <input type="radio" name="rating" value=5 id="rating-5">
        <label for="rating-5"></label>
        <input type="radio" name="rating" id="rating-4">
        <label for="rating-4"></label>
        <input type="radio" name="rating" id="rating-3">
        <label for="rating-3"></label>
        <input type="radio" name="rating" id="rating-2">
        <label for="rating-2"></label>
        <input type="radio" name="rating" id="rating-1">
        <label for="rating-1"></label>

        <label for="comment"> Schreibe einen Kommentar </label>
        <textarea cols="20" name="comment="25" placeholder="Schreibe einen Kommentar" id="comment"></textarea>

        <button type="submit">Bewertung abgeben</button>

    </form>
</body>
</html>