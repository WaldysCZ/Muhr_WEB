<?php

require_once(DIRECTORY_CONTROLLERS."/IController.interface.php");

/**
 * Ovladač zajišťující vypsání uživatelova profilu.
 */
class profilController implements IController {

	/** @var MyDatabase $db  Sprava databaze. */
	private $db;
	/**
	 * @var userManage  $user Načtení správy uživatele
	 */
	private $user;

	/**
	 * Inicializace pripojeni k databazi a ke správě uživatele.
	 */
	public function __construct() {
		// inicializace prace s DB
		require_once (DIRECTORY_MODELS ."/MyDatabase.class.php");
		$this->db = new MyDatabase();
		require_once (DIRECTORY_MODELS ."/userManage.php");
		$this->user = new userManage();
	}

	/**
	 * Vrati obsah profilu.
	 * @param string $pageTitle     Název stránky.
	 * @return string
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

        $uzivatele = $this->db->getAllUsers();

        $tplData['uzivatele'] = $uzivatele;


		if(isset($_POST['odhlasit']) and $_POST['odhlasit'] == "odhlasit"){
			$this->user->userLogout();
			header('location: index.php?page=uvod');
		}

		$tplData['userLogged'] = $this->user->isUserLogged();

		if($tplData['userLogged']){
			$user = $this->user->getLoggedUserData();
			$tplData['pravo'] = $user['id_pravo'];
			$tplData['username'] = $user['login'];
			$tplData['email'] = $user['email'];
			$tplData['password'] = $user['heslo'];
            $tplData['name'] = $user['jmeno'];
            $tplData['telefon'] = $user['telefon'];
            $tplData['vybrana_nabidka'] = $user['id_vybrana_nabidka'];
		} else {
			$tplData['pravo'] = null;
		}

        if(isset($_POST['zamitni'])) {
            $test = $_POST;
            $idNabidky = str_split($test['zamitni'],7);
            $this->db->deleteNabidku($idNabidky[1]);
            header("Refresh:0");
        }

        if(isset($_POST['hodnot'])) {
            $hodnoceni = $_POST['hodnoceni'];

            $test = $_POST;
            $idNabidky = str_split($test['hodnot'],6);

            $this->db->pridejHodnoceni($idNabidky[1],$hodnoceni);
          //  header("Refresh:0");
        }

        if(isset($_POST['zrus'])) {
            $this->db->zrusitNabidku($user['id_uzivatel']);
            header("Refresh:0");
        }

		ob_start();
		require(DIRECTORY_VIEWS ."/profil.php");
		$obsah = ob_get_clean();

		return $obsah;
	}

}

?>