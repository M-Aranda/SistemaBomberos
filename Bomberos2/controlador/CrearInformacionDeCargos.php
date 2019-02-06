<?php
require_once("../model/Data.php");
session_start();

$infoCargos=new Tbl_informacionDeCargos();

$infoCargos->setId_informacionDeCargos($_SESSION['idDeBomberoMasReciente']);
$infoCargos->setNombre_informacionDeCargos($_REQUEST["txtnombrecargo"]);
$infoCargos->setMarca_informacionDeCargos($_REQUEST["txtmarcacargo"]);
$infoCargos->setTalla_informacionDeCargos($_REQUEST["txttalla"]);
$infoCargos->setSerie_informacionDeCargos($_REQUEST["txtserie"]);
$infoCargos->setFecha_informacionDeCargos($_REQUEST["txtfechacargo"]);
$infoCargos->setFk_personal_informacionDeCargos($_SESSION['idDeBomberoMasReciente']);

$d= new Data();

$d->crearInformacionCargos($infoCargos);
header("location: ../CrearFicha.php");

?>
