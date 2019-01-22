<?php

require_once("Conexion.php");
/*
require_once("Tbl_EstadoCivil.php");
require_once("Tbl_Genero.php");
require_once("Tbl_InfoPersonal.php");
require_once("Tbl_Medida.php");
*/



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
        '".$usuario->getPassUsuario()."','".$usuario->getfkTipoUsuario()."')";

        $this->c->conectar();
        $this->c->ejecutar($insert);
        $this->c->desconectar();

    }


    public function getUsuario($nombre,$pass) {
        $this->c->conectar();


        $query = "SELECT * from usuario where nombre_usuario_usuario = '$nombre' and contrasenia_usuario_usuario = '$pass' ";

        $rs = $this->c->ejecutar($query);


        if($obj = $rs->fetch_object()){#por cada vuelta, pongo el registro en un objeto y el objeto en una lista
            $u = new Tbl_Usuario();

            $u->setIdUsuario($obj->id_usuario_usuario);
            $u->setNombreUsuario($obj->nombre_usuario_usuario);
            $u->setfkTipoUsuario($obj->fk_tipo_usuario__usuario);
            $u->setPassUsuario($obj->contrasenia_usuario_usuario);
            //nombre debe ser igual a lo que muestro en la bd
        }
        $this->c->desconectar();
        return $u;
    }


    public function getUnidades(){

        $lista = array();
        $this->c->conectar();

        $select = "SELECT * from tbl_estado_unidad;";



        $rs = $this->c->ejecutar($select);
        while($obj = $rs->fetch_object()){

            $eu = new Tbl_EstadoUnidad();

            $eu->setIdEstadoUnidad($obj->id_estado_unidad);
            $eu->setNombreEstadoUnidad($obj->nombre_estado_unidad);


            array_push($lista,$eu);
        }

        $this->c->desconectar();
        return $lista;
    }

    public function getVehiculos(){

        $lista = array();
        $this->c->conectar();

        $select = "SELECT * from tbl_tipo_vehiculo;";



        $rs = $this->c->ejecutar($select);
        while($obj = $rs->fetch_object()){

            $eu = new Tbl_TipoVehiculo();

            $eu->setIdTipoVehiculo($obj->id_tipo_vehiculo);
            $eu->setNombreTipoVehiculo($obj->nombre_tipo_vehiculo);


            array_push($lista,$eu);
        }

        $this->c->desconectar();
        return $lista;
    }


    public function getEntidadPropietaria(){
        $lista = array();

        $this->c->conectar();

        $select = "SELECT * from tbl_entidadPropietaria;";

        $rs = $this->c->ejecutar($select);

        while($obj = $rs->fetch_object()){

            $eu = new Tbl_EntidadPropietaria();

            $eu->setIdEntidadPropietaria($obj->id_entidadPropietaria);
            $eu->setNombreEntidadPropietaria($obj->nombre_entidadPropietaria);


            array_push($lista,$eu);
        }

        $this->c->desconectar();
        return $lista;
    }


    public function getPerfiles(){

        $lista = array();
        $this->c->conectar();

        $select = "SELECT * from tbl_tipo_usuario;";

        $rs = $this->c->ejecutar($select);
        while($obj = $rs->fetch_object()){

            $tu = new Tbl_TipoUsuario();

            $tu->setidTipoUsuario($obj->id_tipo_usuario);
            $tu->setnombreTipoUsuario($obj->nombre_tipo_usuario);


            array_push($lista,$tu);
        }

        $this->c->desconectar();
        return $lista;
    }


    public function getTipoBombero(){

        $lista = array();
        $this->c->conectar();

        $select = "SELECT * from tbl_estado;";



        $rs = $this->c->ejecutar($select);
        while($obj = $rs->fetch_object()){

            $eu = new Tbl_Estado();

            $eu->setIdEstado($obj->id_estado);
            $eu->setNombreEstado($obj->nombre_estado);


            array_push($lista,$eu);
        }

        $this->c->desconectar();
        return $lista;
    }

    public function getCompanias(){

        $lista = array();
        $this->c->conectar();

        $select = "SELECT * from tbl_compania;";



        $rs = $this->c->ejecutar($select);
        while($obj = $rs->fetch_object()){

            $eu = new Tbl_Compania();

            $eu->setIdCompania($obj->id_compania);
            $eu->setNombreCompania($obj->nombre_compania);


            array_push($lista,$eu);
        }

        $this->c->desconectar();
        return $lista;
    }





