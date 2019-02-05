<?php

require_once("Conexion.php");
require_once("Tbl_Usuario.php");
require_once("Tbl_EstadoUnidad.php");
require_once("Tbl_UnidadMedida.php");
require_once("Tbl_TipoBodega.php");
require_once("Tbl_UbicacionFisica.php");
require_once("Tbl_MaterialMenor.php");
require_once("Tbl_TipoVehiculo.php");
require_once("Tbl_TipoUsuario.php");
require_once("Tbl_EntidadACargo.php");
require_once("Tbl_Estado.php");
require_once("Tbl_EstadoBombero.php");
require_once("Tbl_Genero.php");
require_once("Tbl_EstadoCivil.php");
require_once("Tbl_tipoMantencion.php");
require_once("Tbl_tipoCombustible.php");
require_once("Tbl_Unidad.php");
require_once("Tbl_tipo_servicio.php");
require_once("Tbl_InfoPersonal.php");
require_once("Vista_BusquedaBombero.php");
require_once("Tbl_Medida.php");
require_once("Tbl_InfoBomberil.php");
require_once("Tbl_InfoLaboral.php");
require_once("Tbl_InfoMedica1.php");
require_once("Tbl_InfoMedica2.php");
require_once("Tbl_InfoFamiliar.php");
require_once("Tbl_InfoAcademica.php");
require_once("Tbl_EntrenamientoEstandar.php");
require_once("Tbl_InfoHistorica.php");
require_once("Tbl_Mantencion.php");
require_once("Tbl_carguiCombustible.php");
require_once("Tbl_MaterialMenor.php");
require_once("Vista_BuscarMaterialMenor.php");
require_once("VistaBusquedaDeUnidad.php");
require_once("Tbl_EstadoMaterialMenor.php");





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
        '".$usuario->getfkTipoUsuario()."',".$usuario->getPassUsuario().")";

        $this->c->conectar();
        $this->c->ejecutar($insert);
        $this->c->desconectar();

    }

    public function getUsuario($nombre,$pass) {
        $this->c->conectar();


        $query = "SELECT * from tbl_usuario where nombre_usuario_usuario = '$nombre' and contrasenia_usuario_usuario = '$pass' ";

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



    public function verificarSiUsuarioTienePermiso ($usuario, $idPermiso){
      $this->c->conectar();
      $query="SELECT tbl_tipo_usuario_permisos.otorgado_tipo_usuario_permisos FROM
      tbl_tipo_usuario_permisos, tbl_permiso, tbl_tipo_usuario, tbl_usuario  WHERE
      tbl_tipo_usuario_permisos.fk_tipo_usuario_tipo_usuario_permisos=tbl_tipo_usuario.id_tipo_usuario AND
      tbl_tipo_usuario_permisos.fk_permiso_tipo_usuario_permisos=tbl_permiso.id_permiso AND
      tbl_tipo_usuario.id_tipo_usuario=tbl_usuario.fk_tipo_usuario__usuario AND tbl_permiso.id_permiso=".$idPermiso." AND
       tbl_usuario.id_usuario_usuario=".$usuario->getIdUsuario().";";
      $rs = $this->c->ejecutar($query);
      while($reg = $rs->fetch_array()){
           $valor=$reg[0];
       }
       $this->c->desconectar();
       return $valor;
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



    public function getEntidadACargo(){
        $lista = array();
        $this->c->conectar();
        $select = "SELECT * from tbl_entidadACargo;";
        $rs = $this->c->ejecutar($select);
        while($obj = $rs->fetch_object()){
            $eu = new Tbl_EntidadACargo();
            $eu->setIdEntidadACargo($obj->id_entidadACargo);
            $eu->setNombreEntidadACargo($obj->nombre_entidadACargo);
            array_push($lista,$eu);
        }
        $this->c->desconectar();
        return $lista;
    }


    public function readSoloCompanias(){
        $lista = array();
        $this->c->conectar();
        $select = "SELECT * FROM tbl_entidadACargo WHERE nombre_entidadACargo LIKE '%Compa%';";
        $rs = $this->c->ejecutar($select);

        while($obj = $rs->fetch_object()){
            $eu = new Tbl_EntidadACargo();
            $eu->setIdEntidadACargo($obj->id_entidadACargo);
            $eu->setNombreEntidadACargo($obj->nombre_entidadACargo);
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
      $query="CALL CRUDInformacionFamiliar (1, '".$infoFamiliar->getNombresInformacionFamiliar()."', '".$infoFamiliar->getFechaNacimientoInformacionFamiliar()."', ".$infoFamiliar->getfkParentescoinformacionFamiliar().",
       ".$infoFamiliar->getfkInfoPersonalinformacionFamiliar().",  1);";

       echo $query;

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
      $query="CALL CRUDInformacionHistorica (1, ".$infoHistorica->getfkRegioninformacionHistorica().", '".$infoHistorica->getcuerpo()."', '".$infoHistorica->getcompania()."',
       '".$infoHistorica->getfechaDeCambio()."', '".$infoHistorica->getPremio()."', '".$infoHistorica->getmotivo()."', '".$infoHistorica->getdetalle()."', '".$infoHistorica->getCargo()."'  , ".$infoHistorica->getfkInfoPersonalinformacionHistorica().", 1);";



      $this->c->conectar();
      $this->c->ejecutar($query);
      $this->c->desconectar();
    }

    public function crearUnidades($unidad){
      $query = "insert into tbl_unidad values(null,
                '".$unidad->getNombreUnidad()."',
                '".$unidad->getaniodeFabricacion()."',
                '".$unidad->getMarca()."',
                '".$unidad->getNmotor()."',
                '".$unidad->getNchasis()."',
                '".$unidad->getNVIN()."',
                '".$unidad->getColor()."',
                '".$unidad->getPPu()."',
                '".$unidad->getfechaInscripcion()."',
                '".$unidad->getfechaAdquisicion()."',
                ".$unidad->getcapacidadOcupantes().",
                ".$unidad->getfkEstadoUnidad().",
                ".$unidad->getfkTipoVehiculo().",
                ".$unidad->getfkEntidadPropietaria().");";

        $this->c->conectar();
        $this->c->ejecutar($query);
        $this->c->desconectar();
        echo "insertBD".$query;

    }



    public function crearMantencion($mantencion){
      $query= "insert into tbl_mantencion values(null,
                ".$mantencion->getFk_tipo_mantencion().",
                '".$mantencion->getFecha_mantencion()."',
                '".$mantencion->getResponsable_mantencion()."',
                '".$mantencion->getDireccion_mantencion()."',
                '".$mantencion->getComentarios_mantencion()."',
                ".$mantencion->getFk_unidad().");";

      $this->c->conectar();
      $this->c->ejecutar($query);
      $this->c->desconectar();
    }

    public function crearCargaDeCombustible($carga){
      $query= "insert into tbl_cargio_combustible values(null,
                '".$carga->getResponsable_cargio_combustible()."',
                '".$carga->getFecha_cargio()."',
                '".$carga->getDireccion_cargio()."',
                ".$carga->getFk_tipo_combustible_cargio_combustible().",
                ".$carga->getCantidad_litros_cargio_combustible().",
                ".$carga->getPrecio_litro_cargio_combustible().",
                '".$carga->getObservacion_cargio_combustible()."',
                ".$carga->getFk_unidad().");";

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



    public function readTiposDeMantencion (){
      $this->c->conectar();
      $query="SELECT * FROM tbl_tipoDeMantencion;";
      $rs = $this->c->ejecutar($query);
      $listado = array();
      while($reg = $rs->fetch_array()){
           $id=$reg[0];
           $nombre=$reg[1];
           $obj = new Tbl_tipoMantencion();
           $obj->setId_tipo_de_mantencion($id);
           $obj->setNombre_tipoDeMantencion($nombre);
           $listado[]=$obj;
       }
       $this->c->desconectar();
       return $listado;
    }


    public function readTiposDeCombustibles (){
      $this->c->conectar();
      $query="SELECT * FROM tbl_tipo_combustible;";
      $rs = $this->c->ejecutar($query);
      $listado = array();
      while($reg = $rs->fetch_array()){
           $id=$reg[0];
           $nombre=$reg[1];
           $obj = new Tbl_tipo_combustible();
           $obj->setId_tipo_combustible($id);
           $obj->setNombre_tipo_combustible($nombre);
           $listado[]=$obj;
       }
       $this->c->desconectar();
       return $listado;
    }


    public function readUnidadesVehiculos (){
      $this->c->conectar();
      $query="SELECT * FROM tbl_unidad;";
      $rs = $this->c->ejecutar($query);
      $listado = array();
      while($reg = $rs->fetch_array()){
           $id=$reg[0];
           $nombre=$reg[1];
           $aniodeFabricacion=$reg[2];
           $marca=$reg[3];
           $Nmotor=$reg[4];
           $Nchasis=$reg[5];
           $NVIN=$reg[6];
           $Color=$reg[7];
           $PPu=$reg[8];
           $fechaInscripcion=$reg[9];
           $fechaAdquisicion=$reg[10];
           $capacidadOcupantes=$reg[11];
           $fkEstadoUnidad=$reg[12];
           $fkTipoVehiculo=$reg[13];
           $fkEntidadPropietaria=$reg[14];

           $obj = new Tbl_Unidad();
           $obj->setIdUnidad($id);
           $obj->setNombreUnidad($nombre);
           $obj->setaniodeFabricacion($aniodeFabricacion);
           $obj->setMarca($marca);
           $obj->setNmotor($Nmotor);
           $obj->setNchasis($Nchasis);
           $obj->setNVIN($NVIN);
           $obj->setColor($Color);
           $obj->setPPu($PPu);
           $obj->setfechaInscripcion($fechaInscripcion);
           $obj->setfechaAdquisicion($fechaAdquisicion);
           $obj->setcapacidadOcupantes($capacidadOcupantes);
           $obj->setfkEstadoUnidad($fkEstadoUnidad);
           $obj->setfkTipoVehiculo($fkTipoVehiculo);
           $obj->setfkEntidadPropietaria($fkEntidadPropietaria);
           $listado[]=$obj;
       }
       $this->c->desconectar();
       return $listado;
    }



    public function getUnidadVehiculoPorId ($id){
      $this->c->conectar();
      $query="SELECT * FROM tbl_unidad WHERE id_unidad=".$id.";";
      $rs = $this->c->ejecutar($query);
      echo $query;

      while($reg = $rs->fetch_array()){
           $id=$reg[0];
           $nombre=$reg[1];
           $aniodeFabricacion=$reg[2];
           $marca=$reg[3];
           $Nmotor=$reg[4];
           $Nchasis=$reg[5];
           $NVIN=$reg[6];
           $Color=$reg[7];
           $PPu=$reg[8];
           $fechaInscripcion=$reg[9];
           $fechaAdquisicion=$reg[10];
           $capacidadOcupantes=$reg[11];
           $fkEstadoUnidad=$reg[12];
           $fkTipoVehiculo=$reg[13];
           $fkEntidadPropietaria=$reg[14];

           $obj = new Tbl_Unidad();
           $obj->setIdUnidad($id);
           $obj->setNombreUnidad($nombre);
           $obj->setaniodeFabricacion($aniodeFabricacion);
           $obj->setMarca($marca);
           $obj->setNmotor($Nmotor);
           $obj->setNchasis($Nchasis);
           $obj->setNVIN($NVIN);
           $obj->setColor($Color);
           $obj->setPPu($PPu);
           $obj->setfechaInscripcion($fechaInscripcion);
           $obj->setfechaAdquisicion($fechaAdquisicion);
           $obj->setcapacidadOcupantes($capacidadOcupantes);
           $obj->setfkEstadoUnidad($fkEstadoUnidad);
           $obj->setfkTipoVehiculo($fkTipoVehiculo);
           $obj->setfkEntidadPropietaria($fkEntidadPropietaria);

       }
       $this->c->desconectar();
       return $obj;
    }






    public function readTiposDeServicios (){
      $this->c->conectar();
      $query="SELECT * FROM tbl_tipo_servicio;";
      $rs = $this->c->ejecutar($query);
      $listado = array();
      while($reg = $rs->fetch_array()){
           $id=$reg[0];
           $nombre=$reg[1];
           $codigo=$reg[2];
           $obj = new Tbl_tipo_servicio();
           $obj->setId_tipo_servicio($id);
           $obj->setCodigo_tipo_servicio($nombre);
           $obj->setNombre_tipo_servicio($codigo);
           $listado[]=$obj;
       }
       $this->c->desconectar();
       return $listado;
    }



    public function readInformacionPersonalBomberos (){
      $this->c->conectar();
      $query="SELECT * FROM tbl_informacionPersonal;";
      $rs = $this->c->ejecutar($query);
      $listado = array();
      while($reg = $rs->fetch_array()){
          $idInformacionPersonal=$reg[0];
          $rutInformacionPersonal=$reg[1];
          $nombreInformacionPersonal=$reg[2];
          $apellidoPaterno=$reg[3];
          $apellidoMaterno=$reg[4];
          $fechaNacimiento=$reg[5];
          $fkEstadoCivil=$reg[6];
          $fkMedidaInformacionPersonal=$reg[7];
          $AlturaEnMetros=$reg[8];
          $Peso=$reg[9];
          $Email=$reg[10];
          $fkGenero=$reg[11];
          $TelefonoFijo=$reg[12];
          $TelefonoMovil=$reg[13];
          $DireccionPersonal=$reg[14];
          $PertenecioABrigadaJuvenil=$reg[15];
          $EsInstructor=$reg[16];

           $obj = new Tbl_InfoPersonal();
           $obj->setIdInfoPersonal($idInformacionPersonal);
           $obj->setRutInformacionPersonal($rutInformacionPersonal);
           $obj->setNombreInformacionPersonal($nombreInformacionPersonal);
           $obj->setApellidoPaterno($apellidoPaterno);
           $obj->setApellidoMaterno($apellidoMaterno);
           $obj->setFechaNacimiento($fechaNacimiento);
           $obj->setFkEstadoCivil($fkEstadoCivil);
           $obj->setFkMedidaInformacionPersonal($fkMedidaInformacionPersonal);
           $obj->setAlturaEnMetros($AlturaEnMetros);
           $obj->setPeso($Peso);
           $obj->setEmail($Email);
           $obj->setFkGenero($fkGenero);
           $obj->setTelefonoFijo($TelefonoFijo);
           $obj->setTelefonoMovil($TelefonoMovil);
           $obj->setDireccionPersonal($DireccionPersonal);
           $obj->setPertenecioABrigadaJuvenil($PertenecioABrigadaJuvenil);
           $obj->setEsInstructor($EsInstructor);

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


public function buscarInformacionDeBomberoParaTabla ($nombre, $id, $tipoDeBusqueda){
  $this->c->conectar();

  if($tipoDeBusqueda==1){
    $anexoAQuery="AND
    tbl_informacionPersonal.nombre_informacionPersonal LIKE '%".$nombre."%';";
  }else if($tipoDeBusqueda==2){
      $anexoAQuery="AND
      tbl_informacionBomberil.fk_estado_informacionBomberil =".$id." ;";
  }else if($tipoDeBusqueda==3){
        $anexoAQuery="AND
        tbl_entidadACargo.id_entidadACargo =".$id." ;";
    }


  $query="SELECT tbl_informacionPersonal.rut_informacionPersonal, tbl_informacionPersonal.nombre_informacionPersonal,
  tbl_informacionPersonal.apellido_paterno_informacionPersonal, tbl_entidadACargo.nombre_entidadACargo,
  tbl_informacionPersonal.id_informacionPersonal FROM tbl_informacionPersonal, tbl_informacionBomberil, tbl_entidadACargo
  WHERE tbl_informacionBomberil.fk_id_entidadACargo_informacionBomberil=tbl_entidadACargo.id_entidadACargo AND
  tbl_informacionPersonal.id_informacionPersonal=tbl_informacionBomberil.fk_informacion_personal__informacionBomberil ".$anexoAQuery;


  $rs = $this->c->ejecutar($query);
  $listado = array();

  while($reg = $rs->fetch_array()){
       $rut=$reg[0];
       $nombre=$reg[1];
       $apellidoPaterno=$reg[2];
       $compania=$reg[3];
       $id=$reg[4];
       $obj = new Vista_BusquedaBombero();
       $obj->setRut($rut);
       $obj->setNombre($nombre);
       $obj->setApellidoPaterno($apellidoPaterno);
       $obj->setCompania($compania);
       $obj->setIdInfoPersonal($id);
       $listado[]=$obj;
   }
   $this->c->desconectar();
   return $listado;
}




public function getInfoPersonal ($idABuscar){
$this->c->conectar();
$query="CALL CRUDInformacionPersonal (".$idABuscar.",'20898088-2','Marcelo', 'Aranda', 'Tatto','1991-12-16',1,1,'1,70','80,2','cheloz_20@hotmail.com',
1,'123123123123','958677107','Carretera El Cobre','No sabe', 'Creo que no', 2);";
$rs = $this->c->ejecutar($query);
while($reg = $rs->fetch_array()){

     $infoPersonal= new Tbl_InfoPersonal();
     $infoPersonal->setIdInfoPersonal($reg[0]);
     $infoPersonal->setRutInformacionPersonal($reg[1]);
     $infoPersonal->setNombreInformacionPersonal($reg[2]);
     $infoPersonal->setApellidoPaterno($reg[3]);
     $infoPersonal->setApellidoMaterno($reg[4]);
     $infoPersonal->setFechaNacimiento($reg[5]);
     $infoPersonal->setFkEstadoCivil($reg[6]);
     $infoPersonal->setFkMedidaInformacionPersonal($reg[7]);
     $infoPersonal->setAlturaEnMetros($reg[8]);
     $infoPersonal->setPeso($reg[9]);
     $infoPersonal->setEmail($reg[10]);
     $infoPersonal->setFkGenero($reg[11]);
     $infoPersonal->setTelefonoFijo($reg[12]);
     $infoPersonal->setTelefonoMovil($reg[13]);
     $infoPersonal->setDireccionPersonal($reg[14]);
     $infoPersonal->setPertenecioABrigadaJuvenil($reg[15]);
     $infoPersonal->setEsInstructor($reg[16]);

 }

 $this->c->desconectar();
 return $infoPersonal;
}


public function getInfoMedidas ($idABuscar){
$this->c->conectar();
$query="SELECT tbl_medida.id_medida, tbl_medida.talla_de_chaqueta_camisa_medida, tbl_medida.talla_de_pantalon_medida, tbl_medida.talla_de_buzo_medida, tbl_medida.talla_de_calzado_medida FROM tbl_medida, tbl_informacionPersonal WHERE tbl_informacionPersonal.fk_medida_informacionPersonal=tbl_medida.id_medida
AND tbl_informacionPersonal.id_informacionPersonal=".$idABuscar.";";
$rs = $this->c->ejecutar($query);
while($reg = $rs->fetch_array()){
     $info= new Tbl_Medida();
     $info->setIdMedida($reg[0]);
     $info->setTallaChaquetaCamisa($reg[1]);
     $info->setTallaPantalon($reg[2]);
     $info->setTallaBuzo($reg[3]);
     $info->setTallaCalzado($reg[4]);
 }
 $this->c->desconectar();
 return $info;
}

public function getInfoBomberil ($idABuscar){
$this->c->conectar();
$query="CALL CRUDFichaInformacionBomberil(1,1,'Machali',2,1,'2001-12-16',1,1,1,".$idABuscar.",2);";
$rs = $this->c->ejecutar($query);

while($reg = $rs->fetch_array()){
     $info= new Tbl_InfoBomberil();
     $info->setIdInformacionBomberil($reg[0]);
     $info->setfkRegioninformacionBomberil($reg[1]);
     $info->setcuerpoInformacionBomberil($reg[2]);
     $info->setfkCompaniainformacionBomberil($reg[3]);
     $info->setfkCargoinformacionBomberil($reg[4]);
     $info->setfechaIngresoinformacionBomberil($reg[5]);
     $info->setNRegGeneralinformacionBomberil($reg[6]);
     $info->setfkEstadoinformacionBomberil($reg[7]);
     $info->setNRegCiainformacionBomberil($reg[8]);
     $info->setfkInfoPersonalinformacionBomberil($reg[9]);
 }
 $this->c->desconectar();
 return $info;
}



public function getInfoLaboral ($idABuscar){
$this->c->conectar();
$query="CALL CRUDInformacionLaboral (1,'Acquiried','algun lado','598677','empleado','2018-08-12','ciencias','masvida','ingeniero', ".$idABuscar.", 2);";
$rs = $this->c->ejecutar($query);

while($reg = $rs->fetch_array()){
     $info= new Tbl_InfoLaboral();
     $info->setIdidInformacionLaboral($reg[0]);
     $info->setnombreEmpresainformacionLaboral($reg[1]);
     $info->setdireccionEmpresainformacionLaboral($reg[2]);
     $info->settelefonoEmpresainformacionLaboral($reg[3]);
     $info->setcargoEmpresainformacionLaboral($reg[4]);
     $info->setfechaIngresoEmpresainformacionLaboral($reg[5]);
     $info->setareaDeptoEmpresainformacionLaboral($reg[6]);
     $info->setafp_informacionLaboral($reg[7]);
     $info->setprofesion_informacionLaboral($reg[8]);
     $info->setfkInfoPersonalinformacionLaboral($reg[9]);
 }
 $this->c->desconectar();
 return $info;
}


public function getInfoMedica1 ($idABuscar){
$this->c->conectar();
$query="CALL CRUDInformacionMedica1 (1, 'alguna','ninguna', 'no hay', ".$idABuscar.",2);";
$rs = $this->c->ejecutar($query);

while($reg = $rs->fetch_array()){
     $info= new Tbl_InfoMedica1();
     $info->setidInformacionMedica1($reg[0]);
     $info->setprestacionMedica_informacionMedica1($reg[1]);
     $info->setalergias_informacionMedica1($reg[2]);
     $info->setenfermedadesCronicasinformacionMedica1($reg[3]);
     $info->setfkInfoPersonalinformacionMedica1($reg[4]);

 }
 $this->c->desconectar();
 return $info;
}

public function getInfoMedica2 ($idABuscar){
$this->c->conectar();
$query="CALL CRUDInformacionMedica2 (1,'Ninguno', 'Familiar', '96666',3, 'Sin especificar',0,0,1,".$idABuscar.",2);";
$rs = $this->c->ejecutar($query);


while($reg = $rs->fetch_array()){
     $info= new Tbl_InfoMedica2();
     $info->setidInformacionMedica2($reg[0]);
     $info->setmedicamentosHabitualesinformacionMedica2($reg[1]);
     $info->setnombreContactoinformacionMedica2($reg[2]);
     $info->settelefonoContactoinformacionMedica2($reg[3]);
     $info->setfkParentescoContactoinformacionMedica2($reg[4]);
     $info->setnivelActividadFisicainformacionMedica2($reg[5]);
     $info->setesDonanteinformacionMedica2($reg[6]);
     $info->setesFumadorinformacionMedica2($reg[7]);
     $info->setfkGrupoSanguineoinformacionMedica2($reg[8]);
     $info->setfkInfoPersonalinformacionMedica2($reg[9]);
 }
 $this->c->desconectar();
 return $info;
}




public function readInfoFamiliar ($idABuscar){
  $this->c->conectar();
  $query="CALL CRUDInformacionFamiliar (1,'Alguno', '1991-12-05',1,".$idABuscar.",2);";
  $rs = $this->c->ejecutar($query);
  $listado = array();
  while($reg = $rs->fetch_array()){

       $obj = new Tbl_InfoFamiliar();
       $obj->setIdInformacionFamiliar($reg[0]);
       $obj->setNombresInformacionFamiliar($reg[1]);
       $obj->setFechaNacimientoInformacionFamiliar($reg[2]);
       $obj->setfkParentescoinformacionFamiliar($reg[3]);
       $obj->setfkInfoPersonalinformacionFamiliar($reg[4]);

       $listado[]=$obj;
   }
   $this->c->desconectar();
   return $listado;
}


public function buscarNombreParentescoPorId ($idABuscar){
$this->c->conectar();
$query="SELECT nombre_parentesco FROM tbl_parentesco WHERE id_parentesco=".$idABuscar.";";
$rs = $this->c->ejecutar($query);
while($reg = $rs->fetch_array()){
     $info= new Tbl_Parentesco();
     $info->setNombreParentesco($reg[0]);

 }
 $this->c->desconectar();
 return $info;
}


public function readInfoAcademica ($idABuscar){
  $this->c->conectar();
  $query="CALL CRUDInformacionAcademica (1,'2019-05-06','Curso',1,".$idABuscar.",2);";
  $rs = $this->c->ejecutar($query);
  $listado = array();
  while($reg = $rs->fetch_array()){

       $obj = new Tbl_InfoAcademica();
       $obj->setIdidInformacionAcademica($reg[0]);
       $obj->setfechaInformacionAcademica($reg[1]);
       $obj->setactividadInformacionAcademica($reg[2]);
       $obj->setfkEstadoCursoInformacionAcademica($reg[3]);
       $obj->setfkInformacionPersonalInformacionAcademica($reg[4]);

       $listado[]=$obj;
   }
   $this->c->desconectar();
   return $listado;
}


public function buscarEstadoDeCursoPorId ($idABuscar){
$this->c->conectar();
$query="SELECT nombre_estado_curso FROM tbl_estado_curso WHERE id_estado_curso=".$idABuscar.";";
$rs = $this->c->ejecutar($query);
while($reg = $rs->fetch_array()){
     $info=($reg[0]);
 }
 $this->c->desconectar();
 return $info;
}




public function readInfoEntrenamientoEstandar ($idABuscar){
  $this->c->conectar();
  $query="CALL CRUDInformacionEntrenamientoEstandar (1,'2018-09-09', 'algo',1,".$idABuscar.",2);";
  $rs = $this->c->ejecutar($query);
  $listado = array();
  while($reg = $rs->fetch_array()){

       $obj = new EntrenamientoEstandar();
       $obj->setIdEntrenamientoEstandar($reg[0]);
       $obj->setfechaEntrenamientoEstandar($reg[1]);
       $obj->setactividad($reg[2]);
       $obj->setFkEstadoCurso($reg[3]);
       $obj->setFkInformacionPersonal($reg[4]);

       $listado[]=$obj;
   }
   $this->c->desconectar();
   return $listado;
}



public function readInfoHistorica ($idABuscar){
  $this->c->conectar();
  $query="CALL CRUDInformacionHistorica (1,1,'Algun cuerpo',1,'2010-10-10', 'Transferencia', 'Solicitud personal', 'No disponible', 'Algo',".$idABuscar.",2);";
  $rs = $this->c->ejecutar($query);
  $listado = array();
  while($reg = $rs->fetch_array()){

       $obj = new Tbl_InfoHistorica();
       $obj->setIdInformacionHistorica($reg[0]);
       $obj->setfkRegioninformacionHistorica($reg[1]);
       $obj->setcuerpo($reg[2]);
       $obj->setcompania($reg[3]);
       $obj->setfechaDeCambio($reg[4]);
       $obj->setPremio($reg[5]);
       $obj->setmotivo($reg[6]);
       $obj->setdetalle($reg[7]);
       $obj->setCargo($reg[8]);
       $obj->setfkInfoPersonalinformacionHistorica($reg[9]);

       $listado[]=$obj;
   }
   $this->c->desconectar();
   return $listado;
}



public function buscarNombreDeRegionPorId ($idABuscar){
$this->c->conectar();
$query="SELECT nombre_region FROM tbl_region WHERE id_region=".$idABuscar.";";
$rs = $this->c->ejecutar($query);
while($reg = $rs->fetch_array()){
     $info=($reg[0]);
 }
 $this->c->desconectar();
 return $info;
}






public function actualizarMedida ($medida){
  $query="CALL CRUDMedida (".$medida->getIdMedida().", '".$medida->getTallaChaquetaCamisa()."', '".$medida->getTallaPantalon()."',
'".$medida->getTallaBuzo()."', '".$medida->getTallaCalzado()."', 3);";



  $this->c->conectar();
  $this->c->ejecutar($query);
  $this->c->desconectar();
}


