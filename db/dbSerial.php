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

    public function save($zadNazov, $zadZaner, $zadHod, $zadObrazok) : bool
    {
        try {
            $sql = 'INSERT INTO udaje.serialy(nazov, zaner, hodnotenie, obrazok) VALUES (?,?,?,?)';
            $this->serial->prepare($sql)->execute([$zadNazov, $zadZaner, $zadHod, $zadObrazok]);
            return true;
        } catch (PDOException $e)
        {
            echo 'Connection failed: ' . $e->getMessage();
            return false;
        }
    }

    /*public function novyOrbarok($zadfilm, $novyObrazok): bool
    {
        try{
            if($noveHeslo == $zopakuj)
            {
                $hashHeslo = password_hash($noveHeslo, PASSWORD_BCRYPT);

                $sql = "UPDATE udaje.prihludaje SET heslo=? WHERE login=?";
                $this->database->prepare($sql)->execute([$hashHeslo, $zadlogin]);
                echo '<script>alert("Heslo uspesne zmenene.")</script>';
                return true;
            } else
            {
                return false;
            }

        } catch (PDOException $e) {
            echo 'Failed: ' . $e->getMessage();
            return false;
        }
    }*/

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

}