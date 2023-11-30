<?php

include 'php/bd.php';

$conn = conectarBD();
if (!$conn) {
    die("Error en la conexión a la base de datos: " . $conn->connect_error);
}

$id_producto = $_GET['id_producto'];

$id_producto = mysqli_real_escape_string($conn, $id_producto);


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
    <!-- Start Content Page -->
    <div class="container-fluid bg-light py-5">
        <div class="col-md-6 m-auto text-center">
            <h1 class="h1">Actualiza la información</h1>
        </div>
    </div>



    <!-- Start Contact -->
    <div class="container py-5">
    <div class="row py-5">
        <div class="col-md-9 m-auto">
            <form method="post" role="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div class="row">
                    <div class="form-group col-md-6 mb-3">
                        <label for="inputnombre">Nombre</label>
                        <input type="text" class="form-control mt-1" id="nombre" name="nombre" placeholder="Nombre">
                    </div>
                    <div class="form-group col-md-6 mb-3">
                        <label for="inputapellido">Apellido</label>
                        <input type="text" class="form-control mt-1" id="apellido" name="apellido" placeholder="Apellido">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6 mb-3">
                        <label for="inputemail">Correo</label>
                        <input type="email" class="form-control mt-1" id="email" name="correo" placeholder="Correo">
                    </div>
                    <div class="form-group col-md-6 mb-3">
                        <label for="inputpassword">Contraseña</label>
                        <input type="password" class="form-control mt-1" id="pass" name="pass" placeholder="Contraseña">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6 mb-3">
                        <label for="inputfnam">Fecha de Nacimiento</label>
                        <input type="date" class="form-control mt-1" id="fnam" name="fnam">
                    </div>
                    <div class="form-group col-md-6 mb-3">
                        <label for="inputdireccion">Dirección</label>
                        <input type="text" class="form-control mt-1" id="direccion" name="direccion" placeholder="Dirección">
                    </div>
                </div>
                <div class="row">
                    <div class="col text-end mt-2">
                        <button type="submit" class="btn btn-success btn-lg px-3" name="registrar">Actualizar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

    <!-- End Contact -->

    <!-- Start Script -->
    <script src="assets/js/jquery-1.11.0.min.js"></script>
    <script src="assets/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/templatemo.js"></script>
    <script src="assets/js/custom.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- End Script -->
    <script>

</body>

</html>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = mysqli_real_escape_string($conn, $_POST['nombre']);
    $apellido = mysqli_real_escape_string($conn, $_POST['apellido']);
    $correo = mysqli_real_escape_string($conn, $_POST['correo']);
    $pass = mysqli_real_escape_string($conn, $_POST['pass']);
    $fnam = mysqli_real_escape_string($conn, $_POST['fnam']);
    $direccion = mysqli_real_escape_string($conn, $_POST['direccion']);

    $sql = "UPDATE usuarios SET nombre = '$nombre', 
        apellido = '$apellido', 
        pass = '$pass', 
        correo = '$correo', 
        direccion = '$direccion', 
        fnam = '$fnam'
    WHERE id_usuario = $id_usuario";

    if ($conn->query($sql) === TRUE) {
        
        header("Location: admin_usuario.php");
        exit();
    } else {
        echo "Error al actualizar los datos: " . $conn->error;
    }
}

$conn->close();
?>


