var formulario = document.getElementById('formulario');
var respuesta = document.getElementById('respuesta');

formulario.addEventListener('submit', function(e) {
    e.preventDefault();
    var datos = new FormData(formulario);

    var nombre = datos.get('nombre');
    var dniCliente = datos.get('dniCliente');
    var email = datos.get('email');
    var pwd = datos.get('pwd');

    var idCarrito = obtenerIdCarrito();

    if (nombre === '' && email === '') {
        const queryString = "dniCliente=" + dniCliente + "&pwd=" + pwd;

        fetch("../sClientes/validarClientes.php?" + queryString, {
            method: 'GET',
        })
        .then(res => {
            return res.json();
        })
        .then(data => {
            console.log(data);
                if (data === false) {
                    alert("Se ha producido un error en la validación del cliente.");
                } else {
                    console.log(idCarrito);
                    if (idCarrito !== null) {
                        actualizarCarrito(idCarrito, dniCliente);
                    }
                    setTimeout(function () {
                        window.location.href = "../view/index.php";
                    }, 1000);
                }
        })
        .catch(error => {
            console.error(error);
        });
        
    } else {
        if (nombre === '' || dniCliente === '' || email === '' || pwd === '') {
            alert("Existen campos vacíos. Por favor, completa todos los campos.");
        } else {
            fetch('../sClientes/validarClientes.php', {
                method: 'POST',
                body: datos
            })
            .then(res => {
                if (!res.ok) {
                    alert("Esa cuenta ya está en uso. Utilice otra información.");
                }
                return res.json();
            })
            .then(data => {
                console.log(data);
                if (data !== false) {
                    if (idCarrito !== null) {
                        actualizarCarrito(idCarrito, dniCliente);
                    }
                    setTimeout(function () {
                        window.location.href = "../view/index.php";
                    }, 1000);
                }
            })
            .catch(error => {
                console.error(error);
            });
        }
    }
});

function actualizarCarrito(idCarrito, dniCliente) {
    var url = `../sCarrito/carritoCRUD.php?idCarrito=${idCarrito}&dniCliente=${dniCliente}`;

    fetch(url, {
        method: 'PUT',
        headers: {
            'Content-Type': 'application/json',
        },
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
    })
    .then(data => {
        console.log(data);
    })
    .catch(error => {
        console.error('Error:', error);
    });
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