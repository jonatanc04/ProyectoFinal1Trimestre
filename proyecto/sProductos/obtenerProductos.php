<?php

include "config/autocarga.php";
$base = new Base();

if ($_SERVER['REQUEST_METHOD'] == 'GET') {  
    
    if (isset($_GET['idProducto'])) {
            $producto = new Producto($_GET['idProducto']);
            header("HTTP/1.1 200 OK"); 
            echo json_encode($producto->buscar($base->link), JSON_UNESCAPED_UNICODE);
    } else {
            header("HTTP/1.1 200 OK");
            echo json_encode(Producto::getAll($base->link), JSON_UNESCAPED_UNICODE);
    }
}

header("HTTP/1.1 400 Bad Request")

?>