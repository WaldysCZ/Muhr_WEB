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
        // Přidání nové nabídky
        if (isset($_POST['pridejNabidku']) and isset($_POST['lokace'])
            and isset($_POST['info']) and
            $_POST['agree'] == true and
            $_POST['pridejNabidku'] == "pridejNabidku"){

            $id_uzivatel = 5;
            $lokace = htmlspecialchars($_POST['lokace']);
            $info = htmlspecialchars($_POST['info']);

            $tplData['povedloSe'] = $this->db->vytvorNabidku($id_uzivatel,$lokace,$info);

            $id_nabidka = $this->db->getLastIDNabidky();

            // Pridání pomocí do tabulky
            if ($pomoc = htmlspecialchars(isset($_POST['nakupy']))==true) {
                $this->db->spojNabidkuSPomoci($id_nabidka,1);
            }
            if ($pomoc = htmlspecialchars(isset($_POST['spolecnost']))==true) {
                $this->db->spojNabidkuSPomoci($id_nabidka,2);
            }
            if ($pomoc = htmlspecialchars(isset($_POST['telefon']))==true) {
                $this->db->spojNabidkuSPomoci($id_nabidka,3);
            }
            if ($pomoc = htmlspecialchars(isset($_POST['dovoz']))==true) {
                $this->db->spojNabidkuSPomoci($id_nabidka,4);
            }
            if ($pomoc = htmlspecialchars(isset($_POST['doucovani']))==true) {
                $this->db->spojNabidkuSPomoci($id_nabidka,5);
            }
            if ($pomoc = htmlspecialchars(isset($_POST['pomoc']))==true) {
                $this->db->spojNabidkuSPomoci($id_nabidka,6);
            }

        }

        ob_start();
        require(DIRECTORY_VIEWS ."/novy_predmet.php");
        $obsah = ob_get_clean();

        return $obsah;
    }
}