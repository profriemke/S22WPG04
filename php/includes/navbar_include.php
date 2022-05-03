<div class="navbar">
<a href="../public_sites/index.php">Startseite </a>
<a href="../account_management/profile.php">Profil </a>
<a href="../recipes/post_rezept.php">Neues Rezept</a>
    <?php
    if (!isset($_SESSION['id'])){
        echo('<a class="logo-wrapper-link anmelden-button" href="login.html">Anmelden</a>'); }
    else{
        echo('<a class="logo-wrapper-link anmelden-button" href="logout.php">Abmelden</a>');
    }?>
</div>