public function actualizarInformacionPersonalDeBombero ($infoPersonalBombero){

  $query="CALL CRUDInformacionPersonal (".$infoPersonalBombero->getIdInfoPersonal().",'".$infoPersonalBombero->getRutInformacionPersonal()."','".$infoPersonalBombero->getNombreInformacionPersonal()."', '".$infoPersonalBombero->getApellidoPaterno()."', '".$infoPersonalBombero->getApellidoMaterno()."','".$infoPersonalBombero->getFechaNacimiento()."',".$infoPersonalBombero->getFkEstadoCivil()."
  ,".$infoPersonalBombero->getFkMedidaInformacionPersonal().",'".$infoPersonalBombero->getAlturaEnMetros()."','".$infoPersonalBombero->getPeso()."','".$infoPersonalBombero->getEmail()."',
  ".$infoPersonalBombero->getFkGenero().",'".$infoPersonalBombero->getTelefonoFijo()."','".$infoPersonalBombero->getTelefonoMovil()."','".$infoPersonalBombero->getDireccionPersonal()."','".$infoPersonalBombero->getPertenecioABrigadaJuvenil()."', '".$infoPersonalBombero->getEsInstructor()."',3);";

echo $query;

  $this->c->conectar();
  $this->c->ejecutar($query);
  $this->c->desconectar();
}


