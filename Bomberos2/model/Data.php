<?php

require_once("Conexion.php");
require_once("Tbl_Usuario.php");

class Data{
    private $c;

    public function __construct(){
        $this->c = new Conexion(
            "bomberosBD",
            "root",
            "");

    }


    public function crearUsuario($usuario){
        $insert = "insert into tbl_usuario
        values(null, '".$usuario->getNombreUsuario()."',
        '".$usuario->getPassUsuario()."')";

        $this->c->conectar();
        $this->c->ejecutar($insert);
        $this->c->desconectar();

    }
    header("location: ../Mantenedor.php");

}


 ?>
