var url = window.location.href;

var title = "Título Genérico";
var styles = "estilos-generales.css";
var script = "script-default.js"

if (url.includes("principal.php")) {
    title = "Productos - Control Hub";
    styles = "../view/css/prod.css";
} else if (url.includes("detalle.php")) {
    title = "Detalle - Control Hub";
    styles = "../view/css/detalle.css";
} else if (url.includes("verCarrito.php")) {
    title = "Carrito - Control Hub";
    styles = "../view/css/carrito.css";
} else if (url.includes("validar.php")) {
    title = "Inicio Sesión - Control Hub";
    styles = "../view/css/form.css";
} else if (url.includes("user.php")) {
    title = "Usuario - Control Hub";
    styles = "../view/css/user.css";
} else if (url.includes("confirmar.php")) {
    title = "Confirmar - Control Hub";
    styles = "../view/css/confirmar.css";
}

document.title = title;

var styleSheet = document.createElement("link");
styleSheet.rel = "stylesheet";
styleSheet.type = "text/css";
styleSheet.href = styles;
document.head.appendChild(styleSheet);