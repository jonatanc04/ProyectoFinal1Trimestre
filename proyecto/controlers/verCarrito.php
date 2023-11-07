<?php

include "../config/autocarga.php";
include "../view/header.php";
$base = new Base();

echo "<div id='body' class='row'>";
echo "<div id='prodConten'>";

/* echo '<div class="card mb-3" style="width: 80vw; background-color: rgb(146, 146, 146); display: flex; flex-direction: row;">';
echo '<div class="col-md-4" style="display: flex; justify-content: center; align-items: center;">';
echo '    <img src="../view/img/mandops5.png" class="img-fluid rounded-start" alt="..." style="max-width: 10vw;">';
echo '</div>';
echo '  <div class="col-md-8" style="display: flex; justify-content: center; align-items: center;">';
echo '    <div class="card-body">';
echo '      <p class="card-title" style="font-size: 2.2vw; width: 100%; font-weight: bold; text-align: center;">Mando PS5</p>';
echo '      <p class="card-text"  style="font-size: 0.9vw;">Texto</p>';
echo '          <div id="buttContainer" style="margin-top: 1vw; width: 100%; height: 2vw; display: flex; flex-direction: row; justify-content: center; align-items: center;">';
echo '              <div style="display: flex; flex-direction: row; margin-right: 4vw; justify-content: center; align-items: center;">';
echo '                  <button id="sumar" class="botonesCRUD" type=submit name="sumar" style="width: 2vw; font-size: 1.2vw; height: 2vw;">+</button>';
echo '                  <p id="quantity" style="width: 3vw; text-align: center; font-size: 2vw;">0</p>';
echo '                  <button id="restar" class="botonesCRUD" type=submit name="restar" style="width: 2vw; font-size: 1.2vw; height: 2vw;">-</button>';
echo '              </div>';
echo '              <button class="botonesCRUD" type=submit name="borrar" style="width: 4.7vw; font-size: 0.8vw; height: 2vw;">Borrar</button>';
echo '          </div>';
echo '    </div>';
echo '  </div>';
echo '</div>';

if (isset($_GET['idProducto'])) {

    if (isset($_COOKIE['idCarrito'])) {
        $datos = Carrito::getAllByID($base->link);
        if ($datos) {
            include "../view/mensaje.html";
        } else {
            echo "aqui1";
        }

    } else {

        $idCarrito = uniqid();
        setcookie('idCarrito', $idCarrito, time() + 3600);

    }

} else {

    if (isset($_COOKIE['idCarrito'])) {
        $datos = Carrito::getAllByID($base->link);
        if ($datos) {
            include "../view/mensaje.html";
        } else {
            echo "aqui2";
        }

    } else {
        include "../view/mensaje.html";
    }
}*/
echo "<script src='../js/verCarrito.js'></script>";
echo "</div>";

include "../view/footer.html";

?>