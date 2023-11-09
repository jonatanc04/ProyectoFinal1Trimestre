var formulario = document.getElementById('formulario');
var respuesta = document.getElementById('respuesta');

formulario.addEventListener('submit', function(e) {
    e.preventDefault();
    var datos = new FormData(formulario);

    var nombre = datos.get('nombre');
    var dniCliente = datos.get('dniCliente');
    var email = datos.get('email');
    var pwd = datos.get('pwd');

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