<?php
?>

<!DOCTYPE html>
<html>
    <?php
    echo file_get_contents("head.php");
    ?>

<body>
<nav id="navbar" class="navbar sticky-top navbar-expand-md navbar-light mb-4" style="background-color:coral">

    <?php
    echo file_get_contents("navbar.php");
    ?>

    <div class="odsad">
        <div>
            <a class="btn btn-block btn-warning" href="signUp.php">Prihlásiť sa</a>
        </div>
    </div>
    <div class="odsad">
        <a class="btn btn-block btn-warning" href="register.php">Zaregistrujte sa</a>
    </div>
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
    <div class="row">
        <div class="col-6">
            <div class="tip">
            </div>
    </div>

        <div class="col-6">
            <div class="tip2">
            </div>
        </div>
    </div>
</div>


<script  src ="js/ajax.js"> </script>
<script  src ="js/ajaxS.js"> </script>


<div class="bonus">
    <div class="cena">
        <a class="btn btn-lg btn-block btn-warning" href="ponuka.php">
            <strong>
                Chcem iny tip.
            </strong>
        </a>
    </div>
</div>


</body>
</html>