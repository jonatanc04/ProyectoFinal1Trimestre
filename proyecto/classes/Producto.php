<?php

class Producto {

    private $idProducto;
    private $nombre;
    private $origen;
    private $foto;
    private $marca;
    private $categoria;
    private $peso;
    private $unidades;
    private $volumen;
    private $precio;

    function __construct($idProducto, $nombre = '', $origen = '', $foto = '', $marca = '', $categoria = '', $peso = '', $unidades = '', $volumen = '', $precio = '') {
        $this->idProducto = $idProducto;
        $this->nombre = $nombre;
        $this->origen = $origen;
        $this->foto = $foto;
        $this->marca = $marca;
        $this->categoria = $categoria;
        $this->peso = $peso;
        $this->unidades = $unidades;
        $this->volumen = $volumen;
        $this->precio = $precio;
    }

    function buscar($link){
        try{
            $consulta = $link->prepare("SELECT * FROM productos where idProducto=:idProducto");
            $consulta->bindParam(':idProducto', $this->idProducto);
            $consulta->execute();
            return $consulta->fetch(PDO::FETCH_ASSOC);
        }
        catch(PDOException $e){
            $dato= "¡Error!: " . $e->getMessage() . "<br/>";
            require "../views/mensaje.php";
            die();
        }
    }
    
    
    static function getAll($link) {
        try {
            $result = $link->prepare("SELECT * from productos");
            $result->execute();
            return $result->fetchAll(PDO::FETCH_ASSOC);
        } catch(PDOException $e){
            $dato = "¡Error!: " . $e->getMessage() . "<br/>";
            require "../views/mensaje.php";
            die();
        }
    }
    

}

?>