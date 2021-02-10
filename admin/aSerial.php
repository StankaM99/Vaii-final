<?php
require "../db/dbSerial.php";


$serial = new databSerial();

if(isset($_POST['odstran']))
{
    $pom = $serial->odstran($_POST['id']);

    if($pom)
    {
        echo '<script>alert("Podarilo sa odstrániť serial.")</script>';
    }
    else{
        echo '<script>alert("Nepodarilo sa odstrániť serial.")</script>';
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

<div class="register">

    <div class="cover">
        <h3>Serialova databza</h3>
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


