<?php

class Pedidos
{
    private $idPedido;
    private $fecha;
    private $dirEntrega;
    private $nTarjeta;
    private $fechaCaducidad;
    private $matriculaRepartidor;
    private $dniCliente;

    function __construct($idPedido = '', $fecha = '', $dirEntrega = '', $nTarjeta = '', $fechaCaducidad = '', $matriculaRepartidor = '', $dniCliente = '') {
        $this->idPedido = $idPedido;
        $this->fecha = $fecha;
        $this->dirEntrega = $dirEntrega;
        $this->nTarjeta = $nTarjeta;
        $this->fechaCaducidad = $fechaCaducidad;
        $this->matriculaRepartidor = $matriculaRepartidor;
        $this->dniCliente = $dniCliente;
    }
    
    function newIdPedido($link) {
        try {
            $consulta = $link->prepare("SELECT MAX(idPedido) as maxIdPedido FROM pedidos");
            $consulta->execute();
            $resultado = $consulta->fetch(PDO::FETCH_ASSOC);
            return isset($resultado['maxIdPedido']) ? (int)$resultado['maxIdPedido'] : 0;
        } catch (PDOException $e) {
            $dato = "¡Error!: " . $e->getMessage() . "<br/>";
            require "../views/mensaje.php";
            die();
        }
    }

    function añadirPedido($link) {
        try {
            $consulta = $link->prepare("INSERT INTO pedidos (idPedido, fecha, dniCliente, direccion) VALUES (:idPedido, :fecha, :dniCliente, :direccion)");
            $consulta->bindParam(':idPedido', $this->idPedido, PDO::PARAM_INT);
            $consulta->bindParam(':fecha', $this->fecha, PDO::PARAM_STR);
            $consulta->bindParam(':dniCliente', $this->dniCliente, PDO::PARAM_STR);
            $consulta->bindParam(':direccion', $this->direccion, PDO::PARAM_STR);
            $consulta->execute();
            return true;
        } catch (PDOException $e) {
            $dato = "¡Error!: " . $e->getMessage() . "<br/>";
            return false;
        }
    }

}

?>