<?php
require "../db/dbPrispevok.php";
require_once "../alert.php";

$datab = new Databaza2();

if(isset($_POST['odstranPrispevok']))
{
    $pom = $datab->odstranPrisp($_POST['id']);

    if($pom)
    {
        echo alert("warning", "Prispevok bol uspesne odstraneny.");
    }
    else{
        echo alert("danger", "Nepodarilo sa odstranit prispevok.");
    }
}


?>

<!DOCTYPE html>
<html>

    <?php
    echo file_get_contents("../head.php");
    ?>


<body>
<nav id="navbar" class="navbar sticky-top navbar-expand-md navbar-light mb-4" style="background-color:coral;">


    <?php
    echo file_get_contents("navbarAdmin.php");
    ?>

</nav>


<div class="container">
    <div class="cover">
        <h3>Prispevky od pouzivatelov</h3>
        <br>
    </div>

    <div class="table-responsive">
        <table class="table table-danger">
            <thead class="thead-light">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Login</th>
                <th scope="col">Nadpis</th>
                <th scope="col">Prispevok</th>
                <th scope="col"></th>
            </tr>
            </thead>

            <tbody>
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

                foreach ($prispevky as $prispevok) {
                    echo '
                                        <tr>
                                            <th scope="row"> ' . $prispevok->getId() . '</th>
                                            
                                            <td>
                                               <p>' . $prispevok->getLogin() .

                        '</p> 
                                            </td>
                                            
                                            <td>
                                                <p>' . $prispevok->getNadpis() .
                        '</p>
                                            </td>
                                            
                                            <td>
                                                <p>' . $prispevok->getText() .
                        '</p>
                                            </td>
                                            
                                            <td>
                                            <form method="post">
                                                <input type="hidden" name="id" value= ' . $prispevok->getId() . ' >
                                                <input class="btn btn-warning" type="submit" name="odstranPrispevok" value="Odstrániť prispevok">
                                            </form>
                                            </td>
                                        </tr>
                                        ';

                    /*  PRIDAT TLACITKO ZDIELAT KTORE ZVEREJNI PRISPEVOK V RECENZIACH */
                }
            }
            ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>


