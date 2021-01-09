<?php

require_once(DIRECTORY_CONTROLLERS."/IController.interface.php");

/**
 * Ovladač zajištující vypsání Nabídek
 */
class nabidkyController
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
     * Vrátí obsah stránky s nabídky
     * @param string $pageTitle     Název stránky
     * @return string               Výpis
     */
    public function show(string $pageTitle):string {
        global $tplData;
        $tplData = [];

        $tplData['title'] = $pageTitle;

        $nabidky = $this->db->getAllNabidky();

        foreach ($nabidky as $key => $nabidka){
            $nabidky[$key]['id_uzivatel'] = $this->db->getUserNameByID(($nabidka['id_uzivatel']));

            $pomoci = $this->db->getAllpomociByIdNabídka($nabidka['id_nabidka']);

            foreach ($pomoci as $keySecond => $pomoc){
                $pomoci[$keySecond]['muhrd_typy_pomoci_id_pomoci'] = $this->db->getPomocNameById($pomoc['muhrd_typy_pomoci_id_pomoci']);
            }

            $tplData["pomoci".$nabidka["id_nabidka"]] = $pomoci;
        }

        $tplData['nabidky'] = $nabidky;
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
        ob_start();
        require(DIRECTORY_VIEWS ."/nabidky.php");
        $obsah = ob_get_clean();

        return $obsah;
    }
}