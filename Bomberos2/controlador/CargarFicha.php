<?php

require_once("../model/Data.php");


$idABuscar=$_REQUEST["idBombero"];




$d= new Data();

$infoPersonal=$d->getInfoPersonal($idABuscar);
$infoMedidas=$d->getInfoMedidas($idABuscar);


session_start();
$_SESSION["infoPersonalSolicitada"] = $infoPersonal;
$_SESSION["infoMedidasSolicitada"] = $infoMedidas;


header("location:../verFicha.php ");



?>
