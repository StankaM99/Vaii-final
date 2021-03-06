<?php

session_start();

?>
<!DOCTYPE html>
<html>
    <?php
    echo file_get_contents("komponenty/head.php");
    ?>

<body onload="volanie()">

<nav id="navbar" class="navbar sticky-top navbar-expand-md navbar-light mb-4" style="background-color:coral">

    <?php
    echo file_get_contents("komponenty/navbar.php");
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
                            <a class="btn btn-block btn-warning" href="views/user.php">Konto</a>
                        </div>
                    </div>
                    
                    <div class="odsad">
                        <a class="btn btn-block btn-warning" href="odhlasenie.php">Odhlasit sa</a>
                    </div>
                ';
    }
    ?>

</nav>


<div class="container">
    <div class="row justify-content-around">
        <div class="col-lg-6">
                <script  src ="js/ajax.js"> </script>
                <div id="tipFilm"></div>
        </div>

        <div class="col-lg-6 ">
                <script  src ="js/ajaxS.js"> </script>
                <div class="mt-4 mt-md-0" id="tipSerial"></div>
        </div>
    </div>

        <a class="btn col-lg-2 col-6 offset-lg-5 offset-3 my-4 btn-lg btn-warning" onclick="volanie()">
            <strong>
                Chcem iny tip.
            </strong>
        </a>
</div>

<script>
    function volanie()
    {
        dajTipFilm();
        dajTipSerial();
    }
</script>

</body>
</html>