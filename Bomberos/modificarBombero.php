<!DOCTYPE html>

<?php
    // unir vista con el modelo sin pasar por un controlador
    require_once("model/Data.php");
    require_once("model/Tbl_Usuario.php");
    $data = new Data();

    session_start();


    if($_SESSION["usuarioIniciado"]!=null){
      $u=$_SESSION["usuarioIniciado"];
      if($data->verificarSiUsuarioTienePermiso($u,3)==0){
        header("location: paginaError.php");
      }
    }



    if($_SESSION["infoPersonalSolicitada"]!=null){
      $infoPersonal=$_SESSION["infoPersonalSolicitada"];
    }

    if($_SESSION["infoMedidasSolicitada"]!=null){
      $infoMedidas=$_SESSION["infoMedidasSolicitada"];
    }

    if($_SESSION["infoBomberilSolicitada"]!=null){
      $infoBomberil=$_SESSION["infoBomberilSolicitada"];
    }

    if($_SESSION["infoLaboralSolicitada"]!=null){
      $infoLaboral=$_SESSION["infoLaboralSolicitada"];
    }

    if($_SESSION["infoMedica1Solicitada"]!=null){
      $infoMedica1=$_SESSION["infoMedica1Solicitada"];
    }

    if($_SESSION["infoMedica2Solicitada"]!=null){
      $infoMedica2=$_SESSION["infoMedica2Solicitada"];
    }

    if(isset($_SESSION["infoFamiliarSolicitada"])){
      $infoFamiliar=$_SESSION["infoFamiliarSolicitada"];
    }

    if(isset($_SESSION["infoAcademicaSolicitada"])){
      $infoAcademica=$_SESSION["infoAcademicaSolicitada"];
    }

    if(isset($_SESSION["infoEntrenamientoEstandarSolicitada"])){
      $infoEntrenamientoEstandar=$_SESSION["infoEntrenamientoEstandarSolicitada"];
    }

    if(isset($_SESSION["infoHistoricaSolicitada"])){
      $infoHistorica=$_SESSION["infoHistoricaSolicitada"];
    }

    if(isset($_SESSION["infoCargosSolicitada"])){
      $infoCargos=$_SESSION["infoCargosSolicitada"];
    }

    $_SESSION['seEstaModificandoUBombero']=1;


/*    if(isset($_SESSION["resultadosDeBusquedaDeBomberos"])){
      unset($_SESSION["resultadosDeBusquedaDeBomberos"]);
    }*/

    if(isset($_SESSION["resultadosDeBusquedaDeUnidad"])){
      unset($_SESSION["resultadosDeBusquedaDeUnidad"]);;
    }

    if(isset($_SESSION["resultadosDeBusquedaDeMaterialMenor"])){
      unset($_SESSION["resultadosDeBusquedaDeMaterialMenor"]);;;
    }
?>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Mantenedor</title>


    <link rel ="stylesheet" href="css/style.css" type="text/css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
   <script src="js/bootstrap.js"></script>

   <script src="javascript/verificarRutv2.js"></script>
   <!-- Necesario poner estas 3 lineas aqui. Todas hacen referencia a un js dentro del directorio del programa, excepto el ultimo. Lo tengo
   dentro del directorio, pero no cacho bien como referenciarlo -->
   <script src="javascript/JQuery.js"></script>
   <script type="text/javascript" src="javascript/sweetAlertMin.js"></script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">


  </head>

