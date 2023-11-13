<?php

class LineasPedidos {

    private $idPedido;
    private $nLinea;
    private $idProducto;
    private $cantidad;

    function __construct($idPedido, $nLinea, $idProducto, $cantidad) {
        $this->idPedido = $idPedido;
        $this->nLinea = $nLinea;
        $this->idProducto = $idProducto;
        $this->cantidad = $cantidad;
    }

    function anyadirLineas($link) {
        try {
            $query = $link->prepare("INSERT INTO lineaspedidos (idPedido, nLinea, idProducto, cantidad) VALUES (:idPedido, :nLinea, :idProducto, :cantidad)");
            $query->bindParam(':idPedido', $this->idPedido, PDO::PARAM_INT);
            $query->bindParam(':nLinea', $this->nLinea, PDO::PARAM_INT);
            $query->bindParam(':idProducto', $this->idProducto, PDO::PARAM_INT);
            $query->bindParam(':cantidad', $this->cantidad, PDO::PARAM_INT);
            $query->execute();
            return true;
        } catch (PDOException $e) {
            $dato = "¡Error!: " . $e->getMessage() . "<br/>";
            return false;
        }
    }

}