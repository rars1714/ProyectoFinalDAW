<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_title = $_POST["product-title"];
    $product_size = $_POST["product-size"];
    $product_quantity = $_POST["product-quantity"];

    echo "Título del producto: " . $product_title . "<br>";
    echo "Talla seleccionada: " . $product_size . "<br>";
    echo "Cantidad seleccionada: " . $product_quantity . "<br>";
}
?>