public function actualizarInformacionBomberil($infoBomberil){
  $query="CALL CRUDFichaInformacionBomberil (".$infoBomberil->getIdInformacionBomberil().",".$infoBomberil->getfkRegioninformacionBomberil().", '".$infoBomberil->getcuerpoInformacionBomberil()."', ".$infoBomberil->getfkCompaniainformacionBomberil().",
   ".$infoBomberil->getfkCargoinformacionBomberil().",'".$infoBomberil->getfechaIngresoinformacionBomberil()."', '".$infoBomberil->getNRegGeneralinformacionBomberil()."', ".$infoBomberil->getfkEstadoinformacionBomberil().",
  '".$infoBomberil->getNRegCiainformacionBomberil()."', ".$infoBomberil->getfkInfoPersonalinformacionBomberil().", 3);";

echo $query;

  $this->c->conectar();
  $this->c->ejecutar($query);
  $this->c->desconectar();
}


public function actualizarInformacionLaboral($infoLaboral){
  $query="CALL CRUDInformacionLaboral (".$infoLaboral->getIdidInformacionLaboral().", '".$infoLaboral->getnombreEmpresainformacionLaboral()."', '".$infoLaboral->getdireccionEmpresainformacionLaboral()."', '".$infoLaboral->gettelefonoEmpresainformacionLaboral()."',
   '".$infoLaboral->getcargoEmpresainformacionLaboral()."','".$infoLaboral->getfechaIngresoEmpresainformacionLaboral()."', '".$infoLaboral->getareaDeptoEmpresainformacionLaboral()."', '".$infoLaboral->getafp_informacionLaboral()."',
  '".$infoLaboral->getprofesion_informacionLaboral()."', ".$infoLaboral->getfkInfoPersonalinformacionLaboral().", 3);";

  $this->c->conectar();
  $this->c->ejecutar($query);
  $this->c->desconectar();
}


