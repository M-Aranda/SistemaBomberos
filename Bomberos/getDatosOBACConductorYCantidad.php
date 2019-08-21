<?php
require_once("model/Data.php");
$data = new Data();

$idServicioUni = isset($_REQUEST['idServicioUnidad'])?$_REQUEST['idServicioUnidad']:"";

$datosOficialConductorCantidad=$data->getOBACCoonductorYCantidad($idServicioUni);

$obac=$datosOficialConductorCantidad->getObac();
$conductor=$datosOficialConductorCantidad->getConductor();
$cantidad=$datosOficialConductorCantidad->getCantidad();

if($obac=="]"){
  $obac="";
}
if($conductor=="]"){
  $conductor="";
}
if($cantidad=="]"){
  $cantidad="";
}

$arrayRepresentativoDelObjeto=array("obac"=>($obac) ,"conductor"=> ($conductor), "cantidad"=>($cantidad));


$obj=json_encode($arrayRepresentativoDelObjeto);
echo $obj;
?>
