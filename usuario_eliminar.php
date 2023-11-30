<?php
    include 'php/bd.php';
    
    if (isset($_POST['id_usuario'])) {
        $conn = conectarBD();
        $idUsuario = $_POST['id_usuario'];

        $sql = "DELETE FROM usuarios WHERE id_usuario = $idUsuario";
        $resultado = mysqli_query($conn, $sql);

        if ($resultado) {
            echo "Usuario eliminado exitosamente.";
            header("Location: admin_usuario.php");
        } else {
            echo "Error al eliminar el usuario: " . mysqli_error($conn);
        }

        mysqli_close($conn);
    } else {
        echo "ID de usuario no proporcionado.";
    }
?>