<?php
require "databaza.php";
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

    <div class="register">

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
            /** @var prihlasovacieUdaje $udaj */

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


            <?php
            $database = new Databaza();
            if(isset($_POST['login1']))
            {
                $pom = $database->odstran($_POST['login1']);

                if($pom)
                {
                    header("Location: admin.php" );
                }
                else{
                    echo '<script>alert("Nepodarilo sa odstrániť používateľa.")</script>';
                }
            }
            ?>
    </div>


</body>
</html>