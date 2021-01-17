<?php
session_start();
require "databaza.php";

$database = new Databaza();

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
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Semestrálna práca</title>
    <!-- CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <!-- jQuery and JS bundle w/ Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <link rel = "stylesheet" href = "css/main.css">
</head>
<body>
<nav id="navbar" class="navbar sticky-top navbar-expand-md navbar-light mb-4" style="background-color:coral;">

    <a class="navbar-brand disabled">
        <img width="40" height="40" src="https://image.flaticon.com/icons/png/512/31/31087.png" alt="ob">
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">

            <li class="nav-item ">
                <a id="Home" class="nav-link" href="index.html">Home</a>
            </li>

            <li class="nav-item ">
                <a id="Price" class="nav-link" href="price.html">Ceny</a>
            </li>

            <li class="nav-item ">
                <a id="Recenzie" class="nav-link " href="recenzie.php">Recenzie</a>
            </li>

        </ul>
    </div>

    <div class="odsad">
        <a class="btn btn-block btn-warning" href="price.html">Odhlasenie</a>
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
                            <label for="zmena_hesla">
                                Zmena hesla:
                            </label>
                        </div>
                        <form method="post" id="passwordForm">
                            <input type="password" class="input-lg form-control" name="password" id="password" placeholder="nove heslo" required >
                            <input type="password" class="input-lg form-control" name="password1" id="password1" placeholder="potvdenie hesla" required>
                        </form>
                    <div class="potvrd">
                        <input class="btn btn-warning" type="submit" name="uprava" value="Potvrdenie zmeny">
                    </div>
            </form>
        </div>

        <div class="col-2"> </div>

        <div class="col-5">
            <form method="post">
                <div class="cover">
                        <label for="zmena_hesla">
                            Zrusenie uctu: pre odstranenie uctu prosim zadajte heslo
                        </label>
                </div>
                        <form method="post" id="passwordForm">
                            <input type="password" class="input-lg form-control" name="password" id="password" placeholder="heslo" required >
                            <input type="password" class="input-lg form-control" name="password1" id="password1" placeholder="potvdenie hesla" required>
                        </form>
                    <div class="potvrd">
                        <input class="btn btn-warning" type="submit" name="uprava" value="Potvrdenie zmeny">
                    </div>
            </form>
        </div>
    </div>
    </div>
</div>

<form>
    <div class="ucet">
        <div class="cover">
        <h5> Pridat prispevok</h5>
        </div>
        <label for="nadpis">Nadpis:</label><br>
        <input type="text" id="nadpis" name="nadpis">
            <br>
        <label for="text">Text:</label><br>
        <textarea id="textarea" name="text" rows="6" cols="140">
        </textarea>

            <div class="potvrd">
                <input class="btn btn-warning" type="submit" name="prispevok" value="Pridat prispevok">
            </div>
    </div>
</form>
</body>
</html>
