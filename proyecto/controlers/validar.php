<?php

include "../view/header.php";

include "../view/form.php";

echo '<script src="../js/cambiarForm.js"></script>';
echo '<script src="../js/validarClientes.js"></script>';

include "../view/footer.html";
if (isset($_GET['alert'])) {
    echo '<script language="javascript">alert("Has de iniciar sesión para realizar la compra.");</script>';
}
?>