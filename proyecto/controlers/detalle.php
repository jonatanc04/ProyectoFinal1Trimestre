<?php
include "../view/header.php";

echo "<div id='body' class='row'>";

if (isset($_POST['comprar'])) {
    $idProducto = $_GET['idProducto'];
    $cantidad = $_POST['cantidad'];
    header("Location: verCarrito.php?idProducto=$idProducto&cantidad=$cantidad");
    exit;
}

$url = "http://localhost/proyecto/sProductos/obtenerProductos.php?idProducto=" . $_GET['idProducto'];
$context = stream_context_create(array(
    'http' => array(
        'method' => 'GET',
        'header' => "User-Agent: PHP\r\n",
        'ignore_errors' => true,
    )
));

$dato = file_get_contents($url, false, $context);
$dato = json_decode($dato, true);

echo "<div id='infProd' class='col-12 col-sm-6'>";
echo "<p>Nombre: " . $dato['nombre'] . "</p>";
echo "<p>Marca: " . $dato['marca'] . "</p>";
echo "<p>Precio: " . $dato['precio'] . "€</p><br>";
echo "<p class='descDeProd'>" . $dato['origen'] . "</p><br>";

echo '<form action="" method="post">';
echo '<p class="cantidad-label">Cantidad: </p><input type="number" name="cantidad" value="1">';
echo '<button type="submit" name="comprar" class="boton-comprar">Comprar</button>';
echo '</form>';

echo "</div>";

echo "<div id='imgPr' class='col-12 col-sm-6'>";
echo "<img src='../view/img/" . $dato['foto'] . "'>";
echo "</div>";

echo "</div>";

include "../view/footer.html";
?>
