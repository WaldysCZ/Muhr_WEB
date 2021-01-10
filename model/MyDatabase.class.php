<?php


class MyDatabase
{
    /** @var PDO $pdo  PDO objekt pro práci s databází. */
    private $pdo;

    /**
     * Inicializace připojení k databázi.
     */
    public function __construct(){
        $this->pdo = new PDO("mysql:host=".DB_SERVER.";dbname=".DB_NAME, DB_USER, DB_PASS);
        $this->pdo->exec("set names utf8");
    }

    /**
     *  Provede dotaz a bud vrati ziskana data, nebo pri chybe ji vypise a vrati null.
     *
     *  @param string $dotaz        SQL dotaz.
     *  @return PDOStatement|null    Výsledek dotazu
     */
    private function executeQuery(string $dotaz): ?PDOStatement
    {

        $res = $this->pdo->query($dotaz);
        if ($res) {
            return $res;
        } else {
            $error = $this->pdo->errorInfo();
            echo $error[2];
            return null;
        }
    }

    /**
     * Select z jedné tabulky
     *
     * @param string $tableName         Název tabulky
     * @param string $whereStatement    Pripadne omezeni na ziskani radek tabulky. Default "".
     * @param string $orderByStatement  Pripadne razeni ziskanych radek tabulky. Default "".
     * @return array                    Vraci pole ziskanych radek tabulky.
     */
    public function selectFromTable(string $tableName, string $whereStatement = "", string $orderByStatement = ""):array {
        $q = "SELECT * FROM ".$tableName
            .(($whereStatement == "") ? "" : " WHERE $whereStatement")
            .(($orderByStatement == "") ? "" : " ORDER BY $orderByStatement");

        $obj = $this->executeQuery($q);
        if($obj == null){
            return [];
        }
        return $obj->fetchAll();
    }

    /**
     * Upráva řádku databáze
     *
     * @param string $tableName                     Nazev tabulky.
     * @param string $updateStatementWithValues     Cela cast updatu s hodnotami.
     * @param string $whereStatement                Cela cast pro WHERE.
     * @return bool                                 Upraveno v poradku?
     */
    public function updateInTable(string $tableName, string $updateStatementWithValues, string $whereStatement):bool {

        $q = "UPDATE $tableName SET $updateStatementWithValues WHERE $whereStatement";

        $obj = $this->executeQuery($q);
        if($obj == null){
            return false;
        } else {
            return true;
        }
    }

    public function deleteInTable(string $tableName, string $whereStatement):bool {

        $q = "DELETE FROM $tableName WHERE $whereStatement";

        $obj = $this->executeQuery($q);
        if($obj == null){
            return false;
        } else {
            return true;
        }
    }

    public function getAllNabidky():array {
        $q = "SELECT * FROM ".TABLE_NABIDKA;

        return $this->pdo->query($q)->fetchAll();
    }

    public function getAllPomoci():array {
        $q = "SELECT * FROM ".TABLE_POMOCI;

        return $this->pdo->query($q)->fetchAll();
    }

    public function getAllUsers():array {
        $q = "SELECT * FROM ".TABLE_UZIVATEL;

        return $this->pdo->query($q)->fetchAll();
    }

    /**
     * Získání uživatele podle loginu
     *
     * @param string $login    login pro vyhledání v databízi.
     * @return array
     */
    public function getAUser(string $login): ?array
    {
        $q = "SELECT * FROM ".TABLE_UZIVATEL
            ." WHERE login=:login;";
        $user = $this->pdo->prepare($q);
        $user->bindValue(":login",$login);
        if($user->execute()){
            return $user->fetchAll();
        } else {
            return null;
        }
    }

    public function getUserNameByID(int $id): string {

        $user = $this->selectFromTable(TABLE_UZIVATEL, "id_uzivatel='$id'");
        return $user[0]['jmeno'];
    }

    public function vratUzivatele($login, $password){
        $q = "SELECT * FROM ".TABLE_UZIVATEL." WHERE login=:login AND heslo=:heslo;";
        $vystup = $this->pdo->prepare($q);
        $vystup->bindValue(":login", $login);
        $vystup->bindValue(":heslo", $password);
        if($vystup->execute()){
            return $vystup->fetchAll();
        } else {
            return null;
        }
    }

    /**
     * Registruje nového uživatele
     *
     * @param $email /Email uživatele
     * @param $username /Uživatelské jméno
     * @param $password /Heslo
     * @param string $pravo /právo uživatele
     * @return bool         Povedlo se?
     */
    public function registrujUzivatele($username,$password,$email,$jmeno = "",$prijmeni="",
        $telefon="",$pravo="4"): bool
    {
        $username = htmlspecialchars($username);
        $password = htmlspecialchars($password);
        $email = htmlspecialchars($email);
        $jmeno = htmlspecialchars($jmeno);
        $telefon = htmlspecialchars($telefon);

        $name = $jmeno . " " . $prijmeni;

        // Zda neni v databazi
        $uzivatel = $this->vratUzivatele($username,$password);

        if(!isset($uzivatel) || count($uzivatel)==0){

            $q = "INSERT INTO ".TABLE_UZIVATEL." (`id_uzivatel`, `id_pravo`, `jmeno`, `login`, `heslo`, `email`, `telefon`, `id_vybrana_nabidka`) 
            VALUES (NULL,:pravo, :jmeno, :login, :heslo, :email, :telefon, NULL);";
            $vystup = $this->pdo->prepare($q);
            $vystup->bindValue(":pravo", $pravo);
            $vystup->bindValue(":jmeno", $name);
            $vystup->bindValue(":login", $username);
            $vystup->bindValue(":heslo", $password);
            $vystup->bindValue(":email", $email);
            $vystup->bindValue(":telefon", $telefon);

            if($vystup->execute()){
                return true;
            } else {
                return false;
            }
        }
        return false;
    }

