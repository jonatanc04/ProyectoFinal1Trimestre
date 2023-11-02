var formulario = document.getElementById('formulario');
var respuesta = document.getElementById('respuesta');

formulario.addEventListener('submit', function(e){
    e.preventDefault();
    console.log('Hiciste click');
    var datos = new FormData(formulario);

    console.log(datos);
    console.log(datos.get('nombre'));
    console.log(datos.get('dni'));
    console.log(datos.get('correo'));
    console.log(datos.get('pwd'));

    if (datos.get('nombre') == '' && datos.get('dni') == '') {

    } else {

        fetch('../sClientes/validarClientes.php',{
            method: 'POST',
            body: datos
        })
            .then( res => res.json())
            .then( data => {
                console.log(data)
                if(data === 'error'){
                    respuesta.innerHTML = `
                    <div class="alert alert-danger" role="alert">
                        Llena todos los campos
                    </div>
                    `
                }else{
                    respuesta.innerHTML = `
                    <div class="alert alert-primary" role="alert">
                        ${data}
                    </div>
                    `
                }
            } )

    }
    
});