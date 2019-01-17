<?php

require_once("Conexion.php");
require_once("Tbl_Usuario.php");
require_once("Tbl_InfoPersonal.php");
require_once("Tbl_Medida.php");
require_once("Tbl_EstadoCivil.php");
require_once("Tbl_Genero.php");

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


    public function crearMedida ($medida){
      $query="CALL CRUDMedida (".$medida->getIdMedida().", '".$medida->getTallaChaquetaCamisa()."', '".$medida->getTallaPantalon()."',
    '".$medida->getTallaBuzo()."', '".$medida->getTallaCalzado()."', 1);";

      $this->c->conectar();
      $this->c->ejecutar($query);
      $this->c->desconectar();
    }


    public function crearInformacionPersonalDeBombero ($infoPersonalBombero){
      $query="CALL CRUDInformacionPersonal (".$infoPersonalBombero->getIdInfoPersonal().",'".$infoPersonalBombero->getRutInformacionPersonal()."',  '".$infoPersonalBombero->getNombreInformacionPersonal()."',
    '".$infoPersonalBombero->getApellidoPaterno()."', '".$infoPersonalBombero->getApellidoMaterno()."', '".$infoPersonalBombero->getFechaNacimiento()."',
    ".$infoPersonalBombero->getFkEstadoCivil().", ".$infoPersonalBombero->getFkMedidaInformacionPersonal().", '".$infoPersonalBombero->getAlturaEnMetros()."', '".$infoPersonalBombero->getPeso()."',
    '".$infoPersonalBombero->getEmail()."', ".$infoPersonalBombero->getFkGenero().", '".$infoPersonalBombero->getTelefonoFijo()."', '".$infoPersonalBombero->getTelefonoMovil."',
    '".$infoPersonalBombero->getDireccionPersonal()."', '".$infoPersonalBombero->getPertenecioABrigadaJuvenil()."', '".$infoPersonalBombero->getEsInstructor()."', 1);";

      $this->c->conectar();
      $this->c->ejecutar($query);
      $this->c->desconectar();
    }



    //header("location: ../Mantenedor.php");

}


 ?>
