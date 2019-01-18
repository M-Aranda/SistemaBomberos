<?php

require_once("Conexion.php");
require_once("Tbl_Usuario.php");
require_once("Tbl_InfoPersonal.php");
require_once("Tbl_Medida.php");
require_once("Tbl_EstadoCivil.php");
require_once("Tbl_Genero.php");



require_once("../model/Tbl_Region.php");
require_once("../model/Tbl_Compañia.php");
require_once("../model/Tbl_EstadoBombero.php");
require_once("../model/Tbl_Cargo.php");
require_once("Tbl_comuna.php");
require_once("Tbl_EntrenamientoEstandar.php");
require_once("Tbl_EstadoCurso.php");
require_once("Tbl_GrupoSanguineo.php");
require_once("Tbl_InfoAcademica.php");
require_once(".Tbl_InfoBomberil.php");
require_once("Tbl_InfoFamiliar.php");
require_once("Tbl_InfoHistorica.php");
require_once("Tbl_InfoLaboral.php");
require_once("Tbl_InfoMedica1.php");
require_once("Tbl_InfoMedica2.php");
require_once("model/Parentesco.php");
require_once("model/Provincia.php");


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


    public function crearInformacionBomberil($infoBomberil){
      $query="CALL CRUDFichaInformacionBomberil (1,".$infoBomberil->getfkRegioninformacionBomberil().", '".$infoBomberil->getcuerpoInformacionBomberil()."', ".$infoBomberil->getfkCompaniainformacionBomberil().",
       ".$infoBomberil->getfkCargoinformacionBomberil().",'".$infoBomberil->getfechaIngresoinformacionBomberil()."', '".$infoBomberil->getNRegGeneralinformacionBomberil()."', ".$infoBomberil->getfkEstadoinformacionBomberil().",
      '".$infoBomberil->getNRegCiainformacionBomberil()."', ".$infoBomberil->getfkInfoPersonalinformacionBomberil().", 1);";

      $this->c->conectar();
      $this->c->ejecutar($query);
      $this->c->desconectar();
    }


    public function crearInformacionLaboral($infoLaboral){
      $query="CALL CRUDFichaInformacionBomberil (1, '".$infoLaboral->getnombreEmpresainformacionLaboral()."', '".$infoLaboral->getdireccionEmpresainformacionLaboral()."', '".$infoLaboral->gettelefonoEmpresainformacionLaboral()."',
       '".$infoLaboral->getcargoEmpresainformacionLaboral()."','".$infoLaboral->getfechaIngresoEmpresainformacionLaboral()."', '".$infoLaboral->getareaDeptoEmpresainformacionLaboral()."', '".$infoLaboral->getafp_informacionLaboral()."',
      '".$infoLaboral->getprofesion_informacionLaboral()."', ".$infoLaboral->getfkInfoPersonalinformacionLaboral().", 1);";

      $this->c->conectar();
      $this->c->ejecutar($query);
      $this->c->desconectar();
    }


    public function crearInformacionMedica1($infoMedica1){
      $query="CALL CRUDInformacionMedica1 (1, '".$infoMedica1->getprestacionMedica_informacionMedica1()."', '".$infoMedica1->getalergias_informacionMedica1()."', '".$infoMedica1->getenfermedadesCronicasinformacionMedica1()."',
       ".$infoMedica1->getfkInfoPersonalinformacionMedica1().", 1);";

      $this->c->conectar();
      $this->c->ejecutar($query);
      $this->c->desconectar();
    }


    public function crearInformacionMedica2($infoMedica2){
      $query="CALL CRUDInformacionMedica2 (1, '".$infoMedica2->getmedicamentosHabitualesinformacionMedica2()."', '".$infoMedica2->getnombreContactoinformacionMedica2()."', '".$infoMedica2->gettelefonoContactoinformacionMedica2()."',
       ".$infoMedica2->getfkParentescoContactoinformacionMedica2().", '".$infoMedica2->getnivelActividadFisicainformacionMedica2()."', '".$infoMedica2->getesDonanteinformacionMedica2()."', '".$infoMedica2->getesFumadorinformacionMedica2()."',
       ".$infoMedica2->getfkGrupoSanguineoinformacionMedica2().", ".$infoMedica2->getfkInfoPersonalinformacionMedica2().", 1);";

      $this->c->conectar();
      $this->c->ejecutar($query);
      $this->c->desconectar();
    }


    public function crearInformacionFamiliar($infoFamiliar){
      $query="CALL CRUDInformacionFamiliar (1, '".$infoFamiliar->getNombresInformacionFamiliar()."', '".$infoFamiliar->getFechaNacimientoInformacionFamiliar()."', '".$infoFamiliar->getfkParentescoinformacionFamiliar()."',
       ".$infoFamiliar->getfkInfoPersonalinformacionFamiliar().",  1);";

      $this->c->conectar();
      $this->c->ejecutar($query);
      $this->c->desconectar();
    }


    public function crearInformacionAcademica($infoAcademica){
      $query="CALL CRUDInformacionAcademica (1, '".$infoAcademica->getfechaInformacionAcademica()."', '".$infoAcademica->getactividadInformacionAcademica()."', ".$infoAcademica->getfkEstadoCursoInformacionAcademica().",
       ".$infoAcademica->getfkInformacionPersonalInformacionAcademica().", 1);";

      $this->c->conectar();
      $this->c->ejecutar($query);
      $this->c->desconectar();
    }



    public function crearInformacionEntrenamientoEstandar($infoEntrenamientoEstandar){
      $query="CALL CRUDInformacionEntrenamientoEstandar (1, '".$infoEntrenamientoEstandar->getfechaEntrenamientoEstandar()."', '".$infoEntrenamientoEstandar->getactividad()."', ".$infoEntrenamientoEstandar->getFkEstadoCurso().",
       ".$infoEntrenamientoEstandar->getFkInformacionPersonal().", 1);";

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
