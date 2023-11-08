<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../view/favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="../view/css/style.css" rel="stylesheet">
    <script src="../js/cambiarVista.js"></script>
</head>
<body>
    <div class="container-fluid">

        <div id="header" class="row">
            <a href="../index.php" id="home" class="d-none col-sm-2 d-sm-flex">
                <div>
                    <p>HOME</p>
                    <img class="icono" src="../view/icons/home.png">
                </div>
            </a>
            <a href="principal.php" id="home" class="d-none col-sm-2 d-sm-flex">
                <div id="products" class="d-none col-sm-2 d-sm-flex">
                    <p>PRODUCTS</p>
                    <img class="icono" src="../view/icons/productos.png">
                </div>
            </a>
            <div id="logo" class="col-12 col-sm-4">
                <img class="logo" src="../view/img/logoweb.png">
            </div>
            <a href="verCarrito.php" id="home" class="d-none col-sm-2 d-sm-flex">
                <div id="cart" class="d-none col-sm-2 d-sm-flex">
                    <p>CART</p>
                    <img class="icono" src="../view/icons/carrito.png">
                </div>
            </a>
            <?php
                if(isset($_COOKIE['nombre'])) {
                    echo '<a href="../controlers/user.php?dniCliente='.$_COOKIE['dniCliente'].'" id="home" class="d-none col-sm-2 d-sm-flex">';
                    echo '<div id="log-in" class="d-none col-sm-2 d-sm-flex">';
                    echo '<p>'.$_COOKIE['nombre'].'</p>';
                } else {
                    echo '<a href="../controlers/registrarse.php" id="home" class="d-none col-sm-2 d-sm-flex">';
                    echo '<div id="log-in" class="d-none col-sm-2 d-sm-flex">';
                    echo '<p>REGISTER</p>';
                }
            ?>
            <img class="icono" src="../view/icons/login.png">
            </div>
            </a>
        </div>