// uso de cruds y algunso gets para los combobox
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
      $query="CALL CRUDInformacionLaboral (1, '".$infoLaboral->getnombreEmpresainformacionLaboral()."', '".$infoLaboral->getdireccionEmpresainformacionLaboral()."', '".$infoLaboral->gettelefonoEmpresainformacionLaboral()."',
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


    public function crearInformacionHistorica($infoHistorica){
      $query="CALL CRUDInformacionHistorica (1, ".$infoHistorica->getfkRegioninformacionHistorica().", '".$infoHistorica->getcuerpo()."', ".$infoHistorica->getcompania().",
       '".$infoHistorica->getfechaDeCambio()."', '".$infoHistorica->gettipoDeCambio()."', '".$infoHistorica->getmotivo()."', '".$infoHistorica->getdetalle()."', ".$infoHistorica->getfkInfoPersonalinformacionHistorica().", 1);";

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


    public function readCompanias (){
      $this->c->conectar();
      $query="SELECT * FROM tbl_compania;";
      $rs = $this->c->ejecutar($query);
      $listado = array();
      while($reg = $rs->fetch_array()){
            $id=$reg[0];
           $nombre=$reg[1];
           $objeto = new Tbl_Compania();
           $objeto->setIdCompania($id);
           $objeto->setNombreCompania($nombre);
           $listado[]=$objeto;
       }
       $this->c->desconectar();
       return $listado;
    }

    public function readCargos (){
      $this->c->conectar();
      $query="SELECT * FROM tbl_cargo;";
      $rs = $this->c->ejecutar($query);
      $listado = array();
      while($reg = $rs->fetch_array()){
          $id=$reg[0];
           $nombre=$reg[1];
           $cargo= new Tbl_Cargo();
           $cargo->setIdCargo($id);
           $cargo->setNombreCargo($nombre);
           $listado[]=$cargo;
       }
       $this->c->desconectar();
       return $listado;
    }

    public function readEstadosDeBomberos (){
      $this->c->conectar();
      $query="SELECT * FROM tbl_estadoBombero;";
      $rs = $this->c->ejecutar($query);
      $listado = array();
      while($reg = $rs->fetch_array()){
           $id=$reg[0];
           $nombre=$reg[1];
           $obj = new Tbl_EstadoBombero();
           $obj->setIdEstado($id);
           $obj->setNombreEstado($nombre);
           $listado[]=$obj;
       }
       $this->c->desconectar();
       return $listado;
    }

    public function readRegiones (){
      $this->c->conectar();
      $query="SELECT * FROM tbl_region;";
      $rs = $this->c->ejecutar($query);
      $listado = array();
      while($reg = $rs->fetch_array()){
           $id=$reg[0];
           $nombre=$reg[1];
           $obj = new Tbl_Region();
           $obj->setIdRegion($id);
           $obj->setNombreRegion($nombre);
           $listado[]=$obj;
       }
       $this->c->desconectar();
       return $listado;
    }

    public function readGruposSanguineos (){
      $this->c->conectar();
      $query="SELECT * FROM tbl_grupo_sanguineo;";
      $rs = $this->c->ejecutar($query);
      $listado = array();
      while($reg = $rs->fetch_array()){
           $id=$reg[0];
           $nombre=$reg[1];
           $obj = new Tbl_GrupoSanguineo();
           $obj->setIdGrupoSanguineo($id);
           $obj->setNombreGrupoSanguineo($nombre);
           $listado[]=$obj;
       }
       $this->c->desconectar();
       return $listado;
    }

    public function readParentescos (){
      $this->c->conectar();
      $query="SELECT * FROM tbl_parentesco;";
      $rs = $this->c->ejecutar($query);
      $listado = array();
      while($reg = $rs->fetch_array()){
           $id=$reg[0];
           $nombre=$reg[1];
           $obj = new Tbl_Parentesco();
           $obj->setIdParentesco($id);
           $obj->setNombreParentesco($nombre);
           $listado[]=$obj;
       }
       $this->c->desconectar();
       return $listado;
    }

    public function readEstadosCurso (){
      $this->c->conectar();
      $query="SELECT * FROM tbl_estado_curso;";
      $rs = $this->c->ejecutar($query);
      $listado = array();
      while($reg = $rs->fetch_array()){
           $id=$reg[0];
           $nombre=$reg[1];
           $obj = new Tbl_EstadoCurso();
           $obj->setIdEstadoCurso($id);
           $obj->setNombreEstadoCurso($nombre);
           $listado[]=$obj;
       }
       $this->c->desconectar();
       return $listado;
    }





    public function getIdBomberoMasReciente (){
      $this->c->conectar();
      $query="SELECT MAX(id_informacionPersonal ) FROM tbl_informacionPersonal;";
      $rs = $this->c->ejecutar($query);

      while($reg = $rs->fetch_array()){
           $id=$reg[0];
       }

       $this->c->desconectar();
       return $id;
    }




    //header("location: ../Mantenedor.php");

}


 ?>
