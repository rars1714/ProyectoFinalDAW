<?php
include 'php/bd.php';
session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
        $talla = $_POST["talla"];
        $qty = $_POST["qty"];
        $precio = $_POST["precio"];
        $descripcion = $_POST["descripcion"];
        $nombreUsuario = $_POST["nombre"];
    
        $conn = conectarBD();
        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }      
    
        $sql = "SELECT id_inventario, id_producto, descripcion, precio, talla FROM inventario WHERE descripcion = '$descripcion' AND talla = '$talla'";
        
        $result = $conn->query($sql);
    
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $idInventario = $row["id_inventario"];
            $idProducto = $row["id_producto"];
    
            $insertSQL = "INSERT INTO carrito (id_inventario, nombre, id_producto, talla, precio, descripcion) 
                          VALUES ('$idInventario', '$nombreUsuario', '$idProducto', '$talla', '$precio', '$descripcion')";
    
            if ($conn->query($insertSQL) === TRUE) {
                header("Location: index.php");
                exit();
            } else {
                echo "Error al agregar al carrito: " . $conn->error;
            }
        } else {
            echo "No existe";
        }
        $conn->close();
    }
    ?>
    