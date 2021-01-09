<?php


class zakladHTML
{
    /**
     *  Vytvoření hlavičky stránky (header)
     * @param string $title Nazev stranky.
     */
    public static function createHeader($title=""){
        ?>
        <!doctype html>
        <html lang="cs">
        <head>
            <meta charset="utf-8">
            <meta name="description" content="Úvodní stránka webu PandeBros">
            <meta name="keywords" content="úvodní stránka, pandebros">
            <meta name="author" content="David Muhr">
            <!-- nastaveni viewportu je zakladem pro responzivni design i Boostrap -->
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">

            <script src="composer/vendor/components/jquery/jquery.min.js"></script>
            <script src="composer/vendor/alexandermatveev/popper-bundle/AlexanderMatveev/PopperBundle/Resources/public/popper.min.js"></script>
            <script src="composer/vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>

            <link rel="stylesheet" href="composer/vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
            <link rel="stylesheet" href="composer/vendor/components/font-awesome/css/font-awesome.min.css">

            <!-- CSS-->
            <link href="CSS/full_pic.css" rel="stylesheet">
            <style>
                .is-required {
                    color: red;
                    font-weight: bold;
                }
            </style>

            <title><?=$title?></title>


        </head>
        <?php
    }

    /**
     * Vytvoření navigace
     *
     * @param $pravo        /Hodnota práva uživatele
     * @param string $stav  /Stav - přihlášen/odhlášen
     */
    public static function createNav($pravo,$stav="prihlaseni"){
        ?>
        <!-- Hlavicka -->
        <header class="py-5 bg-image-full" style="background-image: url('https://eacea.ec.europa.eu/sites/eacea-site/files/page-header-covid.png');">
            <div class="container">
                <h1 class="font-weight-bold text-warning" style="text-shadow: black 1px 2px">PandeBros</h1>
                <p class="text-warning" style="text-shadow: black 1px 0">Pomáhejme si!</p>
            </div>
        </header>
        <!-- KONEC: Hlavicka -->

        <!-- Menu -->
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top pull">
            <div class="container">
                <!-- Brand -->
                <a class="navbar-brand" href="index.php">
                    <span class="fa fa-plus"></span>
                    PandeBros
                </a>

                <!-- Toggler/collapsibe Button -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Navbar links -->
                <div class="collapse navbar-collapse" id="collapsibleNavbar">
                    <ul class="navbar-nav">
                        <?php  // Pokud neni prihlasen, ukaze se moznost prihlaseni
                        if ($stav=='prihlaseni'){ ?>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?page=registrace">Přihlásit/Registrovat</a>
                        </li> <?php }
                        ?>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?page=nabidky">Nabídky</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?page=faq">FAQ</a>
                        </li>
                        <!-- Dropdown -->
                        <?php
                        if ($pravo != null){ ?>
                        <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                                    Účet
                                </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="">Profil</a>
                                <?php if ($pravo==5) { ?>
                                    <a class="dropdown-item" href="index.php?page=n_predmet">Vytvořit nabídku</a>
                                <?php } ?>
                                <?php if ($pravo==10) { ?>
                                    <a class="dropdown-item" href="">Spravovat nabídky</a>
                                <?php } ?>
                            </div>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </nav>
        <br>
        <!-- KONEC: Menu -->
        <?php
    }

    /**
     * Vypsání patičky
     */
    public static function createFooter(){
        ?>
        <!-- Kontakt -->
        <div class="row-cols-2 container-fluid fixed-bottom">
            <div class="col-12 pull-right">
                <span class="pull-right"><button class="btn btn-dark btn-sm" data-toggle="collapse" data-target="#demo">Kontakt</button></span>
            </div>
            <div id="demo" class="col-6 collapse text-justify text-light font-italic bg-dark rounded pull-right">
                V případě potřeby nás můžete kontaktovat těmito způsoby:<br><br>
                <b>Hlavní Email:</b> Never_gonna@give.you.up<br>
                <b>Správcův Email:</b> Never_gonna@let.you.down<br>
                <br>
                <b>Hlavní Adresa</b><br>
                <b>Město:</b> Never gonna run around and desert you<br>
                <b>Ulice:</b> Never gonna make you cry<br>
                <br>
                <b>Adresa pobočky v Plzni</b><br>
                <b>Ulice:</b> Never gonna say goodbye<br>
                <br>
                <b>Telefon</b>: Never gonna tell a lie and hurt you<br>
            </div>
        </div>
        <!-- KONEC: Kontakt -->

        <!-- Paticka -->
        <footer class="container-fluid bg-dark text-white text-center font-weight-bold">
            ZČU
            <span class="fa fa-copyright"></span>
            David Muhr 2021
        </footer>
        <!-- KONEC: Paticka -->
        <?php
    }
}