public function actualizarInformacionMedica1($infoMedica1){
  $query="CALL CRUDInformacionMedica1 (".$infoMedica1->getidInformacionMedica1().", '".$infoMedica1->getprestacionMedica_informacionMedica1()."', '".$infoMedica1->getalergias_informacionMedica1()."', '".$infoMedica1->getenfermedadesCronicasinformacionMedica1()."',
   ".$infoMedica1->getfkInfoPersonalinformacionMedica1().", 3);";



  $this->c->conectar();
  $this->c->ejecutar($query);
  $this->c->desconectar();
}


public function actualizarInformacionMedica2($infoMedica2){
  $query="CALL CRUDInformacionMedica2 (".$infoMedica2->getidInformacionMedica2().", '".$infoMedica2->getmedicamentosHabitualesinformacionMedica2()."', '".$infoMedica2->getnombreContactoinformacionMedica2()."', '".$infoMedica2->gettelefonoContactoinformacionMedica2()."',
   ".$infoMedica2->getfkParentescoContactoinformacionMedica2().", '".$infoMedica2->getnivelActividadFisicainformacionMedica2()."', ".$infoMedica2->getesDonanteinformacionMedica2().", ".$infoMedica2->getesFumadorinformacionMedica2().",
   ".$infoMedica2->getfkGrupoSanguineoinformacionMedica2().", ".$infoMedica2->getfkInfoPersonalinformacionMedica2().", 3);";

