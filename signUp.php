<?php

session_start();

require "db/dbUdaje.php";
require_once "alert.php";

$database = new Databaza();

if(isset($_POST['prihlas'])) {
    $pom = $database->prihlas($_POST['meno'], $_POST['heslo']);

    if($pom == 4)
    {
        header("Location: admin/admin.php");
    }

    else if ($pom == 1) {
        $_SESSION['meno'] = $_POST['meno'];
        $_SESSION['prihlaseny'] = true;

        $_SESSION['userId'] = $database->getIdByLogin($_POST['meno']);

        header("Location: user.php");
    } else if($pom == 2){
        echo alert("danger", "Zadane heslo nie je spravne.");
    } else if($pom == 3)
    {
        echo alert("danger", "Zadany login nie je spravny.");
    } else
    {
        echo alert("danger", "Chyba.");
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
                <a class="btn btn-block btn-warning" href="register.php">Zaregistrujte sa</a>
            </div>

        </nav>

        <div class="naStred">
              <div class="nadpis">
                  <div class="cover">
                      <form method="post" class="form-signin">
                            <img class="mb-4" src="https://cdn.onlinewebfonts.com/svg/img_202755.png" alt="" width="65" height="65">

                            <h1 class="h3 mb-3 font-weight-normal">Prihlásiť sa</h1>

                            <label for="inputLogin" class="sr-only">Login</label>
                            <input type="text" id="inputLogin" class="form-control" name="meno" placeholder="Login" required autofocus>

                            <label for="inputPassword" class="sr-only">Heslo</label>
                            <input type="password" id="inputPassword" class="form-control"  name="heslo" placeholder="Heslo" required>
                            <br>
                              <input class="btn btn-warning" type="submit" name="prihlas" value="Prihlásiť sa">
                      </form>
                </div>
            </div>
        </div>

    </body>
</html>


