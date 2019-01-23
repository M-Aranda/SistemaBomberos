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
      header("location: Error.php");
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
            <!-- <li><a href="eliminarBombero.php">Eliminar</a></li> -->
          </ul>
        </li>
      </ul>

      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Unidades <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="crearUnidades.php">Crear</a></li>
            <li><a href="#">Ver Unidades</a></li>
            <li><a href="#">Modificar</a></li>
            <!-- <li><a href="eliminarUnidades.php">Eliminar</a></li> -->
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
        require_once("model/Tbl_EstadoUnidad.php");
        require_once("model/Tbl_TipoVehiculo.php");
        require_once("model/Tbl_EntidadACargo.php");
        $data = new Data();

    ?>

    <div style="width: 800px" style="height: 900px">
        <div class="jumbotron" style="border-radius: 70px 70px 70px 70px" id="transparencia">
          <div class="container">

          <span><h5 style="font-weight:bold;">Crear Unidades</h5></span>

      <form action="controlador/CrearUnidades.php" style="margin-left:50px;" method="post">


          Año de Fabricacion: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input id="nombre" type="text" name="txtanioFabricacion"  required="">

          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          Marca: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           <input id="nombre" type="text" name="txtmarca"  required=""><br><br>
          Nº Motor:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input id="nombre" type="text" name="txtmotor"  required="">

          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          Nº Chasis : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           <input id="nombre" type="text" name="txtchasis"  required=""><br><br>
          Nº VIN: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input id="nombre" type="text" name="txtvin"  required="">

          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          Color:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;
            <input id="nombre" type="text" name="txtcolor"  required=""><br><br>
          PPU:  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input id="nombre" type="text" name="txtppu"  required="">

          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          Fecha de Inscripcion: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input id="nombre" type="date" name="txtfechainscripcion"  required=""><br><br>

          Fecha de Adquisición: &nbsp;&nbsp; <input id="nombre" type="date" name="txtfechaadquisicion"  required="">
          &nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp; Capacidad Ocupantes : &nbsp;&nbsp; <input id="nombre" type="text" name="txtcapaocupantes"  required=""><br><br>


          Estado de Unidad:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <select name="unidades">
              <?php
                  $unidad = $data->getUnidades();
                  foreach ($unidad as $u) {
                      echo "<option value='".$u->getIdEstadoUnidad()."'>";
                          echo $u->getNombreEstadoUnidad();
                      echo"</option>";
                  }
              ?>
          </select>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          Tipo de Vehiculo: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <select name="vehiculos">
              <?php
                  $vehiculo = $data->getVehiculos();
                  foreach ($vehiculo as $v) {
                      echo "<option value='".$v->getIdTipoVehiculo()."'>";
                          echo $v->getNombreTipoVehiculo();
                      echo"</option>";
                  }
              ?>
          </select>
          <br>
          <br>
          Entidad a cargo: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <select name="entidad">
              <?php
                  $entiPropietaria = $data->readEntidadesACargo();
                  foreach ($entiPropietaria as $ep) {
                      echo "<option value='".$ep->getIdEntidadACargo()."' >";
                          echo $ep->getNombreEntidadACargo();
                      echo"</option>";
                  }
              ?>
          </select><br><br>

      <center>
        <input type="submit" value="Crear Unidad"  name="btncrear" class="btn button-primary" style="width: 100px; height:60px;" style="margin-top: 400px">
      </center>

      </form>

          </div>
       </div>
   </div>

  </body>
</html>
