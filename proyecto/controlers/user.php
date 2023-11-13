<?php
include "../view/header.php";

echo "<div id='body' class='row'>";
echo "<div id='infoContent' class='row'>";
echo "<div id='infoUser' class='col-6'>";
echo "<p class='colorText'>Nombre: " . $_COOKIE['nombre'] . "</p>";
echo "<p class='colorText'>DNI del Cliente: " . $_GET['dniCliente'] . "</p>";
echo "</div>";
echo "<div id='logoutCont' class='col-6'>";
echo "<button id='cerrarSesion'>Cerrar Sesión</button>";
echo "</div>";
echo "</div>";
echo "</div>";

include "../view/footer.html";
?>

<script>
document.getElementById('cerrarSesion').addEventListener('click', function() {

  document.cookie = 'nombre=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;';
  document.cookie = 'dniCliente=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;';

  window.location.href = '../index.php';
});
</script>
