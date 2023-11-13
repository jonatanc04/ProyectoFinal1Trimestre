<?php

class Cliente {

    private $dniCliente;
    private $nombre;
    private $direccion;
    private $email;
    private $pwd;
    private $administrador;

    function __construct($dniCliente, $nombre='', $direccion='', $email='', $pwd='', $administrador='') {

        $this->dniCliente = $dniCliente;
        $this->nombre = $nombre;
        $this->direccion = $direccion;
        $this->email = $email;
        $this->pwd = $pwd;
        $this->administrador = false;

    }

    function __get($property){
        if(property_exists($this, $property)) {
            return $this->$property;
        }
    }

    function validar($link){
        try{
            $consulta = $link->prepare("SELECT * FROM clientes WHERE dniCliente = :dniCliente AND pwd = :pwd");
            $consulta->bindParam(':dniCliente', $this->dniCliente);
            $consulta->bindParam(':pwd', $this->pwd);
            $consulta->execute();
            
            $cliente = $consulta->fetch(PDO::FETCH_ASSOC);
            
            if ($cliente !== false) {
                return $cliente;
            } else {
                return null;
            }
        } catch(PDOException $e){
            $dato = "¡Error!: " . $e->getMessage() . "<br/>";
            require "../views/mensaje.php";
            die();
        }
    }
    

    function registro($link) {
        try {
            $consulta = $link->prepare("INSERT INTO clientes (dniCliente, nombre, direccion, email, pwd) VALUES (:dniCliente, :nombre, :direccion, :email, :pwd)");
            $consulta->bindParam(':dniCliente', $this->dniCliente);
            $consulta->bindParam(':nombre', $this->nombre);
            $consulta->bindParam(':direccion', $this->direccion);
            $consulta->bindParam(':email', $this->email);
            $consulta->bindParam(':pwd', $this->pwd);
            return $consulta->execute();
        } catch (PDOException $e) {
            $dato = "¡Error!: " . $e->getMessage() . "<br/>";
            require "../views/mensaje.php";
            die();
        }
    }
    
}

?>