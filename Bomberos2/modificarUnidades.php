<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Mantenedor</title>


    <link rel ="stylesheet" href="css/style.css" type="text/css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>



  </head>

  <?php
 require_once("model/Data.php");
 require_once("model/Tbl_Usuario.php");
 $dataUsuario= new Data();
 session_start();
 if($_SESSION["usuarioIniciado"]!=null){
   $u=$_SESSION["usuarioIniciado"];
   if($dataUsuario->verificarSiUsuarioTienePermiso($u,8)==0){
     header("location: paginaError.php");
   }
 }


if(isset($_SESSION["unidadAModificar"])){
  $unidadAModificar=$_SESSION["unidadAModificar"];
}else{
  $unidadAModificar= new Tbl_Unidad();
}


if(isset($_SESSION["mantenciones"])){
  $mantenciones=$_SESSION["mantenciones"];
}else{
  $mantenciones= array();
}

if(isset($_SESSION["carguios"])){
  $carguios=$_SESSION["carguios"];
}else{
  $carguios= array();
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
      <a class="navbar-brand" href="#">Sistema Bomberos</a>
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
            <li><a href="verUnidades.php">Ver Unidades</a></li>
            <li><a href="modificarUnidades.php">Modificar</a></li>
            <li><a href="reporteUnidad.php">Reporte</a></li>
            <li><a href="bitacoraUnidad.php">Bitacora</a></li>
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

    <style>

    #transparencia{
        opacity: .80;
        -moz-opacity: .80;
        filter: alpha(opacity=80);

    }

    </style>
    <?php
        // unir vista con el modelo sin pasar por un controlador
        require_once("model/Data.php");
        $data = new Data();

    ?>

    <div style="width: 800px" style="height: 900px">
        <div class="jumbotron" style="border-radius: 70px 70px 70px 70px" id="transparencia">
          <div class="container">

          <div style="margin-left:100px;">

                          <div class="col-md-20">
                              <button type="button" class="btn btn-default col-md-11" data-toggle="collapse" data-target="#unidades">
                                Modificar Unidades
                              </button>
                          </div>

                          <div class="col-md-11 collapse" id="unidades" >
                              <div class="panel panel-primary">
                                  <div class="panel-heading panel-title">
                                      Modificar Unidad
                                  </div>
                                  <div class="panel-body">

                                      <div class="col-sm-4" >
                                        <div style="margin-left: 0px;">
                                          <img src="images/avatar_opt.jpg">
                                        </div>
                                        <form action="controlador/ActualizarUnidad.php" method="post">
                                        <!--  Modificando unidad:
                                          <select name="cboUnidadAModificar"  class="form-control" disabled>
                                              <?php/*
                                                  $unidad = $data->readUnidadesVehiculos();
                                                  foreach ($unidad as $u) {
                                                    if($u->getIdUnidad()==$unidadAModificar->getIdUnidad()){
                                                      echo "<option value='".$u->getIdUnidad()."'>";
                                                          echo $u->getNombreUnidad();
                                                      echo" selected </option>";

                                                    }else{
                                                      echo "<option value='".$u->getIdUnidad()."'>";
                                                          echo $u->getNombreUnidad();
                                                      echo"</option>";

                                                    }

                                                  }
                                          */    ?>
                                          </select>
                                        -->
                                          <input type="hidden" name="cboUnidadAModificar" value="<?php echo $unidadAModificar->getIdUnidad();?>">



                                          Marca:<input id="nombre" type="text" value="<?php echo $unidadAModificar->getMarca();?>" name="txtmarca" class="form-control" required="">
                                          Nº Motor:<input id="nombre" type="text" value="<?php echo $unidadAModificar->getNmotor();?>" name="txtmotor" class="form-control" required="">
                                          Nº Chasis :<input id="nombre" type="text" value="<?php echo $unidadAModificar->getNchasis();?>" name="txtchasis" class="form-control" required="">
                                          Nº VIN: <input id="nombre" type="text" value="<?php echo $unidadAModificar->getNVIN();?>" name="txtvin" class="form-control" required="">
                                          Color:<br><input id="nombre" type="text" value="<?php echo $unidadAModificar->getColor();?>" name="txtcolor" class="form-control" required="">
                                          PPU: <br><input id="nombre" type="text" value="<?php echo $unidadAModificar->getPPu();?>" name="txtppu" class="form-control" required="">



                                      </div>
                                      <div class="col-sm-6" style="margin-left: 60px;">

                                        Nombre Unidad:<input id="nombre" type="txt" value="<?php echo $unidadAModificar->getNombreUnidad();?>" class="form-control" name="txtnombreUnidad"  required="">
                                        Año de Fabricacion:<input id="nombre" type="text" value="<?php echo $unidadAModificar->getaniodeFabricacion();?>" class="form-control" name="txtanioFabricacion"  required="">
                                        Fecha de Inscripcion:<input id="nombre" type="date" value="<?php echo $unidadAModificar->getfechaInscripcion();?>" class="form-control" name="txtfechainscripcion"   required="">
                                        Fecha de Adquisición:<input id="nombre" type="date" value="<?php echo $unidadAModificar->getfechaAdquisicion();?>" class="form-control" name="txtfechaadquisicion" required="">
                                        Capacidad Ocupantes :<input id="nombre" type="number" value="<?php echo $unidadAModificar->getcapacidadOcupantes();?>" class="form-control" name="txtcapaocupantes"  required="">

                                        Estado de Unidad:
                                        <select name="unidades"  class="form-control">
                                            <?php
                                                $unidad = $data->getUnidades();
                                                foreach ($unidad as $u) {
                                                    echo "<option value='".$u->getIdEstadoUnidad()."'>";
                                                        echo $u->getNombreEstadoUnidad();
                                                    echo"</option>";
                                                }
                                            ?>
                                        </select>

                                      Tipo de Vehiculo:
                                      <select name="vehiculos"  class="form-control">
                                          <?php
                                              $vehiculo = $data->getVehiculos();
                                              foreach ($vehiculo as $v) {
                                                  echo "<option value='".$v->getIdTipoVehiculo()."'>";
                                                      echo $v->getNombreTipoVehiculo();
                                                  echo"</option>";
                                              }
                                          ?>
                                      </select>

                                   Entidad a Cargo:
                                    <select name="entidad" class="form-control">
                                        <?php
                                            $entiPropietaria = $data->getEntidadACargo();
                                            foreach ($entiPropietaria as $ep) {
                                                echo "<option value='".$ep->getIdEntidadACargo()."'>";
                                                    echo utf8_encode($ep->getNombreEntidadACargo());
                                                echo"</option>";
                                            }
                                        ?>
                                    </select>
                                          <br><br>
                                        <center> <input type="submit" name="btncrear" value="Modificar Unidad" class="btn button-primary" style="width: 150px;"> <span ></span>
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


                          <br>
                          <br>

                          <div class="col-md-20">
                              <button type="button" class="btn btn-default col-md-11" data-toggle="collapse" data-target="#mantencion">
                                Modificar Mantención
                              </button>
                          </div>

                          <div class="col-md-11 collapse" id="mantencion" >
                              <div class="panel panel-primary">
                                  <div class="panel-heading panel-title">
                                    Modificar Mantención
                                  </div>
                                  <div class="panel-body">

                                      <div class="col-sm-4" >


                                        <form action="controlador/ActualizarMantencion.php" method="post">
                                          <input type="hidden" value="" name="idDeLaMantencionAModificar" id="idDeLaMantencionAModificar">
                                          Tipo Mantención:
                                          <select name="cboTipoMantencion" class="form-control">
                                              <?php
                                                  $listado = $data->readTiposDeMantencion();
                                                  foreach ($listado as $o) {
                                                      echo "<option value='".$o->getId_tipo_de_mantencion()."'>";
                                                          echo $o->getNombre_tipoDeMantencion();
                                                      echo"</option>";
                                                  }
                                              ?>
                                          </select>
                                          Fecha de mantención: <input id="nombre" type="date" name="fechaMantencion" class="form-control">

                                          Responsable:<input id="responsableDeMantencion" type="text" name="txtresponsableMantencion" class="form-control">



                                      </div>
                                      <div class="col-sm-6" style="margin-left: 60px;">

                                        Dirección: <textarea class="form-control" Type="textarea" name="txtDireccion" ></textarea>
                                        Comentarios/Observaciones: <textarea class="form-control" Type="textarea" name="txtcomentario" ></textarea>

                                          <br><br>
                                        <center> <input type="submit" name="btnModificarMantencion" value="Modificar mantención" class="btn button-primary" style="width: 150px;"> <span ></span>
                                            <!--     <button class="btn button-primary" style="width: 150px;"> <a href="Mantenedor.php" style="text-decoration:none;color:black;">Volver</a> </button>-->

                                        </center>
                                      </form>

                                                                <br>
                                      </div>
                                      <br>
                                      <br>

                                      <table class="table table-striped">
                                        <thead>
                                          <tr>
                                            <td>Tipo de mantención</td>
                                            <td>Fecha de mantención</td>
                                            <td>Responsable</td>
                                            <td>Dirección</td>
                                            <td>Comentarios/Observaciones</td>
                                            <td>Modificar</td>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <?php
                                          foreach ($mantenciones as $my => $mantencion) {?>
                                            <tr>
                                              <input type="hidden" value="<?php echo $mantencion->getIdMantencion();?>" name="idMantencion" id="idMantencion">
                                              <td><?php echo $data->buscarNombreDeTipoDeMantencion($mantencion->getFk_tipo_mantencion());?></td>
                                              <td><?php $fechaSinConvertir=$mantencion->getFecha_mantencion();

                                              $fechaConvertida = date("d-m-Y", strtotime($fechaSinConvertir));
                                              echo $fechaConvertida;

                                              ?></td>
                                              <td><?php echo $mantencion->getResponsable_mantencion();?></td>
                                              <td><?php echo $mantencion->getDireccion_mantencion();?></td>
                                              <td><?php echo $mantencion->getComentarios_mantencion();?></td>
                                              <input type="hidden" value="<?php echo $mantencion->getFk_unidad();?>" name="idUnidadMantencion">
                                              <td><input type="submit" value="Modificar" onclick="actualizarMantencion(<?php echo $mantencion->getIdMantencion();?>)"></td>
                                            </tr>

                                        <?php  }
                                          ?>

                                        </tbody>

                                      </table>


                                  </div>
                              </div>
                          </div>

                          <br>
                          <br>


                          <div class="col-md-20">
                              <button type="button" class="btn btn-default col-md-11" data-toggle="collapse" data-target="#combustible">
                                Modificar Carguío de Combustible
                              </button>
                          </div>

                          <div class="col-md-11 collapse" id="combustible" >
                              <div class="panel panel-primary">
                                  <div class="panel-heading panel-title">
                                      Modificar Carguío de Combustible
                                  </div>
                                  <div class="panel-body">

                                      <div class="col-sm-4" >

                                        <form action="controlador/ActualizarCarguio.php" method="post">

                                          <input type="hidden" name="idCarguioAModificar" id="idCarguioAModificar">


                                          Tipo Combustible:
                                          <select name="cboTipoCombustible" class="form-control">
                                              <?php
                                                  $listado = $data->readTiposDeCombustibles();
                                                  foreach ($listado as $o) {
                                                      echo "<option value='".$o->getId_tipo_combustible()."'>";
                                                          echo $o->getNombre_tipo_combustible();
                                                      echo"</option>";
                                                  }
                                              ?>
                                          </select>

                                          Responsable:<input id="nombre" type="text" name="txtresponsablecombustible" class="form-control" >
                                          Dirección: <textarea class="form-control" Type="textarea" name="txtDireccionCombustible" ></textarea>


                                      </div>
                                      <div class="col-sm-6" style="margin-left: 60px;">
                                        Fecha:<input id="nombre" type="date" name="txtFechaCombustible" class="form-control" >
                                        Cantidad:<input id="nombre" type="number" name="txtcantidad" class="form-control" >
                                        Precio/Litro:<input id="nombre" type="number" name="txtpreciolitro" class="form-control" >
                                        Comentarios/Observaciones: <textarea class="form-control" Type="textarea" name="txtcomentario" ></textarea>

                                          <br><br>
                                        <center> <input type="submit" name="btncrear" value="Modificar carga" class="btn button-primary" style="width: 150px;"> <span ></span>
                                            <!--     <button class="btn button-primary" style="width: 150px;"> <a href="Mantenedor.php" style="text-decoration:none;color:black;">Volver</a> </button>-->

                                        </center>
                                      </form>
                                                                <br>


                                      </div>
                                      <br>
                                      <br>
                                      <table class="table table-striped">
                                        <thead>
                                          <tr>
                                            <td>Responsable de carguio</td>
                                            <td>Fecha de carguio</td>
                                            <td>Dirección de carguio</td>
                                            <td>Tipo de combustible</td>
                                            <td>Cantidad de litros</td>
                                            <td>Modificar</td>
                                            <td>Precio por litro</td>
                                            <td>Observacion</td>
                                            <td>Modificar</td>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <?php
                                          foreach ($carguios as $ca => $carguio) {?>
                                            <tr>
                                              <input type="hidden" value="<?php echo $carguio->getId_cargio_combustible();?>" name="idCarguio" id="idCarguio">
                                              <td><?php echo $carguio->getResponsable_cargio_combustible();?></td>
                                              <td><?php $fechaSinConvertir=$carguio->getFecha_cargio();

                                              $fechaConvertida = date("d-m-Y", strtotime($fechaSinConvertir));
                                              echo $fechaConvertida;

                                              ?></td>
                                              <td><?php echo $carguio->getDireccion_cargio();?></td>
                                              <td><?php echo $carguio->getFk_tipo_combustible_cargio_combustible();?></td>
                                              <td><?php echo $carguio->getCantidad_litros_cargio_combustible();?></td>
                                              <td><?php echo $carguio->getPrecio_litro_cargio_combustible();?></td>
                                              <td><?php echo $carguio->getCantidad_litros_cargio_combustible();?></td>
                                              <td><?php echo $carguio->getObservacion_cargio_combustible();?></td>
                                              <input type="hidden" value="<?php echo $carguio->getFk_unidad();?>" name="idUnidadCarguio">
                                              <td><input type="submit" value="Modificar" onclick="actualizarCarguio(<?php echo $carguio->getId_cargio_combustible();?>)"></td>
                                            </tr>

                                        <?php  }
                                          ?>

                                        </tbody>

                                      </table>



                                  </div>
                              </div>
                          </div>






          </div>
       </div>
   </div>
 </div>

 <script src="javascript/JQuery.js"></script>
 <script type="text/javascript">
 function actualizarMantencion(id) {
             document.getElementById("idDeLaMantencionAModificar").value=id;
             alert("Utilize las opciones de arriba para seleccionar los nuevos datos");


           }


           function actualizarCarguio(id) {
                       document.getElementById("idCarguioAModificar").value=id;
                       alert("Utilize las opciones de arriba para seleccionar los nuevos datos");


                     }

/*
             $.ajax({
               url: "iniciarFkInfoPersonalParaModificarBomberoEnSesion.php",
               type: "POST",
               data:{"idParaModificar":id}
             }).done(function(data) {
               console.log(data);
             });
               }
*/
</script>


  </body>
</html>
