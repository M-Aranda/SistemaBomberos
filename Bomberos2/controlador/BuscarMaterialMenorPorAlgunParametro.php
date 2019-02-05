<?php

require_once("../model/Data.php");
require_once("../model/Vista_BuscarMaterialMenor.php");

$tipoDeBusqueda=$_REQUEST["tipoDeBusqueda"];

session_start();

if($tipoDeBusqueda==1)
{

  $nombreABuscar=trim($_REQUEST["txtBuscaNombre"]);
  $id=1;
  $_SESSION["nombreMaterialSeleccionado"]=$nombreABuscar;
}else if($tipoDeBusqueda==2){

  $nombreABuscar="";
  $id=$_REQUEST["compania"];
  $_SESSION["companiaMaterialSeleccionado"]=$id;

}else if($tipoDeBusqueda==3){

  $nombreABuscar="";
  $id=$_REQUEST["estadoMaterial"];
  $_SESSION["estadoMaterialSeleccionado"]=$id;

}

echo $tipoDeBusqueda;
$d= new Data();

$resultados=$d->buscarMaterialMenorPorNombreCompaniaOBodega($nombreABuscar, $id, $tipoDeBusqueda);


$_SESSION["resultadosDeBusquedaDeMaterialMenor"] = $resultados;





header("location:../buscarInventario.php ");



?>
