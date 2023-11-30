<?php
session_start();
include 'php/bd.php';
include 'php/sesion.php';

$conn = conectarBD();

if (!$conn) {
    die("Error en la conexión a la base de datos: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"]) && $_POST["submit"]) {
    
    $id_usuario = $_SESSION["id_usuario"]; 
    $id_producto = $_GET["id_producto"]; 
    $talla = $_POST["talla"];
    $cantidad = $_POST["cantidad"];
    $descripcion = $_POST["descripcion"];

}

// Obtener el valor de 'id_producto' desde la URL
$id_producto = $_GET['id_producto'];

// Evitar inyección SQL escapando el valor
$id_producto = mysqli_real_escape_string($conn, $id_producto);

// Realizar la consulta SQL para obtener los datos del producto
$sql3 = "SELECT imagen, precio, descripcion, categoria FROM producto WHERE id_producto = '$id_producto'";
$resultado3 = $conn->query($sql3);

if ($resultado3 && $resultado3->num_rows > 0) {
    $row = $resultado3->fetch_assoc();
    $imagen = $row['imagen'];
    $precio = $row['precio'];
    $descripcion = $row['descripcion'];
    $categoria = $row['categoria'];
} else {
    echo "No se encontraron resultados para el producto con ID " . $id_producto;
}

