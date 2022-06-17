<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<!--<style type="text/css">
    .navbar{
        max-height: 20% !important;
        margin-bottom: 0;
    }
</style>-->
<div class="navibar">
    <div class="logo-wrapper">
        <a href="../oeffentliche_seiten/index.php"><img height="100" width="100" src="https://mars.iuk.hdm-stuttgart.de/~ap121//webprojekt_gruppe/website_bilder/logo.png" alt="Logo"></a>
    </div>

    <div class="links-wrapper">
<a class="nav-link" href="../rezepte/post.php"> Neues Rezept </a>
    </div>
    <div class="drop">
        <div class="drop-header"><img height="100" width="100" src="https://mars.iuk.hdm-stuttgart.de/~ap121//webprojekt_gruppe/website_bilder/user.png" alt="user"></div>
        <div class="drop-content">
            <div class="drop-item"><a href="../nutzer_management/profil.php">Profil</a></div>
            <div class="drop-item"><a href="../rezepte/persoenliche_sammlung.php">persönliche Sammlung</a></div>
            <div class="drop-item">
                <?php
                if (!isset($_SESSION['id'])){
                    echo('<a href="../nutzer_management/login.php">Anmelden</a>');}
                else{
                    echo('<a href="../nutzer_management/logout.php">Abmelden</a>');
                }?></div>
            <?php
            if (!isset($_SESSION['id'])){
                echo('<a href="../nutzer_management/registrieren.php">Registrieren</a>');}
            ?></div>

        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

