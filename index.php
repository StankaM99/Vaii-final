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

          <div class="naStred">
            <div class="nadpis">
            <div class = "cover">
            <h2 class="cover-heading text-center"> Vitajte na stránke HdFilmy.sk.</h2>
            <p class="lead text-center">
              Prinášame vám databázu tých najnovších a najlepších filmov a seriálov všetkých čias.  
              <br>  
              Môžte si vybrať z ponuky sledovania : Zadarmo, Plus a Exclusive za super ceny.
              <br>
              Registráciou u nás a získate:
              <br> prístup k plnému zoznamu našich filmov a seriálov
               <br> sledovanie v najlepšej kvalite 
               <br> všetko bez reklám
               <br> s možnosťou stiahnutia
              <br> Registrácia je jednoduchá a trvá len chvíľku.
            </p>

            <div class ="sledovat">
              <p>
                <a class="btn btn-lg btn-block btn-warning" href="recenzie.php">Chcem sledovať</a>
              </p>
            </div>
          </div>
          </div>

        </div>
    </body>
</html>