
<html>
<head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
      <!--  <link rel ="stylesheet" href="css/style.css" type="text/css"> -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


        <title>Ficha Bomberos</title>
</head>



<body  background="images/fondofichaintranet.jpg" >


<br>
<br>
<br>
<nav class="navbar transparent navbar-transparent navbar-fixed-top " role="navigation">
            <div class="navbar-header">
                <a href="#" class="navbar-left">
                  <!--  <span><img width=80px height=35px src=""></span> -->
                </a>
            </div>


            <ul class="nav navbar-nav navbar-left" style="padding-left: 350px">

            <!--    <button type="submit"><img src="images/save_opt.png" alt="" /> Guardar</button>
                <button type="submit"><img src="images/modificar_opt.png" alt="" />Modificar</button>
                <button type="submit"><img src="images/limpiar.png" alt="" />Limpiar</button>
                <button type="submit"><img src="images/delete_opt.png" alt="" />Eliminar</button>
                <button type="submit"><img src="images/buscar_opt.png" alt="" />Buscar</button> -->


            </ul>

            <ul class="nav navbar-nav navbar-right" style="padding-right: 50px">
                <li>
                    <form class="navbar-form pull-right" action="cerrar.do">
                        <button type="submit" class="btn btn-danger">Cerrar sesión</button>
                    </form>
                </li>
            </ul>
        </nav>


        <br>
        <br>


<form method="post" action="controlador/CrearInfoPersonal.php">


