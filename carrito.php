<?php
    include 'php/bd.php';
    session_start();
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
                            <a class="nav-link" href="shop2.php">Historial de Compras</a>
                        </li>
                    </ul>
                </div>
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
                    </a>
                </div>
            </div>

        </div>
    </nav>
    <!-- Close Header -->
    <?php
        $conn = conectarBD();

        $sql = "SELECT c.*, p.imagen FROM carrito c
        JOIN producto p ON c.id_producto = p.id_producto";
        $productos = mysqli_query($conn, $sql);
    ?>
    <!-- TABLA -->
    <div class="container-fluid bg-light py-5">
        <div class="col-md-6 m-auto text-center">
            <h1 class="h1">Lista de Productos</h1>
        </div>
    </div>
    <div class="container">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>ID_INVENTARIO</th>
                    <th>Descripcion</th>
                    <th>Talla</th>
                    <th>Precio</th>
                    <th>Imagen</th>
                    <th>Opcion</th>
                </tr>
            </thead>
            <tbody>
            <?php
                if ($productos->num_rows > 0) {
                    foreach ($productos as $key => $row) {
                        
            ?>
            <tr class="problema">
                <td><?php echo $row['id_inventario']; ?></td>
                <td><?php echo $row['descripcion']; ?></td>
                <td><?php echo $row['talla']; ?></td>

                <td><?php echo $row['precio']; ?></td>
                <td><img src="<?= $row['imagen']; ?>"style="width: 80px; height: 80px;"></td>
                <td>
                <form action="carrito_borrar.php" method="post" onsubmit="return confirm('¿Estás seguro de que quieres borrar este articulo de tu lista?')">
                        <input type="hidden" name="id_inventario" value="<?php echo $row['id_inventario']; ?>">
                        <button type="submit" style="border: none; background: none; color: red; cursor: pointer;">Eliminar</button>
                    </form>
                </td>
            </tr>
            <?php
                }
            }
            ?>
            </tbody>
        </table>
    <!-- CIERRE TABLA -->





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