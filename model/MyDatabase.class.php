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

    public function getAllUsers(){

        $q = "SELECT * FROM". TABLE_UZIVATEL ."ORDER BY jmeno";

        $res = $this->pdo->query($q);

        if(!$res) {
            return [];
        }
        else {
            return $res->fetchAll();
        }
    }


}