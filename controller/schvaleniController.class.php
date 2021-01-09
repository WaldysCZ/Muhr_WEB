<?php

require_once(DIRECTORY_CONTROLLERS."/IController.interface.php");

/**
 * Ovladač zajištující vypsání Nabídek
 */
class schvaleniController
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
     * Vrátí obsah stránky pro schvaleni
     * @param string $pageTitle     Název stránky
     * @return string               Výpis
     */
    public function show(string $pageTitle):string {
        global $tplData;
        $tplData = [];

        $tplData['title'] = $pageTitle;

        $tplData['nabidky'] = $this->db->getAllNabidky();

        $tplData['pomoci'] = $this->db->getAllPomoci();

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
        require(DIRECTORY_VIEWS ."/schvaleni.php");
        $obsah = ob_get_clean();

        return $obsah;
    }
}