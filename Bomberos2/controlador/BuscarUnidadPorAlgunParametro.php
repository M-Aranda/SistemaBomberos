<?php

require_once("../model/Data.php");
require_once("../model/VistaBusquedaDeUnidad.php");

$tipoDeBusqueda=$_REQUEST["tipoDeBusqueda"];

if($tipoDeBusqueda==1)
{
  //busqueda por nombre
  $nombreABuscar=$_REQUEST["txtBuscarNombreUnidad"];
  $id=1;
}else if($tipoDeBusqueda==2){
  //busqueda por estado de bombero
  $nombreABuscar="";
  $id=$_REQUEST["estadoUnidad"];

}else if($tipoDeBusqueda==3){
  //busqueda por compania
  $nombreABuscar="";
  $id=$_REQUEST["compania"];

}

echo $tipoDeBusqueda;
$d= new Data();

$resultados=$d->buscarUnidadPorNombreEstadoOCompania($nombreABuscar, $id, $tipoDeBusqueda);


session_start();
$_SESSION["resultadosDeBusquedaDeUnidad"] = $resultados;


header("location:../buscarUnidades.php ");



?>
