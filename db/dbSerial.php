<?php
include 'serial.php';

class databSerial
{
    private const DB_HOST = "localhost";
    private const DB_NAME = "udaje";
    private const DB_USER = 'root';
    private const DB_PASS = 'dtb456';

    private PDO $pdo;

    private $serial;

    public function __construct()
    {
        try {
            $this->serial = new PDO('mysql:dbname=' . self::DB_NAME . ';host=' . self::DB_HOST, self::DB_USER, self::DB_PASS);
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }

    }

    public function load()
    {
        $serialy = [];
        $dbSerialy= $this->serial->query('SELECT * FROM udaje.serialy');

        foreach ($dbSerialy as $s)
        {
            $serialy[] = new tipSerial($s['id'], $s['nazov'], $s['zaner'], $s['hodnotenie'], $s['obrazok']);
        }
        return $serialy;
    }

    public function save($zadNazov, $zadZaner, $zadHod, $zadObrazok) : int
    {
        if($this->skonObr($zadObrazok))
        {
            try {
                $sql = 'INSERT INTO udaje.serialy(nazov, zaner, hodnotenie, obrazok) VALUES (?,?,?,?)';
                $this->serial->prepare($sql)->execute([$zadNazov, $zadZaner, $zadHod, $zadObrazok]);
                return 1;
            } catch (PDOException $e)
            {
                echo 'Connection failed: ' . $e->getMessage();
                return 2;
            }
        } else {
            return 3;
        }

    }

    public function odstran($id): int
    {

        try {
            $sql1 = "DELETE FROM udaje.serialy WHERE id=?";
            $this->serial->prepare($sql1)->execute([$id]);
            return 1;
        } catch (PDOException $e) {
            echo 'Failed: ' . $e->getMessage();
            return 0;
        }
    }

    private function skonObr($zadLink):bool
    {
        return strpos($zadLink,".jpg") !== false || strpos($zadLink,".png") !== false;
    }

}