// Cerrar la conexión a la base de datos
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Zay Shop - Product Detail Page</title>
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

    <!-- Slick -->
    <link rel="stylesheet" type="text/css" href="assets/css/slick.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/slick-theme.css">
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
                    <a class="navbar-sm-brand text-light text-decoration-none" href="mailto:info@company.com">info@company.com</a>
                    <i class="fa fa-phone mx-2"></i>
                    <a class="navbar-sm-brand text-light text-decoration-none" href="tel:010-020-0340">010-020-0340</a>
                </div>
                <div>
                    <a class="text-light" href="https://fb.com/templatemo" target="_blank" rel="sponsored"><i class="fab fa-facebook-f fa-sm fa-fw me-2"></i></a>
                    <a class="text-light" href="https://www.instagram.com/" target="_blank"><i class="fab fa-instagram fa-sm fa-fw me-2"></i></a>
                    <a class="text-light" href="https://twitter.com/" target="_blank"><i class="fab fa-twitter fa-sm fa-fw me-2"></i></a>
                    <a class="text-light" href="https://www.linkedin.com/" target="_blank"><i class="fab fa-linkedin fa-sm fa-fw"></i></a>
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
                            <a class="nav-link" href="shop.html">Próximos Lanzamientos</a>
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
                    <a class="nav-icon d-none d-lg-inline" href="#" data-bs-toggle="modal" data-bs-target="#templatemo_search">
                        <i class="fa fa-fw fa-search text-dark mr-2"></i>
                    </a>
                    <a class="nav-icon position-relative text-decoration-none" href="#" id="cartButton">
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
                                    <p>Contenido del carrito...</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                    <button type="button" class="btn btn-primary">Realizar Pedido</button>
                                </div>
                            </div>
                        </div>
                    </div>
                                        
                    <script>
                        // Simulación de la cantidad de elementos en el carrito
                        let cartItemCount = 0;

                        // Actualiza el contador en el ícono del carrito
                        function updateCartItemCount() {
                            document.getElementById('cartItemCount').innerText = cartItemCount;
                        }

                        // Evento al hacer clic en el botón del carrito
                        document.getElementById('cartButton').addEventListener('click', function() {
                            // Puedes cargar dinámicamente el contenido del carrito aquí si es necesario
                            // En este ejemplo, simplemente se muestra el modal y se actualiza el contador
                            $('#cartModal').modal('show');
                            updateCartItemCount();
                        });
                    </script>
                    <a class="nav-icon position-relative text-decoration-none" href="">
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



    <!-- Open Content -->
    <section class="bg-light">
        <div class="container pb-5">
            <div class="row">



                <div class="col-lg-5 mt-5">
                    <div class="card mb-3">
                    <img class="card-img img-fluid" src="<?php echo $imagen; ?>" alt="Card image cap" id="product-detail">
                    </div>
                    <div class="row">
                        <!--Start Controls-->
                        <div class="col-1 align-self-center">
                            <a href="#multi-item-example" role="button" data-bs-slide="prev">
                                <i class="text-dark fas fa-chevron-left"></i>
                                <span class="sr-only">Previous</span>
                            </a>
                        </div>
                        <!--End Controls-->
  
                        <!--Start Controls-->
                        <div class="col-1 align-self-center">
                            <a href="#multi-item-example" role="button" data-bs-slide="next">
                                <i class="text-dark fas fa-chevron-right"></i>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                        <!--End Controls-->
                    </div>
                </div>
                <!-- col end -->
                <div class="col-lg-7 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <div class="row"> 
                            <h2 class="h1"><?php echo $descripcion; ?></h2>
                            <p class="h3 py-2">Precio: $<?php echo $precio; ?></p>
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <h6>Brand:</h6>
                                </li>
                                <li class="list-inline-item">
                                <p class="text-muted"><strong><?php echo $categoria; ?></strong></p>
                                </li>
                            </ul>
                            <h6>Specification:</h6>
                            <ul class="list-unstyled pb-3">
                                <li></li>
                            </ul>

                            <form action="insert_carrito.php" method="post">
                                <div class="col-auto">
                                    <ul class="list-inline pb-3" id="sizeList">
                                        <li class="list-inline-item">Tamaño:
                                            <input type="hidden" name="talla" id="talla" value="">
                                        </li>
                                        <li class="list-inline-item"><button type="button" class="btn btn-success btn-size" onclick="setSize('S')">S</button></li>
                                        <li class="list-inline-item"><button type="button" class="btn btn-success btn-size" onclick="setSize('M')">M</button></li>
                                        <li class="list-inline-item"><button type="button" class="btn btn-success btn-size" onclick="setSize('L')">L</button></li>
                                    </ul>
                                </div>

                                <div class="col-auto">
                                    <ul class="list-inline pb-3">
                                        <li class="list-inline-item text-right">
                                            Cantidad
                                            <input type="hidden" name="qty" id="qty" value="1" min="1">
                                        </li>
                                        <li class="list-inline-item"><span class="btn btn-success" id="btn-minus" onclick="decrementQuantity()">-</span></li>
                                        <li class="list-inline-item"><span class="badge bg-secondary" id="var-value">1</span></li>
                                        <li class="list-inline-item"><span class="btn btn-success" id="btn-plus" onclick="incrementQuantity()">+</span></li>
                                    </ul>
                                </div>
                                <div class="row pb-3">
                                    <div class="col d-grid">
                                        <button type="submit" class="btn btn-success btn-lg">Añadir al Carrito</button>
                                    </div>
                                </div>
                                <input type="hidden" name="descripcion" value="<?php echo htmlspecialchars($descripcion); ?>">
                                <input type="hidden" name="nombre" value="<?php echo htmlspecialchars($nombreUsuario); ?>">
                                <input type="hidden" name="precio" value="<?php echo htmlspecialchars($precio); ?>">
                            </form>
                            <script>
                                let selectedSize = ''; 
                                let quantity = 1; 

                                function setSize(size) {
                                    selectedSize = size;
                                    document.getElementById('talla').value = size;
                                    
                                }

                                function incrementQuantity() {
                                    quantity++;
                                    document.getElementById('var-value').innerText = quantity;
                                    document.getElementById('cantidad').value = quantity;
                                    
                                }

                                function decrementQuantity() {
                                    if (quantity > 1) {
                                        quantity--;
                                        document.getElementById('var-value').innerText = quantity;
                                        document.getElementById('cantidad').value = quantity;
                                       
                                    }
                                }
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Close Content -->

    <!-- Start Article -->
    <section class="py-5">
        <div class="container">
            <div class="row text-left p-2 pb-3">
                <h4>Otros Productos</h4>
            </div>
            <div id="carousel-related-product">
            <?php
                $conn = conectarBD();

                if (!$conn) {
                    die("Error en la conexión a la base de datos: " . $conn->connect_error);
                }

                // Consulta para obtener 6 productos de manera aleatoria
                $sql = "SELECT id_producto, imagen, precio, descripcion FROM producto ORDER BY RAND() LIMIT 9";
                $result = $conn->query($sql);

                if ($result) {
                    while ($row = $result->fetch_assoc()) {
                        $product_id = $row['id_producto'];
                        $imagen_url = $row['imagen'];
                        $money = $row['precio'];
                        $descripcion = $row['descripcion'];
                    ?>
                        <div class="p-2 pb-3">
                            <div class="product-wap card rounded-0">
                                <div class="card rounded-0">
                                    <img class="card-img rounded-0 img-fluid" src="<?php echo $imagen_url; ?>">
                                    <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                                        <ul class="list-unstyled">
                                            <li><a class="btn btn-success text-white mt-2" href="shop-single.php?id_producto=<?php echo $product_id; ?>"><i class="far fa-eye"></i></a></li>
                                            <li><a class="btn btn-success text-white mt-2" href="shop-single.php?id_producto=<?php echo $product_id; ?>"><i class="fas fa-cart-plus"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <a href="shop-single.php?id_producto=<?php echo $product_id; ?>" class="h3 text-decoration-none"><?php echo $descripcion; ?></a>
                                    <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
                                        <li></li>
                                        <li class="pt-2">
                                            <span class="product-color-dot color-dot-red float-left rounded-circle ml-1"></span>
                                            <span class="product-color-dot color-dot-blue float-left rounded-circle ml-1"></span>
                                            <span class="product-color-dot color-dot-black float-left rounded-circle ml-1"></span>
                                            <span class="product-color-dot color-dot-light float-left rounded-circle ml-1"></span>
                                            <span class="product-color-dot color-dot-green float-left rounded-circle ml-1"></span>
                                        </li>
                                    </ul>
                                    <ul class="list-unstyled d-flex justify-content-center mb-1">
                                    </ul>
                                    <p class="text-center mb-0">$<?php echo $money; ?></p>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                } else {
                    echo "Error en la ejecución de la consulta: " . $conn->error;
                }

                $conn->close();
            ?>

            </div>
        </div>
    </section>
    <!-- End Article -->


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
    <!-- End Script -->

    <!-- Start Slider Script -->
    <script src="assets/js/slick.min.js"></script>
    <script>
        $('#carousel-related-product').slick({
            infinite: true,
            arrows: false,
            slidesToShow: 4,
            slidesToScroll: 3,
            dots: true,
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 3
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 3
                    }
                }
            ]
        });
    </script>
    <!-- End Slider Script -->

</body>

</html>
