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

  <?php
require_once("model/Data.php");
require_once("model/Tbl_Usuario.php");
$dataUsuario= new Data();
session_start();
if($_SESSION["usuarioIniciado"]!=null){
  $u=$_SESSION["usuarioIniciado"];
  if($dataUsuario->verificarSiUsuarioTienePermiso($u,1)==0){
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
            <li><a href="#">Ver Unidades</a></li>
            <li><a href="#">Modificar</a></li>
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

      <div class="form-group" style="margin-left:50px;">
        <span><h5 style="font-weight:bold;">Buscar</h5></span>
        <form action="controlador/BuscarBomberoPorAlgunParametro.php" method="post">
        <form>
        <input type="text" name="txtBuscar"  placeholder="Buscar por nombre" style="height:30px;">
        <input type="hidden" name="tipoDeBusqueda" value="1">
        <input class="btn btn-default" type="submit" name="btnInfoPersonal" value="Buscar" class="btn button-primary" style="width: 100px; height:30px;" style="margin-top: 400px;">
      <!--  <button class="btn btn-default" name="btnBuscar" style="width: 100px; height:30px;" style="margin-top: 400px"> <a href="·" style="text-decoration:none;color:black;">Buscar</a> </button> -->
        <form>

        <form action="controlador/BuscarBomberoPorAlgunParametro.php" method="post">
        <span><h5 style="font-weight:bold;">Estado de Bombero</h5></span>
              <select name="estadoBombero" style="width:175px; height:30px;">
                <?php
                    $tipoBombero = $data->readEstadosDeBomberos();
                    foreach ($tipoBombero as $tb) {
                        echo "<option value='".$tb->getIdEstado()."'>";
                            echo $tb->getNombreEstado();
                        echo"</option>";
                    }
                ?>
              </select>
              <input type="hidden" name="tipoDeBusqueda" value="2">
              <input class="btn btn-default" type="submit" name="btnInfoPersonal" value="Buscar" class="btn button-primary" style="width: 100px; height:30px;" style="margin-top: 400px;">
              <form>
              <!-- <button class="btn btn-default" name="btnBuscarTipo" style="width: 100px; height:30px;" style="margin-top: 400px"> <a href="·" style="text-decoration:none;color:black;">Buscar</a> </button> -->

              <form action="controlador/BuscarBomberoPorAlgunParametro.php" method="post">
              <span><h5 style="font-weight:bold;">Compañia</h5></span>
                <select name="compania" style="width:175px; height:30px;">
                  <?php
                      $compania = $data->readSoloCompanias();
                      foreach ($compania as $c) {
                          echo "<option value='".$c->getIdEntidadACargo()."'>";
                              echo $c->getNombreEntidadACargo();
                          echo"</option>";
                      }
                  ?>

                </select>
                <input type="hidden" name="tipoDeBusqueda" value="3">
                <input class="btn btn-default" type="submit" name="btnInfoPersonal" value="Buscar" class="btn button-primary" style="width: 100px; height:30px;" style="margin-top: 400px;">
              </form>
              <!--  <button class="btn btn-default" name="btnBuscarCompania" style="width: 100px; height:30px;" style="margin-top: 400px"> <a href="·" style="text-decoration:none;color:black;">Buscar</a> </button> -->



                <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>Rut</th>
                        <th>Nombre</th>
                        <th>APP</th>
                        <th>Compañia</th>
                        <th>Ver Ficha</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php

                      if(isset($_SESSION["resultadosDeBusquedaDeBomberos"])){
                        // se hizo una busqueda
                        $listado=$_SESSION["resultadosDeBusquedaDeBomberos"];

                        foreach ($listado as $o => $objeto) {
                          ?>
                          <tr>
                            <td><?php echo $objeto->getRut();?></td>
                            <td><?php echo $objeto->getNombre();?></td>
                            <td><?php echo $objeto->getApellidoPaterno();?></td>
                            <td><?php echo $objeto->getCompania();?></td>
                            <td><?php echo $objeto->getIdInfoPersonal();?></td>
                          </tr>
                        <?php
                      }

                    unset($_SESSION["resultadosDeBusquedaDeBomberos"]);


                    }
                      ?>







                    </tbody>
                  </table>


      </div>




     </div>
   </div>
 </div>
</div>

  </body>
</html>
