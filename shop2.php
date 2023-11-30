<?php
    session_start();
    include 'php/bd.php';
    include 'php/sesion.php';
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
                    <a class="navbar-sm-brand text-light text-decoration-none" href="55-1825-9997">55-1825-9997</a>
                </div>
                <div>
                    <a class="text-light" href="https://fb.com/templatemo" target="_blank" rel="sponsored"><i class="fab fa-facebook-f fa-sm fa-fw me-2"></i></a>
                    <a class="text-light" href="https://www.instagram.com/" target="_blank"><i class="fab fa-instagram fa-sm fa-fw me-2"></i></a>
                    <a class="text-light" href="https://twitter.com/" target="_blank"><i class="fab fa-twitter fa-sm fa-fw me-2"></i></a>
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
                    <a class="nav-icon position-relative text-decoration-none" href="carrito.php" id="cartButton">
                        <i class="fa fa-fw fa-cart-arrow-down text-dark mr-1"></i>
                        <span class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark" id="cartItemCount"></span>
                    </a>


                    <!-- Modal del carrito -->
                    <div class="modal fade" id="cartModal" tabindex="-1" aria-labelledby="cartModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="cartModalLabel">Carrito de Compras</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Talla</th>
                                                <th>Precio</th>
                                                <th>Descripción</th>
                                            </tr>
                                        </thead>
                                        <tbody id="cartTableBody">
                                        </tbody>
                                    </table>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                    <button type="button" class="btn btn-primary">Realizar Pedido</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal del carrito -->

                    <!-- SESION -->
                    <a class="nav-icon position-relative text-decoration-none" href="inicio_sesion.php">
                        <i class="fa fa-fw fa-user text-dark mr-3"></i>
                        <?php
    
                            if (isset($_SESSION["inicio_sesion_exitoso"]) && $_SESSION["inicio_sesion_exitoso"]) {
                                $nombreUsuario = isset($_SESSION["nombre_usuario"]) ? $_SESSION["nombre_usuario"] : "usuario";

                                if (isset($_GET['cerrar_sesion'])) {
                                    session_unset();
                                    

                                    session_destroy();
                                    
        
                                    header("Location: index.php");
                                    exit();
                                }
                                echo '<span class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark">' . $nombreUsuario . '</span>';
                                echo '<a class="nav-icon position-relative text-decoration-none" href="cerrar.php"> <!-- Modificado el href -->
                                        <i class="fa fa-fw fa-sign-out text-dark mr-3"></i>Salir
                                    </a>';
                            }
                        ?>
                    </a>
                </div>
            </div>

        </div>
    </nav>
    <!-- Close Header -->

    <!-- Modal -->
    <div class="modal fade bg-white" id="templatemo_search" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="w-100 pt-1 mb-5 text-right">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="get" class="modal-content modal-body border-0 p-0">
                <div class="input-group mb-2">
                    <input type="text" class="form-control" id="inputModalSearch" name="q" placeholder="Search ...">
                    <button type="submit" class="input-group-text bg-success text-light">
                        <i class="fa fa-fw fa-search text-white"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>



    <!-- Start Content -->
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-3">
                <h1 class="h2 pb-4">Filtro</h1>
                <ul class="list-unstyled templatemo-accordion">
                    <li class="pb-3">
                        <a class="collapsed d-flex justify-content-between h3 text-decoration-none" href="#">
                            Silueta
                            <i class="fa fa-fw fa-chevron-circle-down mt-1"></i>
                        </a>
                        <ul class="collapse show list-unstyled pl-3">
                            <li><a class="text-decoration-none" href="shop2.php?category=5950">59FIFTY</a></li>
                            <li><a class="text-decoration-none" href="shop2.php?category=3930">39THIRTY</a></li>
                            <li><a class="text-decoration-none" href="shop2.php?category=920">9TWENTY</a></li>
                        </ul>
                    </li>
                    <li class="pb-3">
                        <a class="collapsed d-flex justify-content-between h3 text-decoration-none" href="#">
                            Lifestyle
                            <i class="pull-right fa fa-fw fa-chevron-circle-down mt-1"></i>
                        </a>
                        <ul id="collapseTwo" class="collapse list-unstyled pl-3">
                            <li><a class="text-decoration-none" href="shop2.php?category=sudadera">Sudaderas</a></li>
                            <li><a class="text-decoration-none" href="shop2.php?category=playera">Playeras</a></li>
                        </ul>
                    </li>
                    <li class="pb-3">
                        <a class="collapsed d-flex justify-content-between h3 text-decoration-none" href="#">
                            Accesorio
                            <i class="pull-right fa fa-fw fa-chevron-circle-down mt-1"></i>
                        </a>
                        <ul id="collapseThree" class="collapse list-unstyled pl-3">
                            <li><a class="text-decoration-none" href="shop2.php?category=accesorio">Todos los accesorios</a></li>
                        </ul>
                    </li>
                </ul>
            </div>

            <div class="col-lg-9">
                <div class="row">
                    <div class="col-md-6">
                        <ul class="list-inline shop-top-menu pb-3 pt-1">
                            <li class="list-inline-item">
                                <a class="h3 text-dark text-decoration-none mr-3" href="shop2.php">Todo</a>
                            </li>
                            <li class="list-inline-item">
                                <a class="h3 text-dark text-decoration-none mr-3" href="#">Nuevos Lanzamientos</a>
                            </li>
                            <li class="list-inline-item">
                                <a class="h3 text-dark text-decoration-none" href="#"></a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-6 pb-4">
                    </div>
                </div>
                <div class="row">
                <?php
                    $conn = conectarBD();

                    if (!$conn) {
                        die("Error en la conexión a la base de datos: " . $conn->connect_error);
                    }

                    $categorias_query = "SELECT DISTINCT categoria FROM producto";
                    $categorias_result = $conn->query($categorias_query);

                    if (isset($_GET['category']) && !empty($_GET['category'])) {
                        $categoria = $conn->real_escape_string($_GET['category']);
                        $sql = "SELECT id_producto, imagen, precio FROM producto WHERE categoria = '$categoria'";
                    } else {
                        $sql = "SELECT id_producto, imagen, precio FROM producto";
                    }

                    $result = $conn->query($sql);

                    if ($result) {
                        if ($result->num_rows > 0) {
                ?>
                            <div class="row">
                            <?php
                                while ($row = $result->fetch_assoc()) {
                                    $product_id = $row['id_producto'];
                                    $imagen_url = $row['imagen'];
                                    $money = $row['precio'];

                                    $descripcion_query = "SELECT descripcion FROM producto WHERE id_producto = '$product_id'";
                                    $descripcion_result = $conn->query($descripcion_query);

                                    if ($descripcion_result) {
                                        $descripcion_row = $descripcion_result->fetch_assoc();
                                        $descripcion = $descripcion_row['descripcion'];
                            ?>
                                        <div class="col-md-4">
                                            <div class="card mb-4 product-wap rounded-0">
                                                <div class="card rounded-0">
                                                    <a href="shop-single.php?id_producto=<?= $product_id ?>"><img class="card-img rounded-0 img-fluid" src="<?= $imagen_url ?>"></a>
                                                    <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                                                        <ul class="list-unstyled">
                                                            <li><a class="btn btn-success text-white mt-2" href="shop-single.php?id_producto=<?= $product_id ?>"><i class="far fa-eye"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <a href="shop2.php?product_id=<?= $product_id ?>" class="h3 text-decoration-none"><?= $descripcion ?></a>
                                                    <ul class="list-unstyled d-flex justify-content-center mb-1">
                                                    </ul>
                                                    <p class="text-center mb-0">$<?= $money ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                        } else {
                                            echo "No se encontró descripción para el producto con id $product_id";
                                        }
                                }
                                        ?>
                            </div>
                            <?php
                                } else {
                                    if (isset($categoria)) {
                                        echo "No se encontraron productos en la categoría $categoria.";
                                    } else {
                                        echo "No se encontraron productos.";
                                    }
                                }
                    } else {
                        echo "Error en la ejecución de la consulta: " . $conn->error;
                    }
                    $conn->close();
                            ?>
            </div>
            </div>

        </div>
    </div>
    <!-- End Content -->

    <!-- Start Brands -->
    <section class="bg-light py-5">
        <div class="container my-4">
            <div class="row text-center py-3">
                <div class="col-lg-6 m-auto">
                    <h1 class="h1">Futuras Colaboraciones</h1>
                    <p>
                    ¡Prepárate para lo que viene! En New Era estamos trabajando en 
                    colaboraciones emocionantes con algunas de las marcas más grandes 
                    del mundo de la moda. Desde Supreme hasta BAPE, estamos uniendo 
                    fuerzas para traerte diseños únicos que seguramente te encantarán. 
                    Asegúrate de conseguir la tuya!
                    </p>
                </div>
                <div class="col-lg-9 m-auto tempaltemo-carousel">
                    <div class="row d-flex flex-row">
                        <!--Controls-->
                        <div class="col-1 align-self-center">
                            <a class="h1" href="#multi-item-example" role="button" data-bs-slide="prev">
                                <i class="text-light fas fa-chevron-left"></i>
                            </a>
                        </div>
                        <!--End Controls-->

                        <!--PHP que marca las slides de futuras colaboraciones-->
                        <?php
                            include 'php/slide_marca.php';
                        ?>
                        <!--End Carousel Wrapper-->

                        <!--Controls-->
                        <div class="col-1 align-self-center">
                            <a class="h1" href="#multi-item-example" role="button" data-bs-slide="next">
                                <i class="text-light fas fa-chevron-right"></i>
                            </a>
                        </div>
                        <!--End Controls-->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Brands-->


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
                            <a class="text-decoration-none" href="tel:55-1825-9997">55-1825-9997</a>
                        </li>
                        <li>
                            <i class="fa fa-envelope fa-fw"></i>
                            <a class="text-decoration-none" href="mailto:contaco@neweracap.com">contaco@neweracap.com</a>
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
                    <h2 class="h2 text-light border-bottom pb-3 border-light">Más información</h2>
                    <ul class="list-unstyled text-light footer-link-list">
                        <li><a class="text-decoration-none" href="#">Perfil</a></li>
                        <li><a class="text-decoration-none" href="#">Acerca de nosotros</a></li>
                        <li><a class="text-decoration-none" href="#">Contacto</a></li>
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
                            <a class="text-light text-decoration-none" target="_blank" href="https://www.facebook.com/neweracapmexico/?locale=es_LA"><i class="fab fa-facebook-f fa-lg fa-fw"></i></a>
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
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- End Script -->
</body>

</html>
