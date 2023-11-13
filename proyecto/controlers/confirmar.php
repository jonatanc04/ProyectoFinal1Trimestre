<?php

include "../config/autocarga.php";
$base = new Base();

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
$fecha = date("Y-m-d");
$precioTotal = 0;

include "../view/header.php";

if (isset($_POST['confirmar'])) {
    
    $url = "http://localhost/proyecto/sCarrito/carritoCRUD.php?newId=true";
    $idPedido = file_get_contents($url, false)+1;

    $pedido = new Pedidos($idPedido, $fecha, "sin direccion", '', '', '', $dniCliente);
    $pedido->anyadirPedido($base->link);

    $nLinea = 1;
    foreach ($carrito as $fila) {
        $linea = new LineasPedidos($idPedido, $nLinea, $fila['idProducto'], $fila['cantidad']);
        $linea->anyadirLineas($base->link);
        $nLinea += 1;
    }

    $borrarCarrito = new Carrito($_COOKIE['idCarrito']);
    $borrarCarrito->borrarTodo($base->link);

    setcookie('idCarrito', '', time() - 3600, '/');
    setcookie('nombre', '', time() - 3600, '/');
    setcookie('dniCliente', '', time() - 3600, '/');

    header("Location: ../view/index.php");

} else {
    include "../view/compra.php";
}

include "../view/footer.html";

?>