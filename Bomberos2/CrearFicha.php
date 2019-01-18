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
            <li><a href="eliminarBombero.php">Eliminar</a></li>
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
            <li><a href="eliminarUnidades.php">Eliminar</a></li>
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
    margin-left: 25%;
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


  <!--  <div class="container " style="background:transparent">-->
                <!-- INFORMACION PERSONAL -->

                <div class="col-md-13">
                    <button type="button" class="btn btn-default col-md-7" data-toggle="collapse" data-target="#antecedentes">
                        Informacion Personal
                    </button>
                </div>

                <div class="col-md-7 collapse" id="antecedentes">
                    <div class="panel panel-primary">
                        <div class="panel-heading panel-title">
                            Informacion Personal
                        </div>
                        <div class="panel-body">

                            <div class="col-sm-5" >
                              <div style="margin-left: 0px;">
                                <img src="images/avatar_opt.jpg">
                              </div>
                              <form action="controlador/CrearInfoPersonal.php" method="post">
                              Talla Chaqueta/camisa : <input class="form-control" type="text" name="txtchaqueta">
                              Talla Pantalon: <input class="form-control" type="text" name="txtpantalon">
                              Talla buzo: <input class="form-control" type="text" name="txtbuzo">
                              talla Calzado: <input class="form-control" type="text" name="txtcalzado">
                              Altura :<input class="form-control" type="text" name="txtaltura">
                              Peso: <input class="form-control" type="text" name="txtpeso">
                              Pertenecio a Brigada Juvenil? <input class="form-control" type="text" name="txtbrigada">
                              Instructor: <input class="form-control" type="text" name="txtinstructor">

                            </div>
                            <div class="col-md-5" style="margin-left: 50px;">
                              Rut: <input class="form-control" type="text" name="txtRut">
                              Nombre: <input class="form-control" type="text" name="txtNombre">
                              Apellido Paterno: <input class="form-control" type="text" name="txtApePa" >
                              Apellido Materno: <input class="form-control" name="txtApeMa">
                              Fecha Nacimiento: <input class="form-control" name="txtFecha" type="date">
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
                              Dirección: <textarea class="form-control" Type="textarea" name="txtDireccion" ></textarea>
                              Telefonos:  <input class="form-control" type="text" name="txtTelefonos">
                              Email: <input class="form-control" type="text" name="txtemail">
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
                              <center> <input type="submit" value="Guardar" class="btn button-primary" style="width: 150px;"> <span ></span>
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
                <div class="col-md-13">
                    <button type="button" class="btn btn-default col-md-7" data-toggle="collapse" data-target="#bomberil">
                        Informacion Bomberil
                    </button>
                </div>
                <div class="col-md-7 collapse" id="bomberil">
                    <div class="panel panel-primary">
                        <div class="panel-heading panel-title">
                            Informacion Bomberil
                        </div>
                        <div class="panel-body">
                            <div class="col-sm-6">
                              Region : <!-- <input class="form-control" type="text" name="txtregion"> --><!--Region del libertador bernardo ohggins-->
                              <select class="form-control" name="cboRegion">
                                <?php
                                require_once("model/Data.php");
                                require_once("model/Tbl_Region.php");
                                $d= new Data();

                                $regiones = $d->readRegiones();
                                foreach($regiones as $r => $region){
                                ?>
                                <option value="<?php echo $region->getIdRegion(); ?>"><?php echo $region->getNombreRegion(); ?></option>
                                <?php
                                }
                                ?>
                                </select>
                              Compañia: <!-- <input class="form-control" type="text" name="txtcompania"> --> <!--Combobox-->
                              <select class="form-control" name="cboCompania">
                                <?php
                                require_once("model/Data.php");
                                require_once("model/Tbl_Compania.php");
                                $d= new Data();

                                $companias = $d->readCompanias();
                                foreach($companias as $c => $compania){
                                ?>
                                <option value="<?php echo $compania->getIdCompania(); ?>"><?php echo $compania->getNombreCompania(); ?></option>
                                <?php
                                }
                                ?>
                                </select>
                              Fecha Ingreso: <input class="form-control" type="date" name="txtfingreso">
                              Nº Reg.General: <input class="form-control" type="text" name="txtgeneral">
                            </div>
                            <div class="col-md-6">
                              Cuerpo: <input class="form-control" type="text" name="txtcuerpo"> <!-- Machali-->
                              Cargo: <!-- <input class="form-control" type="text" name="txtcargo"> -->
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

                              Estado: <!-- <input class="form-control" type="text" name="txtestado" > --> <!--Combobox -->
                              <select class="form-control" name="cboEstadoBombero">
                                <?php
                                require_once("model/Data.php");
                                require_once("model/Tbl_EstadoBombero.php");
                                $d= new Data();

                                $estados = $d->readEstadosDeBomberos();
                                foreach($estados as $e => $estado){
                                ?>
                                <option value="<?php echo $estado->getIdEstado(); ?>"><?php echo $estado->getNombreEstado(); ?></option>
                                <?php
                                }
                                ?>
                                </select>
                              Nº Reg.Cia: <input class="form-control" name="txtcia">

                            </div>
                        </div>
                    </div>
                </div>
                <!-- INFORMACION bomberilL -->
                <!-- INFORMACION laboral -->
                <br>
                <br>
                <div class="col-md-13">
                    <button type="button" class="btn btn-default col-md-7" data-toggle="collapse" data-target="#laboral">
                        Informacion Laboral
                    </button>
                </div>
                <div class="col-md-7 collapse" id="laboral">
                    <div class="panel panel-primary">
                        <div class="panel-heading panel-title">
                            Informacion Laboral
                        </div>
                        <div class="panel-body">
                            <div class="col-sm-5">
                              Nombre Empresa : <input class="form-control" type="text" name="txtnomempresa">
                              Direccion Empresa: <textarea class="form-control" type="text" name="txtdirecempresa"></textarea>
                              Telefono Empresa: <input class="form-control" type="text" name="txttlfempresa">

                            </div>
                            <div class="col-md-5">
                              Fecha Ingreso: <input class="form-control" type="date" name="txfingresoempresa">
                              Area/Depto de trabajo: <input class="form-control" type="text" name="txtareatrabajo">
                              AFP: <input class="form-control" type="text" name="txtafp" >
                              Profesion: <input class="form-control" name="txtprofesion">

                            </div>
                        </div>
                    </div>
                </div>
                <!-- INFORMACION laboral -->
                <!-- INFORMACION medica -->
                <br>
                <br>
                <div class="col-md-13">
                    <button type="button" class="btn btn-default col-md-7" data-toggle="collapse" data-target="#medica">
                        Informacion Medica
                    </button>
                </div>
                <div class="col-md-7 collapse" id="medica">
                    <div class="panel panel-primary">
                        <div class="panel-heading panel-title">
                            Informacion Medica
                        </div>
                        <div class="panel-body">
                            <div class="col-sm-6">
                              Prestacion Medica : <input class="form-control" type="text" name="txtpresmedica">
                              Alergias: <input class="form-control" type="text" name="txtalergias">
                              Enfermedades Cronicas: <input class="form-control" type="text" name="txtenfermedadescronicas">
                              Medicamentos Habituales: <input class="form-control" type="text" name="txtalergias">
                              Nombre del Contacto: <input class="form-control" type="text" name="txtnomContacto">

                            </div>
                            <div class="col-md-6">
                              Telefono del Contacto : <input class="form-control" type="text" name="txttlfcontacto">
                              Parentesco del Contacto: <!-- <input class="form-control" type="text" name="txtparentesco"> -->
                              <select class="form-control" name="cboParentesco1">
                                <?php
                                require_once("model/Data.php");
                                require_once("model/Tbl_Parentesco.php");
                                $d= new Data();

                                $parentescos = $d->readParentescos();
                                foreach($parentescos as $p => $parentesco){
                                ?>
                                <option value="<?php echo $parentesco->getIdParentesco(); ?>"><?php echo $parentesco->getNombreParentesco(); ?></option>
                                <?php
                                }
                                ?>
                                </select>
                              Nivel de Actividad Fisica: <input class="form-control" type="text" name="txtactvfisica">
                              Donante: <input class="form-control" type="text" name="txtdonante">
                              Fumador: <input class="form-control" type="text" name="txtfumador">
                              Grupo Sanguineo: <!-- <input class="form-control" type="text" name="txtgruposanguineo"> -->
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

                            </div>
                        </div>
                    </div>
                </div>
                <!-- INFORMACION medica -->
                <!-- INFORMACION Familiar -->
                <br>
                <br>
                <div class="col-md-13">
                    <button type="button" class="btn btn-default col-md-7" data-toggle="collapse" data-target="#familiar">
                        Informacion Familiar
                    </button>
                </div>
                <div class="col-md-7 collapse" id="familiar">
                    <div class="panel panel-primary">
                        <div class="panel-heading panel-title">
                            Informacion Familiar
                        </div>
                        <div class="panel-body">


                            <div class="col-sm-6">
                              Nombre: <input class="form-control" type="text" name="txttlfcontacto">
                              Fecha de Nacimiento: <input class="form-control" type="date" name="fechaNacPariente">
                              Parentesco:
                              <select class="form-control" name="cboParentesco2">
                                <?php
                                require_once("model/Data.php");
                                require_once("model/Tbl_Parentesco.php");
                                $d= new Data();

                                $parentescos = $d->readParentescos();
                                foreach($parentescos as $p => $parentesco){
                                ?>
                                <option value="<?php echo $parentesco->getIdParentesco(); ?>"><?php echo $parentesco->getNombreParentesco(); ?></option>
                                <?php
                                }
                                ?>
                                </select>
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
                                    <tr>
                                      <td>John</td>
                                      <td>Doe</td>
                                      <td>john@example.com</td>
                                    </tr>

                                  </tbody>
                                </table>

                           </div>
                        </div>

                    </div>
                </div>
                  <!-- INFORMACION Familiar -->
                    <!-- INFORMACION academica -->
                <br>
                <br>

                <div class="col-md-13">
                    <button type="button" class="btn btn-default col-md-7" data-toggle="collapse" data-target="#academica">
                        Informacion Academica
                    </button>
                </div>
                <div class="col-md-7 collapse" id="academica">
                    <div class="panel panel-primary">
                        <div class="panel-heading panel-title">
                            Informacion Academica
                        </div>
                        <div class="panel-body">
                            <div class="col-sm-6">
                              Fecha: <input class="form-control" type="text" name="txtFechaActividadAcademica">
                              Actividad: <input class="form-control" type="date" name="txtActivdidadAcademica">
                              Estado:
                              <select class="form-control" name="cboEstadoCursoAcademico">
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
                              <table class="table table-striped">
                                  <thead>
                                    <tr>
                                      <th>Fecha</th>
                                      <th>Actividad</th>
                                      <th>Estado</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr>
                                      <td>John</td>
                                      <td>Doe</td>
                                      <td>john@example.com</td>
                                    </tr>

                                  </tbody>
                                </table>

                           </div>
                        </div>

                    </div>
                  </div>
                    <!-- INFORMACION academica -->
                      <!-- INFORMACION estandar -->
                    <br>
                    <br>

                    <div class="col-md-13">
                        <button type="button" class="btn btn-default col-md-7" data-toggle="collapse" data-target="#estandar">
                            Informacion Estandar
                        </button>
                    </div>
                    <div class="col-md-7 collapse" id="estandar">
                        <div class="panel panel-primary">
                            <div class="panel-heading panel-title">
                                Informacion Estandar
                            </div>
                            <div class="panel-body">
                                <div class="col-sm-6">
                                  Fecha: <input class="form-control" type="date" name="fechaEntreamientoEstandar">
                                  Actividad: <input class="form-control" type="text" name="txtActividadEntrenamientoEstandar">
                                  Estado:
                                  <select class="form-control" name="cboEstadoCursoEstandar">
                                    <?php
                                    require_once("model/Data.php");
                                    require_once("model/Tbl_EstadoCurso.php");
                                    $d= new Data();

                                    $estadosDeCursos2 = $d->readEstadosCurso();
                                    foreach($estadosDeCursos2 as $ec2 => $estado2){
                                    ?>
                                    <option value="<?php echo $estado2->getIdEstadoCurso(); ?>"><?php echo $estado2->getNombreEstadoCurso(); ?></option>
                                    <?php
                                    }
                                    ?>
                                    </select>

                                  <table class="table table-striped">
                                      <thead>
                                        <tr>
                                          <th>Fecha</th>
                                          <th>Actividad</th>
                                          <th>Estado</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        <tr>
                                          <td>John</td>
                                          <td>Doe</td>
                                          <td>john@example.com</td>
                                        </tr>

                                      </tbody>
                                    </table>

                               </div>
                            </div>

                        </div>
                    </div>

                      <!-- INFORMACION estandar -->
                      <!-- INFORMACION historica -->
                    <br>
                    <br>

                    <div class="col-md-13">
                        <button type="button" class="btn btn-default col-md-7" data-toggle="collapse" data-target="#historica">
                            Informacion Historica
                        </button>
                    </div>
                    <div class="col-md-7 collapse" id="historica">
                        <div class="panel panel-primary">
                            <div class="panel-heading panel-title">
                                Informacion Historica
                            </div>
                            <div class="panel-body" style="margin-left: -30px;">
                                <div class="col-sm-6">
                                  <table class="table table-striped">
                                      <thead>
                                        <tr>
                                          <th>Region</th>
                                          <th>Cuerpo</th>
                                          <th>Compañia</th>
                                          <th>Fecha</th>
                                          <th>Tipo Cambio</th>
                                          <th>Motivo</th>
                                          <th>Detalle</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        <tr>
                                          <td>John</td>
                                          <td>Doe</td>
                                          <td>john@example.com</td>
                                          <td>dfds</td>
                                          <td>fsdfsd</td>
                                          <td>fdsfds</td>
                                          <td>fsfsdfs</td>
                                        </tr>

                                      </tbody>
                                    </table>

                               </div>
                            </div>

                        </div>
                    </div>
                      <!-- INFORMACION historica -->
                        <!-- INFORMACION servicio -->
                    <br>
                    <br>

                    <div class="col-md-13">
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
                            </div>

                        </div>
                    </div>

                      <!-- INFORMACION servicio -->
                    <br>
                    <br>
                    <br>
                    <br>



  <!--  </div>-->




  </div>
  </body>
</html>
