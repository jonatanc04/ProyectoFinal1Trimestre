<div id="body" class="row">
    <div class="formulario">
        <h1 id="logorreg">Registro</h1>
        <form id='formulario' method="POST">
            <div class="input-group">
                <div class="input-field">
                    <i class="fa-solid fa-id-card"></i>
                    <input type="text" name="dniCliente" placeholder="DNI">
                </div>
                <div class="input-field">
                    <i class="fa-solid fa-lock"></i>
                    <input type="password" name="pwd" placeholder="Contraseña">
                </div>
                <div class="input-field" id="emailInput">
                    <i class="fa-solid fa-envelope"></i>
                    <input type="email" name="email" placeholder="Correo">
                </div>
                <div class="input-field" id="nameInput">
                    <i class="fa-solid fa-user"></i>
                    <input type="text" name="nombre" placeholder="Nombre">
                </div>
                <p>¿Has olvidado tu contraseña? <a href="../view/img/dio.jpg">¡Click aquí!</a></p>
            </div>
            <div class="btn-field">
                <button id="singUp" type="button" class="disable">Registro</button>
                <button id="singIn" type="button">Login</button>
            </div>
            <button id="enviaDatos" type="submit">Aceptar</button>
            <div id="respuesta"></div>
        </form>
    </div>
</div>