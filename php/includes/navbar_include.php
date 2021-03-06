<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

<?php
if (!isset($_SESSION['id'])){
 ?>

<!--Navbar mit Bootstrap Template
Hier die Navbar wenn man nicht angemeldet ist, sodass "Anmelden"(Zeile 36) und "Registrieren"(Zeile 37) erscheint-->
    <nav class="navbar navbar-expand-lg" style="background-color: #004445;">
        <div class="container-fluid">
            <a class="navbar-brand" href="../oeffentliche_seiten/index.php" style="padding: 0px 20px;">
                <img src="https://mars.iuk.hdm-stuttgart.de/~ap121//webprojekt_gruppe/website_bilder/Logo" alt="Logo" width="100" height="100">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown" >
                <ul class="navbar-nav" style="margin-right: 0px; margin-left: auto">
                    <div style="margin-top: auto; margin-bottom: auto;">
                        <li class="nav-item" style="">
                            <button class="btn btn-sm btn-outline-secondary" type="button">
                                <a class="nav-link active" aria-current="page" style="color:white;" href="../rezepte/post.php">Neues Rezept</a>
                            </button>
                        </li>
                    </div>
                    <div class="d-flex" style="float: left;">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img height="100" src="https://mars.iuk.hdm-stuttgart.de/~ap121//webprojekt_gruppe/website_bilder/user.png" alt="user">
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="../nutzer_management/profil.php">Profil</a></li>
                                <li><a class="dropdown-item" href="../rezepte/persoenliche_sammlung.php">Favoriten</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="../nutzer_management/login.php">Anmelden</a></li>
                                <li><a class="dropdown-item" href="../nutzer_management/registrieren.php">Registrieren</a></li>
                            </ul>
                        </li>
                    </div>
                </ul>
            </div>
        </div>
    </nav>

<?php
}
else{?>
        <!--Navbar wenn man angemeldet ist, damit "Abmelden"(Zeile 76)  angezeigt wird -->
<nav class="navbar navbar-expand-lg" style="background-color: #004445;">
    <div class="container-fluid">
        <a class="navbar-brand" href="../oeffentliche_seiten/index.php" style="padding: 0px 20px;">
            <img src="https://mars.iuk.hdm-stuttgart.de/~ap121//webprojekt_gruppe/website_bilder/Logo.png" alt="Logo" width="100" height="100">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown" >
            <ul class="navbar-nav" style="margin-right: 0px; margin-left: auto">
                <div style="margin-top: auto; margin-bottom: auto;">
                    <li class="nav-item" style="">
                        <button class="btn btn-sm btn-outline-secondary" type="button">
                            <a class="nav-link active" aria-current="page" style="color:white;" href="../rezepte/post.php">Neues Rezept</a>
                        </button>
                    </li>
                </div>
                <div class="d-flex" style="float: left;">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img height="100" src="https://mars.iuk.hdm-stuttgart.de/~ap121//webprojekt_gruppe/website_bilder/user.png" alt="user">
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="../nutzer_management/profil.php">Profil</a></li>
                            <li><a class="dropdown-item" href="../rezepte/persoenliche_sammlung.php">Favoriten</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="../nutzer_management/logout.php">Abmelden</a></li>
                        </ul>
                    </li>
                </div>
            </ul>
        </div>
    </div>
</nav>
<?php }?>