<?php
require "db/dbRecenzie.php";
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
                <div>
                    <a class="btn btn-block btn-warning" href="../signUp.php">Prihlásiť sa</a>
                </div>
            </div>
            <div class="odsad">
                <a class="btn btn-block btn-warning" href="../register.php">Zaregistrujte sa</a>
            </div>

          </nav>


        <div class="potvrd2">
            <div class="cena">
                <div class="nadpis">
                    <div class="cover">
                <h1> Filmove novinky</h1>
            </div>
            </div>
            </div>
        </div>
            <br>

            <div class="ponuka">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal">
                    <strong>
                        Špeciálna ponuka
                    </strong>
                </button>
            </div>



            <div class="container">
                <div class="row">
                    <?php
                        $recenzia = new Databaza3();

                         $recencie = $recenzia->load();
                         /** @var adminRecenz $recenz */

                    foreach($recencie as $recenz)
                    {
                        echo '
                            <form >
                                    <div class="card mb-8 box-shadow" style="margin: 5vw 0vw 0vw 5vw">
                                    <div class="rec">
                                         <img width="40" height="40" src="https://cdn3.iconfinder.com/data/icons/cinema-outline-7/512/movie-rating-film-cinema-review-512.png" alt="ob">
                                        </div>
                                        <div class="card-body">
                                            <p class="card-text"> 
                                            <b>Nazov filmu: '. $recenz->getFilm().'</b>
                                            </p>
                                            <p class="card-text">'. $recenz->getRec().'</p>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <small class="text-muted">Rezia: '.$recenz->getReziser().'</small>
                                            
                                                <small class="text-muted">Rok vydania: '.$recenz->getRok().'</small>
                                            </div>
                                        </div>
                                    </div>
                                
                            </form>
                                ';
                            }
                    ?>
                </div>
            </div>

    </body>
</html>
