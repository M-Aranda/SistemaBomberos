<?php

require_once("../model/Data.php");

session_start();


$idABuscar=$_SESSION["idSolicitado"];

echo $idABuscar;

$d= new Data();

$infoPersonal=$d->getInfoPersonal($idABuscar);
$infoMedidas=$d->getInfoMedidas($idABuscar);
$infoBomberil=$d->getInfoBomberil($idABuscar);


$_SESSION["infoPersonalSolicitada"] = $infoPersonal;
$_SESSION["infoMedidasSolicitada"] = $infoMedidas;
$_SESSION["infoBomberilSolicitada"] = $infoBomberil;


header("location:../verFicha.php ");



?>
