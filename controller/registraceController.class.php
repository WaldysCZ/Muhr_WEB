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

        require_once (DIRECTORY_MODELS ."/userManage.php");
        $this->user = new userManage();
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


        if(isset($_POST['odhlasit']) and $_POST['odhlasit'] == "odhlasit"){
            $this->user->userLogout();
            header('location: index.php?page=uvod');
        }

        $tplData['userLogged'] = $this->user->isUserLogged();

        if($tplData['userLogged']){
            $user = $this->user->getLoggedUserData();
            $tplData['pravo'] = $user['id_pravo'];
        } else {
        	// Nastavím právo pro nepřihlášeného uživatele NULL
            $tplData['pravo'] = null;
        }

        if (isset($_POST['prihlasit'])){
            $login = htmlspecialchars($_POST['loginI']);
            $heslo = htmlspecialchars($_POST['hesloI']);
            $uzivatel = $this->db->vratUzivatele($login,$heslo);
            if (!empty($uzivatel)){
                $tplData['userLogged'] = $this->user->userLogin($login,$heslo);
                $tplData['povedloSe'] = true;
            } else {
                $tplData['povedloSe'] = false;
            }
        }

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
                $tplData['povedloSe'] = true;
            } else {
                $tplData['povedloSe'] = false;
            }
        }

        if (isset($_POST['registrujP'])){

            $username = htmlspecialchars($_POST['loginP']);
            $email = htmlspecialchars($_POST['emailP']);
            $heslo = htmlspecialchars($_POST['hesloP']);

            $jmeno = htmlspecialchars($_POST['jmenoP']);
            $prijmeni = htmlspecialchars($_POST['prijmeniP']);
            $telefon = htmlspecialchars($_POST['telefonP']);

            $isRegistered = $this->db->getAUser($username);

            if(!count($isRegistered)){
                $this->db->registrujUzivatele($username,$heslo, $email,$jmeno,$prijmeni,$telefon,3);
                $tplData['povedloSe'] = true;
                } else {
                $tplData['povedloSe'] = false;
            }
        }

        ob_start();
        require(DIRECTORY_VIEWS ."/registrace.php");
        $obsah = ob_get_clean();

        return $obsah;
    }

}
?>