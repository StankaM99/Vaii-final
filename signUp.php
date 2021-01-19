<?php

session_start();

require "db/dbUdaje.php";

$database = new Databaza();

if(isset($_POST['prihlas'])) {
    $pom = $database->prihlas($_POST['meno'], $_POST['heslo']);

    if ($pom == 1) {
        $_SESSION['meno'] = $_POST['meno'];
        header("Location: user.php");
    } else if($pom == 2){
        echo '<script>alert("Nepodarilo sa prihlasit. Zadane heslo nie je spravne.")</script>';
    } else if($pom == 3)
    {
        echo '<script>alert("Nepodarilo sa prihlasit. Zadany login neexistuje")</script>';
    } else
    {
        echo '<script>alert("Chyba.")</script>';
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
                <a class="btn btn-block btn-warning" href="admin/aHeslo.php">ADMIN</a>
            </div>

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


