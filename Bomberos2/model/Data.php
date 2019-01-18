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

      $query="CALL CRUDInformacionPersonal (1,'".$infoPersonalBombero->getRutInformacionPersonal()."','".$infoPersonalBombero->getNombreInformacionPersonal()."', '".$infoPersonalBombero->getApellidoPaterno()."', '".$infoPersonalBombero->getApellidoMaterno()."','".$infoPersonalBombero->getFechaNacimiento()."',".$infoPersonalBombero->getFkEstadoCivil()."
      ,".$infoPersonalBombero->getFkMedidaInformacionPersonal().",'".$infoPersonalBombero->getAlturaEnMetros()."','".$infoPersonalBombero->getPeso()."','".$infoPersonalBombero->getEmail()."',
      ".$infoPersonalBombero->getFkGenero().",'".$infoPersonalBombero->getTelefonoFijo()."','".$infoPersonalBombero->getTelefonoMovil()."','".$infoPersonalBombero->getDireccionPersonal()."','".$infoPersonalBombero->getPertenecioABrigadaJuvenil()."', '".$infoPersonalBombero->getEsInstructor()."',1);";

      $this->c->conectar();
      $this->c->ejecutar($query);
      $this->c->desconectar();
    }



    public function readEstadosCiviles (){
      $this->c->conectar();

      $query="SELECT * FROM tbl_estado_civil;";
      $rs = $this->c->ejecutar($query);

      $listadoEstadosCiviles = array();

      while($reg = $rs->fetch_array()){

           $id=$reg[0];
           $nombre=$reg[1];
           $estadoCivil = new Tbl_EstadoCivil();
           $estadoCivil->setIdEstadoCivil($id);
           $estadoCivil->setNombreEstadoCivil($nombre);
           $listadoEstadosCiviles[]=$estadoCivil;
       }

       $this->c->desconectar();
       return $listadoEstadosCiviles;

    }

    public function readGeneros (){
      $this->c->conectar();

      $query="SELECT * FROM tbl_genero;";
      $rs = $this->c->ejecutar($query);

      $listadoGeneros = array();

      while($reg = $rs->fetch_array()){

           $id=$reg[0];
           $nombre=$reg[1];
           $genero = new Tbl_Genero();
           $genero->setIdGenero($id);
           $genero->setNombreGenero($nombre);
           $listadoGeneros[]=$genero;
       }

       $this->c->desconectar();
       return $listadoGeneros;

    }





    //header("location: ../Mantenedor.php");

}


 ?>