echo $query;

  $this->c->conectar();
  $this->c->ejecutar($query);
  $this->c->desconectar();
}


public function actualizarInformacionFamiliar($infoFamiliar){
  $query="CALL CRUDInformacionFamiliar (".$infoFamiliar->getIdInformacionFamiliar().", '".$infoFamiliar->getNombresInformacionFamiliar()."', '".$infoFamiliar->getFechaNacimientoInformacionFamiliar()."', ".$infoFamiliar->getfkParentescoinformacionFamiliar().",
   ".$infoFamiliar->getfkInfoPersonalinformacionFamiliar().",  3);";

   echo $query;

  $this->c->conectar();
  $this->c->ejecutar($query);
  $this->c->desconectar();
}


public function actualizarInformacionAcademica($infoAcademica){
  $query="CALL CRUDInformacionAcademica (".$infoAcademica->getIdidInformacionAcademica().", '".$infoAcademica->getfechaInformacionAcademica()."', '".$infoAcademica->getactividadInformacionAcademica()."', ".$infoAcademica->getfkEstadoCursoInformacionAcademica().",
   ".$infoAcademica->getfkInformacionPersonalInformacionAcademica().", 3);";


  $this->c->conectar();
  $this->c->ejecutar($query);
  $this->c->desconectar();
}