<body  background="images/fondofichaintranet.jpg">

    <br>
    <nav class="navbar navbar-default nav-stacked  navbar-pills" role="navigation">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a href="Mantenedor.php" class="navbar-brand" href="#">Sistema Bomberos</a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Bomberos <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="CrearFicha.php">Crear</a></li>
              <li><a href="buscarBombero.php">Buscar</a></li>
            </ul>
          </li>
        </ul>

        <ul class="nav navbar-nav">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Unidades <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="crearUnidades.php" >Crear</a></li>
              <li><a href="buscarUnidades.php">Buscar Unidades</a></li>
              <li><a href="reporteUnidad.php" >Reporte</a></li>
              <li><a href="bitacoraUnidad.php" >Bitacora</a></li>
              <li><a href="buscarBitacora.php" >Buscar Bitacora</a></li>

            </ul>
          </li>
        </ul>

        <ul class="nav navbar-nav">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Inventario <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="crearInventario.php">Crear</a></li>
              <li><a href="buscarInventario.php" >Buscar </a></li>
              <li><a href="reporteInventario.php" >Reporte </a></li>

            </ul>
          </li>
        </ul>

        <ul class="nav navbar-nav">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Despacho <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="centraldeAlarma.php">Central de Alarma</a></li>

            </ul>
          </li>
        </ul>

        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <button class="btn btn-default" style="width: 150px;" style="margin-top: 400px"> <a href="crearUsuario.php" style="text-decoration:none;color:black;">Crear Usuario</a> </button>

        <br>
        <br>
        <button class="btn btn-danger" style="width: 150px;" style="margin-top: 400px"> <a href="controlador/CerrarSesion.php" style="text-decoration:none;color:black;">Cerrar Sesion</a> </button>





      </div><!-- /.navbar-collapse -->
    </nav>


  <div class = "cuerpo" style="
    margin-left: 20%;
    float: left;
    width: 75%;
    padding-left: 5%;
    padding-top: -100%;
    margin-top: -600px;
    margin-bottom: -1000px;
    ">

    <style>

    #transparencia{
        opacity: .85;
        -moz-opacity: .85;
        filter: alpha(opacity=85);

    }

    </style>
    <div style="width: 800px" style="height: 900px">
        <div class="jumbotron" style="border-radius: 70px 70px 70px 70px" id="transparencia">
          <div class="container">


          <div style="margin-left: 52px;">
             <div class="col-md-24">
               <button type="button" class="btn btn-default col-md-12" data-toggle="collapse" data-target="#antecedentes">
                   Información Personal
               </button>
            </div>

           <div class="col-md-12 collapse" id="antecedentes">
               <div class="panel panel-primary">
                   <div class="panel-heading panel-title">
                       Información Personal
                   </div>
                   <div class="panel-body">
                       <div class="col-sm-5" >
                         <div style="margin-left: 0px;">
                           <img src="images/avatar_opt.jpg">
                         </div>
                         <form  id="formactualizarPersonal" action="controlador/ActualizarInfoPersonal.php" method="post">
                         Talla Chaqueta/camisa : <input class="form-control" value="<?php echo $infoMedidas->getTallaChaquetaCamisa();?>" type="text" name="txtchaqueta" >
                         Talla Pantalón: <input class="form-control" value="<?php echo $infoMedidas->getTallaPantalon();?>" type="text" name="txtpantalon" >
                         Talla buzo: <input class="form-control" value="<?php echo $infoMedidas->getTallaBuzo();?>" type="text" name="txtbuzo" >
                         talla Calzado: <input class="form-control" value="<?php echo $infoMedidas->getTallaCalzado();?>" type="text" name="txtcalzado" >
                         Altura :<input class="form-control" value="<?php echo $infoPersonal->getAlturaEnMetros();?>"  type="text" name="txtaltura" >
                         Peso: <input class="form-control" value="<?php echo $infoPersonal->getPeso();?>"  type="text" name="txtpeso" >
                         Perteneció a Brigada Juvenil? <input class="form-control" value="<?php echo $infoPersonal->getPertenecioABrigadaJuvenil();?>"  type="text" name="txtbrigada">
                         Instructor: <input class="form-control" value="<?php echo $infoPersonal->getEsInstructor();?>"  type="text" name="txtinstructor" >

                       </div>
                       <div class="col-md-5" style="margin-left: 50px;">
                         <input class="form-control" value="<?php echo $infoPersonal->getIdInfoPersonal();?>"  type="hidden" name="idPersonal">
                         Rut: <input class="form-control" value="<?php echo $infoPersonal->getRutInformacionPersonal();?>"  type="text" name="txtRut" onblur= "this.value = this.value.replace( /^(\d{2})(\d{3})(\d{3})(\w{1})$/, '$1.$2.$3-$4')">
                         Nombre: <input class="form-control" value="<?php echo utf8_encode($infoPersonal->getNombreInformacionPersonal());?>" type="text" name="txtNombre" >
                         Apellido Paterno: <input class="form-control" value="<?php echo utf8_encode($infoPersonal->getApellidoPaterno());?>" type="text" name="txtApePa" >
                         Apellido Materno: <input class="form-control" value="<?php echo utf8_encode($infoPersonal->getApellidoMaterno());?>" name="txtApeMa" >
                         Fecha Nacimiento: <input class="form-control" value="<?php echo $infoPersonal->getFechaNacimiento();?>" name="txtFecha" type="date" >
                         Estado Civil:
                         <select class="form-control" name="cboEstadoCivil" >
                         <?php

                         require_once("model/Data.php");
                         require_once("model/Tbl_EstadoCivil.php");
                         $d= new Data();

                         $estadosCiviles = $d->readEstadosCiviles();
                         foreach($estadosCiviles as $e => $estado){
                           if($infoPersonal->getFkEstadoCivil()==$estado->getIdEstadoCivil()){?>
                             <option value="<?php echo $estado->getIdEstadoCivil(); ?>" selected ><?php echo $estado->getNombreEstadoCivil(); ?></option>
                           <?php
                         }else{
                             ?>
                             <option value="<?php echo $estado->getIdEstadoCivil(); ?>" ><?php echo $estado->getNombreEstadoCivil(); ?></option>
                             <?php
                           }
                         }
                         ?>
                         <?php

                         ?>
                         </select>
                         Dirección: <input class="form-control" value="<?php echo $infoPersonal->getDireccionPersonal();?>" Type="text" name="txtDireccion" >
                         Teléfonos:  <input class="form-control" value="<?php echo $infoPersonal->getTelefonoFijo();?>" type="text" name="txtTelefonos" >
                         Email: <input class="form-control" value="<?php echo $infoPersonal->getEmail();?>" type="text" name="txtemail" >
                         Genero:
                         <select class="form-control" name="cboGenero" >
                           <?php
                           require_once("model/Data.php");
                           require_once("model/Tbl_Genero.php");
                           $d= new Data();

                           $generos = $d->readGeneros();
                           foreach($generos as $g => $genero){
                             if($infoPersonal->getFkGenero()==$genero->getIdGenero()){?>
                               <option value="<?php echo $genero->getIdGenero(); ?>" selected ><?php echo $genero->getNombreGenero(); ?></option>
                               <?php
                             }else{
                                 ?>
                                 <option value="<?php echo $genero->getIdGenero(); ?>" ><?php echo $genero->getNombreGenero(); ?></option>
                                 <?php
                               }
                             }
                             ?>
                             <?php

                             ?>
                           </select>
                           <br>
                         <center> <input type="submit" id="btn_actualizarInfoPersonal" name="btnInfoPersonal" value="Modificar" class="btn button-primary" style="width: 150px;"> <span ></span>
                             <!--     <button class="btn button-primary" style="width: 150px;"> <a href="Mantenedor.php" style="text-decoration:none;color:black;">Volver</a> </button>-->

                         </center>
                       </form>
                       <br>
                       </div>
                       <br>
                       <br>


                   </div>
               </div>
           </div>
           <!-- INFORMACION PERSONAL -->
           <!-- INFORMACION bomberilL -->
           <br><br>
           <div class="col-md-24">
               <button type="button" class="btn btn-default col-md-12" data-toggle="collapse" data-target="#bomberil">
                   Información Bomberil
               </button>
           </div>
           <div class="col-md-12 collapse" id="bomberil">
               <div class="panel panel-primary">
                   <div class="panel-heading panel-title">
                       Información Bomberil
                   </div>
                   <div class="panel-body">
                       <div class="col-sm-6">

                         <form id="formactualizarBomberil" action="controlador/actualizarInformacionBomberil.php" method="post">
                        <input class="form-control" value="<?php echo $infoPersonal->getIdInfoPersonal();?>"  type="hidden" name="idPersonal">
                        <input class="form-control" value="<?php echo $infoBomberil->getIdInformacionBomberil();?>"  type="hidden" name="idBomberil">
                         Región : <!-- <input class="form-control" type="text" name="txtregion"> --><!--Region del libertador bernardo ohggins-->
                         <select class="form-control" name="cboRegion" >
                           <?php
                           require_once("model/Data.php");
                           require_once("model/Tbl_Region.php");
                           $d= new Data();

                           $regiones = $d->readRegiones();
                           foreach($regiones as $r => $region){
                             if($infoBomberil->getfkRegioninformacionBomberil()==$region->getIdRegion()){?>
                               <option value="<?php echo $region->getIdRegion(); ?>" selected ><?php echo utf8_encode($region->getNombreRegion()); ?></option>
                               <?php
                             }else{
                                 ?>
                                 <option value="<?php echo $region->getIdRegion(); ?>" ><?php echo utf8_encode($region->getNombreRegion()); ?></option>
                                 <?php
                               }
                             }
                             ?>
                             <?php

                             ?>
                           </select>

                         Compañía: <!-- <input class="form-control" type="text" name="txtcompania"> --> <!--Combobox-->
                         <!-- <input class="form-control" value="<?php /*echo $infoBomberil->getfkCompaniainformacionBomberil();*/?>" type="text" name="txtcompania" disabled> -->
                         <select name="compania" class="form-control"  >
                           <?php
                               $companias = $data->readSoloCompanias();
                               foreach ($companias as $c => $compania) {
                               if($infoBomberil->getfkCompaniainformacionBomberil()==$compania->getIdEntidadACargo()){?>
                                 <option value="<?php echo $compania->getIdEntidadACargo(); ?>" selected ><?php echo utf8_encode($compania->getNombreEntidadACargo()); ?></option>
                                 <?php
                               }else{
                                   ?>
                                   <option value="<?php echo $compania->getIdEntidadACargo(); ?>" ><?php echo utf8_encode($compania->getNombreEntidadACargo()); ?></option>
                                   <?php
                                 }
                               }
                               ?>
                               <?php

                               ?>
                             </select>

                         Fecha Ingreso:

                         <input class="form-control" value="<?php echo $infoBomberil->getfechaIngresoinformacionBomberil();?>" type="date" name="txtfingreso" >
                         Nº Reg.General: <input class="form-control" value="<?php echo $infoBomberil->getNRegGeneralinformacionBomberil();?>" type="number" name="txtgeneral" >
                       </div>
                       <div class="col-md-6">
                         Cuerpo: <input class="form-control" value="<?php echo $infoBomberil->getcuerpoInformacionBomberil();?>" type="text" name="txtcuerpo" >
                         Cargo: <!-- <input class="form-control" type="text" name="txtcargo"> -->
                         <select class="form-control" name="cboCargo" >
                           <?php
                           require_once("model/Data.php");
                           require_once("model/Tbl_Cargo.php");
                           $d= new Data();

                           $cargos = $d->readCargos();
                           foreach($cargos as $c => $cargo){
                             if($infoBomberil->getfkCargoinformacionBomberil()==$cargo->getIdCargo()){?>
                               <option value="<?php echo $cargo->getIdCargo(); ?>" selected ><?php echo $cargo->getNombreCargo(); ?></option>
                               <?php
                             }else{
                                 ?>
                                 <option value="<?php echo $cargo->getIdCargo(); ?>" ><?php echo $cargo->getNombreCargo(); ?></option>
                                 <?php
                               }
                             }
                             ?>
                             <?php

                             ?>
                           </select>


                         Estado: <!-- <input class="form-control" type="text" name="txtestado" > --> <!--Combobox -->
                         <!-- no se ve-->
                         <select class="form-control" name="cboEstadoBombero" >
                           <?php
                           require_once("model/Data.php");
                           require_once("model/Tbl_EstadoBombero.php");
                           $d= new Data();

                           $estados = $d->readEstadosDeBomberos();
                           foreach($estados as $e => $estado){
                             if($infoBomberil->getfkEstadoinformacionBomberil()==$estado->getIdEstado()){?>
                               <option value="<?php echo $estado->getIdEstado(); ?>" selected ><?php echo utf8_encode($estado->getNombreEstado()); ?></option>
                               <?php
                             }else{
                                 ?>
                                 <option value="<?php echo $estado->getIdEstado(); ?>" ><?php echo utf8_encode($estado->getNombreEstado()); ?></option>
                                 <?php
                               }
                             }
                             ?>
                             <?php

                             ?>
                           </select>

                         Nº Reg.Cia: <input class="form-control" type="number" value="<?php echo $infoBomberil->getNRegCiainformacionBomberil();?>" name="txtcia" >
                         <br>
                         <center> <input type="submit" id="btn_actualizarBomberil" name="btnInfoBomberil" value="Modificar" class="btn button-primary" style="width: 150px;"> <span ></span>
                             <!--     <button class="btn button-primary" style="width: 150px;"> <a href="Mantenedor.php" style="text-decoration:none;color:black;">Volver</a> </button>-->

                         </center>
                       </form>
                       </div>
                   </div>
               </div>
           </div>
           <!-- INFORMACION bomberilL -->
           <!-- INFORMACION laboral -->
           <br>
           <br>
           <div class="col-md-24">
               <button type="button" class="btn btn-default col-md-12" data-toggle="collapse" data-target="#laboral">
                   Información Laboral
               </button>
           </div>
           <div class="col-md-12 collapse" id="laboral">
               <div class="panel panel-primary">
                   <div class="panel-heading panel-title">
                       Información Laboral
                   </div>
                   <div class="panel-body">
                       <div class="col-sm-5">

                         <form id="formactualizarInfoLaboral" action="controlador/ActualizarInformacionLaboral.php" method="post">
                           <input class="form-control" value="<?php echo $infoPersonal->getIdInfoPersonal();?>"  type="hidden" name="idPersonal">
                           <input class="form-control" value="<?php echo $infoLaboral->getIdidInformacionLaboral();?>"  type="hidden" name="idLaboral">

                         Nombre Empresa : <input class="form-control" value="<?php echo $infoLaboral->getnombreEmpresainformacionLaboral();?>" type="text" name="txtnomempresa" >
                         Dirección Empresa: <input class="form-control" value="<?php echo $infoLaboral->getdireccionEmpresainformacionLaboral();?>" type="text" name="txtdirecempresa" >
                         Teléfono Empresa: <input class="form-control" value="<?php echo $infoLaboral->gettelefonoEmpresainformacionLaboral();?>" type="text" name="txttlfempresa" >
                         Fecha Ingreso: <input class="form-control" value="<?php echo $infoLaboral->getfechaIngresoEmpresainformacionLaboral();?>" type="date" name="txfingresoempresa" >
                         cargo : <input class="form-control" value="<?php echo $infoLaboral->getcargoEmpresainformacionLaboral();?>" type="text" name="txtcargo" >

                       </div>
                       <div class="col-md-5">

                         Area/Depto de trabajo: <input class="form-control" value="<?php echo $infoLaboral->getareaDeptoEmpresainformacionLaboral();?>" type="text" name="txtareatrabajo" >
                         AFP: <input class="form-control" value="<?php echo $infoLaboral->getafp_informacionLaboral();?>" type="text" name="txtafp" >
                         Profesión: <input class="form-control" value="<?php echo $infoLaboral->getprofesion_informacionLaboral();?>" name="txtprofesion" >
                         <br>
                         <center> <input type="submit" id="btn_actualizarInfoLaboral" name="btnInfoLaboral" value="Modificar" class="btn button-primary" style="width: 150px;"> <span ></span>
                             <!--     <button class="btn button-primary" style="width: 150px;"> <a href="Mantenedor.php" style="text-decoration:none;color:black;">Volver</a> </button>-->

                         </center>
                       </form>
                       </div>
                   </div>
               </div>
           </div>
           <!-- INFORMACION laboral -->
           <!-- INFORMACION medica -->
           <br>
           <br>
           <div class="col-md-24">
               <button type="button" class="btn btn-default col-md-12" data-toggle="collapse" data-target="#medica">
                   Informacion Médica
               </button>
           </div>
           <div class="col-md-12 collapse" id="medica">
               <div class="panel panel-primary">
                   <div class="panel-heading panel-title">
                       Informacion Médica
                   </div>
                   <div class="panel-body">
                       <div class="col-sm-6">

                         <form id="formactualizarInfoMedica" action="controlador/CrearInformacionMedica.php" method="post">

                         <input class="form-control" value="<?php echo $infoPersonal->getIdInfoPersonal();?>"  type="hidden" name="idPersonal">
                         <input class="form-control" value="<?php echo $infoMedica1->getidInformacionMedica1();?>"  type="hidden" name="idMedico1">
                         <input class="form-control" value="<?php echo $infoMedica2->getidInformacionMedica2();?>"  type="hidden" name="idMedico2">


                         Prestación Médica : <input class="form-control"  value="<?php echo $infoMedica1->getprestacionMedica_informacionMedica1();?>" type="text" name="txtpresmedica" >
                         Alergias: <input class="form-control"  value="<?php echo $infoMedica1->getalergias_informacionMedica1();?>" type="text" name="txtalergias" >
                         Enfermedades Crónicas: <input class="form-control"  value="<?php echo $infoMedica1->getenfermedadesCronicasinformacionMedica1();?>" type="text" name="txtenfermedadescronicas" >
                         Medicamentos Habituales: <input class="form-control"  value="<?php echo $infoMedica2->getmedicamentosHabitualesinformacionMedica2();?>" type="text" name="txtmedicamentosHabituales" >
                         Nombre del Contacto: <input class="form-control"  value="<?php echo $infoMedica2->getnombreContactoinformacionMedica2();?>" type="text" name="txtnomContacto" >
                         Teléfono del Contacto : <input class="form-control"  value="<?php echo $infoMedica2->gettelefonoContactoinformacionMedica2();?>" type="text" name="txttlfcontacto" >

                       </div>
                       <div class="col-md-6">



                         Parentesco del Contacto: <!-- <input class="form-control" type="text" name="txtparentesco"> -->
                         <select class="form-control" name="cboParentesco1" >
                           <?php
                           require_once("model/Data.php");
                           require_once("model/Tbl_Parentesco.php");
                           $d= new Data();

                           $parentescos = $d->readParentescos();
                           foreach($parentescos as $p => $parentesco){
                             if($infoMedica2->getfkParentescoContactoinformacionMedica2()==$parentesco->getIdParentesco()){?>
                               <option value="<?php echo $parentesco->getIdParentesco(); ?>" selected ><?php echo utf8_encode($parentesco->getNombreParentesco()); ?></option>
                               <?php
                             }else{
                                 ?>
                                 <option value="<?php echo $parentesco->getIdParentesco(); ?>" ><?php echo utf8_encode($parentesco->getNombreParentesco()); ?></option>
                                 <?php
                               }
                             }
                             ?>
                           </select>
                             Nivel de actividiad física:
                              <input class="form-control"  value="<?php echo $infoMedica2->getnivelActividadFisicainformacionMedica2();?>" type="text" name="txtactvfisica" >
                             <br>
                         <?php
                         $donanteChequeado="checked";
                         $fumadorChequeado="checked";
                        if($infoMedica2->getesDonanteinformacionMedica2()==FALSE){
                          $donanteChequeado="0";
                        }
                        if($infoMedica2->getesFumadorinformacionMedica2()==FALSE){
                          $fumadorChequeado="0";
                        }
                         ?>

                         Donante:  <input class="form-control" value="seleccionado" type="checkbox" <?php echo $donanteChequeado;?> name="txtdonante" >
                         Fumador: <input class="form-control" value="seleccionado" type="checkbox" <?php echo $fumadorChequeado;?> name="txtfumador" >
                         Grupo Sanguineo: <!-- <input class="form-control" type="text" name="txtgruposanguineo"> -->
                         <select class="form-control" name="cboGrupoSanguineo" >
                           <?php
                           require_once("model/Data.php");
                           require_once("model/Tbl_GrupoSanguineo.php");
                           $d= new Data();

                           $grupos = $d->readGruposSanguineos();
                           foreach($grupos as $g => $grupo){
                             echo $grupo->getIdGrupoSanguineo();;
                             if($infoMedica2->getfkGrupoSanguineoinformacionMedica2()==$grupo->getIdGrupoSanguineo()){?>
                               <option value="<?php echo $grupo->getIdGrupoSanguineo(); ?>" selected ><?php echo $grupo->getNombreGrupoSanguineo(); ?></option>
                               <?php
                             }else{
                                 ?>
                                 <option value="<?php echo $grupo->getIdGrupoSanguineo(); ?>" ><?php echo $grupo->getNombreGrupoSanguineo(); ?></option>
                                 <?php
                               }
                             }
                             ?>
                             <?php

                             ?>
                           </select>

                           <br>
                           <center> <input type="submit" id="btn_actualizarInfoMedica" name="btninfoMedica" value="Modificar" class="btn button-primary" style="width: 150px;"> <span ></span>
                               <!--     <button class="btn button-primary" style="width: 150px;"> <a href="Mantenedor.php" style="text-decoration:none;color:black;">Volver</a> </button>-->

                           </center>
                         </form>

                       </div>
                   </div>
               </div>
           </div>
           <!-- INFORMACION medica -->
           <!-- INFORMACION Familiar -->
           <br>
           <br>
           <div class="col-md-24">
               <button type="button" class="btn btn-default col-md-12" data-toggle="collapse" data-target="#familiar">
                   Información Familiar
               </button>
           </div>
           <div class="col-md-12 collapse" id="familiar">
               <div class="panel panel-primary">
                   <div class="panel-heading panel-title">
                       Información Familiar
                   </div>
                   <div class="panel-body">

                       <div class="col-sm-6">
                         <form id="formCrearInfoFamiliarEnModificar" action="controlador/CrearInformacionFamiliar.php" method="post">
                         Nombre: <input class="form-control" type="text" id="nomFamiliar" name="txtnombreFamiliar" >
                         Fecha de Nacimiento: <input class="form-control" type="date" id="fecNFamiliar" name="txtfechafamiliar" >
                         Parentesco:
                         <select class="form-control" name="cboParentesco2" id="cboParentescoFamiliar" >
                           <?php
                           require_once("model/Data.php");
                           require_once("model/Tbl_Parentesco.php");
                           $d= new Data();

                           $parentescos = $d->readParentescos();
                           foreach($parentescos as $p => $parentesco){
                           ?>
                           <option value="<?php echo $parentesco->getIdParentesco(); ?>"><?php echo utf8_encode($parentesco->getNombreParentesco()); ?></option>
                           <?php
                           }
                           ?>
                         </select>
                         <br>
                    <!--     <input class="form-control" value="" type="hidden" id="idPersonalFamiliar" name="idPersonalFamiliar">
                         <center> <input type="submit" name="btninfoFamiliar" value="Crear" class="btn button-primary" style="width: 150px;"> <span ></span>
                     <button class="btn button-primary" style="width: 150px;"> <a href="Mantenedor.php" style="text-decoration:none;color:black;">Volver</a> </button>
                            -->
                            <center>
                              <input type="submit" id="btn_crearInfoFamiliarEnModificar" name="btninfoFamiliar" value="Crear" class="btn button-primary" style="width: 150px;"> <span ></span>

                         </center>

                         </form>

                         <!-- Nivel de actividad fisica: <input class="form-control" type="text" name="txtactvfisica"> -->
                         <table class="table table-striped">
                             <thead>
                               <tr>
                                 <th>Nombre</th>
                                 <th>Fecha de Nacimiento</th>
                                 <th>Parentesco</th>
                               </tr>
                             </thead>
                             <tbody>
                               <?php
                               if(isset($infoFamiliar)){


                               foreach ($infoFamiliar as $iFamiliar => $datos) {
                               ?>
                               <tr>
                                 <td><?php echo $datos->getNombresInformacionFamiliar();?></td>
                                 <td><?php
                                 $fechaSinConvertir = $datos->getFechaNacimientoInformacionFamiliar();
                                 $fechaConvertida = date("d-m-Y", strtotime($fechaSinConvertir));

                                 echo $fechaConvertida;?></td>
                                 <td><?php echo $d->buscarNombreParentescoPorId($datos->getfkParentescoinformacionFamiliar())->getNombreParentesco();?></td>

                            <?php
                             }
                             }
                               ?>

                               </tr>

                             </tbody>
                           </table>
                      </div>
                      <div class="col-md-6">

                         <br><br><br><br><br><br>
                         <input class="form-control" value="" type="hidden" id="idPersonalFamiliar" name="idPersonalFamiliar">
                             <!--     <button class="btn button-primary" style="width: 150px;"> <a href="Mantenedor.php" style="text-decoration:none;color:black;">Volver</a> </button>-->
                      </div>

                   </div>

               </div>
           </div>
             <!-- INFORMACION Familiar -->
               <!-- INFORMACION academica -->
           <br>
           <br>

           <div class="col-md-24">
               <button type="button" class="btn btn-default col-md-12" data-toggle="collapse" data-target="#academica">
                   Informacion Académica
               </button>
           </div>
           <div class="col-md-12 collapse" id="academica">
               <div class="panel panel-primary">
                   <div class="panel-heading panel-title">
                       Informacion Académica
                   </div>
                   <div class="panel-body">
                       <div class="col-sm-6">
                         <form id="formCrearInfoAcademicaEnModificar" action="controlador/CrearInformacionAcademica.php" method="post">
                         Fecha: <input class="form-control" type="date" name="txtfechaAcademica" >
                         Actividad: <input class="form-control" type="text" name="txtActivdidadAcademica" >
                         Estado:
                         <select class="form-control" name="cboEstadoCursoAcademico" >
                           <?php
                           require_once("model/Data.php");
                           require_once("model/Tbl_EstadoCurso.php");
                           $d= new Data();


                           $estadosDeCursos = $d->readEstadosCurso();
                           foreach($estadosDeCursos as $ec => $estado){
                           ?>
                           <option value="<?php echo $estado->getIdEstadoCurso(); ?>"><?php echo $estado->getNombreEstadoCurso(); ?></option>
                           <?php
                           }
                           ?>
                           </select>

                           <center><input type="submit" id="btn_crearInfoAcademicaEnModificar" name="btninfoAcademica" value="Crear" class="btn button-primary" style="width: 150px;"> <span ></span></center></center>
                        <!--   <input class="form-control" value="" type="hidden" id="idPersonalAcadem" name="idPersonalAcadem">
                           <br>
                           <center> <input type="submit" name="btninfoAcademica" value="Crear" class="btn button-primary" style="width: 150px;"> <span ></span></center>
                         -->
                           </form>

                         <table class="table table-striped">
                             <thead>
                               <tr>
                                 <th>Actividad</th>
                                 <th>Fecha</th>
                                 <th>Estado</th>

                               </tr>
                             </thead>
                             <tbody>
                               <?php

                               if(isset($infoAcademica)){

                               foreach ($infoAcademica as $iAcademica => $datos) {
                               ?>
                               <tr>
                                 <td><?php echo $datos->getactividadInformacionAcademica();?></td>
                                 <td><?php
                                 $fechaSinConvertir = $datos->getfechaInformacionAcademica();
                                 $fechaConvertida = date("d-m-Y", strtotime($fechaSinConvertir));

                                 echo $fechaConvertida;?></td>
                                 <td><?php echo $d->buscarEstadoDeCursoPorId($datos->getfkEstadoCursoInformacionAcademica());?></td>
                               <?php
                                }
                                }
                                  ?>
                               </tr>


                             </tbody>
                           </table>

                      </div>
                      <div class="col-md-6">
                         <br><br><br><br><br>
                         <input class="form-control" value="" type="hidden" id="idPersonalAcadem" name="idPersonalAcadem">
                         <br>

                      </div>
                   </div>

               </div>
             </div>
               <!-- INFORMACION academica -->
                 <!-- INFORMACION estandar -->
               <br>
               <br>

               <div class="col-md-24">
                   <button type="button" class="btn btn-default col-md-12" data-toggle="collapse" data-target="#estandar">
                       Información Entrenamiento Estandar
                   </button>
               </div>
               <div class="col-md-12 collapse" id="estandar">
                   <div class="panel panel-primary">
                       <div class="panel-heading panel-title">
                           Información Estandar

                       </div>
                       <div class="panel-body">
                           <div class="col-sm-6">
                             <form id="formCrearInfoEntrenamientoEstandarEnModificar" action="controlador/CrearInfoEntrenamientoEstandar.php" method="post">
                             Fecha: <input class="form-control" type="date" name="txtfechaEstandar" >
                             Actividad: <input class="form-control" type="text" name="txtActividadEntrenamientoEstandar" >
                             Estado:
                             <select class="form-control" name="cboEstadoCursoEstandar" >
                               <?php
                               require_once("model/Data.php");
                               require_once("model/Tbl_EstadoCurso.php");
                               $d= new Data();

                               $estadosDeCursos2 = $d->readEstadosCurso();
                               foreach($estadosDeCursos2 as $ec2 => $estado2){
                               ?>
                               <option value="<?php echo $estado2->getIdEstadoCurso(); ?>"><?php echo utf8_encode($estado2->getNombreEstadoCurso()); ?></option>
                               <?php
                               }
                               ?>
                               </select>
                               <br>
                               <center> <input type="submit" id="btn_crearInfoEntrenEstandarEnModificar" name="btninfoEstandar" value="Crear" class="btn button-primary" style="width: 150px;"> <span ></span></center>

                             </form>

                             <table class="table table-striped">
                                 <thead>
                                   <tr>
                                     <th>Actividad</th>
                                     <th>Fecha</th>
                                     <th>Estado</th>
                                  </tr>
                                 </thead>
                                 <tbody>
                                   <?php
                                   if(isset($infoEntrenamientoEstandar)){
                                   foreach ($infoEntrenamientoEstandar as $iEstandar => $datos) {
                                   ?>
                                   <tr>
                                     <td><?php echo $datos->getactividad();?></td>
                                     <td><?php
                                     $fechaSinConvertir = $datos->getfechaEntrenamientoEstandar();
                                     $fechaConvertida = date("d-m-Y", strtotime($fechaSinConvertir));

                                     echo $fechaConvertida;?></td>
                                     <td><?php echo $d->buscarEstadoDeCursoPorId($datos->getFkEstadoCurso());?></td>
                                <?php
                                 }
                                 }
                                   ?>
                                   </tr>

                                 </tbody>
                               </table>

                          </div>
                          <div class="col-md-6">
                             <br><br><br><br><br>
                              </center>

                          </div>
                       </div>

                   </div>
               </div>

                 <!-- INFORMACION estandar -->
                 <!-- INFORMACION historica -->
               <br>
               <br>

               <div class="col-md-24">
                   <button type="button" class="btn btn-default col-md-12" data-toggle="collapse" data-target="#historica">
                       Información Histórica
                   </button>
               </div>
               <div class="col-md-12 collapse" id="historica">
                   <div class="panel panel-primary">
                       <div class="panel-heading panel-title">
                           Información Histórica
                       </div>
                       <div class="panel-body" style="margin-left: -10px;">
                           <div class="col-sm-6">
                             <form id="formCrearInfoHistoricaEnModificar" action="controlador/CrearInformacionHistorica.php" method="post">

                             Región:
                             <select class="form-control" name="cboxRegion" >
                               <?php
                               require_once("model/Data.php");
                               require_once("model/Tbl_Region.php");
                               $d= new Data();

                               $regiones = $d->readRegiones();
                               foreach($regiones as $r => $region){
                               ?>
                               <option value="<?php echo $region->getIdRegion(); ?>"><?php echo utf8_encode($region->getNombreRegion()); ?></option>
                               <?php
                               }
                               ?>
                               </select>

                             Cuerpo: <input type="text" name="txtcuerpoHistorico" class="form-control" >
                             Compañia:<input type="text" name="txtCompania" class="form-control" >
                             Fecha: <input type="date" name="txtfechaCambioInfoHistorica" class="form-control" >

                           </div>

                             <div class="col-md-6">


                               Premio: <input type="text" name="txtPremioInforHistorica" class="form-control" >
                               Cargo: <input type="text" name="cboxCargo" class="form-control" >
                               Motivo: <input type="text" name="txtMotivo" class="form-control" >
                               Detalle: <input type="text" name="txtDetalleHistorico" class="form-control" >

                               <br><br>
                             </div>

                             <center> <input type="submit" id="btn_crearInfoHistoricaEnModificar" name="btninfohistorica" value="Crear" class="btn button-primary" style="width: 150px;"> <span ></span>

                             </form>


                             <table class="table table-striped">
                                 <thead>
                                   <tr>
                                     <th>Región</th>
                                     <th>Cuerpo</th>
                                     <th>Compañía</th>
                                     <th>Fecha</th>
                                     <th>Premio</th>
                                     <th>Motivo</th>
                                     <th>Detalle</th>
                                     <th>Cargo</th>
                                  </tr>
                                 </thead>
                                 <tbody>
                                   <?php
                                   if(isset($infoHistorica)){
                                   foreach ($infoHistorica as $iHistorica => $info) {
                                ?>
                                <tr>
                                  <td><?php echo utf8_encode($d->buscarNombreDeRegionPorId($info->getfkRegioninformacionHistorica()));   ?></td>
                                  <td><?php echo $info->getcuerpo();   ?></td>
                                  <td><?php echo $info->getcompania();  ?></td>
                                  <td><?php
                                  $fechaSinConvertir = $info->getfechaDeCambio();
                                  $fechaConvertida = date("d-m-Y", strtotime($fechaSinConvertir));
                                  echo $fechaConvertida;   ?></td>
                                  <td><?php echo $info->getPremio();   ?></td>
                                  <td><?php echo $info->getmotivo();   ?></td>
                                  <td><?php echo $info->getdetalle();   ?></td>
                                  <td><?php echo $info->getCargo();   ?></td>
                                </tr>


                                   <?php
                                 }
                                 }
                                     ?>


                                 </tbody>
                               </table>

                          </div>
                       </div>

                   </div>
                 <!-- INFORMACION historica -->
                   <!-- INFORMACION servicio -->
                   <br>
                   <br>

                   <div class="col-md-24">
                       <button type="button" class="btn btn-default col-md-12" data-toggle="collapse" data-target="#cargos">
                           Información de Cargos
                       </button>
                   </div>
                   <div class="col-md-12 collapse" id="cargos">
                       <div class="panel panel-primary">
                           <div class="panel-heading panel-title">
                             <form id="formCrearInfoCargosEnModificar" action="controlador/CrearInformacionDeCargos.php" method="post">
                               Información de Cargos
                           </div>
                           <div class="panel-body" style="margin-left: -20px;">
                               <div class="col-sm-6">
                                 Creando ficha para: <?php
                                 if(isset($idDeBomberoMasReciente)){
                                   echo utf8_encode($d->getNombreBomberoPorId($idDeBomberoMasReciente));
                                 }
                                  ?>
                                  <br>

                                   Nombre: <input type="text" class="form-control" id="nombreDeMaterialAAsignar" name="txtnombrecargo" disabled>
                                   Marca: <input type="text" class="form-control" id="marcaDeMaterialAAsignar" name="txtmarcacargo" disabled>
                                   Talla: <input type="text" class="form-control" name="txttalla">
                                   Serie: <input type="text" class="form-control" name="txtserie">
                                   Fecha: <input type="date" class="form-control" name="txtfechacargo">
                                   <br>
                              </div>

                              <div class="col-md-6">
                                <br>

                                Entidad a Cargo:
                                 <select name="cboEntidadACargo" id="cboEntidadACargo" class="form-control" onchange="actualizarComboBox()" >
                                     <?php
                                         $entiPropietaria = $data->getEntidadACargo();
                                         foreach ($entiPropietaria as $ep) {
                                             echo "<option value='".$ep->getIdEntidadACargo()."'>";
                                                 echo utf8_encode($ep->getNombreEntidadACargo());
                                             echo"</option>";
                                         }
                                     ?>
                                 </select>

                                Ubicacion Fisica:
                                 <select name="cboxUbicacion" id="cboxUbicacion" class="form-control" onchange="actualizarComboBoxDeMateriales()">
                                   <?php
                                   $ubicacionesFisicas = $data->getUbicacionFisica(1);
                                   foreach ($ubicacionesFisicas as $ubi) {
                                     echo "<option value='".$ubi->getIdUbicacionFisica()."'>";
                                     echo utf8_encode($ubi->getNombreUbicacionFisica());
                                     echo"</option>";
                                   }
                                   ?>

                                 </select>

                                 Material menor a asignar:
                                 <select name="cboMaterialesDisponibles" id="cboMaterialesDisponibles" class="form-control" onchange="actualizarStockDisponible(), cargarDatosDeMaterialSeleccionado()">
                                   <?php
                                   $materialesDisponibles = $data->getMaterialesMenoresPorFkUbicacionFisica(1);
                                   foreach ($materialesDisponibles as $mat) {
                                     echo "<option value='".$mat->getId_material_menor()."'>";
                                     echo utf8_encode($mat->getNombre_material_menor());
                                     echo"</option>";
                                   }
                                   ?>
                                 </select>

                                 Cantidad a asignar:
                                 <input type="number" class="form-control" value="1" id="cantidadDeMaterialesAsignados" name="cantidadDeMaterialesAsignados" min="1" max="10">
                                  <br>
                                  <center> <input type="submit" name="btnInfoCargos" id="btn_crearCargoEnModificar" value="Guardar" class="btn button-primary" style="width: 150px;"> <span ></span>

                                  </center>

                                </form>

                           </div>

                             <table class="table table-striped" style="margin-left: 10px;">
                                 <thead>
                                   <tr>
                                     <th>Nombre</th>
                                     <th>Marca</th>
                                     <th>Talla</th>
                                     <th>Serie</th>
                                     <th>Cantidad asignada</th>
                                     <th>Fecha</th>
                                   </tr>
                                 </thead>
                                 <tbody>
                                   <?php
                                   foreach ($infoCargos as $icargos => $datos) {
                                   ?>
                                   <tr>
                                     <td><?php echo $datos->getNombre_informacionDeCargos();?></td>
                                     <td><?php echo $datos->getMarca_informacionDeCargos();?></td>
                                     <td><?php echo $datos->getTalla_informacionDeCargos();?></td>
                                     <td><?php echo $datos->getSerie_informacionDeCargos();?></td>
                                     <td><?php echo $datos->getCantidadAsignada_informacionDeCargos();?></td>
                                     <td><?php
                                     $fechaSinConvertir = $datos->getFecha_informacionDeCargos();
                                     $fechaConvertida = date("d-m-Y", strtotime($fechaSinConvertir));

                                     echo $fechaConvertida;?></td>
                                <?php
                                 }
                                   ?>
                                   </tr>

                                 </tbody>
                               </table>
        </div>
