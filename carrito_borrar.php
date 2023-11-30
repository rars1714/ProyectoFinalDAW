<?php
    include 'php/bd.php';
    
    if (isset($_POST['id_inventario'])) {
        $conn = conectarBD();
        $id_inventario = $_POST['id_inventario'];

        $sql = "DELETE FROM carrito WHERE id_inventario = $id_inventario";
        $resultado = mysqli_query($conn, $sql);

        if ($resultado) {
            header("Location: carrito.php");
        } else {
            echo "Error al eliminar el carrito: " . mysqli_error($conn);
        }

        mysqli_close($conn);
    } else {
    }
?>