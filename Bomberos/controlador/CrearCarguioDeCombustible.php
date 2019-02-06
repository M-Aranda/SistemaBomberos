<?php
require_once("../model/Data.php");
require_once("../model/Tbl_carguiCombustible.php");

$d= new Data();

 $id_cargio_combustible=0;
 $responsable_cargio_combustible=$_REQUEST["txtresponsablecombustible"];
 $fecha_cargio=$_REQUEST["txtFechaCombustible"];
 $direccion_cargio=$_REQUEST["txtDireccionCombustible"];
 $fk_tipo_combustible_cargio_combustible=$_REQUEST["cboTipoCombustible"];
 $cantidad_litros_cargio_combustible=$_REQUEST["txtcantidad"];
 $precio_litro_cargio_combustible=$_REQUEST["txtpreciolitro"];
 $observacion_cargio_combustible=$_REQUEST["txtcomentario"];
 $fk_unidad=$_REQUEST["cboUnidades2"];

$carga=new Tbl_cargio_combustible();

$carga->setId_cargio_combustible($id_cargio_combustible);
$carga->setResponsable_cargio_combustible($responsable_cargio_combustible);
$carga->setFecha_cargio($fecha_cargio);
$carga->setDireccion_cargio($direccion_cargio);
$carga->setFk_tipo_combustible_cargio_combustible($fk_tipo_combustible_cargio_combustible);
$carga->setCantidad_litros_cargio_combustible($cantidad_litros_cargio_combustible);
$carga->setPrecio_litro_cargio_combustible($precio_litro_cargio_combustible);
$carga->setObservacion_cargio_combustible($observacion_cargio_combustible);
$carga->setFk_unidad($fk_unidad);


$d->crearCargaDeCombustible($carga);

 header("location: ../CrearUnidades.php");
?>
