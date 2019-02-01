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


$data= new Data();

if(isset($_SESSION["materialMenorAModificarSolicitado"])){
  $material=$_SESSION["materialMenorAModificarSolicitado"];
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
    margin-top: -650px;
    margin-bottom: -1000px;
    ">

<style>

#transparencia{
    opacity: .85;
    -moz-opacity: .85;
    filter: alpha(opacity=85);

}

</style>


<div style="width: 800px" style="height: 400px">
    <div class="jumbotron" style="border-radius: 70px 70px 70px 70px" id="transparencia">
      <div class="container">

      <div class="form-group" style="margin-left:50px;">
        <span><h5 style="font-weight:bold;">Inventario</h5></span>

        <form action="controlador/ActualizarMaterialMenor.php" method="post" >



          Nombre Material: <input type="text" name="txtnombreMaterial" value="<?php echo $material->getNombre_material_menor(); ?>" >

          Entidad a Cargo:
           <select name="entidad" >
               <?php
                   $entiPropietaria = $data->getEntidadACargo();
                   foreach ($entiPropietaria as $ep) {
                     if($material->getFk_entidad_a_cargo_material_menor()==$ep->getIdEntidadACargo()){?>
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

          Color: <input type="text" name="txtcolorMaterial" value="<?php echo $material->getColor_material_menor(); ?>" >

          Cantidad:
           <input Type="number" name="txtcantidadMaterial" value="<?php echo $material->getCantidad_material_menor(); ?>"  ><br><br>

           Medida: <input type="number" name="numMedida" value="<?php echo $material->getMedida_material_menor(); ?>" >

          Unidad de Medida:
          <select name="cboxMedida" >
            <?php
             $medidas = $data->getMedidas();
             foreach ($medidas as $me) {
               if($material->getFk_unidad_de_medida_material_menor()==$me->getIdUnidadMedida()){?>
                 <option value="<?php echo $me->getIdUnidadMedida(); ?>" selected ><?php echo  utf8_encode($me->getNombreUnidadMedida()); ?></option>
                 <?php
               }else{
                   ?>
                   <option value="<?php echo $me->getIdUnidadMedida(); ?>" ><?php echo utf8_encode($me->getNombreUnidadMedida()); ?></option>
                   <?php
                 }
               }
         ?>



          </select>

          Ubicacion Fisica:
          <select name="cboxUbicacion" >
            <?php
            $ubicacionesFisicas = $data->getUbicacionFisica();
            foreach ($ubicacionesFisicas as $ubi) {
              if($material->getFk_ubicacion_fisica_material_menor()==$ubi->getIdUbicacionFisica()){?>
                <option value="<?php echo $ubi->getIdUbicacionFisica(); ?>" selected ><?php echo utf8_encode($ubi->getNombreUbicacionFisica()); ?></option>
                <?php
              }else{
                  ?>
                  <option value="<?php echo $ubi->getIdUbicacionFisica(); ?>" ><?php echo utf8_encode($ubi->getNombreUbicacionFisica()); ?></option>
                  <?php
                }
              }
        ?>
          </select>
          <br><br>
          Fabricante:
          <input type="text" name="txtFabricante" value="<?php echo $material->getFabricante_material_menor(); ?>" >

          Fecha de Caducidad:
          <input type="date" name="txtCaducidad" value="<?php echo $material->getFecha_de_caducidad_material_menor(); ?>"  >
          <br><br>

          Proveedor: <input type="text" value="<?php echo $material->getProveedor_material_menor(); ?>" name="txtProveedor" >

          Tipo de Bodega:
           <select name="cboTipoDeBodega" >
           <?php
           $tiposDeBodega = $data->getTipoBodega();
           foreach ($tiposDeBodega as $bod) {
             if($material->getFk_tipo_de_bodega_material_menor()==$bod->getIdidTipoBodega()){?>
               <option value="<?php echo $bod->getIdidTipoBodega(); ?>" selected ><?php echo utf8_encode($bod->getNombreTipoBodega()); ?></option>
               <?php
             }else{
                 ?>
                 <option value="<?php echo $bod->getIdidTipoBodega(); ?>" ><?php echo utf8_encode($bod->getNombreTipoBodega()); ?></option>
                 <?php
               }
             }
       ?>
         </select>
         <input type="hidden" name="idMaterialMenor" value="<?php echo $material->getId_material_menor();?>">
           <br><br>
             <center> <input type="submit" name="btncrear" value="Modificar Material" class="btn button-primary" style="width: 150px;" > <span ></span>


             </form>



      </div>



     </div>
   </div>
 </div>
</div>

  </body>
</html>
