<?php
require "db/dbPrispevok.php";

session_start();

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

    <?php
        if(!$_SESSION['prihlaseny'])
        {
            echo '
                         <div class="odsad">
                            <div>
                                <a class="btn btn-block btn-warning" href="signUp.php">Prihlásiť sa</a>
                            </div>
                        </div>
                        
                        <div class="odsad">
                            <a class="btn btn-block btn-warning" href="register.php">Zaregistrujte sa</a>
                        </div>
                    ';
        } else
        {
            echo '
                         <div class="odsad">
                            <div>
                                <a class="btn btn-block btn-warning" href="user.php">Konto</a>
                            </div>
                        </div>
                        
                        <div class="odsad">
                            <a class="btn btn-block btn-warning" href="odhlasenie.php">Odhlasit sa</a>
                        </div>
                    ';
        }
    ?>
</nav>

<div class="potvrd2">
<div class="uprava2">
    <div class="cover">
    <h2 class="border-bottom pb-2 mb-1">Prispevky od pouzivatelov</h2>
    </div>


    <div class="row row-cols-1 row-cols-lg-3 row-cols-md-2 row-cols-sm-2">

        <?php
            $datab = new Databaza2();

            $prispevky = $datab->load();
            /** @var userPrispev $prispevok */

        if(sizeof($prispevky)==0)
        {
            echo '
                        <div class="col-sm-6 my-2 naStred cover">
                           <div class="card mx-3" >
                                <div class="card-body ">
                                    <h5 class="card-title">Bohuzial neboli pridane ziadne prispevky.</h5>
                                </div>
                           </div>
                        </div>
                        
                          ';

        } else {
            foreach($prispevky as $prispevok)
            {
                echo '
                        <div class="col-sm-6 my-2">
                           <div class="card mx-3" >
                                <div class="card-body ">
                                    <h5 class="card-title">'.$prispevok->getNadpis().'</h5>
                                    <h6 class="card-subtitle mb-2 text-muted">'.$prispevok->getLogin().'</h6>
                                        <p class="card-text">
                                            '.$prispevok->getText().'
                                        </p>
                                </div>
                           </div>
                        </div>
                        
                          ';
            }
        }
        ?>
    </div>

</div>
</div>

</body>
</html>

