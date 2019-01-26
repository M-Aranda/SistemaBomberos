<?php

require_once("../model/Data.php");

session_start();

//$idABuscar=$_REQUEST["idBombero"];

  $idABuscar=$_SESSION["info"];

echo $idABuscar;

$d= new Data();

$infoPersonal=$d->getInfoPersonal($idABuscar);
$infoMedidas=$d->getInfoMedidas($idABuscar);



$_SESSION["infoPersonalSolicitada"] = $infoPersonal;
$_SESSION["infoMedidasSolicitada"] = $infoMedidas;


//header("location:../verFicha.php ");



?>