</div>
 </div>

<?php


?>

<script>

function actualizarComboBox(){
     var val= document.getElementById("cboEntidadACargo").value;

     $.ajax({
       url: "buscarUbicacionFisica.php",
       type: "POST",
       data:{"datos":val}
     }).done(function(data) {
       console.log(data);
       $('#cboxUbicacion')
       .find('option')
       .remove()
       .end();
       $('#cboxUbicacion').append(data);

     });

   }



   function actualizarComboBoxDeMateriales(){
        var val= document.getElementById("cboxUbicacion").value;

        $.ajax({
          url: "buscarMaterialMenorPorFkDeUbicacionFisica.php",
          type: "POST",
          data:{"datos":val}
        }).done(function(data) {
          console.log(data);
          $('#cboMaterialesDisponibles')
          .find('option')
          .remove()
          .end();
          $('#cboMaterialesDisponibles').append(data);

        });
      }



      function actualizarStockDisponible(){
        var id = document.getElementById("cboMaterialesDisponibles").value;
        $.ajax({
            type: "POST",
            url: 'obtenerStockDeUnMaterialPorId.php',
            data: {"datos": id},
            success: function(data){
              var valorMaximo = document.getElementById("cantidadDeMaterialesAsignados");
              valorMaximo.setAttribute("max",data);
            }
        });
      }
