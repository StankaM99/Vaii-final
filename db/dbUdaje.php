<?php
include 'prihlUdaje.php';

class Databaza
{
    private const DB_HOST = "localhost";
    private const DB_NAME = "udaje";
    private const DB_USER = 'root';
    private const DB_PASS = 'dtb456';

    private PDO $pdo;

    private $database;

    public function __construct()
    {
        try {
            $this->database = new PDO('mysql:dbname=' . self::DB_NAME . ';host=' . self::DB_HOST, self::DB_USER, self::DB_PASS);
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }

    }

   public function load()
    {
        $udaje = [];
        $dbUdaje = $this->database->query('SELECT * FROM udaje.prihludaje');

        foreach ($dbUdaje as $udaj)
        {
            $udaje[] = new prihlasovacieUdaje($udaj['login'], $udaj['heslo'], $udaj['heslo']);
        }
        return $udaje;
    }

    public function skontrolujLogin() : bool
    {
        if($_POST['meno'] == 'admin')
        {
            return false;
        }

        $dbLogin = $this->database->query('SELECT login from udaje.prihludaje');

        foreach ($dbLogin as $login) {
            if ($login['login'] == $_POST['meno']) {
                return false;
            }
        }
        return true;
    }


    public function save(prihlasovacieUdaje $udaj) : bool
    {
        try {
            if($this->skontrolujLogin()) {
                if ($udaj->skontrolujHeslo()) {

                    $hashHeslo = password_hash($udaj->getHeslo(), PASSWORD_BCRYPT);

                    $sql = 'INSERT INTO udaje.prihludaje(login, heslo) VALUES (?,?)';
                    $this->database->prepare($sql)->execute([$udaj->getLogin(), $hashHeslo]);
                    return true;
                } else {
                    echo '<script>alert("Zadane hesla sa nezhoduju.")</script>';
                    return false;
                }
            } else{
                echo '<script>alert("Zadany login uz existuje.")</script>';
                return false;
            }
        } catch (PDOException $e)
        {
            echo 'Connection failed: ' . $e->getMessage();
            return false;
        }
    }

    public function noveHeslo($zadlogin, $noveHeslo, $zopakuj): bool
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
    }

    public function odstranUser($zadlogin, $zadHeslo, $overHeslo): int
    {
        $sql = $this->database->prepare("SELECT heslo FROM prihludaje WHERE login = ?");
        $sql->execute([$zadlogin]);

        if ($data = $sql->fetch()) {
            if ($zadHeslo == $overHeslo) {
                if (password_verify($zadHeslo, $data['heslo'])) {
                    try {
                        $sql1 = "DELETE FROM udaje.prihludaje WHERE login=?";
                        $this->database->prepare($sql1)->execute([$zadlogin]);
                        return 1;
                    } catch (PDOException $e) {
                        echo 'Failed: ' . $e->getMessage();
                        return 0;
                    }
                } else {
                    return 3;
                }
            } else {
                return 2;
            }
        }
        return 4;
    }

    public function odstran($zadlogin): bool
    {
        try {
            $sql1 = "DELETE FROM udaje.prihludaje WHERE login=?";
            $this->database->prepare($sql1)->execute([$zadlogin]);
            return true;
        } catch (PDOException $e) {
            echo 'Failed: ' . $e->getMessage();
            return false;
        }
    }



    public function prihlas($zadlogin, $zadHeslo): int
    {
        if($zadlogin == "admin")
        {
            if($zadHeslo == "admin123")
            {
                return 4;
            } else {
                return 2;
            }
        }
        else{
            $sql = $this->database->prepare("SELECT * FROM udaje.prihludaje WHERE login = ?");
            $sql->execute([$zadlogin]);

            if( $data = $sql->fetch()) {
                if ($data['login'] == $zadlogin && password_verify($zadHeslo, $data['heslo'])) {
                    return 1;
                } else {
                    return 2;
                }
            } else{
                return 3;
            }
        }
    }

    public function getIdByLogin($zadLogin): int
    {

        try {
            $sql = $this->database->prepare("SELECT id FROM udaje.prihludaje WHERE login = ?");
            $sql->execute([$zadLogin]);

            $data = $sql->fetch();
            $userId = $data['id'];

            return $userId;

        } catch (PDOException $e) {
            echo 'Failed: ' . $e->getMessage();
            return 0;
        }
    }


}