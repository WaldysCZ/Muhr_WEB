<?php
///////////////////////////////////////////////////////
////////////// Zakladni nastaveni webu ////////////////
///////////////////////////////////////////////////////

////// nastaveni pristupu k databazi ///////

    // prihlasovaci udaje k databazi
    define("DB_SERVER","localhost");
    define("DB_NAME","kivweb");
    define("DB_USER","root");
    define("DB_PASS","");

    // definice konkretnich nazvu tabulek
    define("TABLE_UZIVATEL","muhrd_uzivatel");
    define("TABLE_PRAVO","muhrd_pravo");
    define("TABLE_NABIDKA","muhrd_nabidka");
    define("TABLE_POMOCI","muhrd_typy_pomoci");
    define("TABLE_NABIDKA_POMOCI","muhrd_nabidka_has_typy_pomoci");



///// vsechny stranky webu ////////

/** Adresar kontroleru. */
const DIRECTORY_CONTROLLERS = "controller";
/** Adresar modelu. */
const DIRECTORY_MODELS = "model";
/** Adresar pohledů */
const DIRECTORY_VIEWS = "view";

/** Klic defaultni webove stranky. */
const DEFAULT_WEB_PAGE_KEY = "uvod";

// dostupne stranky webu
/*
define("WEB_PAGES", [
    'uvod' => "uvod.php",
    'registrace' => "user-registration.php",
    'nabidky' => "nabidky.php",
    'faq' => "faq.php",
    'novy_predmet' => "novy_predmet.php",
    'profil' => "profil.php",
]);*/

/** Dostupne webove stranky. */
const WEB_PAGES = array(
    //// Uvodni stranka ////
    "uvod" => array(
        "title" => "Úvodní stránka",

        //// kontroler
        "file_name" => "uvodController.class.php",
        "class_name" => "uvodController",
    ),
    //// KONEC: Uvodni stranka ////

    //// Registrace////
    "registrace" => array(
        "title" => "Registrace",

        //// kontroler
        "file_name" => "registraceController.class.php",
        "class_name" => "registraceController",
    ),
    //// KONEC: Registrace////

    //// FAQ ////
    "faq" => array(
        "title" => "FAQ",

        //// kontroler
        "file_name" => "faqController.class.php",
        "class_name" => "faqController",
    ),
    //// KONEC: FAQ ////

    //// Nabidky ////
    "nabidky" => array(
        "title" => "Nabídky",

        //// kontroler
        "file_name" => "nabidkyController.class.php",
        "class_name" => "nabidkyController",
    ),
    //// KONEC: Nabídky ////

    //// Nový Předmět ////
    "n_predmet" => array(
        "title" => "Nová Nabídka",

        //// kontroler
        "file_name" => "n_predmetController.class.php",
        "class_name" => "n_predmetController",
    ),
    //// KONEC: Nabídky ////

    //// Schvaleni Nabidek ////
    "schvaleni" => array(
        "title" => "Schvaleni Nabidek",

        //// kontroler
        "file_name" => "schvaleniController.class.php",
        "class_name" => "schvaleniController",
    ),
    //// KONEC: Schvaleni ////

    //// Profil ////
    "profil" => array(
        "title" => "Účet",

        //// kontroler
        "file_name" => "profilController.class.php",
        "class_name" => "profilController",
    ),
    //// KONEC: Profil ////
);

// defaultni/vychozi stranka webu
define("WEB_PAGE_DEFAULT_KEY", 'uvod');

?>