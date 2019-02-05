<?php

require_once("../model/Data.php");
require_once("../model/Vista_BuscarMaterialMenor.php");

$tipoDeBusqueda=$_REQUEST["tipoDeBusqueda"];

if($tipoDeBusqueda==1)
{

  $nombreABuscar=$_REQUEST["txtBuscaNombre"];
  $id=1;
}else if($tipoDeBusqueda==2){

  $nombreABuscar="";
  $id=$_REQUEST["compania"];

}else if($tipoDeBusqueda==3){

  $nombreABuscar="";
  $id=$_REQUEST["estadoMaterial"];

}

echo $tipoDeBusqueda;
$d= new Data();

$resultados=$d->buscarMaterialMenorPorNombreCompaniaOBodega($nombreABuscar, $id, $tipoDeBusqueda);


session_start();
$_SESSION["resultadosDeBusquedaDeMaterialMenor"] = $resultados;


header("location:../buscarInventario.php ");



?>
