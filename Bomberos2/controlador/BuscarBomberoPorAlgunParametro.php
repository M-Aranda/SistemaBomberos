<?php

require_once("../model/Data.php");
require_once("../model/Vista_BusquedaBombero.php");

$tipoDeBusqueda=$_REQUEST["tipoDeBusqueda"];

if($tipoDeBusqueda==1)
{
  //busqueda por nombre
  $nombreABuscar=trim($_REQUEST["txtBuscar"]);
  $id=1;
}else if($tipoDeBusqueda==2){
  //busqueda por estado de bombero
  $nombreABuscar=$_REQUEST["txtBuscar"];
  $id=$_REQUEST["estadoBombero"];

}else if($tipoDeBusqueda==3){
  //busqueda por compania
  $nombreABuscar=$_REQUEST["txtBuscar"];
  $id=$_REQUEST["compania"];

}


$d= new Data();

$resultados=$d->buscarInformacionDeBomberoParaTabla($nombreABuscar, $id, $tipoDeBusqueda);


session_start();
$_SESSION["resultadosDeBusquedaDeBomberos"] = $resultados;


header("location:../buscarBombero.php ");



?>
