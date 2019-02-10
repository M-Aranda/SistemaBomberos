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


   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/inputmask/inputmask.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/jquery.inputmask.bundle.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/css/inputmask.min.css" rel="stylesheet"/>


  </head>

  <?php
  require_once("model/Data.php");
  require_once("model/Tbl_Usuario.php");
  $dataUsuario= new Data();
  session_start();
  if($_SESSION["usuarioIniciado"]!=null){
    $u=$_SESSION["usuarioIniciado"];
    if($dataUsuario->verificarSiUsuarioTienePermiso($u,2)==0){
      header("location: paginaError.php");
    }
  }


if(isset($_SESSION['idDeBomberoMasReciente'])){
  $idDeBomberoMasReciente=$_SESSION['idDeBomberoMasReciente'];
}

if(isset($_SESSION['seEstaModificandoUBombero'])){
  unset($_SESSION['seEstaModificandoUBombero']);
}


  ?>



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
    <?php
        // unir vista con el modelo sin pasar por un controlador
        require_once("model/Data.php");
        $data = new Data();

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
                         <form action="controlador/CrearInfoPersonal.php" method="post">
                         Talla Chaqueta/camisa : <input class="form-control" type="text" name="txtchaqueta" required>
                         Talla Pantalón: <input class="form-control" type="text" name="txtpantalon" required>
                         Talla buzo: <input class="form-control" type="text" name="txtbuzo" required>
                         talla Calzado: <input class="form-control" type="text" name="txtcalzado" required>
                         Altura :<input class="form-control" type="text" name="txtaltura" required>
                         Peso: <input class="form-control" type="text" name="txtpeso" required>
                         Perteneció a Brigada Juvenil? <input class="form-control" type="text" name="txtbrigada" required>
                         Instructor: <input class="form-control" type="text" name="txtinstructor" required>

                       </div>
                       <div class="col-md-5" style="margin-left: 50px;">
                         Rut: <input class="form-control" type="text" name="txtRut" required onblur= "this.value = this.value.replace( /^(\d{2})(\d{3})(\d{3})(\w{1})$/, '$1.$2.$3-$4')">
                         Nombre: <input class="form-control" type="text" id="nombreDeBomberoACrear" name="txtNombre" required>
                         Apellido Paterno: <input class="form-control" type="text" name="txtApePa" required>
                         Apellido Materno: <input class="form-control" name="txtApeMa" required>
                         Fecha Nacimiento: <input class="form-control" name="txtFecha" type="date" required>
                         Estado Civil:
                         <select class="form-control" name="cboEstadoCivil">
                         <?php

                         require_once("model/Data.php");
                         require_once("model/Tbl_EstadoCivil.php");
                         $d= new Data();

                         $estadosCiviles = $d->readEstadosCiviles();
                         foreach($estadosCiviles as $e => $estado){
                         ?>
                         <option value="<?php echo $estado->getIdEstadoCivil(); ?>"><?php echo $estado->getNombreEstadoCivil(); ?></option>
                         <?php
                         }
                         ?>
                         </select>
                         Dirección: <input class="form-control" Type="text" name="txtDireccion" required>
                         Teléfonos:  <input class="form-control" type="text" name="txtTelefonos" required>
                         Email: <input class="form-control" type="text" name="txtemail" required>
                         Genero:
                         <select class="form-control" name="cboGenero">
                           <?php
                           require_once("model/Data.php");
                           require_once("model/Tbl_Genero.php");
                           $d= new Data();

                           $generos = $d->readGeneros();
                           foreach($generos as $g => $genero){
                           ?>
                           <option value="<?php echo $genero->getIdGenero(); ?>"><?php echo $genero->getNombreGenero(); ?></option>
                           <?php
                           }
                           ?>
                           </select>
                           <br>
                         <center> <input type="submit" name="btnInfoPersonal" value="Guardar" class="btn button-primary" style="width: 150px;" onclick="msg()"> <span ></span>

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
                     <form action="controlador/CrearInformacionBomberil.php" method="post">
                       Información Bomberil
                   </div>
                   <div class="panel-body">
                       <div class="col-sm-6">
                         Creando ficha para: <?php
                         if(isset($idDeBomberoMasReciente)){
                           echo utf8_encode($d->getNombreBomberoPorId($idDeBomberoMasReciente));
                         }
                          ?>
                          <br>
                         Región :
                         <select class="form-control" name="cboRegion">
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

                         Compañía: <!-- <input class="form-control" type="text" name="txtcompania"> --> <!--Combobox-->
                         <select name="compania" style="width:175px; height:30px;">
                           <?php
                               $compania = $data->readSoloCompanias();
                               foreach ($compania as $c) {
                                   echo "<option value='".$c->getIdEntidadACargo()."'>";
                                       echo utf8_encode($c->getNombreEntidadACargo());
                                   echo"</option>";
                               }
                           ?>

                         </select>
                         <br>
                         Fecha Ingreso: <input class="form-control" type="date" name="txtfingreso" required>
                         Nº Reg.General: <input class="form-control" type="number" name="txtgeneral" required min="1" pattern="^[0-9]+" onkeydown="javascript: return event.keyCode == 69 ? false : true" >
                       </div>
                       <div class="col-md-6">
                         Cuerpo: <input class="form-control" type="text" name="txtcuerpo" required>
                         Cargo:
                         <select class="form-control" name="cboCargo">
                           <?php
                           require_once("model/Data.php");
                           require_once("model/Tbl_Cargo.php");
                           $d= new Data();

                           $cargos = $d->readCargos();
                           foreach($cargos as $c => $cargo){
                           ?>
                           <option value="<?php echo $cargo->getIdCargo(); ?>"><?php echo $cargo->getNombreCargo(); ?></option>
                           <?php
                           }
                           ?>
                           </select>

                         Estado:
                         <select class="form-control" name="cboEstadoBombero">
                           <?php
                           require_once("model/Data.php");
                           require_once("model/Tbl_EstadoBombero.php");
                           $d= new Data();

                           $estados = $d->readEstadosDeBomberos();
                           foreach($estados as $e => $estado){
                           ?>
                           <option value="<?php echo $estado->getIdEstado(); ?>"><?php echo utf8_encode($estado->getNombreEstado()); ?></option>
                           <?php
                           }
                           ?>
                           </select>
                         Nº Reg.Cia: <input class="form-control" type="number" name="txtcia" required min="1" pattern="^[0-9]+" onkeydown="javascript: return event.keyCode == 69 ? false : true">
                         <br>
                         <center> <input type="submit" name="btnInfoBomberil" value="Guardar" class="btn button-primary" style="width: 150px;"> <span ></span>
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
                     <form action="controlador/CrearInformacionLaboral.php" method="post">
                       Información Laboral
                   </div>
                   <div class="panel-body">
                       <div class="col-sm-5">
                         Creando ficha para: <?php
                         if(isset($idDeBomberoMasReciente)){
                           echo utf8_encode($d->getNombreBomberoPorId($idDeBomberoMasReciente));
                         }
                          ?>
                          <br>
                         Nombre Empresa : <input class="form-control" type="text" name="txtnomempresa" required>
                         Dirección Empresa: <input class="form-control" type="text" name="txtdirecempresa" required>
                         Teléfono Empresa: <input class="form-control" type="text" name="txttlfempresa" required>
                         Fecha Ingreso: <input class="form-control" type="date" name="txfingresoempresa" required>
                         cargo : <input class="form-control" type="text" name="txtcargo" required>

                       </div>
                       <div class="col-md-5">

                         Area/Depto de trabajo: <input class="form-control" type="text" name="txtareatrabajo" required>
                         AFP: <input class="form-control" type="text" name="txtafp" required>
                         Profesión: <input class="form-control" name="txtprofesion" required>
                         <br>
                         <center> <input type="submit" name="btnInfoLaboral" value="Guardar" class="btn button-primary" style="width: 150px;"> <span ></span>
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
                     <form action="controlador/CrearInformacionMedica.php" method="post">
                       Informacion Médica
                   </div>
                   <div class="panel-body">
                       <div class="col-sm-6">
                         Creando ficha para: <?php
                         if(isset($idDeBomberoMasReciente)){
                           echo utf8_encode($d->getNombreBomberoPorId($idDeBomberoMasReciente));
                         }
                          ?>
                          <br>
                         Prestación Médica : <input class="form-control" type="text" name="txtpresmedica" required>
                         Alergias: <input class="form-control" type="text" name="txtalergias" required>
                         Enfermedades Crónicas: <input class="form-control" type="text" name="txtenfermedadescronicas" required>
                         Medicamentos Habituales: <input class="form-control" type="text" name="txtmedicamentosHabituales" required>
                         Nombre del Contacto: <input class="form-control" type="text" name="txtnomContacto" required>
                         Teléfono del Contacto : <input class="form-control" type="text" name="txttlfcontacto" required>

                       </div>
                       <div class="col-md-6">

                         Parentesco del Contacto:
                         <select class="form-control" name="cboParentesco1">
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
                         Nivel de Actividad Fisica: <input class="form-control" type="text" name="txtactvfisica" required>
                         Donante: <input class="form-control" value="seleccionado" type="checkbox" name="txtdonante">
                         Fumador: <input class="form-control" value="seleccionado" type="checkbox" name="txtfumador">
                         Grupo Sanguineo:
                         <select class="form-control" name="cboGrupoSanguineo">
                           <?php
                           require_once("model/Data.php");
                           require_once("model/Tbl_GrupoSanguineo.php");
                           $d= new Data();

                           $gruposSanguineos = $d->readGruposSanguineos();
                           foreach($gruposSanguineos as $gs => $grupoSanguineo){
                           ?>
                           <option value="<?php echo $grupoSanguineo->getIdGrupoSanguineo(); ?>"><?php echo $grupoSanguineo->getNombreGrupoSanguineo(); ?></option>
                           <?php
                           }
                           ?>
                           </select>
                           <br>
                           <center> <input type="submit" name="btninfoMedica" value="Guardar" class="btn button-primary" style="width: 150px;"> <span ></span>

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
                     <form action="controlador/CrearInformacionFamiliar.php" method="post">
                       Información Familiar
                   </div>
                   <div class="panel-body">


                       <div class="col-sm-6">
                         Creando ficha para: <?php
                         if(isset($idDeBomberoMasReciente)){
                           echo utf8_encode($d->getNombreBomberoPorId($idDeBomberoMasReciente));
                         }
                          ?>
                          <br>
                         Nombre: <input class="form-control" type="text" name="txtnombreFamiliar" required>
                         Fecha de Nacimiento: <input class="form-control" type="date" name="txtfechafamiliar" required>
                         Parentesco:
                         <select class="form-control" name="cboParentesco2">
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

                      </div>
                      <div class="col-md-6">
                         <br><br><br><br><br><br>
                          <center> <input type="submit" name="btninfoFamiliar" value="Guardar" class="btn button-primary" style="width: 150px;"> <span ></span>
                              <!--     <button class="btn button-primary" style="width: 150px;"> <a href="Mantenedor.php" style="text-decoration:none;color:black;">Volver</a> </button>-->

                          </center>
                        </form>

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
                     <form action="controlador/CrearInformacionAcademica.php" method="post">
                       Informacion Académica
                   </div>
                   <div class="panel-body">
                       <div class="col-sm-6">
                         Creando ficha para: <?php
                         if(isset($idDeBomberoMasReciente)){
                           echo utf8_encode($d->getNombreBomberoPorId($idDeBomberoMasReciente));
                         }
                          ?>
                          <br>
                         Fecha: <input class="form-control" type="date" name="txtfechaAcademica" required>
                         Actividad: <input class="form-control" type="text" name="txtActivdidadAcademica" required>
                         Estado:
                         <select class="form-control" name="cboEstadoCursoAcademico">
                           <?php
                           require_once("model/Data.php");
                           require_once("model/Tbl_EstadoCurso.php");
                           $d= new Data();

                           $estadosDeCursos = $d->readEstadosCurso();
                           foreach($estadosDeCursos as $ec => $estado){
                           ?>
                           <option value="<?php echo $estado->getIdEstadoCurso(); ?>"><?php echo utf8_encode($estado->getNombreEstadoCurso()); ?></option>
                           <?php
                           }
                           ?>
                           </select>
                      </div>
                      <div class="col-md-6">
                         <br><br><br><br><br><br>
                          <center> <input type="submit" name="btninfoAcademica" value="Guardar" class="btn button-primary" style="width: 150px;"> <span ></span>
                              <!--     <button class="btn button-primary" style="width: 150px;"> <a href="Mantenedor.php" style="text-decoration:none;color:black;">Volver</a> </button>-->

                          </center>
                        </form>

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
                         <form action="controlador/CrearInfoEntrenamientoEstandar.php" method="post">
                           Información Estandar
                       </div>
                       <div class="panel-body">
                           <div class="col-sm-6">
                             Creando ficha para: <?php
                             if(isset($idDeBomberoMasReciente)){
                               echo utf8_encode($d->getNombreBomberoPorId($idDeBomberoMasReciente));
                             }
                              ?>
                              <br>
                             Fecha: <input class="form-control" type="date" name="txtfechaEstandar" required>
                             Actividad: <input class="form-control" type="text" name="txtActividadEntrenamientoEstandar" required>
                             Estado:
                             <select class="form-control" name="cboEstadoCursoEstandar">
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

                          </div>
                          <div class="col-md-6">
                             <br><br><br><br><br><br>
                              <center> <input type="submit" name="btninfoEstandar" value="Guardar" class="btn button-primary" style="width: 150px;"> <span ></span>
                                  <!--     <button class="btn button-primary" style="width: 150px;"> <a href="Mantenedor.php" style="text-decoration:none;color:black;">Volver</a> </button>-->

                              </center>
                            </form>

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
                         <form action="controlador/CrearInformacionHistorica.php" method="post">
                           Información Histórica
                       </div>
                       <div class="panel-body" style="margin-left: -20px;">
                           <div class="col-sm-6">
                             Creando ficha para: <?php
                             if(isset($idDeBomberoMasReciente)){
                               echo utf8_encode($d->getNombreBomberoPorId($idDeBomberoMasReciente));
                             }
                              ?>
                              <br>

                             Región:
                             <select class="form-control" name="cboxRegion">
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

                             Cuerpo: <input type="text" name="txtcuerpoHistorico" class="form-control" required>
                             Compañia:<input type="text" name="txtCompania" class="form-control" required>
                          <!--   <select name="cboxCompania" class="form-control">
                               <?php
                               require_once("model/Data.php");
                               require_once("model/Tbl_EntidadACargo.php");
                               $d= new Data();

                               $companias = $d->readSoloCompanias();
                               foreach($companias as $c => $compania){
                               ?>
                               <option value="<?php /*echo $compania->getIdEntidadACargo(); ?>"><?php echo utf8_encode($compania->getNombreEntidadACargo());*/ ?></option>
                               <?php
                               }
                               ?>
                             </select>
                           -->
                             Fecha: <input type="date" name="txtfechaCambioInfoHistorica" class="form-control" required>
                             Cargo: <input type="text" name="cboxCargo" class="form-control" required>
                             Premio: <input type="text" name="txtPremioInforHistorica" class="form-control" required>
                             Motivo: <input type="text" name="txtMotivo" class="form-control" required>
                             Detalle: <input type="text" name="txtDetalleHistorico" class="form-control" required>

                          </div>

                          <div class="col-md-6">
                             <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                              <center> <input type="submit" name="btninfohistorica" value="Guardar" class="btn button-primary" style="width: 150px;"> <span ></span>
                              </center>
                            </form>

                          </div>
                       </div>
                   </div>
               </div>
                 <!-- INFORMACION historica -->
                   <!-- INFORMACION servicio -->
               <br>
               <br>

                      <div class="col-md-20">
                          <button type="button" class="btn btn-default col-md-11" data-toggle="collapse" data-target="#cargos">
                              Información de Cargos
                          </button>
                      </div>
                      <div class="col-md-11 collapse" id="cargos">
                          <div class="panel panel-primary">
                              <div class="panel-heading panel-title">
                                <form action="controlador/CrearInformacionDeCargos.php" method="post">
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

                                      Nombre: <input type="text" class="form-control" name="txtnombrecargo">
                                      Marca: <input type="text" class="form-control" name="txtmarcacargo">
                                      Talla: <input type="text" class="form-control" name="txttalla">
                                      Serie: <input type="text" class="form-control" name="txtserie">
                                      Fecha: <input type="date" class="form-control" name="txtfechacargo">
                                      <br>

                                      Entidad a Cargo:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                       <select name="cboEntidadACargo" id="cboEntidadACargo" onchange="actualizarComboBox()" style="width:230px;">
                                           <?php
                                               $entiPropietaria = $data->getEntidadACargo();
                                               foreach ($entiPropietaria as $ep) {
                                                   echo "<option value='".$ep->getIdEntidadACargo()."'>";
                                                       echo utf8_encode($ep->getNombreEntidadACargo());
                                                   echo"</option>";
                                               }
                                           ?>
                                       </select>

                                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Ubicacion Fisica:
                                       <select name="cboxUbicacion" id="cboxUbicacion" onchange="actualizarComboBoxDeMateriales()" style="width:195px;">
                                         <?php
                                         $ubicacionesFisicas = $data->getUbicacionFisica(1);
                                         foreach ($ubicacionesFisicas as $ubi) {
                                           echo "<option value='".$ubi->getIdUbicacionFisica()."'>";
                                           echo utf8_encode($ubi->getNombreUbicacionFisica());
                                           echo"</option>";
                                         }
                                         ?>

                                       </select>
                                       <br>
                                       Material menor a asignar:
                                       <select name="cboMaterialesDisponibles" id="cboMaterialesDisponibles" style="width:195px;">
                                         <?php
                                         $materialesDisponibles = $data->getMaterialesMenoresPorFkUbicacionFisica(1);
                                         foreach ($materialesDisponibles as $mat) {
                                           echo "<option value='".$mat->getId_material_menor()."'>";
                                           echo utf8_encode($mat->getNombre_material_menor());
                                           echo"</option>";
                                         }
                                         ?>
                                       </select>
                                       <br>

                                       Cantidad asignada: <input type="number" name="cantidadDeMaterialesAsignados">

                                 </div>

                                 <div class="col-md-6">
                                    <br><br><br><br><br><br><br><br><br><br><br>
                                     <center> <input type="submit" name="btninfohistorica" value="Guardar" class="btn button-primary" style="width: 150px;"> <span ></span>

                                     </center>

                                   </form>

                                 </div>

                              </div>
                          </div>
                      </div>
                </div>
          </div>

   </div>
 </div>

 <script src="javascript/JQuery.js"></script>
 <script>
/*La siguiente funcion se activa al clickear el boton de guardar en la ficha de info personal, y puede mostrar un mensaje con una variable string.
Sin embargo, aún no estoy seguro de como implementar esto para que sea al enviar el submit. De todas formas, se muestra el mensaje de que se
intenta crear al bombero, llamandolo por su nombre, pero el mensaje de exito solo aparece si de verdad se enviaron los datos*/
 function msg(){
   var message = document.getElementById("nombreDeBomberoACrear").value;
   alert("Creando a "+ message);
 }

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

     $("form").submit(function(){
       alert("Operación exitosa")
     });


       </script>


  </body>
</html>
