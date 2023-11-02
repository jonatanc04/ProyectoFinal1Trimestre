var formulario = document.getElementById('formulario');
var respuesta = document.getElementById('respuesta');

formulario.addEventListener('submit', function(e) {
    e.preventDefault();
    console.log('Hiciste click');
    var datos = new FormData(formulario);

    var nombre = datos.get('nombre');
    var dniCliente = datos.get('dniCliente');
    var email = datos.get('email');
    var pwd = datos.get('pwd');

    if (nombre === '' || dniCliente === '' || email === '' || pwd === '') {
        alert("Existen campos vacíos. Por favor, completa todos los campos.");
    } else {
        fetch('../sClientes/validarClientes.php', {
            method: 'POST',
            body: datos
        })
        .then(res => {
            if (!res.ok) {
                throw new Error(`Error en la solicitud: ${res.status} ${res.statusText}`);
            }
            return res.json();
        })
        .then(data => {
            console.log(data);
            if (data === 'error') {
                respuesta.innerHTML = "Se produjo un error en la validación del cliente.";
            } else {
                respuesta.innerHTML = "¡Éxito! Redirigiendo a index.html en unos segundos...";
                // Redirigir al usuario a index.html después de un breve retraso
                setTimeout(function () {
                    window.location.href = "../view/index.html";
                }, 1000); // Redirección después de 3 segundos (puedes ajustar el tiempo)
            }
        })
        .catch(error => {
            console.error(error);
            // Manejar el error de respuesta aquí
        });
    }
});
