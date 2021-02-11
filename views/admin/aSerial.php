<?php
require "../../db/pracaSdb/dbSerial.php";
require_once "../komponenty/alert.php";


$serial = new databSerial();

if(isset($_POST['odstran']))
{
    $pom = $serial->odstran($_POST['id']);

    if($pom)
    {
        echo alert("warning", "Serial bol uspesne odstraneny.");
    }
    else{
        echo alert("danger", "Serial sa nepodarilo ostranit.");
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
        <h3>Serialova databaza</h3>
        <br>
    </div>

    <table class="table table-danger">
        <thead class="thead-light">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nazov serialu</th>
            <th scope="col"></th>
        </tr>
        </thead>

        <tbody>

        <?php

        $serialyD = $serial->load();

        $x = 1;
        foreach($serialyD as $udaj)
        {
            echo '
                            <tr>
                                <th scope="row"> ' . $x .'</th>
                                
                                <td>
                                   <p>'. $udaj->getNazov().
                '</p> 
                                </td>
                                <td>
                                    <form method="post">
                                        <input type="hidden" name="id" value= '. $udaj->getId() .' >
                                        <input class="btn btn-warning" type="submit" name="odstran" value="Odstrániť">
                                    </form>
                                </td>
                            </tr>
                            ';

            $x++;
        }
        ?>
        </tbody>
    </table>
</div>

</body>
</html>


