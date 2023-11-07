var productos = document.getElementById('prodConten');
var idCarrito = $_COOKIE['idCarrito'];
var query = "../sCarrito/carritoCRUD.php?idCarrito="+idCarrito;

fetch(query, {
    method: 'GET',
})
.then(res => {
    console.log(res);
    return res.json();
})
.then(data => {
    console.log(data);

    if (Array.isArray(data) && data.length > 0) {
        // Si data es un array con al menos un elemento
        data.forEach(producto => {
            productos.innerHTML += `
                <div class="card mb-3" style="width: 80vw; background-color: rgb(146, 146, 146); display: flex; flex-direction: row;">
                    <!-- ... (contenido del producto) -->
                </div>`;
        });
    } else {
        // Si data no es un array, o es un array vacío, utiliza un for...of en el else
        for (const item of Object.entries(data)) {
            // item[0] es la clave, item[1] es el valor
            console.log(`Clave: ${item[0]}, Valor: ${item[1]}`);
        }
    }
})
.catch(error => {
    console.error(error);
});
