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

    <style>

    #transparencia{
        opacity: .85;
        -moz-opacity: .85;
        filter: alpha(opacity=85);

    }

    </style>
    <?php
        // unir vista con el modelo sin pasar por un controlador
        require_once("model/Data.php");
        $data = new Data();


        if(isset($_SESSION["unidadAVerSolicitada"])){
          $unidad=$_SESSION["unidadAVerSolicitada"];
        }


        if(isset($_SESSION["mantencionesAVerSolicitada"])){
          $mantenciones=$_SESSION["mantencionesAVerSolicitada"];
        }

        if(isset($_SESSION["carguiosAVerSolicitada"])){
          $carguios=$_SESSION["carguiosAVerSolicitada"];
        }


    ?>

    <div style="width: 800px" style="height: 900px">
        <div class="jumbotron" style="border-radius: 70px 70px 70px 70px" id="transparencia">
          <div class="container">

          <div style="margin-left:100px;">

                          <div class="col-md-20">
                              <button type="button" class="btn btn-default col-md-11" data-toggle="collapse" data-target="#unidades">
                                Ver Unidad
                              </button>
                          </div>

                          <div class="col-md-11 collapse" id="unidades" >
                              <div class="panel panel-primary">
                                  <div class="panel-heading panel-title">
                                      Ver Unidad
                                  </div>
                                  <div class="panel-body">

                                      <div class="col-sm-4" >
                                        <div style="margin-left: 0px;">
                                          <img src="images/avatar_opt.jpg">
                                        </div>



                                          Marca:<input id="nombre" type="text" name="txtmarca" class="form-control" disabled value="<?php echo $unidad->getMarca();?>">
                                          Nº Motor:<input id="nombre" type="text" name="txtmotor" class="form-control" disabled value="<?php echo $unidad->getNmotor();?>">
                                          Nº Chasis :<input id="nombre" type="text" name="txtchasis" class="form-control" disabled value="<?php echo $unidad->getNchasis();?>">
                                          Nº VIN: <input id="nombre" type="text" name="txtvin" class="form-control" disabled value="<?php echo $unidad->getNVIN();?>">
                                          Color:<br><input id="nombre" type="text" name="txtcolor" class="form-control" disabled value="<?php echo $unidad->getColor();?>">
                                          PPU: <br><input id="nombre" type="text" name="txtppu" class="form-control" disabled value="<?php echo $unidad->getPPu();?>">



                                      </div>
                                      <div class="col-sm-6" style="margin-left: 60px;">



                                        Nombre Unidad:<input id="nombre" type="txt" class="form-control" name="txtnombreUnidad"   value="<?php echo $unidad->getNombreUnidad();?>" disabled>
                                        Año de Fabricacion:<input id="nombre" type="text" class="form-control" name="txtanioFabricacion" disabled value="<?php echo $unidad->getaniodeFabricacion();?>" >
                                        Fecha de Inscripcion:<input id="nombre" type="date" class="form-control" name="txtfechainscripcion"  disabled  value="<?php
                                         echo $unidad->getfechaInscripcion();?>">
                                        Fecha de Adquisición:<input disabled id="nombre" type="date" class="form-control" name="txtfechaadquisicion" required="" value="<?php
                                       echo $unidad->getfechaAdquisicion();?>">
                                        Capacidad Ocupantes :<input id="nombre" type="number" class="form-control"  value="<?php echo $unidad->getcapacidadOcupantes();?>" name="txtcapaocupantes"  required="" min="1" pattern="^[0-9]+" onkeydown="javascript: return event.keyCode == 69 ? false : true" disabled>

                                        Estado de Unidad:
                                        <select name="unidades"  class="form-control" disabled>
                                            <?php
                                                $unidades = $data->getUnidades();
                                                foreach ($unidades as $u) {
                                                  if($unidad->getfkEstadoUnidad()==$u->getIdEstadoUnidad()){?>
                                                    <option value="<?php echo $u->getIdEstadoUnidad(); ?>" selected ><?php echo $u->getNombreEstadoUnidad(); ?></option>
                                                    <?php
                                                  }else{
                                                      ?>
                                                      <option value="<?php echo $u->getIdEstadoUnidad(); ?>" ><?php echo $u->getNombreEstadoUnidad(); ?></option>
                                                      <?php
                                                    }
                                                  }
                                            ?>
                                        </select>

                                      Tipo de Vehiculo:
                                      <select name="vehiculos"  class="form-control" disabled>
                                          <?php
                                              $vehiculos = $data->getVehiculos();
                                              foreach ($vehiculos as $v) {
                                                if($unidad->getfkTipoVehiculo()==$v->getIdTipoVehiculo()){?>
                                                  <option value="<?php echo $v->getIdTipoVehiculo(); ?>" selected ><?php echo $v->getNombreTipoVehiculo(); ?></option>
                                                  <?php
                                                }else{
                                                    ?>
                                                    <option value="<?php echo $v->getIdTipoVehiculo(); ?>" ><?php echo $v->getNombreTipoVehiculo(); ?></option>
                                                    <?php
                                                  }
                                                }
                                          ?>


                                      </select>

                                   Entidad a Cargo:
                                    <select name="entidad" class="form-control" disabled>
                                        <?php
                                            $entidadesPropietarias = $data->getEntidadACargo();
                                            foreach ($entidadesPropietarias as $ep) {
                                              if($unidad->getfkEntidadPropietaria()==$ep->getIdEntidadACargo()){?>
                                                <option value="<?php echo $ep->getIdEntidadACargo(); ?>" selected ><?php echo utf8_encode($ep->getNombreEntidadACargo()); ?></option>
                                                <?php
                                              }else{
                                                  ?>
                                                  <option value="<?php echo $ep->getIdEntidadACargo(); ?>" ><?php echo utf8_encode($ep->getNombreEntidadACargo()); ?></option>
                                                  <?php
                                                }
                                              }
                                        ?>

                                    </select>
                                          <br><br>


                                                                <br>
                                      </div>
                                      <br>
                                      <br>


                                  </div>
                              </div>
                          </div>


                          <div class="col-md-20">
                              <button type="button" class="btn btn-default col-md-11" data-toggle="collapse" data-target="#mantencion">
                                Mantenciones
                              </button>
                          </div>

                          <div class="col-md-11 collapse" id="mantencion" >
                              <div class="panel panel-primary">
                                  <div class="panel-heading panel-title">
                                      Mantenciones
                                  </div>
                                  <div class="panel-body">

                                      <div class="col-sm-4">

                                        <table class="table table-striped">
                                          <thead>
                                            <tr>
                                              <td>Tipo de mantención</td>
                                              <td>Fecha de Mantención</td>
                                              <td>Responsable</td>
                                              <td>Dirección</td>
                                              <td>Comentarios/Observaciones</td>
                                            </tr>
                                          </thead>
                                          <tbody>
                                            <?php
                                            foreach ($mantenciones as $m => $mantencion) { ?>
                                              <tr>
                                                <td><?php echo utf8_encode($data->buscarNombreDeMantencionPorId($mantencion->getFk_tipo_mantencion()));?></td>
                                                <td><?php
                                                  $fechaSinConvertir = $mantencion->getFecha_mantencion();
                                                  $fechaConvertida = date("d-m-Y", strtotime($fechaSinConvertir));

                                                  echo $fechaConvertida; ?>
                                                </td>
                                                <td><?php echo utf8_encode($mantencion->getResponsable_mantencion());?></td>
                                                <td><?php echo utf8_encode($mantencion->getDireccion_mantencion());?></td>
                                                <td><?php echo utf8_encode($mantencion->getComentarios_mantencion());?></td>
                                              </tr>

                                        <?php    }

                                            ?>
                                          </tbody>

                                        </table>

                                      </div>
                                      <div class="col-sm-6" style="margin-left: 60px;">
                                          <br><br>
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
                              <button type="button" class="btn btn-default col-md-11" data-toggle="collapse" data-target="#combustible">
                                Carguíos de Combustible
                              </button>
                          </div>
                          <div class="col-md-11 collapse" id="combustible" >
                              <div class="panel panel-primary">
                                  <div class="panel-heading panel-title">
                                      Carguíos de Combustible
                                  </div>
                                  <div class="panel-body">
                                      <div class="col-sm-4">

                                        <table class="table table-striped">
                                          <thead>
                                            <tr>
                                              <td>Responsable</td>
                                              <td>Fecha de Carguio</td>
                                              <td>Direccion</td>
                                              <td>Tipo de combustible</td>
                                              <td>Cantidad de litros</td>
                                              <td>Precio por litro</td>s
                                              <td>Observaciones</td>
                                            </tr>
                                          </thead>
                                          <tbody>
                                            <?php
                                            foreach ($carguios as $c => $carguio) { ?>
                                              <tr>
                                                <td><?php echo utf8_encode($carguio->getResponsable_cargio_combustible());?></td>
                                                <td><?php
                                                  $fechaSinConvertir = $carguio->getFecha_cargio();
                                                  $fechaConvertida = date("d-m-Y", strtotime($fechaSinConvertir));

                                                  echo $fechaConvertida; ?>
                                                </td>
                                                <td><?php echo utf8_encode($carguio->getDireccion_cargio());?></td>
                                                <td><?php echo utf8_encode($data->buscarNombreDeCombustiblePorId($carguio->getFk_tipo_combustible_cargio_combustible()));?></td>
                                                <td><?php echo utf8_encode($carguio->getCantidad_litros_cargio_combustible());?></td>
                                                <td><?php echo utf8_encode($carguio->getPrecio_litro_cargio_combustible());?></td>
                                                <td><?php echo utf8_encode($carguio->getObservacion_cargio_combustible());?></td>
                                              </tr>
                                          <?php  } ?>
                                        </tbody>
                                      </table>

                                      </div>
                                      <div class="col-sm-6" style="margin-left: 60px;">


                                      </div>
                                      <br>
                                      <br>


                                  </div>
                              </div>
                          </div>


<br><br><br><br><br>



          </div>
       </div>
   </div>
 </div>
 <script src="javascript/borrarVariablesEnSesionAlCargarPagina.js"></script>

  </body>
</html>