public function actualizarInformacionEntrenamientoEstandar($infoEntrenamientoEstandar){
  $query="CALL CRUDInformacionEntrenamientoEstandar (".$infoEntrenamientoEstandar->getIdEntrenamientoEstandar().", '".$infoEntrenamientoEstandar->getfechaEntrenamientoEstandar()."', '".$infoEntrenamientoEstandar->getactividad()."', ".$infoEntrenamientoEstandar->getFkEstadoCurso().",
   ".$infoEntrenamientoEstandar->getFkInformacionPersonal().", 3);";

  $this->c->conectar();
  $this->c->ejecutar($query);
  $this->c->desconectar();
}


public function actualizarInformacionHistorica($infoHistorica){
  $query="CALL CRUDInformacionHistorica (".$infoHistorica->getIdInformacionHistorica().", ".$infoHistorica->getfkRegioninformacionHistorica().", '".$infoHistorica->getcuerpo()."', '".$infoHistorica->getcompania()."',
   '".$infoHistorica->getfechaDeCambio()."', '".$infoHistorica->getPremio()."', '".$infoHistorica->getmotivo()."', '".$infoHistorica->getdetalle()."', '".$infoHistorica->getCargo()."'  , ".$infoHistorica->getfkInfoPersonalinformacionHistorica().", 3);";


  $this->c->conectar();
  $this->c->ejecutar($query);
  $this->c->desconectar();
}

public function actualizarUnidad($infoUnidad){
  $query="CALL CRUDUnidad (".$infoUnidad->getIdUnidad().",'".$infoUnidad->getNombreUnidad()."',
  '".$infoUnidad->getaniodeFabricacion()."','".$infoUnidad->getMarca()."','".$infoUnidad->getNmotor()."','".$infoUnidad->getNchasis()."','".$infoUnidad->getNVIN()."',
  '".$infoUnidad->getColor()."','".$infoUnidad->getPPu()."','".$infoUnidad->getfechaInscripcion()."','".$infoUnidad->getfechaAdquisicion()."',".$infoUnidad->getcapacidadOcupantes().",
  ".$infoUnidad->getfkEstadoUnidad().",".$infoUnidad->getfkTipoVehiculo().",".$infoUnidad->getfkEntidadPropietaria().",3);
";

echo $query;
  $this->c->conectar();
  $this->c->ejecutar($query);
  $this->c->desconectar();
}

public function actualizarMantencion($infoMantencion){
  $query="UPDATE tbl_mantencion SET fk_tipo_mantencion=".$infoMantencion->getFk_tipo_mantencion().", fecha_mantencion='".$infoMantencion->getFecha_mantencion()."', responsable_mantencion='".$infoMantencion->getResponsable_mantencion()."',
direccion_mantencion='".$infoMantencion->getDireccion_mantencion()."', comentarios_mantencion='".$infoMantencion->getComentarios_mantencion()."' WHERE id_mantencion=".$infoMantencion->getIdMantencion().";";

echo $query;
  $this->c->conectar();
  $this->c->ejecutar($query);
  $this->c->desconectar();
}


public function actualizarCarguio($infoCarguio){
  $query="UPDATE tbl_cargio_combustible SET responsable_cargio_combustible='".$infoCarguio->getResponsable_cargio_combustible()."', fecha_cargio='".$infoCarguio->getFecha_cargio()."', direccion_cargio='".$infoCarguio->getDireccion_cargio()."',
fk_tipo_combustible_cargio_combustible=".$infoCarguio->getFk_tipo_combustible_cargio_combustible().", cantidad_litros_cargio_combustible=".$infoCarguio->getCantidad_litros_cargio_combustible().", precio_litro_cargio_combustible=".$infoCarguio->getPrecio_litro_cargio_combustible().",
 observacion_cargio_combustible='".$infoCarguio->getObservacion_cargio_combustible()."' WHERE id_cargio_combustible=".$infoCarguio->getId_cargio_combustible().";";

  echo $query;
  $this->c->conectar();
  $this->c->ejecutar($query);
  $this->c->desconectar();
}



public function buscarNombreDeEstadoDeUnidadPorId ($idABuscar){
$this->c->conectar();
$query="SELECT nombre_estado_unidad FROM tbl_estado_unidad WHERE id_estado_unidad=".$idABuscar.";";
$rs = $this->c->ejecutar($query);
while($reg = $rs->fetch_array()){
     $info=($reg[0]);
 }
 $this->c->desconectar();
 return $info;
}

public function buscarNombreDeTipoDeVehiculoDeUnidadPorId ($idABuscar){
$this->c->conectar();
$query="SELECT nombre_tipo_vehiculo FROM tbl_tipo_vehiculo WHERE id_tipo_vehiculo=".$idABuscar.";";
$rs = $this->c->ejecutar($query);
while($reg = $rs->fetch_array()){
     $info=($reg[0]);
 }
 $this->c->desconectar();
 return $info;
}

public function buscarNombreDeEntidadACargoPorId ($idABuscar){
$this->c->conectar();
$query="SELECT nombre_entidadPropietaria FROM tbl_entidadPropietaria WHERE id_entidadPropietaria=".$idABuscar.";";
$rs = $this->c->ejecutar($query);
while($reg = $rs->fetch_array()){
     $info=($reg[0]);
 }
 $this->c->desconectar();
 return $info;
}

public function buscarNombreDeTipoDeMantencion ($idABuscar){
$this->c->conectar();
$query="SELECT nombre_tipoDeMantencion FROM tbl_tipoDeMantencion WHERE id_tipo_de_mantencion=".$idABuscar.";";
$rs = $this->c->ejecutar($query);
while($reg = $rs->fetch_array()){
     $info=($reg[0]);
 }
 $this->c->desconectar();
 return $info;
}



