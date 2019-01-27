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
      <a class="navbar-brand" href="#">Sistema Bomberos</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Bomberos <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="CrearFicha.php">Crear</a></li>
            <li><a href="verFicha.php">Ver Ficha</a></li>
            <li><a href="buscarBombero.php">Buscar</a></li>
            <li><a href="modificarBombero.php">Modificar</a></li>
          </ul>
        </li>
      </ul>

      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Unidades <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="crearUnidades.php">Crear</a></li>
            <li><a href="verUnidades.php">Ver Unidades</a></li>
            <li><a href="modificarUnidades.php">Modificar</a></li>
            <li><a href="reporteUnidad.php">Reporte</a></li>
          </ul>
        </li>
      </ul>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br><br>
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
        $data = new Data();

        session_start();
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

        if($_SESSION["infoFamiliarSolicitada"]!=null){
          $infoFamiliar=$_SESSION["infoFamiliarSolicitada"];
        }

        if($_SESSION["infoAcademicaSolicitada"]!=null){
          $infoAcademica=$_SESSION["infoAcademicaSolicitada"];
        }

        if($_SESSION["infoEntrenamientoEstandarSolicitada"]!=null){
          $infoEntrenamientoEstandar=$_SESSION["infoEntrenamientoEstandarSolicitada"];
        }

        if($_SESSION["infoHistoricaSolicitada"]!=null){
          $infoHistorica=$_SESSION["infoHistoricaSolicitada"];
        }









    ?>
    <style>

    #transparencia{
        opacity: .80;
        -moz-opacity: .80;
        filter: alpha(opacity=80);

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

                         Talla Chaqueta/camisa : <input class="form-control" value="<?php echo $infoMedidas->getTallaChaquetaCamisa();?>" type="text" name="txtchaqueta" disabled>
                         Talla Pantalón: <input class="form-control" value="<?php echo $infoMedidas->getTallaPantalon();?>" type="text" name="txtpantalon" disabled>
                         Talla buzo: <input class="form-control" value="<?php echo $infoMedidas->getTallaBuzo();?>" type="text" name="txtbuzo" disabled>
                         talla Calzado: <input class="form-control" value="<?php echo $infoMedidas->getTallaCalzado();?>" type="text" name="txtcalzado" disabled>
                         Altura :<input class="form-control" value="<?php echo $infoPersonal->getAlturaEnMetros();?>"  type="text" name="txtaltura" disabled>
                         Peso: <input class="form-control" value="<?php echo $infoPersonal->getPeso();?>"  type="text" name="txtpeso" disabled>
                         Perteneció a Brigada Juvenil? <input class="form-control" value="<?php echo $infoPersonal->getPertenecioABrigadaJuvenil();?>"  type="text" name="txtbrigada" disabled>
                         Instructor: <input class="form-control" value="<?php echo $infoPersonal->getEsInstructor();?>"  type="text" name="txtinstructor" disabled>

                       </div>
                       <div class="col-md-5" style="margin-left: 50px;">
                         Rut: <input class="form-control" value="<?php echo $infoPersonal->getRutInformacionPersonal();?>"  type="text" name="txtRut" disabled>
                         Nombre: <input class="form-control" value="<?php echo $infoPersonal->getNombreInformacionPersonal();?>" type="text" name="txtNombre" disabled>
                         Apellido Paterno: <input class="form-control" value="<?php echo $infoPersonal->getApellidoPaterno();?>" type="text" name="txtApePa" disabled>
                         Apellido Materno: <input class="form-control" value="<?php echo $infoPersonal->getApellidoMaterno();?>" name="txtApeMa" disabled>
                         Fecha Nacimiento: <input class="form-control" value="<?php echo $infoPersonal->getFechaNacimiento();?>" name="txtFecha" type="date" disabled>
                         Estado Civil:
                         <select class="form-control" name="cboEstadoCivil" disabled>
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
                         Dirección: <input class="form-control" value="<?php echo $infoPersonal->getDireccionPersonal();?>" Type="text" name="txtDireccion" disabled>
                         Teléfonos:  <input class="form-control" value="<?php echo $infoPersonal->getTelefonoFijo();?>" type="text" name="txtTelefonos" disabled>
                         Email: <input class="form-control" value="<?php echo $infoPersonal->getEmail();?>" type="text" name="txtemail" disabled>
                         Genero:
                         <select class="form-control" name="cboGenero" disabled>
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

                             <!--     <button class="btn button-primary" style="width: 150px;"> <a href="Mantenedor.php" style="text-decoration:none;color:black;">Volver</a> </button>-->

                         </center>


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
                         Región : <!-- <input class="form-control" type="text" name="txtregion"> --><!--Region del libertador bernardo ohggins-->
                         <select class="form-control" name="cboRegion" disabled>
                           <?php
                           require_once("model/Data.php");
                           require_once("model/Tbl_Region.php");
                           $d= new Data();

                           $regiones = $d->readRegiones();
                           foreach($regiones as $r => $region){
                             if($infoBomberil->getfkRegioninformacionBomberil()==$region->getIdRegion()){?>
                               <option value="<?php echo $region->getIdRegion(); ?>" selected ><?php echo $region->getNombreRegion(); ?></option>
                               <?php
                             }else{
                                 ?>
                                 <option value="<?php echo $region->getIdRegion(); ?>" ><?php echo $region->getNombreRegion(); ?></option>
                                 <?php
                               }
                             }
                             ?>
                             <?php

                             ?>
                           </select>

                         Compañía: <!-- <input class="form-control" type="text" name="txtcompania"> --> <!--Combobox-->
                         <!-- <input class="form-control" value="<?php /*echo $infoBomberil->getfkCompaniainformacionBomberil();*/?>" type="text" name="txtcompania" disabled> -->
                         <select name="txtcompania" style="width:175px; height:30px;" disabled>
                           <?php
                               $companias = $data->readSoloCompanias();
                               foreach ($companias as $c => $compania) {
                               if($infoBomberil->getfkCompaniainformacionBomberil()==$compania->getIdEntidadACargo()){?>
                                 <option value="<?php echo $compania->getIdEntidadACargo(); ?>" selected ><?php echo $compania->getNombreEntidadACargo(); ?></option>
                                 <?php
                               }else{
                                   ?>
                                   <option value="<?php echo $compania->getIdEntidadACargo(); ?>" ><?php echo $compania->getNombreEntidadACargo(); ?></option>
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
                         <input class="form-control" value="<?php echo $infoBomberil->getfechaIngresoinformacionBomberil();?>" type="date" name="txtfingreso" disabled>
                         Nº Reg.General: <input class="form-control" value="<?php echo $infoBomberil->getNRegGeneralinformacionBomberil();?>" type="text" name="txtgeneral" disabled>
                       </div>
                       <div class="col-md-6">
                         Cuerpo: <input class="form-control" value="<?php echo $infoBomberil->getcuerpoInformacionBomberil();?>" type="text" name="txtcuerpo" disabled>
                         Cargo: <!-- <input class="form-control" type="text" name="txtcargo"> -->
                         <select class="form-control" name="cboCargo" disabled>
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
                         <select class="form-control" name="cboEstadoBombero" disabled>
                           <?php
                           require_once("model/Data.php");
                           require_once("model/Tbl_EstadoBombero.php");
                           $d= new Data();

                           $estados = $d->readEstadosDeBomberos();
                           foreach($estados as $e => $estado){
                             if($infoBomberil->getfkEstadoinformacionBomberil()==$estado->getIdEstado()){?>
                               <option value="<?php echo $estado->getIdEstado(); ?>" selected ><?php echo $estado->getNombreEstado(); ?></option>
                               <?php
                             }else{
                                 ?>
                                 <option value="<?php echo $estado->getIdEstado(); ?>" ><?php echo $estado->getNombreEstado(); ?></option>
                                 <?php
                               }
                             }
                             ?>
                             <?php

                             ?>
                           </select>

                         Nº Reg.Cia: <input class="form-control" value="<?php echo $infoBomberil->getNRegCiainformacionBomberil();?>" name="txtcia" disabled>
                         <br>
                             <!--     <button class="btn button-primary" style="width: 150px;"> <a href="Mantenedor.php" style="text-decoration:none;color:black;">Volver</a> </button>-->

                         </center>

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

                         Nombre Empresa : <input class="form-control" value="<?php echo $infoLaboral->getnombreEmpresainformacionLaboral();?>" type="text" name="txtnomempresa" disabled>
                         Dirección Empresa: <input class="form-control" value="<?php echo $infoLaboral->getdireccionEmpresainformacionLaboral();?>" type="text" name="txtdirecempresa" disabled>
                         Teléfono Empresa: <input class="form-control" value="<?php echo $infoLaboral->gettelefonoEmpresainformacionLaboral();?>" type="text" name="txttlfempresa" disabled>
                         Fecha Ingreso: <input class="form-control" value="<?php echo $infoLaboral->getfechaIngresoEmpresainformacionLaboral();?>" type="date" name="txfingresoempresa" disabled>
                         cargo : <input class="form-control" value="<?php echo $infoLaboral->getcargoEmpresainformacionLaboral();?>" type="text" name="txtcargo" disabled>

                       </div>
                       <div class="col-md-5">

                         Area/Depto de trabajo: <input class="form-control" value="<?php echo $infoLaboral->getareaDeptoEmpresainformacionLaboral();?>" type="text" name="txtareatrabajo" disabled>
                         AFP: <input class="form-control" value="<?php echo $infoLaboral->getafp_informacionLaboral();?>" type="text" name="txtafp" disabled>
                         Profesión: <input class="form-control" value="<?php echo $infoLaboral->getprofesion_informacionLaboral();?>" name="txtprofesion" disabled>
                         <br>
                             <!--     <button class="btn button-primary" style="width: 150px;"> <a href="Mantenedor.php" style="text-decoration:none;color:black;">Volver</a> </button>-->

                         </center>

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
                         Prestación Médica : <input class="form-control"  value="<?php echo $infoMedica1->getprestacionMedica_informacionMedica1();?>" type="text" name="txtpresmedica" disabled>
                         Alergias: <input class="form-control"  value="<?php echo $infoMedica1->getalergias_informacionMedica1();?>" type="text" name="txtalergias" disabled>
                         Enfermedades Crónicas: <input class="form-control"  value="<?php echo $infoMedica1->getenfermedadesCronicasinformacionMedica1();?>" type="text" name="txtenfermedadescronicas" disabled>
                         Medicamentos Habituales: <input class="form-control"  value="<?php echo $infoMedica2->getmedicamentosHabitualesinformacionMedica2();?>" type="text" name="txtmedicamentosHabituales" disabled>
                         Nombre del Contacto: <input class="form-control"  value="<?php echo $infoMedica2->getnombreContactoinformacionMedica2();?>" type="text" name="txtnomContacto" disabled>
                         Teléfono del Contacto : <input class="form-control"  value="<?php echo $infoMedica2->gettelefonoContactoinformacionMedica2();?>" type="text" name="txttlfcontacto" disabled>

                       </div>
                       <div class="col-md-6">

                         Parentesco del Contacto: <!-- <input class="form-control" type="text" name="txtparentesco"> -->
                         <select class="form-control" name="cboParentesco1" disabled>
                           <?php
                           require_once("model/Data.php");
                           require_once("model/Tbl_Parentesco.php");
                           $d= new Data();

                           $parentescos = $d->readParentescos();
                           foreach($parentescos as $p => $parentesco){
                             if($infoMedica2->getfkParentescoContactoinformacionMedica2()==$parentesco->getIdParentesco()){?>
                               <option value="<?php echo $parentesco->getIdParentesco(); ?>" selected ><?php echo $parentesco->getNombreParentesco(); ?></option>
                               <?php
                             }else{
                                 ?>
                                 <option value="<?php echo $parentesco->getIdParentesco(); ?>" ><?php echo $parentesco->getNombreParentesco(); ?></option>
                                 <?php
                               }
                             }
                             ?>
                             <?php

                             ?>
                           </select>
                         Nivel de Actividad Fisica: <input class="form-control"  value="<?php echo $infoMedica2->getnivelActividadFisicainformacionMedica2();?>" type="text" name="txtactvfisica" disabled>
                         <?php
                         $donanteChequeado="checked";
                         $fumadorChequeado="checked";
                        if($infoMedica2->getesDonanteinformacionMedica2()==FALSE){
                          $donanteChequeado="";
                        }
                        if($infoMedica2->getesFumadorinformacionMedica2()==FALSE){
                          $fumadorChequeado="";
                        }


                         ?>
                         Donante:  <input class="form-control" type="checkbox" <?php echo $donanteChequeado;?> name="txtdonante" disabled>
                         Fumador: <input class="form-control" type="checkbox" <?php echo $fumadorChequeado;?> name="txtfumador" disabled>
                         Grupo Sanguineo: <!-- <input class="form-control" type="text" name="txtgruposanguineo"> -->
                         <select class="form-control" name="cboGrupoSanguineo" disabled>
                           <?php
                           require_once("model/Data.php");
                           require_once("model/Tbl_GrupoSanguineo.php");
                           $d= new Data();

                           $grupos = $d->readGruposSanguineos();
                           foreach($grupos as $g => $grupo){

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
                               <!--     <button class="btn button-primary" style="width: 150px;"> <a href="Mantenedor.php" style="text-decoration:none;color:black;">Volver</a> </button>-->

                           </center>

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

                         <table class="table table-striped">
                             <thead>
                               <tr>
                                 <th>Fecha</th>
                                 <th>Actividad</th>
                                 <th>Estado</th>
                               </tr>
                             </thead>
                             <tbody>
                               <?php
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



                             <table class="table table-striped">
                                 <thead>
                                   <tr>
                                     <th>Fecha</th>
                                     <th>Actividad</th>
                                     <th>Estado</th>
                                   </tr>
                                 </thead>
                                 <tbody>
                                   <?php
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
                                </tr>


                                   <?php
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
               <br>
               <br>

      <!--       <div class="col-md-13">
                   <button type="button" class="btn btn-default col-md-7" data-toggle="collapse" data-target="#servicio">
                       Asistencia Actos de Servicio
                   </button>
               </div>
               <div class="col-md-7 collapse" id="servicio">
                   <div class="panel panel-primary">
                       <div class="panel-heading panel-title">
                         Asistencia Actos de Servicio
                       </div>
                       <div class="panel-body">
                           <div class="col-sm-6">

                             Cuerpo: <input class="form-control" type="text" name="txtcuerpo">
                             Año: <input class="form-control" type="date" name="txtanio">
                             Mes: <input class="form-control" type="text" name="txtmes">
                             Cantidad Mensual: <input class="form-control" type="date" name="txtCantmensual">

                             <table class="table table-striped">
                                 <thead>
                                   <tr>
                                     <th>Cuerpo</th>
                                     <th>Año</th>
                                     <th>Mes</th>
                                     <th>Cantidad Mensual</th>
                                   </tr>
                                 </thead>
                                 <tbody>
                                   <tr>
                                     <td>John</td>
                                     <td>Doe</td>
                                     <td>john@example.com</td>
                                     <td>sadsda</td>
                                   </tr>

                                 </tbody>
                               </table>

                          </div>
                          <div class="col-md-6">
                             <br><br><br><br><br><br><br><br><br>
                              <center> <input type="submit" name="btninfoServicio" value="Guardar" class="btn button-primary" style="width: 150px;"> <span ></span>

                              </center>

                          </div>
                       </div>

                   </div>
               </div>  -->

                 <!-- INFORMACION servicio -->


<!--  </div>-->

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

  </body>
</html>
