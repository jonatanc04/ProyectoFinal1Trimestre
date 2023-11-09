<?php
    include "config/autocarga.php";
    $base = new Base();

    if ($_SERVER['REQUEST_METHOD'] == 'GET') {  
        if(isset($_GET['idCarrito'])) {
            header("HTTP/1.1 200 OK");
            echo json_encode(Carrito::getAllByID($base->link, $_GET['idCarrito']), JSON_UNESCAPED_UNICODE);
            exit();
        } else if (isset($_GET['idProducto'])) {
            $producto = new Producto($_GET['idProducto']);
            header("HTTP/1.1 200 OK");
            echo json_encode($producto->buscar($base->link), JSON_UNESCAPED_UNICODE);
            exit();
        } else {
            return false;
        }
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
        $producto = new Carrito($_GET['idCarrito'], '', $_GET['idProducto'], '');
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