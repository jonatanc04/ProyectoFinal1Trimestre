<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <title>Control Hub</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
    <div class="container-fluid">

        <div id="header" class="row">
            <a href="index.php" id="home" class="d-none col-sm-2 d-sm-flex">
                <div>
                    <p>HOME</p>
                    <img class="icono" src="icons/home.png">
                </div>
            </a>
            <a href="../controlers/principal.php" id="home" class="d-none col-sm-2 d-sm-flex">
                <div id="products" class="d-none col-sm-2 d-sm-flex">
                    <p>PRODUCTS</p>
                    <img class="icono" src="icons/productos.png">
                </div>
            </a>
            <div id="logo" class="col-12 col-sm-4">
                <img class="logo" src="img/logoweb.png">
            </div>
            <a href="../controlers/verCarrito.php" id="home" class="d-none col-sm-2 d-sm-flex">
                <div id="cart" class="d-none col-sm-2 d-sm-flex">
                    <p>CART</p>
                    <img class="icono" src="icons/carrito.png">
                </div>
            </a>
            <?php
                if(isset($_COOKIE['nombre'])) {
                    echo '<a href="../controlers/user.php?dniCliente='.$_COOKIE['dniCliente'].'" id="home" class="d-none col-sm-2 d-sm-flex">';
                    echo '<div id="log-in" class="d-none col-sm-2 d-sm-flex">';
                    echo '<p>'.$_COOKIE['nombre'].'</p>';
                    echo '<img class="icono" src="icons/login.png">';
                    echo "</div>";
                    echo "</a>";
                } else {
                    echo '<a href="../controlers/registrarse.php" id="home" class="d-none col-sm-2 d-sm-flex">';
                    echo '<div id="log-in" class="d-none col-sm-2 d-sm-flex">';
                    echo '<p>REGISTER</p>';
                    echo '<img class="icono" src="icons/login.png">';
                    echo "</div>";
                    echo "</a>";
                }
            ?>
        </div>

        <div id="body" class="row">
            <div id="cabezera" class="row">
                <div id="text-web" class="col-12 col-sm-7">
                    <p>NOS ESPECIALIZAMOS EN TODO TIPO DE MANDOS, TANTO PARA LO ÚLTIMO DEL MERCADO COMO PARA LO MAS RETRO.</p>
                    <div id="buscar">
                        <input type="text" id="busqueda" name="busqueda" placeholder="Busca nuestros productos">
                        <img id="search-ico" src="icons/buscar.png">
                    </div>
                </div>
                <div id="imagen-mando" class="col-12 col-sm-4">
                    <img class="ps5-control" src="img/mandops5.png">
                </div>
            </div>
            <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                <p id="absolute-text">CONOCE TODA NUESTRA GAMA DE CONTROLADORES</p>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="img/ps5carrousel.png" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="img/nescarrousel.png" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="img/xboxcarrousel.png" class="d-block w-100" alt="...">
                    </div>
                </div>
            </div>
            <div id="cards">
                <a href="">
                    <div class="product">
                        <img src="img/xbox.png">
                        <p>ÚLTIMOS MODELOS</p>
                    </div>
                </a>
                <a href="">
                    <div class="product">
                        <img src="img/n64.png">
                        <p>LOS MÁS RETRO</p>
                    </div>
                </a>
                <a href="">
                    <div class="product">
                        <img src="img/ps4mod.png">
                        <p>CUSTOMIZA TU MANDO</p>
                    </div>
                </a>
            </div>
        </div>
    
        <div id="footer" class="row">
            <div id="info" class="col-12 col-sm-6">
                <p id="contact">CONTACTA CON NOSOTROS</p>
                <p id="infcontanct">controlhubsl@info.ch.es</p>
                <p id="infcontanct">Teléfono: 921 23 45 67</p>
                <div id="icons">
                    <a href="https://www.instagram.com/jonatanc4/">
                        <img src="icons/instagram.png">
                    </a>
                    <a href="https://twitter.com/Sirinazurey">
                        <img src="icons/twitter.png">
                    </a>
                    <a href="https://www.tiktok.com/@sirinazurey">
                        <img src="icons/tiktok.png">
                    </a>
                    <a href="">
                        <img src="icons/facebook.png">
                    </a>
                </div>
            </div>
            <div id="mapa" class="col-12 col-sm-6">
                <iframe src="https://www.google.com/maps/d/embed?mid=1jjdI1Wm-el7BGgEI8L-Vjp3GL9E&hl=es&ehbc=2E312F" width="640vw" height="300vw"></iframe>
            </div>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>