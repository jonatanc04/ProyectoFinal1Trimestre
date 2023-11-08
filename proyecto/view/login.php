<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <title>Entrar - Control Hub</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/form.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="container-fluid">

        <div id="header" class="row">
            <a href="index.html" id="home" class="d-none col-sm-2 d-sm-flex">
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
            <a href="login.php" id="home" class="d-none col-sm-2 d-sm-flex">
                <div id="log-in" class="d-none col-sm-2 d-sm-flex">
                    <p>REGISTER</p>
                    <img class="icono" src="icons/login.png">
                </div>
            </a>
        </div>

        <div id="body" class="row">
            <div class="formulario">
                <h1 id="title">Registro</h1>
                <form id='formulario' method="POST">
                    <div class="input-group">
                        <div class="input-field" id="nameInput">
                            <i class="fa-solid fa-user"></i>
                            <input type="text" placeholder="Nombre">
                        </div>
                        <div class="input-field" id="dniInput">
                            <i class="fa-solid fa-id-card"></i>
                            <input type="text" placeholder="DNI">
                        </div>
                        <div class="input-field">
                            <i class="fa-solid fa-envelope"></i>
                            <input type="email" placeholder="Correo">
                        </div>
                        <div class="input-field">
                            <i class="fa-solid fa-lock"></i>
                            <input type="password" placeholder="Contraseña">
                        </div>
                        <p>¿Has olvidado tu contraseña? <a href="#">¡Click aquí!</a></p>
                    </div>
                    <div class="btn-field">
                        <button id="singUp" type="button" class="disable">Registro</button>
                        <button id="singIn" type="button">Login</button>
                    </div>
                </form>
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
                <iframe src="https://www.google.com/maps/d/embed?mid=1jjdI1Wm-el7BGgEI8L-Vjp3GL9E&hl=es&ehbc=2E312F"></iframe>
            </div>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="js/cambiarForm.js"></script>
</body>
</html>