public function getUnidadPorId ($idUnidad){
  $this->c->conectar();
  $query="SELECT * FROM tbl_unidad WHERE id_unidad=".$idUnidad.";";
  $rs = $this->c->ejecutar($query);

  while($reg = $rs->fetch_array()){
       $id=$reg[0];
       $nombre=$reg[1];
       $aniodeFabricacion=$reg[2];
       $marca=$reg[3];
       $Nmotor=$reg[4];
       $Nchasis=$reg[5];
       $NVIN=$reg[6];
       $Color=$reg[7];
       $PPu=$reg[8];
       $fechaInscripcion=$reg[9];
       $fechaAdquisicion=$reg[10];
       $capacidadOcupantes=$reg[11];
       $fkEstadoUnidad=$reg[12];
       $fkTipoVehiculo=$reg[13];
       $fkEntidadACargo=$reg[14];

       $obj = new Tbl_Unidad();
       $obj->setIdUnidad($id);
       $obj->setNombreUnidad($nombre);
       $obj->setaniodeFabricacion($aniodeFabricacion);
       $obj->setMarca($marca);
       $obj->setNmotor($Nmotor);
       $obj->setNchasis($Nchasis);
       $obj->setNVIN($NVIN);
       $obj->setColor($Color);
       $obj->setPPu($PPu);
       $obj->setfechaInscripcion($fechaInscripcion);
       $obj->setfechaAdquisicion($fechaAdquisicion);
       $obj->setcapacidadOcupantes($capacidadOcupantes);
       $obj->setfkEstadoUnidad($fkEstadoUnidad);
       $obj->setfkTipoVehiculo($fkTipoVehiculo);
       $obj->setfkEntidadPropietaria($fkEntidadACargo);

   }
   $this->c->desconectar();
   return $obj;
}




public function buscarMantencionesDeUnidad ($idABuscar){
  $this->c->conectar();
  $query="SELECT * FROM tbl_mantencion WHERE fk_unidad=".$idABuscar.";";
  $rs = $this->c->ejecutar($query);
  $listado = array();
  while($reg = $rs->fetch_array()){

       $obj = new Tbl_Mantencion();
       $obj->setIdMantencion($reg[0]);
       $obj->setFk_tipo_mantencion($reg[1]);
       $obj->setFecha_mantencion($reg[2]);
       $obj->setResponsable_mantencion($reg[3]);
       $obj->setDireccion_mantencion($reg[4]);
       $obj->setComentarios_mantencion($reg[5]);
       $obj->setFk_unidad($reg[6]);
       $listado[]=$obj;
   }
   $this->c->desconectar();
   return $listado;
}


public function buscarCarguiosDeUnidad ($idABuscar){
  $this->c->conectar();
  $query="SELECT * FROM tbl_cargio_combustible WHERE fk_unidad=".$idABuscar.";";
  $rs = $this->c->ejecutar($query);
  $listado = array();
  while($reg = $rs->fetch_array()){

       $obj = new Tbl_cargio_combustible();
       $obj->setId_cargio_combustible($reg[0]);
       $obj->setResponsable_cargio_combustible($reg[1]);
       $obj->setFecha_cargio($reg[2]);
       $obj->setDireccion_cargio($reg[3]);
       $obj->setFk_tipo_combustible_cargio_combustible($reg[4]);
       $obj->setCantidad_litros_cargio_combustible($reg[5]);
       $obj->setPrecio_litro_cargio_combustible($reg[6]);
       $obj->setObservacion_cargio_combustible($reg[7]);
       $obj->setFk_unidad($reg[8]);
       $listado[]=$obj;
   }
   $this->c->desconectar();
   return $listado;
}

public function getMedidas(){

  $lista = array();
  $this->c->conectar();

  $select = "SELECT * from tbl_unidad_de_medida;";

  $rs = $this->c->ejecutar($select);
  while($obj = $rs->fetch_object()){

      $tu = new Tbl_UnidadMedida();

      $tu->setidUnidadMedida($obj->id_unidad_de_medida);
      $tu->setTipoDeMedida($obj->fk_tipo_de_medida_unidad_de_medida);
      $tu->setnombreUnidadMedida($obj->nombre_unidad_de_medida);


      array_push($lista,$tu);
  }

  $this->c->desconectar();
  return $lista;


}

public function getUbicacionFisica($fk_entidadACargo){

  $lista = array();
  $this->c->conectar();
  $select = "SELECT * from tbl_ubicacion_fisica WHERE fk_entidad_a_cargo=".$fk_entidadACargo.";";
  $rs = $this->c->ejecutar($select);
  while($obj = $rs->fetch_object()){
      $tu = new Tbl_UbicacionFisica();

      $tu->setidUbicacionFisica($obj->id_ubicacion_fisica);
      $tu->setnombreUbicacionFisica($obj->nombre_ubicacion_fisica);
      array_push($lista,$tu);
  }
  $this->c->desconectar();
  return $lista;


}

public function getTipoBodega(){

  $lista = array();
  $this->c->conectar();

  $select = "SELECT * from tbl_tipo_de_bodega;";

  $rs = $this->c->ejecutar($select);
  while($obj = $rs->fetch_object()){

      $tu = new Tbl_TipoBodega();

      $tu->setidTipoBodega($obj->id_tipo_de_bodega);
      $tu->setnombreTipoBodega($obj->nombre_tipo_de_bodega);


      array_push($lista,$tu);
  }

  $this->c->desconectar();
  return $lista;
}





public function crerMaterialMenor($materialMenor){

$query="INSERT INTO tbl_material_menor VALUES (NULL, '".$materialMenor->getNombre_material_menor()."', ".$materialMenor->getFk_entidad_a_cargo_material_menor().",
'".$materialMenor->getColor_material_menor()."' , ".$materialMenor->getCantidad_material_menor().",
".$materialMenor->getMedida_material_menor().", ".$materialMenor->getFk_unidad_de_medida_material_menor().", ".$materialMenor->getFk_ubicacion_fisica_material_menor().", '".$materialMenor->getFabricante_material_menor()."',
'".$materialMenor->getFecha_de_caducidad_material_menor()."', '".$materialMenor->getProveedor_material_menor()."', ".$materialMenor->getFk_tipo_de_bodega_material_menor().");";

  echo $query;

  $this->c->conectar();
  $this->c->ejecutar($query);
  $this->c->desconectar();
}


public function buscarMaterialMenorPorId($idABuscar){
  $this->c->conectar();
  $query="SELECT * FROM tbl_material_menor WHERE id_material_menor=".$idABuscar." ;";
  $rs = $this->c->ejecutar($query);

  while($reg = $rs->fetch_array()){

       $obj = new Tbl_MaterialMenor();
       $obj->setId_material_menor($reg[0]);
       $obj->setNombre_material_menor($reg[1]);
       $obj->setFk_entidad_a_cargo_material_menor($reg[2]);
       $obj->setColor_material_menor($reg[3]);
       $obj->setCantidad_material_menor($reg[4]);
       $obj->setMedida_material_menor($reg[5]);
       $obj->setFk_unidad_de_medida_material_menor($reg[6]);
       $obj->setFk_ubicacion_fisica_material_menor($reg[7]);
       $obj->setFabricante_material_menor($reg[8]);
       $obj->setFecha_de_caducidad_material_menor($reg[9]);
       $obj->setProveedor_material_menor($reg[10]);
       $obj->setFkEstadoMaterialMenor($reg[11]);


   }
   $this->c->desconectar();
   return $obj;
}


