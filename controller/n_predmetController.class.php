<?php

require_once(DIRECTORY_CONTROLLERS."/IController.interface.php");

/**
 * Ovladač zajištující vypsání stránky k přidání nového předmětu
 */
class n_predmetController
{
    /** @var MyDatabase $db  Sprava databaze. */
    private $db;
    /**
     * @var userManage $user Správa uživatele
     */
    private $user;

    /**
     * Inicializace připojení k databázi a správě uživatele.
     */
    public function __construct() {
        // inicializace prace s DB
        require_once (DIRECTORY_MODELS ."/MyDatabase.class.php");
        $this->db = new MyDatabase();
        /*
        require_once (DIRECTORY_MODELS ."/userManage.php");
        $this->user = new userManage();*/
    }

    /**
     * Vrátí obsah úvodní stránky
     * @param string $pageTitle     Název stránky
     * @return string               Výpis
     */
    public function show(string $pageTitle):string {
        global $tplData;
        $tplData = [];

        $tplData['title'] = $pageTitle;

        /*
        if(isset($_POST['odhlasit']) and $_POST['odhlasit'] == "odhlasit"){
            $this->user->userLogout();
        }

        $tplData['userLogged'] = $this->user->isUserLogged();

        if($tplData['userLogged']){
            $user = $this->user->getLoggedUserData();
            $tplData['pravo'] = $user['PRAVA_id_prava'];
        } else {
        	// Nastavím právo pro nepřihlášeného uživatele NULL
            $tplData['pravo'] = null;
        }
*/
        // Přidání nové řeky
        if (isset($_POST['pridejNabidku']) and isset($_POST['lokace'])
            and isset($_POST['info']) and
            $_POST['agree'] == true and
            $_POST['pridejNabidku'] == "pridejNabidku"){

            $id_nabidka = 6;
            $id_uzivatel = 5;
            $lokace = htmlspecialchars($_POST['lokace']);
            $info = htmlspecialchars($_POST['info']);

            $tplData['povedloSe'] = $this->db->vytvorNabidku($id_nabidka,$id_uzivatel,$lokace,$info);

        }

        ob_start();
        require(DIRECTORY_VIEWS ."/novy_predmet.php");
        $obsah = ob_get_clean();

        return $obsah;
    }
}