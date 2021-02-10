<?php

include_once 'userPrispev.php';
include_once 'dbUdaje.php';

class Databaza2
{
    private const DB_HOST = "localhost";
    private const DB_NAME = "udaje";
    private const DB_USER = 'root';
    private const DB_PASS = 'dtb456';

    private PDO $pdo;

    private $datab;

    public function __construct()
    {
        try {
            $this->datab = new PDO('mysql:dbname=' . self::DB_NAME . ';host=' . self::DB_HOST, self::DB_USER, self::DB_PASS);
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
    }

    public function load()
    {
        $prispevky = [];
        $dbPrispevky = $this->datab->query('SELECT * FROM udaje.prispevky');

        foreach ($dbPrispevky as $prispevok) {
            $userLogin = $this->getLoginById($prispevok['pouzivatel']);

            $prispevky[] = new userPrispev($prispevok['id'], $userLogin, $prispevok['nadpis'], $prispevok['text']);
        }

            return $prispevky;

    }


    public function save($zadId, $zadNadpis, $zadText): bool
    {
        try {
            $sql = 'INSERT INTO udaje.prispevky(pouzivatel, nadpis, text) VALUES (?,?,?)';
            $this->datab->prepare($sql)->execute([$zadId, $zadNadpis, $zadText]);
            return true;
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
            return false;
        }
    }

    public function odstranPrisp($zadId): bool
    {
        try {
            $sql = 'DELETE FROM udaje.prispevky WHERE id=?';
            $this->datab->prepare($sql)->execute([$zadId]);
            return true;
        } catch (PDOException $e) {
            echo 'Failed: ' . $e->getMessage();
            return false;
        }
    }

    public function getLoginById($zadId): string
    {

        try {
            $sql = $this->datab->prepare('SELECT login FROM udaje.prihludaje WHERE id = ?');
            $sql->execute([$zadId]);

            $data = $sql->fetch();

            $userLogin = $data['login'];


            return $userLogin;

        } catch (PDOException $e) {
            echo 'Failed: ' . $e->getMessage();
            return 'Chyba';
        }
    }

}