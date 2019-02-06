<?php

require_once("../model/Data.php");
require_once("../model/VistaBusquedaDeUnidad.php");

session_start();

$tipoDeBusqueda=$_REQUEST["tipoDeBusqueda"];

if($tipoDeBusqueda==1)
{
  //busqueda por nombre
  $nombreABuscar=trim($_REQUEST["txtBuscarNombreUnidad"]);
  $id=1;
  $_SESSION["nombreUnidadSeleccionado"]=$nombreABuscar;
}else if($tipoDeBusqueda==2){
  //busqueda por estado de bombero
  $nombreABuscar="";
  $id=$_REQUEST["estadoUnidad"];
  $_SESSION["estadoUnidadSeleccionado"]=$id;

}else if($tipoDeBusqueda==3){
  //busqueda por compania
  $nombreABuscar="";
  $id=$_REQUEST["compania"];
  $_SESSION["companiaUnidadSeleccionado"]=$id;

}

echo $tipoDeBusqueda;
$d= new Data();

$resultados=$d->buscarUnidadPorNombreEstadoOCompania($nombreABuscar, $id, $tipoDeBusqueda);

$_SESSION["resultadosDeBusquedaDeUnidad"] = $resultados;


header("location:../buscarUnidades.php ");



?>
