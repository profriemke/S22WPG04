<div class="navbar">
<a href="../oeffentliche_seiten/index.php"> Startseite </a>
<a href="../nutzer_management/profil.php"> Profil </a>
<a href="../rezepte/post.php"> Neues Rezept </a>
    <?php
    if (!isset($_SESSION['id'])){
        echo('<a class="logo-wrapper-link anmelden-button" href="../nutzer_management/login.php">Anmelden</a>'); }
    else{
        echo('<a class="logo-wrapper-link anmelden-button" href="../nutzer_management/logout.php">Abmelden</a>');
    }?>
<a href="../rezepte/persoenliche_sammlung.php"> persönliche Sammlung </a>
</div>


