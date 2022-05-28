<div class="navbar">
    <div class="logo-wrapper">
        <a href="../oeffentliche_seiten/index.php"><img height="100" width="100" src="https://mars.iuk.hdm-stuttgart.de/~ap121//webprojekt_gruppe/website_bilder/Logo_weiß.png" alt="Logo"></a>
    </div>

    <div class="links-wrapper">
<a class="nav-link" href="../rezepte/post.php"> Neues Rezept </a>
    </div>
    <div class="drop">
        <div class="drop-header"><img height="70" width="70" src="https://mars.iuk.hdm-stuttgart.de/~ap121//webprojekt_gruppe/website_bilder/user.png" alt="user"></div>
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
</div>


