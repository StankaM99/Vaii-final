<!DOCTYPE html>
<html>
    <?php
        echo file_get_contents("head.php");
    ?>

    <body>
        <nav id="navbar" class="navbar sticky-top navbar-expand-md navbar-light mb-7" style="background-color:coral">

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

        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img  class="img-fluid obrazok-car rounded mx-auto d-block img-thumbnail" src="https://2.bp.blogspot.com/-_a-2wwIKifM/WY2KITBSBQI/AAAAAAAAAQU/72EggZgYN5go7j-cKnPVs0Cpxu0U9YknQCLcBGAs/s1600/WonderWomanposter.jpg">
                </div>
                <div class="carousel-item">
                    <img  class="img-fluid obrazok-car rounded mx-auto d-block img-thumbnail"  src="https://img1.looper.com/img/gallery/why-do-movie-posters-reverse-names/intro-1582575430.jpg" >
                </div>
                <div class="carousel-item">
                    <img  class="img-fluid obrazok-car rounded mx-auto d-block img-thumbnail" src="https://images-na.ssl-images-amazon.com/images/I/71ZcU-iD9ZL._AC_SL1385_.jpg">
                </div>
                <div class="carousel-item">
                    <img  class="img-fluid obrazok-car rounded mx-auto d-block img-thumbnail" src="https://d33wubrfki0l68.cloudfront.net/cd83fe5535b976e74bf3e3cddda88cac8758de32/036eb/media/american_hustle_poster.jpg ">
                </div>
                <div class="carousel-item">
                    <img  class="img-fluid obrazok-car rounded mx-auto d-block img-thumbnail" src="https://am24.mediaite.com/tms/cnt/uploads/2020/12/Screen-Shot-2020-12-23-at-4.09.06-PM.jpg">
                </div>
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
    </body>
</html>
