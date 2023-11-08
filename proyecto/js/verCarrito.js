var productos = document.getElementById('prodConten');
var body = document.getElementById('body');
var todasLasCookies = document.cookie;
var cookies = todasLasCookies.split(';');
var idCarrito = null;

for (var i = 0; i < cookies.length; i++) {
    var cookie = cookies[i].trim();
    var partes = cookie.split('=');
    var nombre = partes[0];
    var valor = decodeURIComponent(partes[1]);

    if (nombre === 'idCarrito') {
        idCarrito = valor;
        break;
    }
}

if (idCarrito !== null) {
    var query = "../sCarrito/carritoCRUD.php?idCarrito="+idCarrito;

    fetch(query, {
        method: 'GET',
    })
    .then(res => res.json())
    .then(data => {
        if (data.length == 0) {
            productos.innerHTML = `<div class='textContainer'>
            <p class='noProductos'>¡No has añadido ningún producto al carrito!</p>
            <p class='clickAqui'>Puedes ver nuestros productos haciendo <a class='entra' href='../controlers/principal.php'>click aquí.</a></p>
            </div>`;
        } else {
            for (let i = 0; i < data.length; i++) {
                console.log(data[i]['idProducto']);
                productos.innerHTML += `<div class="card mb-3" style="width: 80vw; background-color: rgb(146, 146, 146); display: flex; flex-direction: row;">
                <div class="col-md-4" style="display: flex; justify-content: center; align-items: center;">
                  <img src="../view/img/mandops5.png" class="img-fluid rounded-start" alt="..." style="max-width: 10vw;">
                </div>
                <div class="col-md-8" style="display: flex; justify-content: center; align-items: center;">
                  <div class="card-body">
                    <p class="card-title" style="font-size: 2.2vw; width: 100%; font-weight: bold; text-align: center;">Mando PS5</p>
                    <p class="card-text" style="font-size: 0.9vw;">Texto</p>
                    <div id="buttContainer" style="margin-top: 1vw; width: 100%; height: 2vw; display: flex; flex-direction: row; justify-content: center; align-items: center;">
                      <div style="display: flex; flex-direction: row; margin-right: 4vw; justify-content: center; align-items: center;">
                        <button id="sumar" class="botonesCRUD" type="submit" name="sumar" style="width: 2vw; font-size: 1.2vw; height: 2vw;">+</button>
                        <p id="quantity" style="width: 3vw; text-align: center; font-size: 2vw;">0</p>
                        <button id="restar" class="botonesCRUD" type="submit" name="restar" style="width: 2vw; font-size: 1.2vw; height: 2vw;">-</button>
                      </div>
                      <button class="botonesCRUD" type="submit" name="borrar" style="width: 4.7vw; font-size: 0.8vw; height: 2vw;">Borrar</button>
                    </div>
                  </div>
                </div>
              </div>`;
            }
        }
        body.innerHTML += `<script src='../js/gestionarCarrito.js'></script>`;

    })
    .catch(error => {
        console.error(error);
    });

} else {
    productos.innerHTML = `<div class='textContainer'>
    <p class='noProductos'>¡No has añadido ningún producto al carrito!</p>
    <p class='clickAqui'>Puedes ver nuestros productos haciendo <a class='entra' href='../controlers/principal.php'>click aquí.</a></p>
    </div>`;
}