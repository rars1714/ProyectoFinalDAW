<?php
    session_start();
    include 'php/bd.php';
    $conn = conectarBD();

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $correo = $_POST["correo"];
        $pass = $_POST["pass"];

        // Use prepared statements to prevent SQL injection
        $stmt = $conn->prepare("SELECT * FROM usuarios WHERE correo=? AND pass=?");
        $stmt->bind_param("ss", $correo, $pass);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();

        if ($result->num_rows > 0) {
            $usuario = $result->fetch_assoc();

            // Check if the user is an admin based on the email
            if ($usuario["correo"] == "admin@admin.com") {
                $_SESSION["inicio_sesion_exitoso"] = true;
                $_SESSION["nombre_usuario"] = $usuario["nombre"];
                header("Location: admin.php");
                exit();
            } else {
                $_SESSION["inicio_sesion_exitoso"] = true;
                $_SESSION["nombre_usuario"] = $usuario["nombre"];
                header("Location: index.php");
                exit();
            }
        } else {
            $_SESSION["inicio_sesion_exitoso"] = false;
            header("Location: inicio_sesion.php");
            exit();
        }
    }

    $conn->close();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sign In</title>
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

    <!-- Load map styles -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
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
                            <a class="nav-link" href="shop2.php">Acerca de Nosotros</a>
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
                    <a class="nav-icon position-relative text-decoration-none" href="carrito.php">
                        <i class="fa fa-fw fa-cart-arrow-down text-dark mr-1"></i>
                        <span class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark"></span>
                    </a>
                    <a class="nav-icon position-relative text-decoration-none" href="#">
                        <i class="fa fa-fw fa-user text-dark mr-3"></i>
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

    <!-- Modal de Inicio de Sesión -->
        <div class="modal fade" id="inicioSesionModal" tabindex="-1" role="dialog" aria-labelledby="inicioSesionModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="inicioSesionModalLabel">Inicio de Sesión</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <?php
                        if (isset($_SESSION["inicio_sesion_exitoso"])) {
                            if ($_SESSION["inicio_sesion_exitoso"]) {
                                echo '<script>alert("Inicio de sesión exitoso. Serás redirigido a la página principal.");</script>';
                            } else {
                                echo '<script>alert("Correo o contraseña incorrectos.");</script>';
                            }
                            unset($_SESSION["inicio_sesion_exitoso"]);
                        }
                    ?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    <!--Modal end inicio de sesión -->

    <!-- Start Content Page -->
    <div class="container-fluid bg-light py-5">
        <div class="col-md-6 m-auto text-center">
            <h1 class="h1">Inicio de sesión</h1>
        </div>
    </div>



<!-- Start Contact -->
<div class="container py-5">
    <div class="row py-5">
        <div class="col-md-6 m-auto">
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div class="form-group mb-3">
                    <label for="inputemail">Correo</label>
                    <input type="email" class="form-control mt-1" id="correo" name="correo" placeholder="Correo">
                </div>
                <div class="form-group mb-3">
                    <label for="inputpassword">Contraseña</label>
                    <input type="password" class="form-control mt-1" id="pass" name="pass" placeholder="Contraseña">
                </div>
                <div class="row">
                    <div class="col text-center mt-2">
                        <button type="submit" class="btn btn-success btn-lg px-3" name="sesion">Iniciar Sesión</button>
                    </div>
                    <div class="col text-center mt-2">
                        <a href="crear_cuenta.php" class="btn btn-primary btn-lg px-3">Crear cuenta</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

    <!-- End Contact -->


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
    <script>
        <script src="assets/js/jquery-1.11.0.min.js"></script>
        <script src="assets/js/jquery-migrate-1.2.1.min.js"></script>
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/templatemo.js"></script>
        <script src="assets/js/custom.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </script>

</body>

</html>