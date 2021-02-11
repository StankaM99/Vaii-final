<?php
session_start();

require "../db/pracaSdb/dbUdaje.php";
require_once "komponenty/alert.php";

$database = new Databaza();

if(isset($_POST['register'])) {
    $udaj = new prihlasovacieUdaje($_POST['meno'], $_POST['inputPassword'], $_POST['inputPasswordRep']);
    $pom = $database->save($udaj);

    if($pom==1)
    {
        $_SESSION['meno'] = $_POST['meno'];
        $_SESSION['prihlaseny'] = true;

        $_SESSION['userId'] = $database->getIdByLogin($_POST['meno']);

        header("Location: user.php" );
    } else if ($pom == 2)
    {
        echo alert("danger", "Zadane hesla sa nezhoduju.");
    } else if ($pom == 3)
    {
        echo alert("danger", "Zadany login uz existuje.");
    } else
    {
        echo alert("danger", "Chyba.");
    }
}

?>

<!DOCTYPE html>
<html>

    <?php
        echo file_get_contents("komponenty/head.php");
    ?>

    <body>
        <nav id="navbar" class="navbar sticky-top navbar-expand-md navbar-light mb-4" style="background-color:coral;">

            <?php
                echo file_get_contents("komponenty/navbar.php");
            ?>

            <div class="odsad">
                <div>
                    <a class="btn btn-block btn-warning" href="views/signUp.php">Prihlásiť sa</a>
                </div>
            </div>

          </nav>

          <div  class="naStred">
              <div class="nadpis">
                  <form class="form-signin" method="post" >
                    <img class="mb-4" width="65" height="65" src="https://cdn.onlinewebfonts.com/svg/img_532171.png" alt="">
                    <h1 class="h3 mb-3 font-weight-normal">Zadajte vaše údaje</h1>

                    <label for="meno" class="sr-only">Login</label>
                    <input type="text" id="meno" name="meno" class="form-control" placeholder="Login" required autofocus>

                    <br>

                    <label for="inputPassword" class="sr-only">Heslo</label>
                    <input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Heslo" required>

                    <br>

                    <label for="inputPasswordRep" class="sr-only">Zopakuj heslo</label>
                    <input type="password" id="inputPasswordRep" name="inputPasswordRep" class="form-control" placeholder="Zopakuj heslo" required>
                      <br>
                    <button class="btn btn-block btn-warning" name="register" type="submit" >Registrácia</button>

                  </form>
            </div>
        </div>
    </body>
</html>


