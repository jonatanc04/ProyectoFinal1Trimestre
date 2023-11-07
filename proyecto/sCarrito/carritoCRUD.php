<?php
    include "config/autocarga.php";
    $base = new Base();

    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        $datos = Carrito::getAllByID($base->link);
    
        if (empty($datos)) {
            header("HTTP/1.1 404 Not Found");
            echo false;
        } else {
            header("HTTP/1.1 200 OK");
            echo json_encode($datos, JSON_UNESCAPED_UNICODE);
        }
        exit();
    }
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if(isset($_COOKIE['dniCliente'])) {
            $producto = new Carrito($_POST['idCarrito'], $_COOKIE['dniCliente'], $_POST['idProducto'], $_POST['cantidad']);
        } else {
            $producto = new Carrito($_POST['idCarrito'], '', $_POST['idProducto'], $_POST['cantidad']);
        }

        if($postId = $producto->insertarProducto($base->link)) {
            header("HTTP/1.1 200 OK");
            exit();
        }
    }

    if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
        $producto = new Carrito($_POST['idCarrito'], '', $_POST['idProducto'], '');
        $producto->borrarProducto($base->link);
        header("HTTP/1.1 200 OK");
        exit();
    }

    if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
        $producto = new Carrito($_POST['idCarrito'], '', $_POST['idProducto'], $_POST['cantidad']);
        $producto->updateCantidad($base->link);
        echo json_encode($producto->buscar($base->link));
        header("HTTP/1.1 200 OK");
        exit();
    }

    header("HTTP/1.1 400 Bad Request");
?>