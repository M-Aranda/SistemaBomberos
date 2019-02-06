<!DOCTYPE html>




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
              <li><a href="crearUnidades.php">Crear</a></li>
              <li><a href="buscarUnidades.php">Buscar Unidades</a></li>
              <li><a href="reporteUnidad.php">Reporte</a></li>
              <li><a href="bitacoraUnidad.php">Bitacora</a></li>
              <li><a href="buscarBitacora.php">Buscar Bitacora</a></li>

            </ul>
          </li>
        </ul>

        <ul class="nav navbar-nav">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Inventario <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="crearInventario.php">Crear</a></li>
              <li><a href="buscarInventario.php">Buscar </a></li>
              <li><a href="reporteInventario.php">Reporte </a></li>


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



    ?>
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


          <div style="margin-left:100px;">
             <div class="col-md-20">
               <button type="button" class="btn btn-default col-md-11" data-toggle="collapse" data-target="#antecedentes">
                   Información Personal
               </button>
           </div>

           <div class="col-md-11 collapse" id="antecedentes">
               <div class="panel panel-primary">
                   <div class="panel-heading panel-title">
                       Información Personal
                   </div>
                   <div class="panel-body">

                       <div class="col-sm-5" >
                         <div style="margin-left: 0px;">
                           <img src="images/avatar_opt.jpg">
                         </div>
                         <form action="controlador/ActualizarInfoPersonal.php" method="post">
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
                         Rut: <input class="form-control" value="<?php echo $infoPersonal->getRutInformacionPersonal();?>"  type="text" name="txtRut" >
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
                         <center> <input type="submit" name="btnInfoPersonal" value="Modificar" class="btn button-primary" style="width: 150px;"> <span ></span>
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
           <div class="col-md-20">
               <button type="button" class="btn btn-default col-md-11" data-toggle="collapse" data-target="#bomberil">
                   Información Bomberil
               </button>
           </div>
           <div class="col-md-11 collapse" id="bomberil">
               <div class="panel panel-primary">
                   <div class="panel-heading panel-title">
                       Información Bomberil
                   </div>
                   <div class="panel-body">
                       <div class="col-sm-6">


                         <form action="controlador/actualizarInformacionBomberil.php" method="post">
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
                         <select name="compania" style="width:175px; height:30px;" >
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
                         <br>
                         Fecha Ingreso:
                         <br>
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
                         <center> <input type="submit" name="btnInfoBomberil" value="Modificar" class="btn button-primary" style="width: 150px;"> <span ></span>
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
           <div class="col-md-20">
               <button type="button" class="btn btn-default col-md-11" data-toggle="collapse" data-target="#laboral">
                   Información Laboral
               </button>
           </div>
           <div class="col-md-11 collapse" id="laboral">
               <div class="panel panel-primary">
                   <div class="panel-heading panel-title">
                       Información Laboral
                   </div>
                   <div class="panel-body">
                       <div class="col-sm-5">

                         <form action="controlador/ActualizarInformacionLaboral.php" method="post">
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
                         <center> <input type="submit" name="btnInfoLaboral" value="Modificar" class="btn button-primary" style="width: 150px;"> <span ></span>
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
           <div class="col-md-20">
               <button type="button" class="btn btn-default col-md-11" data-toggle="collapse" data-target="#medica">
                   Informacion Médica
               </button>
           </div>
           <div class="col-md-11 collapse" id="medica">
               <div class="panel panel-primary">
                   <div class="panel-heading panel-title">
                       Informacion Médica
                   </div>
                   <div class="panel-body">
                       <div class="col-sm-6">

                         <form action="controlador/actualizarInformacionMedica.php" method="post">

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

                          <input class="form-control"  value="<?php echo $infoMedica2->getnivelActividadFisicainformacionMedica2();?>" type="text" name="txtactvfisica" >
                         <?php

                         $donanteChequeado="checked";
                         $fumadorChequeado="checked";
                        if($infoMedica2->getesDonanteinformacionMedica2()==TRUE){
                          $donanteChequeado="0";
                        }
                        if($infoMedica2->getesFumadorinformacionMedica2()==TRUE){
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
                           <center> <input type="submit" name="btninfoMedica" value="Modificar" class="btn button-primary" style="width: 150px;"> <span ></span>
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
           <div class="col-md-20">
               <button type="button" class="btn btn-default col-md-11" data-toggle="collapse" data-target="#familiar">
                   Información Familiar
               </button>
           </div>
           <div class="col-md-11 collapse" id="familiar">
               <div class="panel panel-primary">
                   <div class="panel-heading panel-title">
                       Información Familiar
                   </div>
                   <div class="panel-body">


                       <div class="col-sm-6">
                         <form action="controlador/ActualizarInformacionFamiliar.php" method="post">
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
                         <input class="form-control" value="" type="hidden" id="idFamil" name="idFamil">
                         <input class="form-control" value="" type="hidden" id="idPersonalFamiliar" name="idPersonalFamiliar">
                         <center> <input type="submit" name="btninfoFamiliar" value="Modificar" class="btn button-primary" style="width: 150px;"> <span ></span>
                             <!--     <button class="btn button-primary" style="width: 150px;"> <a href="Mantenedor.php" style="text-decoration:none;color:black;">Volver</a> </button>-->

                         </center>

                         </form>





                         <!-- Nivel de actividad fisica: <input class="form-control" type="text" name="txtactvfisica"> -->
                         <table class="table table-striped">
                             <thead>
                               <tr>
                                 <th>Nombre</th>
                                 <th>Fecha de Nacimiento</th>
                                 <th>Parentesco</th>
                                 <th>Modificar</th>
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
                                 <td><input type="submit" value="Cambiar" onclick="cargarIdInfoFamiliar(<?php echo $datos->getIdInformacionFamiliar();?>, <?php echo $datos->getfkInfoPersonalinformacionFamiliar();?>)">


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



                      </div>

                   </div>

               </div>
           </div>
             <!-- INFORMACION Familiar -->
               <!-- INFORMACION academica -->
           <br>
           <br>

           <div class="col-md-20">
               <button type="button" class="btn btn-default col-md-11" data-toggle="collapse" data-target="#academica">
                   Informacion Académica
               </button>
           </div>
           <div class="col-md-11 collapse" id="academica">
               <div class="panel panel-primary">
                   <div class="panel-heading panel-title">
                       Informacion Académica
                   </div>
                   <div class="panel-body">
                       <div class="col-sm-6">
                         <form action="controlador/ActualizarInformacionAcademica.php" method="post">
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

                           <input class="form-control" value="" type="hidden" id="idAcadem" name="idAcadem">
                           <input class="form-control" value="" type="hidden" id="idPersonalAcadem" name="idPersonalAcadem">
                           <center> <input type="submit" name="btninfoAcademica" value="Modificar" class="btn button-primary" style="width: 150px;"> <span ></span>

                           </form>



                         <table class="table table-striped">
                             <thead>
                               <tr>
                                 <th>Actividad</th>
                                 <th>Fecha</th>
                                 <th>Estado</th>
                                 <th>Modificar</th>
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

                               <td><input type="submit" value="Modificar" onclick="cargarIdInfoAcademica(<?php echo $datos->getIdidInformacionAcademica();?>,<?php echo $datos->getfkInformacionPersonalInformacionAcademica();?> )"></td>
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
                              <!--     <button class="btn button-primary" style="width: 150px;"> <a href="Mantenedor.php" style="text-decoration:none;color:black;">Volver</a> </button>-->

                          </center>

                      </div>
                   </div>

               </div>
             </div>
               <!-- INFORMACION academica -->
                 <!-- INFORMACION estandar -->
               <br>
               <br>

               <div class="col-md-20">
                   <button type="button" class="btn btn-default col-md-11" data-toggle="collapse" data-target="#estandar">
                       Información Entrenamiento Estandar
                   </button>
               </div>
               <div class="col-md-11 collapse" id="estandar">
                   <div class="panel panel-primary">
                       <div class="panel-heading panel-title">
                           Información Estandar
                       </div>
                       <div class="panel-body">
                           <div class="col-sm-6">
                             <form action="controlador/ActualizarInfoEntrenamientoEstandar.php" method="post">
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
                               <input class="form-control" value="" type="hidden" id="idEntrenEstandar" name="idEntrenEstandar">
                               <input class="form-control" value="" type="hidden" id="idPersonalEntrenamientoEstandar" name="idPersonalEntrenamientoEstandar">
                               <center> <input type="submit" name="btninfoEstandar" value="Modificar" class="btn button-primary" style="display: none; "> <span ></span>

                             </form>


                             <table class="table table-striped">
                                 <thead>
                                   <tr>
                                     <th>Actividad</th>
                                     <th>Fecha</th>
                                     <th>Estado</th>
                                     <th>Modificar</th>
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
                                     <td><input type="submit" value="Modificar" onclick="cargarIdInfoEntrenamientoEstandar(<?php echo $datos->getIdEntrenamientoEstandar();?>,<?php echo $datos->getFkInformacionPersonal();?> )"></td>

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

                              </center>

                          </div>
                       </div>

                   </div>
               </div>

                 <!-- INFORMACION estandar -->
                 <!-- INFORMACION historica -->
               <br>
               <br>

               <div class="col-md-20">
                   <button type="button" class="btn btn-default col-md-11" data-toggle="collapse" data-target="#historica">
                       Información Histórica
                   </button>
               </div>
               <div class="col-md-11 collapse" id="historica">
                   <div class="panel panel-primary">
                       <div class="panel-heading panel-title">
                           Información Histórica
                       </div>
                       <div class="panel-body" style="margin-left: -20px;">
                           <div class="col-sm-6">
                             <form action="controlador/ActualizarInformacionHistorica.php" method="post">

                             Región:
                             <select class="form-control" name="cboRegion" >
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
                             Compañia:<input type="text" name="txtCompaniaHistorica" class="form-control" >
                             Fecha: <input type="date" name="txtfechaHistorica" class="form-control" >
                             Premio: <input type="text" name="txtPremioInforHistorica" class="form-control" >
                             Cargo: <input type="text" name="txtcargoHistorica" class="form-control" >
                             Motivo: <input type="text" name="txtmotivoHistorico" class="form-control" >
                             Detalle: <input type="text" name="txtdetalleHistorico" class="form-control" >

                             <input type="hidden" name="idHistorica" id="idHistorica" class="form-control" >
                             <input type="hidden" name="idPersonalHistorica" id="idPersonalHistorica" class="form-control" >

                             <center> <input type="submit" name="btninfohistorica" value="Modificar" class="btn button-primary" style="width: 150px;"> <span ></span>

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
                                     <th>Modificar</th>
                                   </tr>
                                 </thead>
                                 <tbody>
                                   <?php
                                   if(isset($infoHistorica)){
                                   foreach ($infoHistorica as $iHistorica => $info) {
                                ?>
                                <tr>
                                  <td><?php echo $d->buscarNombreDeRegionPorId($info->getfkRegioninformacionHistorica());   ?></td>
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
                                  <td><input type="submit" value="Modificar" onclick="cargarIdInfoHistorica(<?php echo $info->getIdInformacionHistorica();?>, <?php echo $info->getfkInfoPersonalinformacionHistorica();?> )"></td>
                                </tr>


                                   <?php
                                 }
                                 }
                                     ?>


                                 </tbody>
                               </table>

                          </div>

                          <div class="col-md-6">
                             <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                                  <!--     <button class="btn button-primary" style="width: 150px;"> <a href="Mantenedor.php" style="text-decoration:none;color:black;">Volver</a> </button>-->

                              </center>

                          </div>



                       </div>

                   </div>
               </div>
                 <!-- INFORMACION historica -->
                   <!-- INFORMACION servicio -->
                   <div class="col-md-20">
                       <button type="button" class="btn btn-default col-md-11" data-toggle="collapse" data-target="#cargos">
                           Información de Cargos
                       </button>
                   </div>
                   <div class="col-md-11 collapse" id="cargos">
                       <div class="panel panel-primary">
                           <div class="panel-heading panel-title">
                             <form action="controlador/CrearInformacionHistorica.php" method="post">
                               Información de Cargos
                           </div>
                           <div class="panel-body" style="margin-left: -20px;">
                               <div class="col-sm-6">
                                 <table class="table table-striped">
                                     <thead>
                                       <tr>
                                         <th>Nombre</th>
                                         <th>Marca</th>
                                         <th>Talla</th>
                                         <th>Serie</th>
                                         <th>Fecha</th>
                                       </tr>
                                     </thead>
                                     <tbody>
                                       <?php
                                       if(isset($infoCargos)){

                                       foreach ($infoCargos as $icargos => $datos) {
                                       ?>
                                       <tr>
                                         <td><?php echo $datos->getNombre_informacionDeCargos();?></td>
                                         <td><?php echo $datos->getMarca_informacionDeCargos();?></td>
                                         <td><?php echo $datos->getTalla_informacionDeCargos();?></td>
                                         <td><?php echo $datos->getSerie_informacionDeCargos();?></td>
                                         <td><?php
                                         $fechaSinConvertir = $datos->getFecha_informacionDeCargos();
                                         $fechaConvertida = date("d-m-Y", strtotime($fechaSinConvertir));
                                         echo $fechaConvertida;?></td>
                                    <?php
                                     }
                                     }
                                       ?>
                                       </tr>

                                     </tbody>
                                   </table>
                              </div>
                              <div class="col-md-6">
                                 <br><br><br><br><br><br><br><br><br><br><br>

                                </form>

                              </div>
                           </div>

                       </div>
                   </div>
               <br>
               <br>



</div>


          </div>

   </div>
 </div>

<?php
/*
unset($_SESSION["infoPersonalSolicitada"]);
unset($_SESSION["infoMedidasSolicitada"]);
unset($_SESSION["infoBomberilSolicitada"]);
unset($_SESSION["infoLaboralSolicitada"]);
unset($_SESSION["infoMedica1Solicitada"]);
unset($_SESSION["infoMedica2Solicitada"]);
unset($_SESSION["infoFamiliarSolicitada"]);
unset($_SESSION["infoAcademicaSolicitada"]);
unset($_SESSION["infoEntrenamientoEstandarSolicitada"]);
unset($_SESSION["infoHistoricaSolicitada"]);
*/


?>

<script src="javascript/JQuery.js"></script>
<script>

function cargarIdInfoFamiliar(id, fkPersonal) {
            document.getElementById("idFamil").value=id;
            document.getElementById("idPersonalFamiliar").value=fkPersonal;

            alert("Utilize los 3 campos de arriba para ingresar la nueva información");

          }



          function cargarIdInfoAcademica(id, fkPersonal) {
                      document.getElementById("idAcadem").value=id;
                      document.getElementById("idPersonalAcadem").value=fkPersonal;


                    }


                    function cargarIdInfoEntrenamientoEstandar(id, fkPersonal) {
                                document.getElementById("idEntrenEstandar").value=id;
                                document.getElementById("idPersonalEntrenamientoEstandar").value=fkPersonal;


                              }

                      function cargarIdInfoHistorica(id, fkPersonal) {
                            document.getElementById("idHistorica").value=id;
                            document.getElementById("idPersonalHistorica").value=fkPersonal;

                              }


/*
                                  $("form").submit(function(){
                                    alert("Operación exitosa");
                                    });

*/






</script>



  </body>
</html>
