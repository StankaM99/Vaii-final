<?php
require "../db/dbUdaje.php";
require "../db/dbPrispevok.php";


$database = new Databaza();
$datab = new Databaza2();

if(isset($_POST['odstran']))
{
    $pom = $database->odstran($_POST['login1']);

    if($pom)
    {
        echo '<script>alert("Podarilo sa odstrániť pouzivatela.")</script>';
    }
    else{
        echo '<script>alert("Nepodarilo sa odstrániť používateľa.")</script>';
    }
}


if(isset($_POST['odstranPrispevok']))
{
    $pom = $datab->odstranPrisp($_POST['id']);

    if($pom)
    {
        echo '<script>alert("Podarilo sa odstrániť prispevok.")</script>';
    }
    else{
        echo '<script>alert("Nepodarilo sa odstrániť prispevok.")</script>';
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

    <link rel = "stylesheet" href = "../css/main.css">
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
                <a id="Home" class="nav-link" href="../index.php">Home</a>
            </li>

            <!--
            <li class="nav-item ">
                <a id="Recenzie" class="nav-link " href="../recenzie.php">Filmove novinky</a>
            </li> -->

            <li class="nav-item ">
                <a id="Prisp" class="nav-link " href="../prispevky.php">Prispevky</a>
            </li>
        </ul>
    </div>


    <div class="odsad">
        <a class="btn btn-block btn-warning" href="tip.php">Pridat tip</a>
    </div>

    <div class="odsad">
        <a class="btn btn-block btn-warning" href="../signUp.php">Odhlasenie</a>
    </div>

</nav>

    <div class="register">

        <div class="cover">
            <h3>Zaregistrovany pouzivatelia</h3>
            <br>
        </div>

        <table class="table table-danger">
            <thead class="thead-light">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Login</th>
                    <th scope="col">Heslo</th>
                    <th scope="col"></th>
                </tr>
            </thead>

            <tbody>

                <?php
                    $database = new Databaza();

                    $udaje = $database->load();
                    /** @var prihlUdaje $udaj */

                    $x = 1;
                        foreach($udaje as $udaj)
                        {
                            echo '
                            <tr>
                                <th scope="row"> ' . $x .'</th>
                                
                                <td>
                                   <p>'. $udaj->getLogin().
                                   '</p> 
                                </td>
                                
                                <td>
                                    <p>'. $udaj->getHeslo() .
                                    '</p>
                                </td>
                                
                                <td>
                                    <form method="post">
                                        <input type="hidden" name="login1" value= '. $udaj->getLogin() .' >
                                        <input class="btn btn-warning" type="submit" name="odstran" value="Odstrániť">
                                    </form>
                                </td>
                            </tr>
                            ';

                            $x++;
                        }
                ?>
            </tbody>
        </table>
    </div>

        <br>

    <div class="register2">
        <div class="cover">
            <h3>Prispevky od pouzivatelov</h3>
            <br>
        </div>

            <table class="table table-danger">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Login</th>
                        <th scope="col-md">Nadpis</th>
                        <th scope="col-lg">Prispevok</th>
                        <th scope="col"></th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                        $datab = new Databaza2();

                        $prispevky = $datab->load();
                        /** @var userPrispev $prispevok */

                            foreach($prispevky as $prispevok)
                            {
                                echo '
                                <tr>
                                    <th scope="row"> ' . $prispevok->getId() .'</th>
                                    
                                    <td>
                                       <p>'. $prispevok->getLogin().

                                        '</p> 
                                    </td>
                                    
                                    <td>
                                        <p>'. $prispevok->getNadpis() .
                                        '</p>
                                    </td>
                                    
                                    <td>
                                        <p>'. $prispevok->getText() .
                                        '</p>
                                    </td>
                                    
                                    <td>
                                    <form method="post">
                                        <input type="hidden" name="id" value= '. $prispevok->getId() .' >
                                        <input class="btn btn-warning" type="submit" name="odstranPrispevok" value="Odstrániť prispevok">
                                    </form>
                                    </td>
                                </tr>
                                ';

                                $x++;

                                /*  PRIDAT TLACITKO ZDIELAT KTORE ZVEREJNI PRISPEVOK V RECENZIACH */
                            }
                        ?>
                </tbody>
            </table>
    </div>

</body>
</html>