/*
      $("form").submit(function(){
        alert("Operación exitosa");
          });
          */


          $('#btn_actualizarInfoPersonal').on('click',function(e){
          e.preventDefault();
          var form = $(this).parents('form');
          swal({
              title: "Sistema de bomberos",
              text: "Operación exitosa",
              type: "success",
              showCancelButton: true,
              confirmButtonColor: "#DD6B55",
              confirmButtonText: "Ok",
              closeOnConfirm: true,
          }, function(isConfirm){
              if (isConfirm)  document.getElementById("formactualizarPersonal").submit();
              //form.submit();
          });
          });

          $('#btn_actualizarBomberil').on('click',function(e){
          e.preventDefault();
          var form = $(this).parents('form');
          swal({
              title: "Sistema de bomberos",
              text: "Operación exitosa",
              type: "success",
              showCancelButton: true,
              confirmButtonColor: "#DD6B55",
              confirmButtonText: "Ok",
              closeOnConfirm: true,
          }, function(isConfirm){
              if (isConfirm)  document.getElementById("formactualizarBomberil").submit();
              //form.submit();
          });
          });

          $('#btn_actualizarInfoLaboral').on('click',function(e){
          e.preventDefault();
          var form = $(this).parents('form');
          swal({
              title: "Sistema de bomberos",
              text: "Operación exitosa",
              type: "success",
              showCancelButton: true,
              confirmButtonColor: "#DD6B55",
              confirmButtonText: "Ok",
              closeOnConfirm: true,
          }, function(isConfirm){
              if (isConfirm)  document.getElementById("formactualizarInfoLaboral").submit();
              //form.submit();
          });
          });

          $('#btn_actualizarInfoMedica').on('click',function(e){
          e.preventDefault();
          var form = $(this).parents('form');
          swal({
              title: "Sistema de bomberos",
              text: "Operación exitosa",
              type: "success",
              showCancelButton: true,
              confirmButtonColor: "#DD6B55",
              confirmButtonText: "Ok",
              closeOnConfirm: true,
          }, function(isConfirm){
              if (isConfirm)  document.getElementById("formactualizarInfoMedica").submit();
              //form.submit();
          });
          });


          $('#btn_crearInfoFamiliarEnModificar').on('click',function(e){
          e.preventDefault();
          var form = $(this).parents('form');
          swal({
              title: "Sistema de bomberos",
              text: "Operación exitosa",
              type: "success",
              showCancelButton: true,
              confirmButtonColor: "#DD6B55",
              confirmButtonText: "Ok",
              closeOnConfirm: true,
          }, function(isConfirm){
              if (isConfirm)  document.getElementById("formCrearInfoFamiliarEnModificar").submit();
              //form.submit();
          });
          });

          $('#btn_crearInfoAcademicaEnModificar').on('click',function(e){
          e.preventDefault();
          var form = $(this).parents('form');
          swal({
              title: "Sistema de bomberos",
              text: "Operación exitosa",
              type: "success",
              showCancelButton: true,
              confirmButtonColor: "#DD6B55",
              confirmButtonText: "Ok",
              closeOnConfirm: true,
          }, function(isConfirm){
              if (isConfirm)  document.getElementById("formCrearInfoAcademicaEnModificar").submit();
              //form.submit();
          });
          });


          $('#btn_crearInfoEntrenEstandarEnModificar').on('click',function(e){
          e.preventDefault();
          var form = $(this).parents('form');
          swal({
              title: "Sistema de bomberos",
              text: "Operación exitosa",
              type: "success",
              showCancelButton: true,
              confirmButtonColor: "#DD6B55",
              confirmButtonText: "Ok",
              closeOnConfirm: true,
          }, function(isConfirm){
              if (isConfirm)  document.getElementById("formCrearInfoEntrenamientoEstandarEnModificar").submit();
              //form.submit();
          });
          });

          $('#btn_crearInfoHistoricaEnModificar').on('click',function(e){
          e.preventDefault();
          var form = $(this).parents('form');
          swal({
              title: "Sistema de bomberos",
              text: "Operación exitosa",
              type: "success",
              showCancelButton: true,
              confirmButtonColor: "#DD6B55",
              confirmButtonText: "Ok",
              closeOnConfirm: true,
          }, function(isConfirm){
              if (isConfirm)  document.getElementById("formCrearInfoHistoricaEnModificar").submit();
              //form.submit();
          });
          });

          $('#btn_crearCargoEnModificar').on('click',function(e){
          e.preventDefault();
          var form = $(this).parents('form');
          swal({
              title: "Sistema de bomberos",
              text: "Operación exitosa",
              type: "success",
              showCancelButton: true,
              confirmButtonColor: "#DD6B55",
              confirmButtonText: "Ok",
              closeOnConfirm: true,
          }, function(isConfirm){
              if (isConfirm)  document.getElementById("formCrearInfoCargosEnModificar").submit();
              //form.submit();
          });
          });



          function cargarDatosDeMaterialSeleccionado(){
               var id = document.getElementById("cboMaterialesDisponibles").value;

               $.ajax({
                 url: "buscarMaterialMenorPorId.php",
                 type: "POST",
                 data:{"datos":id}
               }).done(function(data) {
                 console.log(data);
                 var ob=$.parseJSON(data);

                 document.getElementById("nombreDeMaterialAAsignar").value = ob.nombre;
                 document.getElementById("marcaDeMaterialAAsignar").value = ob.fabricante;



               });
             }

</script>



  </body>
</html>
