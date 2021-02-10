<?php
include 'film.php';

class databFilm
{
    private const DB_HOST = "localhost";
    private const DB_NAME = "udaje";
    private const DB_USER = 'root';
    private const DB_PASS = 'dtb456';

    private PDO $pdo;

    private $film;

    public function __construct()
    {
        try {
            $this->film = new PDO('mysql:dbname=' . self::DB_NAME . ';host=' . self::DB_HOST, self::DB_USER, self::DB_PASS);
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }

    }

    public function load()
    {
        $filmy = [];
        $dbFilmy = $this->film->query('SELECT * FROM udaje.filmy');

        foreach ($dbFilmy as $f) {
            $filmy[] = new tipFilm($f['id'], $f['nazov'], $f['rok'], $f['zaner'], $f['hodnotenie'], $f['obrazok'], $f['link']);
        }
        return $filmy;
    }

    public function save($zadNazov, $zadRok, $zadZaner, $zadHod, $zadObrazok, $zadLink): bool
    {
        try {
            $sql = 'INSERT INTO udaje.filmy(nazov, rok, zaner, hodnotenie, obrazok) VALUES (?,?,?,?,?,?)';
            $this->film->prepare($sql)->execute([$zadNazov, $zadRok, $zadZaner, $zadHod, $zadObrazok, $zadLink]);
            return true;
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
            return false;
        }
    }

    public function odstran($id): int
    {
        try {
            $sql1 = "DELETE FROM udaje.filmy WHERE id=?";
            $this->film->prepare($sql1)->execute([$id]);
            return 1;
        } catch (PDOException $e) {
            echo 'Failed: ' . $e->getMessage();
            return 0;
        }
    }

}