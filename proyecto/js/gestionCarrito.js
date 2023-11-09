document.addEventListener("DOMContentLoaded", function () {
  var productos = document.getElementById('prodConten');
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
      var query = "../sCarrito/carritoCRUD.php?idCarrito=" + idCarrito;
      let botonesArray = [];
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
                  let precioTotal = 0;
                  for (let i = 0; i < data.length; i++) {
                      productos.innerHTML += `<div class="card mb-3" style="width: 80vw; background-color: rgb(146, 146, 146); display: flex; flex-direction: row;">
                          <div class="col-md-4" style="display: flex; justify-content: center; align-items: center;">
                              <img src="../view/img/${data[i]['foto']}" class="img-fluid rounded-start" alt="..." style="max-width: 10vw;">
                          </div>
                          <div class="col-md-8" style="display: flex; justify-content: center; align-items: center;">
                              <div class="card-body">
                                  <p class="card-title" style="font-size: 2.2vw; width: 100%; font-weight: bold; text-align: center;">${data[i]['nombre']}</p>
                                  <p class="card-text" style="font-size: 0.9vw;">${data[i]['origen']}</p>
                                  <div id="buttContainer" style="margin-top: 1vw; width: 100%; height: 2vw; display: flex; flex-direction: row; justify-content: center; align-items: center;">
                                      <div style="display: flex; flex-direction: row; margin-right: 4vw; justify-content: center; align-items: center;">
                                          <button data-index="${i}" class="botonesCRUD sumarBtn" type="submit" name="sumar" style="width: 2vw; font-size: 1.2vw; height: 2vw;">+</button>
                                          <p data-index="${i}" class="quantityCount" style="width: 3vw; text-align: center; font-size: 2vw;">${data[i]['cantidad']}</p>
                                          <button data-index="${i}" class="botonesCRUD restarBtn" type="submit" name="restar" style="width: 2vw; font-size: 1.2vw; height: 2vw;">-</button>
                                      </div>
                                      <button data-index="${i}" class="botonesCRUD borrarBtn" type="submit" name="borrar" style="width: 4.7vw; font-size: 0.8vw; height: 2vw;">Borrar</button>
                                  </div>
                              </div>
                          </div>
                      </div>`;
                      precioTotal += data[i]['precio'] * data[i]['cantidad'];
                      botonesArray.push(i);
                  }
                  console.log(precioTotal);
                  botonesArray.forEach(index => agregarEventListeners(data, index));
              }
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

  function agregarEventListeners(data, index) {
      let sumarBtn = document.querySelector(`.sumarBtn[data-index="${index}"]`);
      let restarBtn = document.querySelector(`.restarBtn[data-index="${index}"]`);
      let quantityCount = document.querySelector(`.quantityCount[data-index="${index}"]`);
      let borrarBtn = document.querySelector(`.borrarBtn[data-index="${index}"]`);

      if (sumarBtn && restarBtn && quantityCount && borrarBtn) {
          sumarBtn.addEventListener("click", function () {
              var currentCount = parseInt(quantityCount.innerText);
              if (!isNaN(currentCount)) {
                  currentCount++;
                  quantityCount.innerText = currentCount;
              }
          });

          restarBtn.addEventListener("click", function () {
              var currentCount = parseInt(quantityCount.innerText);
              if (!isNaN(currentCount) && currentCount > 0) {
                  currentCount--;
                  quantityCount.innerText = currentCount;
              }
          });

          borrarBtn.addEventListener("click", function () {
              let idCarrito = obtenerIdCarrito();
              let idProducto = obtenerIdProducto(data, index);

              fetch(`../sCarrito/carritoCRUD.php?idCarrito=${idCarrito}&idProducto=${idProducto}`, {
                      method: 'DELETE',
                  })
                  .then(response => {
                      if (!response.ok) {
                          throw new Error(`Error al borrar la línea del carrito: ${response.statusText}`);
                      }
                      setTimeout(() => {
                          location.reload();
                      }, 500);
                  })
                  .catch(error => {
                      console.error(error);
                  });
          });
      }
  }

  function obtenerIdProducto(data, index) {
      if (data && data[index] && data[index]['idProducto']) {
          return data[index]['idProducto'];
      } else {
          console.error("No se pudo obtener la idProducto");
          return null;
      }
  }

  function obtenerIdCarrito() {
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

      return idCarrito;
  }
});