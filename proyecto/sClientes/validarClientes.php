<?php

include "config/autocarga.php";
$base = new Base();

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['dniCliente']) && isset($_GET['pwd'])) {
        $cliente = new Cliente($_GET['dniCliente'],'','','',$_GET['pwd'],'');
        $existe = $cliente->validar($base->link);
        if ($existe) {
            setcookie('dniCliente', $_GET['dniCliente'], time() + 3600, '/');
            setcookie('nombre', $existe['nombre'], time() + 3600, '/');
            header("HTTP/1.1 200 OK");
            echo json_encode($cliente->validar($base->link), JSON_UNESCAPED_UNICODE);
            exit();
        } else {
        echo json_encode(false);
    }
    } else {
        echo json_encode(false);
    }
} else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cliente = new Cliente($_POST['dniCliente'], $_POST['nombre'], '', $_POST['email'], $_POST['pwd'],'');
    $existe = $cliente->validar($base->link);
    if (!$existe) {
        setcookie('dniCliente', $_POST['dniCliente'], time() + 3600, '/');
        setcookie('nombre', $_POST['nombre'], time() + 3600, '/');
        header("HTTP/1.1 200 OK");
        echo json_encode($cliente->registro($base->link), JSON_UNESCAPED_UNICODE);
        exit();
    } else {
        echo json_encode(false);
    }
}

header("HTTP/1.1 400 Bad Request");

?>