    /**
     * Vytvoření celé objednávky
     *
     * @param $id_nabídka           /ID nabídky
     * @param $id_uzivatel              /ID uživatele, který vytvořil nabídku
     * @param $lokace               /Lokace
     * @param $info                 /Info
     * @param $hodnoceni            /Hodnoceni nabidky, začíná na 0
     * @param int $visible          / Jestli už byla nebo nebyla schvalena
     * @return bool
     */
    public function vytvorNabidku($id_uzivatel, $lokace, $info,int $hodnoceni=0, int $visible=0): bool
    {

        $q = "INSERT INTO ".TABLE_NABIDKA." (`id_nabidka`, `id_uzivatel`, `lokace`, `info`, `hodnoceni`, `visible`) 
        VALUES (NULL,:idUzivatel, :lokace, :info, :hodnoceni, :visible);";
        $vystup = $this->pdo->prepare($q);

        $vystup->bindValue(":idUzivatel", $id_uzivatel);
        $vystup->bindValue(":lokace", $lokace);
        $vystup->bindValue(":info", $info);
        $vystup->bindValue(":hodnoceni", $hodnoceni);
        $vystup->bindValue(":visible", $visible);

        if($vystup->execute()){
            return true;
        } else {
            return false;
        }
    }

    public function schvalitNabidku($idNabidky):bool {

        $updateStatementWithValues = "visible=1";

        $whereStatement = "id_nabidka=$idNabidky";

        return $this->updateInTable(TABLE_NABIDKA, $updateStatementWithValues, $whereStatement);
    }

    public function deleteNabidku(int $idNabidky):bool {
        $whereStatement = "id_nabidka= $idNabidky";
        $whereStatement2 = "muhrd_nabidka_id_nabidka= $idNabidky";

        $this->deleteInTable(TABLE_NABIDKA_POMOCI, $whereStatement2);
        return $this->deleteInTable(TABLE_NABIDKA, $whereStatement);
    }

    public function getAllpomociByIdNabídka(int $idNabidka): array
    {
        $pomoci = $this->selectFromTable(TABLE_NABIDKA_POMOCI,"muhrd_nabidka_id_nabidka='$idNabidka'");
        return $pomoci;
    }

    public function getHodnoceni($id): int {
        $hodnoceni= $this->selectFromTable(TABLE_NABIDKA, "id_nabidka='$id'");
        return $hodnoceni[0]['hodnoceni'];
    }

    public function getPomocNameByID($id): string {
        $pomoc = $this->selectFromTable(TABLE_POMOCI, "id_pomoci='$id'");
        return $pomoc[0]['jmeno'];
    }

    public function getPomocById(int $id): array
    {
        $pomoc = $this->selectFromTable(TABLE_POMOCI, "id_pomoci='$id'");
        return $pomoc[0];
    }

    public function spojNabidkuSPomoci(int $idNabidka, int $idPomoc): bool {

        $q = "INSERT INTO ".TABLE_NABIDKA_POMOCI." (`muhrd_nabidka_id_nabidka`, `muhrd_typy_pomoci_id_pomoci`) 
        VALUES (:idNabidka, :idPomoc);";
        $vystup = $this->pdo->prepare($q);

        $vystup->bindValue(":idNabidka", $idNabidka);
        $vystup->bindValue(":idPomoc", $idPomoc);

        if($vystup->execute()){
            return true;
        } else {
            return false;
        }

    }

    public function getLastIDNabidky(): string {

        $nabidka = $this->selectFromTable(TABLE_NABIDKA, "",
            "`id_nabidka` DESC");
        return $nabidka[0]['id_nabidka'];
    }

    public function pridatNabidkaKUzivateli($idnabidka, $idUser): bool {
        $updateStatementWithValues = "id_vybrana_nabidka=$idnabidka";

        $whereStatement = "id_uzivatel=$idUser";

        return $this->updateInTable(TABLE_UZIVATEL, $updateStatementWithValues, $whereStatement);

    }

    public function zrusitNabidku(int $idUser): bool {

        $updateStatementWithValues = "id_vybrana_nabidka=null";

        $whereStatement = "id_uzivatel=$idUser";

        return $this->updateInTable(TABLE_UZIVATEL, $updateStatementWithValues, $whereStatement);

    }

    public function pridejHodnoceni($idNabidka, int $hodnoceni): bool {

        $puvodniHodnoceni = $this->getHodnoceni($idNabidka);

        if($puvodniHodnoceni!=0){
            $suma = $puvodniHodnoceni + $hodnoceni;
            $prumer = $suma/2;
        }
        else{
            $prumer=$hodnoceni;
        }

        $updateStatementWithValues = "hodnoceni=$prumer";

        $whereStatement = "id_nabidka=$idNabidka";

        return $this->updateInTable(TABLE_NABIDKA, $updateStatementWithValues, $whereStatement);
    }

}