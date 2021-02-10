<?php

session_start();

?>
<!DOCTYPE html>
<html>
    <?php
    echo file_get_contents("head.php");
    ?>

<body onload="volanie()">

<nav id="navbar" class="navbar sticky-top navbar-expand-md navbar-light mb-4" style="background-color:coral">

    <?php
    echo file_get_contents("navbar.php");
    ?>

    <?php
    if(!$_SESSION['loggedin'])
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

<div class="uprava2">
    <div class="potvrd2">
        <div class="nadpis">
            <div class = "cover">
                <h2 class="cover-heading text-center">
                    <strong>
                        Tip na sledovanie :
                    </strong>
                </h2>
            </div>
        </div>
    </div>

</div>


<div class="container">
    <div class="row justify-content-around">
        <div class="col-lg-6">
                <script  src ="js/ajax.js"> </script>
                <div id="tipFilm"></div>
    </div>

        <div class="col-lg-6">
                <script  src ="js/ajaxS.js"> </script>
                <div id="tipSerial"></div>
        </div>
    </div>
</div>

<script>
    function volanie()
    {
        dajTipFilm();
        dajTipSerial();
    }
</script>


<div class="bonus">
    <div class="cena">
        <a class="btn btn-lg btn-block btn-warning" onclick="volanie()">
            <strong>
                Chcem iny tip.
            </strong>
        </a>
    </div>
</div>


</body>
</html>