<?php

class Carrito {

    private $idCarrito;
    private $dniCliente;
    private $idProducto;
    private $cantidad;

    function __construct($idCarrito, $dniCliente = '', $idProducto = '', $cantidad = '') {
        $this->idCarrito = $idCarrito;
        $this->dniCliente = $dniCliente;
        $this->idProducto = $idProducto;
        $this->cantidad = $cantidad;
    }

    static function getAll($link) {
        try {
            $result = $link->prepare("SELECT * from carrito");
            $result->execute();
            return $result;
        } catch(PDOException $e){
            $dato = "¡Error!: " . $e->getMessage() . "<br/>";
            //require "../views/mensaje.php";
            die();
         }
    }

    function __get($property){
        if(property_exists($this, $property)) {
            return $this->$property;
        }
    }

    function __set($property, $value){
        if(property_exists($this, $property)) {
            $this->$property = $value;
        }
    }

}

?>