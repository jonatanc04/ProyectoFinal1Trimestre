<?php
echo "<div id='body' class='row'>";

echo "<div id='tableContainer'>";
echo '<form method="post" action="">';

echo '<table border="1">';
echo '<thead>';
echo '<tr>';
echo '<th>Nombre del Producto</th>';
echo '<th>Cantidad</th>';
echo '<th>Precio Ud.</th>';
echo '</tr>';
echo '</thead>';
echo '<tbody>';

foreach ($carrito as $fila) {
    echo '<tr>';
    echo '<td>' . $fila["nombre"] . '</td>';
    echo '<td class="total">x' . $fila["cantidad"] . '</td>';
    echo '<td class="pre">' . $fila["precio"] . '€</td>';
    echo '</tr>';
    $precioTotal += $fila["precio"] * $fila["cantidad"];
}

echo '</tbody>';
echo '<tfoot>';
echo '<tr>';
echo '<td colspan="2" class="total">Total:</td>';
echo '<td class="pre">' . $precioTotal . '€</td>';
echo '</tr>';
echo '</tfoot>';
echo '</table>';

echo '<button class="confcom" type="submit" name="confirmar">Confirmar compra</button>';

echo '</form>';
echo "</div>";
echo "</div>";