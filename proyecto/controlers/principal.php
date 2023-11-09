<?php

include "../view/header.php";

echo "<div id='body' class='row'>";
echo "<div class='productosCont'>";
                    
    $url = "http://localhost/proyecto/sProductos/obtenerProductos.php";
    $context = stream_context_create(array(
        'http' => array(
            'method' => 'GET',
            'header' => "User-Agent: PHP\r\n",
            'ignore_errors' => true,
        )
    ));
    
    $dato = file_get_contents($url, false, $context);
    $dato = json_decode($dato, true);
        
    foreach ($dato as $fila) {
        echo "<a href='detalle.php?idProducto=" . $fila['idProducto'] . "' class='goProduct' href='details.html'>";
        echo "<div class='prod'>";
        echo "<img class='prodView' src='../view/img/" . $fila['foto'] . "'>";
        echo "<p class='prodName'>" . $fila['nombre'] . "</p>";
        echo "</div>";
        echo "</a>";
    }
                
echo "</div>";
echo "</div>";

include "../view/footer.html";

?>