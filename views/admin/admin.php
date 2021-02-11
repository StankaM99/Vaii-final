<?php
require "../../db/pracaSdb/dbUdaje.php";
require_once "../komponenty/alert.php";

$database = new Databaza();

if(isset($_POST['odstran'])) {
    $pom = $database->odstran($_POST['login1']);

    if ($pom) {
        echo alert("warning", "Pouzivatel odstraneny.");
    } else {
        echo alert("danger", "Nepodarilo sa odspranit pouzivatela.");
    }
}

?>

<!DOCTYPE html>
<html>

    <?php
    echo file_get_contents("../komponenty/head.php");
    ?>

<body>
<nav id="navbar" class="navbar sticky-top navbar-expand-md navbar-light mb-4" style="background-color:coral;">
    <?php
    echo file_get_contents("../komponenty/navbarAdmin.php");
    ?>
</nav>

<div class="register">

    <div class="cover">
        <h3>Zaregistrovani pouzivatelia</h3>
        <br>
    </div>

    <table class="table table-danger">
        <thead class="thead-light">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Login</th>
            <th scope="col"></th>
        </tr>
        </thead>

        <tbody>


        <?php
        $database = new Databaza();

        $udaje = $database->load();
        /** @var prihlUdaje $udaj */

        if(sizeof($udaje)==0)
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
            $x = 1;
            foreach ($udaje as $udaj) {
                echo '
                                <tr>
                                    <th scope="row"> ' . $x . '</th>
                                    
                                    <td>
                                       <p>' . $udaj->getLogin() .
                    '</p> 
                                    </td>
                                    
                                    <td>
                                        <form method="post">
                                            <input type="hidden" name="login1" value= ' . $udaj->getLogin() . ' >
                                            <input class="btn btn-warning" type="submit" name="odstran" value="Odstrániť">
                                        </form>
                                    </td>
                                </tr>
                                ';

                $x++;
            }
        }
        ?>
        </tbody>
    </table>
</div>
</body>
</html>


