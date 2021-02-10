<?php

session_start();

$_SESSION['loggedin'];

if(!$_SESSION['loggedin'])
{
    $_SESSION['loggedin'] = false;
}

require "db/dbFilm.php";

$datab = new databFilm();
$filmy = $datab->load();

?>
<!DOCTYPE html>

<html>

    <?php
        echo file_get_contents("head.php");
    ?>

    <body>

        <script async src ="js/video.js"> </script>

        <nav id="navbar" class="navbar sticky-top navbar-expand-md navbar-light mb-7" style="background-color:coral">

        <?php
            echo file_get_contents("navbar.php");
        ?>

        <?php
            if(!$_SESSION['loggedin'])
            {
                echo '
                     <div class="odsad">
                        <div>
                            <a class="btn btn-block btn-warning" href="signUp.php">Prihlásiť sa</a>
                        </div>
                    </div>
                    
                    <div class="odsad">
                        <a class="btn btn-block btn-warning" href="register.php">Zaregistrujte sa</a>
                    </div>
                ';
            } else
            {
                echo '
                     <div class="odsad">
                        <div>
                            <a class="btn btn-block btn-warning" href="user.php">Konto</a>
                        </div>
                    </div>
                    
                    <div class="odsad">
                        <a class="btn btn-block btn-warning" href="odhlasenie.php">Odhlasit sa</a>
                    </div>
                ';
            }
        ?>

          </nav>

        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                    <?php
                        foreach($filmy as $key => $film)
                        {
                            if($key == 0)
                            {
                                echo '
                                <div class="carousel-item active"> 
                                    <img  alt=" " class="img-fluid obrazok-car rounded mx-auto d-block img-thumbnail" data-link='.$film->getLink().' src='.$film->getObrazok().' data-name='.$film->getNazov().'>
                                </div>
                             ';

                            } else
                            {
                                echo '
                                <div class="carousel-item"> 
                                    <img alt=" " class="img-fluid obrazok-car rounded mx-auto d-block img-thumbnail" data-link='.$film->getLink().' src='.$film->getObrazok().' data-name='.$film->getNazov().'>
                                </div>
                             ';
                            }
                        }
                    ?>

            </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog mw-100 w-75" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <iframe width="100%" height="550vh" src="" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>

                    <div class="modal-footer">
                    </div>
                </div>
            </div>
        </div>

    </body>
</html>
