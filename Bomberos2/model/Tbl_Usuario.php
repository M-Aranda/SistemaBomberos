<?php
Class Tbl_Usuario{
    private $idUsuario;
    private $nombreUsuario;
    private $passUsuario;

    public function __construct(){

    }

    public function getIdUsuario(){
        return $this->idUsuario;
    }

    public function setIdUsuario($idUsuario){
        $this->idUsuario = $idUsuario;
    }

    public function getNombreUsuario(){
        return $this->nombreUsuario;
    }

    public function setNombreUsuario($nombreUsuario){
        $this->nombreUsuario = $nombreUsuario;
    }

    public function getPassUsuario(){
        return $this->passUsuario;
    }

    public function setPassUsuario($passUsuario){
        $this->passUsuario = $passUsuario;
    }

}
?>