public function buscarMaterialMenorPorNombreCompaniaOBodega($nombre, $id, $tipoDeBusqueda){
  $this->c->conectar();

  $query="";

  if($tipoDeBusqueda==1){
    $query="SELECT tbl_material_menor.nombre_material_menor, tbl_material_menor.cantidad_material_menor, tbl_material_menor.fecha_de_caducidad_material_menor, tbl_entidadACargo.nombre_entidadACargo,
tbl_material_menor.id_material_menor FROM tbl_material_menor, tbl_entidadACargo WHERE tbl_material_menor.fk_entidad_a_cargo_material_menor=tbl_entidadACargo.id_entidadACargo
AND tbl_material_menor.nombre_material_menor LIKE '%".$nombre."%';";
  }else if($tipoDeBusqueda==2){
    $query="SELECT tbl_material_menor.nombre_material_menor, tbl_material_menor.cantidad_material_menor, tbl_material_menor.fecha_de_caducidad_material_menor, tbl_entidadACargo.nombre_entidadACargo,
tbl_material_menor.id_material_menor FROM tbl_material_menor, tbl_entidadACargo, tbl_tipo_de_bodega WHERE tbl_material_menor.fk_entidad_a_cargo_material_menor=tbl_entidadACargo.id_entidadACargo
AND tbl_material_menor.fk_tipo_de_bodega_material_menor=tbl_tipo_de_bodega.id_tipo_de_bodega AND tbl_tipo_de_bodega.id_tipo_de_bodega=".$id.";";
  }else if($tipoDeBusqueda==3){
    $query="SELECT tbl_material_menor.nombre_material_menor, tbl_material_menor.cantidad_material_menor, tbl_material_menor.fecha_de_caducidad_material_menor, tbl_entidadACargo.nombre_entidadACargo,
tbl_material_menor.id_material_menor FROM tbl_material_menor, tbl_entidadACargo WHERE tbl_material_menor.fk_entidad_a_cargo_material_menor=tbl_entidadACargo.id_entidadACargo
AND tbl_entidadACargo.id_entidadACargo=".$id.";";
  }
  /*
  $query="SELECT tbl_material_menor.nombre_material_menor, tbl_material_menor.cantidad_material_menor, tbl_material_menor.fecha_de_caducidad_material_menor, tbl_entidadACargo.nombre_entidadACargo,
tbl_material_menor.id_material_menor FROM tbl_material_menor, tbl_entidadACargo WHERE tbl_material_menor.fk_entidad_a_cargo_material_menor=tbl_entidadACargo.id_entidadACargo;";
*/

  $rs = $this->c->ejecutar($query);
  $listado = array();
  while($reg = $rs->fetch_array()){
       $obj = new Vista_BuscarMaterialMenor();
       $obj->setNombre($reg[0]);
       $obj->setCantidad($reg[1]);
       $obj->setFechaDeCaducidad($reg[2]);
       $obj->setNombreEntidad($reg[3]);
       $obj->setIdMaterialMenor($reg[4]);

       $listado[]=$obj;
   }
   $this->c->desconectar();
   return $listado;
}



public function actualizarMaterialMenor($materialMenor){

$query="UPDATE tbl_material_menor SET nombre_material_menor='".$materialMenor->getNombre_material_menor()."', fk_entidad_a_cargo_material_menor=".$materialMenor->getFk_entidad_a_cargo_material_menor().", color_material_menor=
 '".$materialMenor->getColor_material_menor()."' , cantidad_material_menor= ".$materialMenor->getCantidad_material_menor().", medida_material_menor=
".$materialMenor->getMedida_material_menor().", fk_unidad_de_medida_material_menor=".$materialMenor->getFk_unidad_de_medida_material_menor().",  fk_ubicacion_fisica_material_menor=".$materialMenor->getFk_ubicacion_fisica_material_menor().", fabricante_material_menor='".$materialMenor->getFabricante_material_menor()."',
 fecha_de_caducidad_material_menor='".$materialMenor->getFecha_de_caducidad_material_menor()."', proveedor_material_menor= '".$materialMenor->getProveedor_material_menor()."', fk_tipo_de_bodega_material_menor=".$materialMenor->getFk_tipo_de_bodega_material_menor()." WHERE id_material_menor=".$materialMenor->getId_material_menor()." ;";

  echo $query;

  $this->c->conectar();
  $this->c->ejecutar($query);
  $this->c->desconectar();
}



public function buscarUnidadPorNombreEstadoOCompania($nombre, $id, $tipoDeBusqueda){
  $this->c->conectar();

  $query="SELECT tbl_unidad.nombre_unidad, tbl_estado_unidad.nombre_estado_unidad, tbl_tipo_vehiculo.nombre_tipo_vehiculo, tbl_entidadACargo.nombre_entidadACargo, tbl_unidad.id_unidad FROM tbl_unidad,
tbl_estado_unidad, tbl_tipo_vehiculo, tbl_entidadACargo WHERE tbl_unidad.fk_estado_unidad_unidad=tbl_estado_unidad.id_estado_unidad AND
tbl_unidad.fk_tipo_vehiculo_unidad=tbl_tipo_vehiculo.id_tipo_vehiculo AND tbl_unidad.fk_entidadACargo=tbl_entidadACargo.id_entidadACargo ";

  if($tipoDeBusqueda==1){
    $anexoQuery="AND tbl_unidad.nombre_unidad LIKE '%".$nombre."%';";

  }else if($tipoDeBusqueda==2){
    $anexoQuery="AND tbl_estado_unidad.id_estado_unidad=".$id.";";

  }else if($tipoDeBusqueda==3){
    $anexoQuery="AND tbl_entidadACargo.id_entidadACargo=".$id.";";
  }

  $query=$query.$anexoQuery;

 echo $query;

  $rs = $this->c->ejecutar($query);
  $listado = array();
  while($reg = $rs->fetch_array()){
       $obj = new VistaBusquedaDeUnidad();
       $obj->setNombreUnidad($reg[0]);
       $obj->setEstado($reg[1]);
       $obj->setTipoVehiculo($reg[2]);
       $obj->setEntidadACargo($reg[3]);
       $obj->setIdUnidad($reg[4]);

       $listado[]=$obj;
   }
   $this->c->desconectar();
   return $listado;
}



public function getEstadosInventario (){
  $this->c->conectar();
  $query="SELECT * FROM tbl_estado_material_menor;";
  $rs = $this->c->ejecutar($query);
  $listado = array();
  while($reg = $rs->fetch_array()){

       $obj = new Tbl_EstadoMaterialMenor();
       $obj->setId_estado_material_menor($reg[0]);
       $obj->setNombre_estado_material_menor($reg[1]);

       $listado[]=$obj;
   }
   $this->c->desconectar();
   return $listado;
}



}


 ?>
