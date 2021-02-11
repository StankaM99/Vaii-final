<?php
session_start();

require_once "db/dbUdaje.php";
require_once "db/dbPrispevok.php";
require_once "alert.php";

$udaje = new Databaza();
$prispev = new Databaza2();

if(isset($_POST['uprava'])) {

    $pom = $udaje->noveHeslo($_SESSION['meno'], $_POST['password'],$_POST['password1']);

    if ($pom) {
        echo alert("warning", "Podarilo sa zmenit heslo.");
    } else {
        echo alert("danger", "Neodarilo sa zmenit heslo.");
    }
}


if(isset($_POST['odstran']))
{
    $pom = $udaje->odstranUser($_SESSION['meno'], $_POST['password'], $_POST['password1']);

    if($pom == 1)
    {
        header("Location: register.php");
    }
    else if($pom == 2){
        echo alert("danger", "Zadane hesla sa nezhoduju.");

    } else if($pom == 3)
    {
        echo alert("danger", "Zadali ste nespravne heslo.");

    } else
    {
        echo alert("danger", "Nastala chyba.");
    }
}


if(isset($_POST['prispevok'])) {
    $pom = $prispev->save($_SESSION['userId'], $_POST['nadpis'],$_POST['text']);

    if ($pom) {
        echo alert("warning", "Prispevok bol pridany.");
    } else {
        echo alert("danger", "Nepodarilo sa pridat prispevok.");
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
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal">
                <strong>
                    Špeciálna ponuka
                </strong>
            </button>
    </div>

    <div class="odsad">
        <a class="btn btn-block btn-warning" href="odhlasenie.php">Odhlasit sa</a>
    </div>

</nav>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Chcete získať tip na večerný film?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>
                    Máme pre Vás skvelú správu.
                    <br>
                    Nudíte sa doma a neviete čo by ste si mohli pozrieť?
                    <br>
                    Vyhľadom na pandemickú situáciu koronavírusu vo svete nám záleží na Vašom zdraví a preto sme pre vás pripravili špeciálny bonus.
                    <br>
                    <br>
                </p>
            </div>
            <div class="modal-footer">
                <a class="btn btn-lg btn-block btn-warning" href="ponuka.php">
                    <strong>
                        Získať tip.
                    </strong>
                </a>
            </div>
        </div>
    </div>
</div>

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

<div class="container-fluid justify-content-center odsad2">
    <div class="container">
        <div class="potvrd">
            <div class="row">
                <div class="card col-5 py-3">
                    <form method="post">
                                <div class="card-header cover">
                                    <label >
                                        Zmena hesla:
                                    </label>
                                </div>
                             <input type="password" class="input-lg form-control" name="password" id="password" placeholder="nove heslo" required >
                             <input type="password" class="input-lg form-control" name="password1" id="password1" placeholder="potvdenie hesla" required>
                          <div class="potvrd2">
                            <input class="btn btn-warning" type="submit" name="uprava" value="Potvrdenie zmeny">
                          </div>
                    </form>
                </div>

            <div class="col-1"> </div>

                <div class="card col-5 py-3">
                    <form method="post">
                        <div class="card-header cover">
                                <label>
                                    Zrusenie uctu: pre odstranenie uctu prosim zadajte heslo
                                </label>
                        </div>
                                    <input type="password" class="input-lg form-control" name="password" id="password2" placeholder="heslo" required >
                                    <input type="password" class="input-lg form-control" name="password1" id="password3" placeholder="potvdenie hesla" required>

                        <div class="potvrd2">
                                <input class="btn btn-warning" type="submit" name="uprava" value="Potvrdenie zmeny">
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="potvrd">
            <div class="row">
                <div class="card col-11 mb-3">
                    <form method="post">
                            <div class="card-header cover">
                                <h3> Pridat recenziu</h3>
                            </div>

                        <div class="card-body">
                                <label>Nadpis:</label><br>
                                <input type="text" id="nadpis" name="nadpis" required>
                                    <br>
                                <label>Text:</label><br>

                                    <textarea id="textarea" name="text" rows="6"  required></textarea>

                                    <div class="potvrd2">
                                        <input class="btn btn-warning" type="submit" name="prispevok" value="Pridat prispevok">
                                    </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>

