<?php
    session_start();
    include 'php/login.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>New Era Cap</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="assets/img/apple-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/templatemo.css">
    <link rel="stylesheet" href="assets/css/custom.css">

    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">
    
<!--
    
TemplateMo 559 Zay Shop

https://templatemo.com/tm-559-zay-shop

-->
</head>

<body>
    <!-- Start Top Nav -->
    <nav class="navbar navbar-expand-lg bg-dark navbar-light d-none d-lg-block" id="templatemo_nav_top">
        <div class="container text-light">
            <div class="w-100 d-flex justify-content-between">
                <div>
                    <i class="fa fa-envelope mx-2"></i>
                    <a class="navbar-sm-brand text-light text-decoration-none" href="mailto:contacto@neweracap.com">contacto@neweracap.com</a>
                    <i class="fa fa-phone mx-2"></i>
                    <a class="navbar-sm-brand text-light text-decoration-none" href="tel:55-1825-9997">55-1825-9997</a>
                </div>
                <div>
                    <a class="text-light" href="https://www.facebook.com/neweracap" target="_blank" rel="sponsored"><i class="fab fa-facebook-f fa-sm fa-fw me-2"></i></a>
                    <a class="text-light" href="https://www.instagram.com/neweramx" target="_blank"><i class="fab fa-instagram fa-sm fa-fw me-2"></i></a>
                    <a class="text-light" href="https://twitter.com/NewEraMx" target="_blank"><i class="fab fa-twitter fa-sm fa-fw me-2"></i></a>
                </div>
            </div>
        </div>
    </nav>
    <!-- Close Top Nav -->


    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-light shadow">
        <div class="container d-flex justify-content-between align-items-center">

            <a class="navbar-brand text-success logo h1 align-self-center" href="index.php">
                New Era Cap
            </a>

            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between" id="templatemo_main_nav">
                <div class="flex-fill">
                    <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
                    <li class="nav-item">
                            <a class="nav-link" href="index.php">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="shop2.php">Productos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="">Acerca de Nosotros</a>
                        </li>
                    </ul>
                </div>
                <div class="navbar align-self-center d-flex">
                    <div class="d-lg-none flex-sm-fill mt-3 mb-4 col-7 col-sm-auto pr-3">
                        <div class="input-group">
                            <input type="text" class="form-control" id="inputMobileSearch" placeholder="Search ...">
                            <div class="input-group-text">
                                <i class="fa fa-fw fa-search"></i>
                            </div>
                        </div>
                    </div>
                    <a class="nav-icon position-relative text-decoration-none" href="carrito.php" id="cartButton">
                        <i class="fa fa-fw fa-cart-arrow-down text-dark mr-1"></i>
                        <span class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark" id="cartItemCount"></span>
                    </a>

                    
                    <a class="nav-icon position-relative text-decoration-none" href="inicio_sesion.php">
                        <i class="fa fa-fw fa-user text-dark mr-3"></i>

                    </a>
                </div>
            </div>

        </div>
    </nav>
    <!-- Close Header -->


    <!-- Start Banner Hero -->
    <div id="template-mo-zay-hero-carousel" class="carousel slide" data-bs-ride="carousel">
        <ol class="carousel-indicators">
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="0" class="active"></li>
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="1"></li>
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                           <a href="#"> <img class="img-fluid" src="./assets/img/banner_img_01.png" alt="">
                        </a>
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left align-self-center">
                                <h1 class="h1 text-success"><b>59FIFTY</b></h1>
                                <h3 class="h2">LA DODGERS MLB CLASSIC</h3>
                                <p>
                                La 59FIFTY es la gorra oficial de New Era, con corona alta estructurada en seis paneles, visera plana y parte posterior cerrada. El diseño garantiza un ajuste 
                                cómodo tanto para el jugador como para el aficionado, e incluye ojales bordados para mejorar la transpiración.                                 </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <a href="#" > <img class="img-fluid" src="./assets/img/banner_img_02.png" alt="">
    </a>                </a>
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left">
                            <h1 class="h1 text-success"><b>39THIRTY</b></h1>
                                <h3 class="h2">KANSAS CITY CHIEFS WORLD CHAMPIONS EDITION</h3>
                                <p>
                                La 39THIRTY es una gorra stretch con visera curva, corona baja, forma estructurada (rígida) 
                                y está fabricada con seis paneles, los cuales se ajustan perfectamente a tu cabeza, sin perder la forma.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <a href="#"> <img class="img-fluid" src="./assets/img/banner_img_03.png" alt="">
                        </a>
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left">
                            <h1 class="h1 text-success"><b>9TWENTY</b></h1>
                                <h3 class="h2">NEY YORK YANKEES MLB CLASSIC </h3>
                                <p>
                                La 9TWENTY es una gorra vintage, ajustable y multifacética. 
                                No tiene estructura y su visera es curva; la corona está formada por seis paneles y se ajusta a la cabeza.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev text-decoration-none w-auto ps-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="prev">
            <i class="fas fa-chevron-left"></i>
        </a>
        <a class="carousel-control-next text-decoration-none w-auto pe-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="next">
            <i class="fas fa-chevron-right"></i>
        </a>
    </div>
    <!-- End Banner Hero -->


    <!-- Start Categories of The Month -->
    <section class="container py-5">
    <div class="row text-center pt-3">
        <div class="col-lg-6 m-auto">
            <h1 class="h1">Producto más vendido</h1>
        </div>
    </div>
        <div class="row">
            <div class="col-12 col-md-4 p-5 mt-3">
                <a href="enlace_gorras.html"><img src="./assets/img/gorra.jpg" class="rounded-circle img-fluid border"></a>
                <h5 class="text-center mt-3 mb-3">Gorras</h5>
                <p class="text-center"><a href="shop2.php?category=5950" class="btn btn-success">Comprar</a></p>
            </div>
            <div class="col-12 col-md-4 p-5 mt-3">
                <a href="enlace_lifestyle.html"><img src="./assets/img/lifestyle.jpg" class="rounded-circle img-fluid border"></a>
                <h2 class="h5 text-center mt-3 mb-3">Lifestyle</h2>
                <p class="text-center"><a href="shop2.php?category=3930" class="btn btn-success">Comprar</a></p>
            </div>
            <div class="col-12 col-md-4 p-5 mt-3">
                <a href="enlace_accesorios.html"><img src="./assets/img/accesorio.jpg" class="rounded-circle img-fluid border"></a>
                <h2 class="h5 text-center mt-3 mb-3">Accesorios</h2>
                <p class="text-center"><a href="shop2.php?category=accesorio" class="btn btn-success">Comprar</a></p>
            </div>
        </div>
    </section>

    <!-- End Categories of The Month -->


    <!-- Start Featured Product -->
    <section class="bg-light">
        <div class="container py-5">
            <div class="row text-center py-3">
                <div class="col-lg-6 m-auto">
                    <h1 class="h1">Próximos Lanzamientos</h1>
                    <p>
                    THE RUNNERS OF THE RESONANT TIME - La colección más esperada de Hermanos Koumori x New Era
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-4 mb-4">
                    <div class="card h-100">
                        <a href="">
                            <img src="./assets/img/koumori1.jpg" class="card-img-top" alt="...">
                        </a>
                        <div class="card-body">
                            <ul class="list-unstyled d-flex justify-content-between">
                                <li class="text-muted text-right">PROXIMAMENTE</li>
                            </ul>
                            <a href="" class="h2 text-decoration-none text-dark">Koumori Shirt</a>
                            <p class="card-text">
                            Playera Manga Corta Hermanos Koumori X New Era Runners Green
                            <p class="text-muted">FECHA DE LANZAMIENTO 15 ENERO 2023</p>    
                        </p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 mb-4">
                    <div class="card h-100">
                        <a href="">
                            <img src="./assets/img/koumori2.jpg" class="card-img-top" alt="...">
                        </a>
                        <div class="card-body">
                            <ul class="list-unstyled d-flex justify-content-between">
                                <li class="text-muted text-right">PROXIMAMENTE</li>
                            </ul>
                            <a href="" class="h2 text-decoration-none text-dark">Cloud Nike Shoes</a>
                            <p class="card-text">
                            Chamarra Hermanos Koumori X New Era Chrome
                            </p>
                            <p class="text-muted">FECHA DE LANZAMIENTO 15 ENERO 2023</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 mb-4">
                    <div class="card h-100">
                        <a href="">
                            <img src="./assets/img/koumori3.jpg" class="card-img-top" alt="...">
                        </a>
                        <div class="card-body">
                            <ul class="list-unstyled d-flex justify-content-between">

                                <li class="text-muted text-right">PROXIMAMENTE</li>
                            </ul>
                            <a href="" class="h2 text-decoration-none text-dark">Summer Addides Shoes</a>
                            <p class="card-text">
                            Hermanos Koumori X New Era Camper Runners Marrón
                            </p>
                            <p class="text-muted">FECHA DE LANZAMIENTO 15 ENERO 2023</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Featured Product -->


    <!-- Start Footer -->
    <footer class="bg-dark" id="tempaltemo_footer">
        <div class="container">
            <div class="row">

                <div class="col-md-4 pt-5">
                    <h2 class="h2 text-success border-bottom pb-3 border-light logo">New Era Cap</h2>
                    <ul class="list-unstyled text-light footer-link-list">
                        <li>
                            <i class="fas fa-map-marker-alt fa-fw"></i>
                            C. Guillermo Gonzalez Camarena 1000, Santa Fe, Zedec Sta Fé, Álvaro Obregón, 01210 Ciudad de México, CDMX
                        </li>
                        <li>
                            <i class="fa fa-phone fa-fw"></i>
                            <a class="text-decoration-none" href="tel:55-18-25-9997">55-1825-9997</a>
                        </li>
                        <li>
                            <i class="fa fa-envelope fa-fw"></i>
                            <a class="text-decoration-none" href="mailto:contaco@neweracap.com">contacto@neweracap.com</a>
                        </li>
                    </ul>
                </div>

                <div class="col-md-4 pt-5">
                    <h2 class="h2 text-light border-bottom pb-3 border-light">Productos</h2>
                    <ul class="list-unstyled text-light footer-link-list">
                        <li><a class="text-decoration-none" href="shop2.php?category=5950">59FIFTY</a></li>
                        <li><a class="text-decoration-none" href="shop2.php?category=3930">39THIRTY</a></li>
                        <li><a class="text-decoration-none" href="shop2.php?category=920">9TWENTY</a></li>
                        <li><a class="text-decoration-none" href="shop2.php?category=sudadera">Sudaderas</a></li>
                        <li><a class="text-decoration-none" href="shop2.php?category=playera">Playeras</a></li>
                        <li><a class="text-decoration-none" href="shop2.php?category=accesorio">Accesorios</a></li>

                    </ul>
                </div>

                <div class="col-md-4 pt-5">
                    <h2 class="h2 text-light border-bottom pb-3 border-light">Más Información</h2>
                    <ul class="list-unstyled text-light footer-link-list">
                        <li><a class="text-decoration-none" href="#">Inicio</a></li>
                        <li><a class="text-decoration-none" href="#">Acerca de Nosotros</a></li>
                    </ul>
                </div>

            </div>

            <div class="row text-light mb-4">
                <div class="col-12 mb-3">
                    <div class="w-100 my-3 border-top border-light"></div>
                </div>
                <div class="col-auto me-auto">
                    <ul class="list-inline text-left footer-icons">
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href="https://www.facebook.com/neweracap"><i class="fab fa-facebook-f fa-lg fa-fw"></i></a>
                        </li>
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href="https://www.instagram.com/neweramx/"><i class="fab fa-instagram fa-lg fa-fw"></i></a>
                        </li>
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href="https://twitter.com/NewEraMx"><i class="fab fa-twitter fa-lg fa-fw"></i></a>
                        </li>
                    </ul>
                </div>

            </div>
        </div>

        <div class="w-100 bg-black py-3">
            <div class="container">
                <div class="row pt-2">
                    <div class="col-12">
                        <p class="text-left text-light">
                            Copyright &copy; 2023 New Era Cap
                            | Designed by Renato Ramírez Sosa
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </footer>
    <!-- End Footer -->

    <!-- Start Script -->
    <script src="assets/js/jquery-1.11.0.min.js"></script>
    <script src="assets/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/templatemo.js"></script>
    <script src="assets/js/custom.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- End Script -->
</body>

</html>