<?php

require "../db/dbFilm.php";
require "../db/dbSerial.php";
require_once "../alert.php";

$film = new databFilm();
$serial = new databSerial();


if(isset($_POST['film']))
{
    $pom = $film->save($_POST['nadpis'],$_POST['rok'], $_POST['zaner'], $_POST['hodnotenie'], $_POST['link'], $_POST['link2']);

    if($pom==1)
    {
        echo alert("warning", "Tip na film bol uspesne pridany.");
    }
    else if($pom == 2){
        echo alert("danger", "Tip na film sa nepodarilo pridat.");
    } else
    {
        echo alert("danger", "Nespravne zadany link na trailer alebo obrazok.");
    }
}

if(isset($_POST['serial']))
{
    $pom = $serial->save($_POST['nazovS'],$_POST['zanerS'], $_POST['hodnotenieS'], $_POST['linkS']);

    if($pom==1)
    {
        echo alert("warning", "Tip na serial bol uspesne pridany.");
    }
    else if ($pom == 2){
        echo alert("danger", "Tip na serial sa nepodarilo pridat.");
    } else
    {
        echo alert("danger", "Nespravne zadany link na obrazok.");
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


<div class="container-fluid mt-md-5">
    <div class="row justify-content-around">
        <div class="card col-md-5 mb-md-4">
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

                        <label for="rok">Rok vydania</label>
                        <input  type="number" id="rok" name="rok" max="2021" min="1900"  required>

                        <label for="zaner">Zaner</label>
                        <input type="text" id="zaner" name="zaner" required>

                        <label for="hodnotenie">Hodnotenie</label>
                        <input type="number" id="hodnotenie" name="hodnotenie">
                    </div>

                    <label for="obrazok-url" class="form-label">Link na obrazok:</label>
                    <div class="input-group mb-3">
                        <input type="url" class="form-control" name="link" id="obrazok-url">
                    </div>

                    <br>

                    <label for="trailer-url" class="form-label">Link na trailer:</label>
                    <div class="input-group mb-3">
                        <input type="url" class="form-control" name="link2" id="trailer-url">
                    </div>

                        <input class="btn btn-warning" type="submit" name="film" value="Pridat film">
                </div>
            </form>
        </div>

        <div class="card col-md-5 my-4 my-md-0 mb-md-4">
            <div class="card-header cover">
                <h4>
                    Tip na serial
                </h4>
            </div>

            <form method="post">
                <div class="card-body">
                    <div class="formular mb-4 justify-content-center">
                        <label for="nadpisS">Nazov serialu</label>
                        <input type="text" id="nadpisS" name="nadpisS" required>

                        <label for="zanerS">Zaner</label>
                        <input type="text" id="zanerS" name="zanerS" required>

                        <label for="hodnotenieS">Hodnotenie</label>
                        <input type="number" id="hodnotenieS" name="hodnotenieS">

                        <br>
                        <br>

                    </div>


                        <label for="basic-url" class="form-label">Link na obrazok:</label>
                        <div class="input-group mb-3">
                            <input type="url" class="form-control" name="linkS" id="basic-url">
                        </div>

                    <br>
                    <br>

                    <br>
                    <br>
                            <input class="btn btn-warning" type="submit" name="serial" value="Pridat serial">

                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>