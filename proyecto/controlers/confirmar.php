<?php

if (!isset($_COOKIE['dniCliente'])) {
    header("Location: validar.php?alert=true");
    die();
}

$url = "http://localhost/proyecto/sCarrito/carritoCRUD.php?idCarrito=".$_COOKIE['idCarrito'];
$context = stream_context_create(array(
    'http' => array(
        'method' => 'GET',
        'header' => "User-Agent: PHP\r\n",
        'ignore_errors' => true,
    )
));

$carrito = file_get_contents($url, false, $context);
$carrito = json_decode($carrito, true);
$dniCliente = $_COOKIE['dniCliente'];


include "../view/header.php";

foreach ($carrito as $fila) {
    echo $fila['nombre'];
}

include "../view/footer.html";

?>