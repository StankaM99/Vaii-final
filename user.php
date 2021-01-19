<?php
session_start();
require "db/dbUdaje.php";
require "db/dbPrispevok.php";

$database = new Databaza();
$datab = new Databaza2();

if(isset($_POST['uprava'])) {

    $pom = $database->noveHeslo($_SESSION['meno'], $_POST['password'],$_POST['password1']);

    if ($pom) {
        header("Location: user.php");
        echo '<script>alert("Heslo uspesne zmenene.")</script>';
    } else {
        echo '<script>alert("Nepodarilo sa zmeniť heslo.")</script>';
    }
}


if(isset($_POST['odstran']))
{
    $pom = $database->odstranUser($_SESSION['meno'], $_POST['password'], $_POST['password1']);

    if($pom == 1)
    {
        header("Location: register.php");
    }
    else if($pom == 2){
        echo '<script>alert("Zadane hesla sa nezhoduju.")</script>';
    } else if($pom == 3)
    {
        echo '<script>alert("Zadali ste nespravne heslo.")</script>';
    } else if($pom == 4)
    {
        echo '<script>alert("Nastala chyba.")</script>';
    } else
    {
        echo '<script>alert("Chyba.")</script>';
    }
}


if(isset($_POST['prispevok'])) {
    $pom = $datab->save($_SESSION['meno'], $_POST['nadpis'],$_POST['text']);

    if ($pom) {
        header("Location: user.php");
        echo '<script>alert("Prispevok pridany")</script>';
    } else {
        echo '<script>alert("Nepodarilo sa pridat prispevok.")</script>';
    }
}
?>

<!DOCTYPE html>
<html>
    <?php
        echo file_get_contents("head.php");
    ?>
<body>
<nav id="navbar" class="navbar sticky-top navbar-expand-md navbar-light mb-4" style="background-color:coral;">

    <?php
        echo file_get_contents("navbar.php");
    ?>

    <div class="odsad">
        <a class="btn btn-block btn-warning" href="signUp.php">Odhlasenie</a>
    </div>

</nav>

<div class="prihl">
    <div class="cover">
        <h3>
            Prihlásený účet :
            <?php
                echo $_SESSION['meno'];
             ?>
        </h3>
    </div>
</div>

<div class="container">
    <div class="potvrd2">
    <div class="row">
        <div class="col-4">
            <form method="post">
                        <div class="cover">
                            <label >
                                Zmena hesla:
                            </label>
                        </div>
                            <input type="password" class="input-lg form-control" name="password" id="password" placeholder="nove heslo" required >
                            <input type="password" class="input-lg form-control" name="password1" id="password1" placeholder="potvdenie hesla" required>
                    <div class="potvrd">
                        <input class="btn btn-warning" type="submit" name="uprava" value="Potvrdenie zmeny">
                    </div>
            </form>
        </div>

        <div class="col-2"> </div>

        <div class="col-5">
            <form method="post">
                <div class="cover">
                        <label>
                            Zrusenie uctu: pre odstranenie uctu prosim zadajte heslo
                        </label>
                </div>
                            <input type="password" class="input-lg form-control" name="password" id="password2" placeholder="heslo" required >
                            <input type="password" class="input-lg form-control" name="password1" id="password3" placeholder="potvdenie hesla" required>
                    <div class="potvrd">
                        <input class="btn btn-warning" type="submit" name="uprava" value="Potvrdenie zmeny">
                    </div>
            </form>
        </div>
    </div>
    </div>
</div>

<div class="container">
<div class="move">
<form method="post">
    <div class="ucet">
        <div class="cover">
        <h5> Pridat prispevok</h5>
        </div>
        <label>Nadpis:</label><br>
        <input type="text" id="nadpis" name="nadpis" required>
            <br>
        <label>Text:</label><br>
        <textarea id="textarea" name="text" rows="6" cols="140" required>
        </textarea>

            <div class="potvrd">
                <input class="btn btn-warning" type="submit" name="prispevok" value="Pridat prispevok">
            </div>
    </div>
</form>
</div>
</div>
</body>
</html>

