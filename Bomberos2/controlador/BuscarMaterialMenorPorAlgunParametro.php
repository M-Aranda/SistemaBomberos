<?php

require_once("../model/Data.php");
require_once("../model/Vista_BuscarMaterialMenor.php");

$tipoDeBusqueda=$_REQUEST["tipoDeBusqueda"];

if($tipoDeBusqueda==1)
{
  //busqueda por nombre
  $nombreABuscar=$_REQUEST["txtBuscaNombre"];
  $id=1;
}else if($tipoDeBusqueda==2){
  //busqueda por estado de bombero
  $nombreABuscar="";
  $id=$_REQUEST["tipoBodega"];

}else if($tipoDeBusqueda==3){
  //busqueda por compania
  $nombreABuscar="";
  $id=$_REQUEST["compania"];

}

echo $tipoDeBusqueda;
$d= new Data();

$resultados=$d->buscarMaterialMenorPorNombreCompaniaOBodega($nombreABuscar, $id, $tipoDeBusqueda);


session_start();
$_SESSION["resultadosDeBusquedaDeMaterialMenor"] = $resultados;


header("location:../buscarInventario.php ");



?>
