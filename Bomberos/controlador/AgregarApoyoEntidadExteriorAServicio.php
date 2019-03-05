<?php
require_once("../model/Data.php");
$d= new Data();
$idServicio=$_REQUEST["idDeServicioAlQueSeVaAApoyar"];

$idEntidadExterna=$_REQUEST["entidadExteriorApoyando"];
$responsable=$_REQUEST["txtresposableapoyo"];;
$ppu=$_REQUEST["txtppuapoyo"];;

$d->crearNuevoApoyo($idEntidadExterna, $responsable, $ppu);
$idApoyo=$d->getIDApoyoMasReciente();

$d->agregarEntidadExteriorComoApoyo($idServicio,$idApoyo);

header("location:../centralDeDespacho.php");

?>