<div class="container " style="background:transparent">
            <!-- INFORMACION PERSONAL -->

            <div class="col-md-12">
                <button type="button" class="btn btn-default col-md-12" data-toggle="collapse" data-target="#antecedentes">
                    Informacion Personal
                </button>
            </div>

            <div class="col-md-12 collapse" id="antecedentes">
                <div class="panel panel-primary">
                    <div class="panel-heading panel-title">
                        Informacion Personal
                    </div>
                    <div class="panel-body">
                        <div class="col-sm-6" >

                          <div style="margin-left: 85px;">
                            <img src="images/avatar4.jpg">
                          </div>
                          <br>
                          <br>
                          <br>
                          Talla Chaqueta/camisa : <input class="form-control" type="text" name="txtchaqueta">
                          Talla Pantalon: <input class="form-control" type="text" name="txtpantalon">
                          Talla buzo: <input class="form-control" type="text" name="txtbuzo">
                          talla Calzado: <input class="form-control" type="text" name="txtcalzado">
                          Pertenecio a Brigada Juvenil? <input class="form-control" type="text" name="txtbrigada">
                          Instructor: <input class="form-control" type="text" name="txtinstructor">

                        </div>
                        <div class="col-md-6">
                          Rut: <input class="form-control" type="text" name="txtRut">
                          Nombre: <input class="form-control" type="text" name="txtNombre">
                          Apellido Paterno: <input class="form-control" type="text" name="txtApePa" >
                          Apellido Materno: <input class="form-control" name="txtApeMa">
                          Fecha Nacimiento: <input class="form-control" name="txtFecha" type="date">
                          Estado Civil:<!-- <input class="form-control" name="estadoCivil" type="text"> > <!--Combobox-->
                          <select class="form-control" name="cboEstadoCivil">
                          <?php
                          require_once("model/Data.php");
                          require_once("model/Tbl_EstadoCivil.php");
                          $d=new Data();
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
                          Altura :<input class="form-control" type="text" name="txtaltura">
                          Peso: <input class="form-control" type="text" name="txtpeso">
                          Genero: <!--<input class="form-control" type="text" name="txtgenero">> <!--Combobox-->
                          <select class="form-control" name="cboGenero">
                          <?php
                          require_once("model/Tbl_Genero.php");
                          $generos = $d->readGeneros();
                          foreach($generos as $g => $genero){
                          ?>
                          <option value="<?php echo $genero->getIdGenero(); ?>"><?php echo $genero->getNombreGenero(); ?></option>
                          <?php
                          }
                          ?>
                          </select>
                        </div>
                    </div>
                </div>
            </div>

            <input type="submit" value="Crear">
            </form>
            <!-- INFORMACION PERSONAL -->
            <!-- INFORMACION bomberilL -->
            <br><br>
            <div class="col-md-12">
                <button type="button" class="btn btn-default col-md-12" data-toggle="collapse" data-target="#bomberil">
                    Informacion Bomberil
                </button>
            </div>
            <div class="col-md-12 collapse" id="bomberil">
                <div class="panel panel-primary">
                    <div class="panel-heading panel-title">
                        Informacion Bomberil
                    </div>
                    <div class="panel-body">
                        <div class="col-sm-6">
                          Region : <input class="form-control" type="text" name="txtregion"> <!--Region del libertador bernardo ohggins-->
                          Compañia: <input class="form-control" type="text" name="txtcompania">  <!--Combobox-->
                          Fecha Ingreso: <input class="form-control" type="text" name="txtfingreso">
                          Nº Reg.General: <input class="form-control" type="text" name="txtgeneral">
                        </div>
                        <div class="col-md-6">
                          Cuerpo: <input class="form-control" type="text" name="txtcuerpo"> <!-- Machali-->
                          Cargo: <input class="form-control" type="text" name="txtcargo">
                          Estado: <input class="form-control" type="text" name="txtestado" > <!--Combobox -->
                          Nº Reg.Cia: <input class="form-control" name="txtcia">

                        </div>
                    </div>
                </div>
            </div>
            <!-- INFORMACION bomberilL -->
            <!-- INFORMACION laboral -->
            <br>
            <br>
            <div class="col-md-12">
                <button type="button" class="btn btn-default col-md-12" data-toggle="collapse" data-target="#laboral">
                    Informacion Laboral
                </button>
            </div>
            <div class="col-md-12 collapse" id="laboral">
                <div class="panel panel-primary">
                    <div class="panel-heading panel-title">
                        Informacion Laboral
                    </div>
                    <div class="panel-body">
                        <div class="col-sm-6">
                          Nombre Empresa : <input class="form-control" type="text" name="txtnomempresa">
                          Direccion Empresa: <textarea class="form-control" type="text" name="txtdirecempresa"></textarea>
                          Telefono Empresa: <input class="form-control" type="text" name="txttlfempresa">

                        </div>
                        <div class="col-md-6">
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
            <div class="col-md-12">
                <button type="button" class="btn btn-default col-md-12" data-toggle="collapse" data-target="#medica">
                    Informacion Medica
                </button>
            </div>
            <div class="col-md-12 collapse" id="medica">
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
                          Parentesco del Contacto: <input class="form-control" type="text" name="txtparentesco">
                          Nivel de Actividad Fisica: <input class="form-control" type="text" name="txtactvfisica">
                          Donante: <input class="form-control" type="text" name="txtdonante">
                          Fumador: <input class="form-control" type="text" name="txtfumador">
                          Grupo Sanguineo: <input class="form-control" type="text" name="txtgruposanguineo">

                        </div>
                    </div>
                </div>
            </div>
            <!-- INFORMACION medica -->
            <!-- INFORMACION Familiar -->
            <br>
            <br>
            <div class="col-md-12">
                <button type="button" class="btn btn-default col-md-12" data-toggle="collapse" data-target="#familiar">
                    Informacion Familiar
                </button>
            </div>
            <div class="col-md-12 collapse" id="familiar">
                <div class="panel panel-primary">
                    <div class="panel-heading panel-title">
                        Informacion Familiar
                    </div>
                    <div class="panel-body">
                        <div class="col-sm-12">
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

            <div class="col-md-12">
                <button type="button" class="btn btn-default col-md-12" data-toggle="collapse" data-target="#academica">
                    Informacion Academica
                </button>
            </div>
            <div class="col-md-12 collapse" id="academica">
                <div class="panel panel-primary">
                    <div class="panel-heading panel-title">
                        Informacion Academica
                    </div>
                    <div class="panel-body">
                        <div class="col-sm-12">
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

                <div class="col-md-12">
                    <button type="button" class="btn btn-default col-md-12" data-toggle="collapse" data-target="#estandar">
                        Informacion Estandar
                    </button>
                </div>
                <div class="col-md-12 collapse" id="estandar">
                    <div class="panel panel-primary">
                        <div class="panel-heading panel-title">
                            Informacion Estandar
                        </div>
                        <div class="panel-body">
                            <div class="col-sm-12">
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

                <div class="col-md-12">
                    <button type="button" class="btn btn-default col-md-12" data-toggle="collapse" data-target="#historica">
                        Informacion Historica
                    </button>
                </div>
                <div class="col-md-12 collapse" id="historica">
                    <div class="panel panel-primary">
                        <div class="panel-heading panel-title">
                            Informacion Historica
                        </div>
                        <div class="panel-body">
                            <div class="col-sm-12">
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

                <div class="col-md-12">
                    <button type="button" class="btn btn-default col-md-12" data-toggle="collapse" data-target="#servicio">
                        Asistencia Actos de Servicio
                    </button>
                </div>
                <div class="col-md-12 collapse" id="servicio">
                    <div class="panel panel-primary">
                        <div class="panel-heading panel-title">
                          Asistencia Actos de Servicio
                        </div>
                        <div class="panel-body">
                            <div class="col-sm-12">
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

            <center> <input type="submit" value="Guardar" class="btn button-primary" style="width: 150px;"> <span ></span>
                     <button class="btn button-primary" style="width: 150px;"> <a href="Mantenedor.html" style="text-decoration:none;color:black;">Volver</a> </button>

            </center>

</div>

</body>
</html>
