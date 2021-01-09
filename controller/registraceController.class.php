<?php

require_once(DIRECTORY_CONTROLLERS."/IController.interface.php");

/**
 * Ovladač zajištující vypsání registrace/přihlášení
 */
class registraceController
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
        if (isset($_POST['registruj']) and isset($_POST['email']) and
            isset($_POST['heslo']) and isset($_POST['login']) and
            $_POST['registruj'] == "registruj" and
            $_POST['agree'] == true){

            $username = htmlspecialchars($_POST['login']);
            $email = htmlspecialchars($_POST['email']);
            $heslo = htmlspecialchars($_POST['heslo']);

            $jmeno = htmlspecialchars($_POST['jmeno']);
            $prijmeni = htmlspecialchars($_POST['prijmeni']);
            $telefon = htmlspecialchars($_POST['telefon']);

            $isRegistered = $this->db->getAUser($username);

            if(!count($isRegistered)){
                $this->db->registrujUzivatele($username,$heslo, $email,$jmeno,$prijmeni,$telefon,4);
                $tplData['login'] = "Registrace se zdařila! Vítejte ".$username;
            } else {
                $tplData['povedloSe'] = false;
                $tplData['login'] = "Je mi líto, ale registrace se nezdařila. Nejspíše už je tento email použit.";
            }
        }

        ob_start();
        require(DIRECTORY_VIEWS ."/registrace.php");
        $obsah = ob_get_clean();

        return $obsah;
    }

}
?>