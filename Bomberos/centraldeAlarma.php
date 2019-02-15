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
/*
require_once("model/Data.php");
require_once("model/Tbl_Usuario.php");
$dataUsuario= new Data();
session_start();
if($_SESSION["usuarioIniciado"]!=null){
  $u=$_SESSION["usuarioIniciado"];
  if($dataUsuario->verificarSiUsuarioTienePermiso($u,1)==0){
    header("location: paginaError.php");
  }
}*/
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
    margin-top: -589px;
    margin-bottom: -1000px;
    width: 900px;
    height: 550px;
    ">

<style>


#cuadro1{

  width: 350px;
  height: 354px;
  border: 5px black outset;
  margin-top: -50px;
  border-radius: 80px 80px 80px 80px

}


#cuadro2{

  width: 320px;
  height: 369px;
  margin-top: -350px;
  margin-left: 450px;
  border: 5px black outset;
  border-radius: 80px 80px 80px 80px

}

#cuadro3{

  width: 800px;
  height: 120px;
  margin-top: 10px;
  border: 5px black outset;
  border-radius: 80px 80px 80px 80px


}

#cuadro4{

  width: 800px;
  height: 198px;
  margin-top: 5px;
  border: 5px black outset;
  border-radius: 80px 80px 80px 80px


}


</style>
<?php
    // unir vista con el modelo sin pasar por un controlador
    require_once("model/Data.php");
    $data = new Data();

?>


<div id="cuadro1">
    <div class="jumbotron" style="border-radius: 70px 70px 70px 70px" id="transparencia">
      <div class="container">
        <center>  Oficiales en Servicio</center><br>
        <div class="form-group" style="margin-left:10px;">
<center>
          &nbsp;
        CB &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        1 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        2 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        3 &nbsp;&nbsp; <br><br>

        1 <input type="button" value="1" style="width:20px;height:20px;" > &nbsp;&nbsp;&nbsp;
        71 &nbsp;<input type="button" value="71" style="width:20px;height:20px;" > &nbsp;&nbsp;&nbsp;
        72 <input type="button" value="72" style="width:20px;height:20px;" > &nbsp;&nbsp;&nbsp;
        73 <input type="button" value="73" style="width:20px;height:20px;" > &nbsp;&nbsp;
                  <br><br>


        2  <input type="button" value="2" style="width:20px;height:20px;" > &nbsp;&nbsp;&nbsp;
        41 &nbsp;<input type="button" value="41" style="width:20px;height:20px;" > &nbsp;&nbsp;&nbsp;
        42   <input type="button" value="42" style="width:20px;height:20px;" > &nbsp;&nbsp;&nbsp;&nbsp;
        43   <input type="button" value="43" style="width:20px;height:20px;" > &nbsp;&nbsp;
        <br><br>

        6  <input type="button" value="6" style="width:20px;height:20px;" > &nbsp;&nbsp;
        104  <input type="button" value="104" style="width:20px;height:20px;" > &nbsp;&nbsp;
        204  <input type="button" value="205" style="width:20px;height:20px;" > &nbsp;&nbsp;
        304   <input type="button" value="304" style="width:20px;height:20px;" > &nbsp;&nbsp;

        <br><br>

        7   <input type="button" value="7" style="width:20px;height:20px;" > &nbsp;&nbsp;
        105  <input type="button" value="105" style="width:20px;height:20px;" > &nbsp;&nbsp;
        205  <input type="button" value="205" style="width:20px;height:20px;" >  &nbsp;&nbsp;
        305 <input type="button" value="305" style="width:20px;height:20px;" > &nbsp;&nbsp;
      </center>
          </div>
        </div>
   </div>
</div>


 <div id="cuadro2" >
     <div class="jumbotron" style="border-radius: 70px 70px 70px 70px" id="transparencia">
       <div class="container">
         <center style="margin-top:-30px;"> Unidades</center><br>
       <div class="form-group" style="margin-left:10px;">


       b-1 <input type="button" value="1" style="width:20px;height:20px;" > &nbsp;&nbsp;&nbsp;
       b-2 &nbsp;<input type="button" value="1" style="width:20px;height:20px;" > &nbsp;&nbsp;&nbsp;
       b-3 <input type="button" value="1" style="width:20px;height:20px;" > &nbsp;&nbsp;
       <br><br>

       bx-1  <input type="button" value="1" style="width:20px;height:20px;" > &nbsp;&nbsp;&nbsp;
       bx-2 &nbsp;<input type="button" value="1" style="width:20px;height:20px;" > &nbsp;&nbsp;&nbsp;

       <br><br>

       Q-1  <input type="button" value="1" style="width:20px;height:20px;" > &nbsp;&nbsp;
       R-2  <input type="button" value="1" style="width:20px;height:20px;" > &nbsp;&nbsp;

       <br><br>

       R-1   <input type="button" value="1" style="width:20px;height:20px;" > &nbsp;&nbsp;<br><br>
       X-1  <input type="button" value="1" style="width:20px;height:20px;" > &nbsp;&nbsp; <br><br>
       K-1  <input type="button" value="1" style="width:20px;height:20px;" >  &nbsp;&nbsp;




       </div>

      </div>
    </div>
  </div>

  <!--

  <div id="cuadro3">
      <div class="jumbotron" style="border-radius: 70px 70px 70px 70px" id="transparencia">
        <div class="container">

        <div class="form-group" style="margin-left:0px;">



        </div>

       </div>
     </div>
   </div>

-->
   <div id="cuadro4">
       <div class="jumbotron" style="border-radius: 70px 70px 70px 70px" id="transparencia">
         <div class="container">

         <div class="form-group" style="margin-left:20px;">

           Nombre: &nbsp;&nbsp;<input type="text" name="txtnombre"> Rut: <input type="text" name="txtrut">
           Telefono: <input type="number" name="txtTF"><br><br>
           Direccion: <input type="text" name="txtdireccion">
           Tipo de Emergencia:
           <select  name="cboTiposDeServicios" style="width:175px; height:30px;">
           <?php


           $listado = $data->readTiposDeServicios();
           foreach($listado as $o => $objeto){
           ?>
           <option value="<?php echo $objeto->getId_tipo_servicio(); ?>"><?php echo $objeto->getCodigo_tipo_servicio(); ?></option>
           <?php
           }
           ?>
           </select>

           <input type="submit" value="Despachar">



         </div>

        </div>
      </div>
    </div>


  </body>
</html>
