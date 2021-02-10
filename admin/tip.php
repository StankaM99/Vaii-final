<?php

require "../db/dbFilm.php";
require "../db/dbSerial.php";

$film = new databFilm();
$serial = new databSerial();


if(isset($_POST['film']))
{
    $pom = $film->save($_POST['nadpis'],$_POST['rok'], $_POST['zaner'], $_POST['hodnotenie'], $_POST['link'], $_POST['link2']);

    if($pom)
    {
        echo '<script>alert("Podarilo sa pridat tip.")</script>';
    }
    else{
        echo '<script>alert("Nepodarilo sa pridat tip.")</script>';
    }
}

if(isset($_POST['serial']))
{
    $pom = $serial->save($_POST['nazov'],$_POST['zanerS'], $_POST['hodnotenieS'], $_POST['linkS']);

    if($pom)
    {
        echo '<script>alert("Podarilo sa pridat tip.")</script>';
    }
    else{
        echo '<script>alert("Nepodarilo sa pridat tip.")</script>';
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


<div class="container-fluid potvrd3">
    <div class="row justify-content-around">
        <div class="card col-md-5">
            <div class="card-header cover">
                <h4>
                   Tip na film
               </h4>
            </div>

            <form method="post">
                <div class="card-body">
                    <div class="formular mb-4 justify-content-center">
                        <label for="nadpis">Nazov filmu</label>
                        <input type="text" id="nadpis" name="nadpis" required>

                        <label for="nadpis">Rok vydania</label>
                        <input  type="number" id="rok" name="rok" max="2021" min="1900"  required>

                        <label for="nadpis">Zaner</label>
                        <input type="text" id="rezia" name="zaner" required>

                        <label for="textarea">Hodnotenie</label>
                        <input type="number" id="hodnot" name="hodnotenie">
                    </div>

                    <label for="basic-url" class="form-label">Link na obrazok:</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="link" id="basic-url" aria-describedby="basic-addon3">
                    </div>

                    <br>

                    <label for="basic-url" class="form-label">Link na trailer:</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="link2" id="basic-url" aria-describedby="basic-addon3">
                    </div>

                    <form method="post">
                        <input class="btn btn-warning" type="submit" name="film" value="Pridat film">
                    </form>
                </div>
            </form>
        </div>

        <div class="card col-md-5 mt-4 mt-md-0">
            <div class="card-header cover">
                <h4>
                    Tip na serial
                </h4>
            </div>

            <form method="post">
                <div class="card-body">
                    <div class="formular mb-4 justify-content-center">
                        <label for="nadpis">Nazov serialu</label>
                        <input type="text" id="nadpis" name="nazov" required>

                        <label for="nadpis">Zaner</label>
                        <input type="text" id="rezia" name="zanerS" required>

                        <label for="textarea">Hodnotenie</label>
                        <input type="number" id="hodnot" name="hodnotenieS">

                        <br>
                        <br>

                    </div>


                        <label for="basic-url" class="form-label">Link na obrazok:</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="linkS" id="basic-url" aria-describedby="basic-addon3">
                        </div>

                    <br>
                    <br>

                    <br>
                    <br>

                        <form method="post">
                            <input class="btn btn-warning" type="submit" name="serial" value="Pridat serial">
                        </form>


                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>