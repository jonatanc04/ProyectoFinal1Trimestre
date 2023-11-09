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

    static function getAll($link) {
        try {
            $result = $link->prepare("SELECT * from carrito");
            $result->execute();
            return $result->fetchAll(PDO::FETCH_ASSOC);
        } catch(PDOException $e){
            $dato = "¡Error!: " . $e->getMessage() . "<br/>";
            require "../views/mensaje.php";
            die();
        }
    }

    static function getAllByID($link, $idCarrito) {
        try { 
            $result = $link->prepare("SELECT carrito.*, productos.* FROM carrito INNER JOIN productos ON carrito.idProducto = productos.idProducto WHERE carrito.idCarrito = :idCarrito");
            $result->bindParam(':idCarrito', $idCarrito, PDO::PARAM_STR);
            $result->execute();
            $data = $result->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        } catch (PDOException $e) {
            return false;
        }
    }

    function buscar($link){
        try {
            $query = "SELECT * FROM carrito WHERE idCarrito = :idCarrito AND cantidad = :idProducto";
            $result = $link->prepare($query);
            $result->bindParam(':idCarrito', $this->idCarrito, PDO::PARAM_STR);
            $result->bindParam(':idProducto', $this->idProducto, PDO::PARAM_INT);
            $result->execute();
            return $result;
        } catch(PDOException $e){
            $dato = "¡Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    function insertarProducto($link) {
        try {
            $query = "INSERT INTO carrito (idCarrito, dniCliente, idProducto, cantidad) VALUES (:idCarrito, :dniCliente, :idProducto, :cantidad)";
            $result = $link->prepare($query);
            $result->bindParam(':idCarrito', $this->idCarrito, PDO::PARAM_STR);
            $result->bindParam(':dniCliente', $this->dniCliente, PDO::PARAM_STR);
            $result->bindParam(':idProducto', $this->idProducto, PDO::PARAM_INT);
            $result->bindParam(':cantidad', $this->cantidad, PDO::PARAM_INT);
            $result->execute();
            return true;
        } catch (PDOException $e) {
            echo "¡Error!: " . $e->getMessage() . "<br/>";
            return false;
        }
    }

    function borrarProducto($link) {
        try {
            $query = "DELETE FROM carrito WHERE idCarrito = :idCarrito AND idProducto = :idProducto";
            $result = $link->prepare($query);
            $result->bindParam(':idCarrito', $this->idCarrito, PDO::PARAM_STR);
            $result->bindParam(':idProducto', $this->idProducto, PDO::PARAM_INT);
            $result->execute();
            return true;
        } catch (PDOException $e) {
            echo "¡Error!: " . $e->getMessage() . "<br/>";
            return false;
        }
    }

    function updateDni($link) {
        try {
            $query = "UPDATE dniCliente SET dniCliente = :dniCliente WHERE idCarrito = :idCarrito";
            $result = $link->prepare($query);
            $result->bindParam(':dniCliente', $this->dniCliente, PDO::PARAM_STR);
            $result->bindParam(':idCarrito', $this->idCarrito, PDO::PARAM_STR);
            $result->execute();
            return true;
        } catch (PDOException $e) {
            echo "¡Error!: " . $e->getMessage() . "<br/>";
            return false;
        }
    }
    
    function updateCantidad($link) {
        try {
            $query = "UPDATE carrito SET cantidad = :cantidad WHERE idCarrito = :idCarrito AND idProducto = :idProducto";
            $result = $link->prepare($query);
            $result->bindParam(':cantidad', $this->cantidad, PDO::PARAM_INT);
            $result->bindParam(':idCarrito', $this->idCarrito, PDO::PARAM_STR);
            $result->bindParam(':idProducto', $this->idProducto, PDO::PARAM_INT);
            $result->execute();
            return true;
        } catch (PDOException $e) {
            echo "¡Error!: " . $e->getMessage() . "<br/>";
            return false;
        }
    }
    
}

?>