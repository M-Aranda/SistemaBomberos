<?php
require_once("../model/Data.php");
session_start();
$d= new Data();

$infoCargos=new Tbl_informacionDeCargos();

$infoCargos->setId_informacionDeCargos($_SESSION['idDeBomberoMasReciente']);
$infoCargos->setNombre_informacionDeCargos($_REQUEST["txtnombrecargo"]);
$infoCargos->setMarca_informacionDeCargos($_REQUEST["txtmarcacargo"]);
$infoCargos->setTalla_informacionDeCargos($_REQUEST["txttalla"]);
$infoCargos->setSerie_informacionDeCargos($_REQUEST["txtserie"]);
$infoCargos->setFecha_informacionDeCargos($_REQUEST["txtfechacargo"]);
$infoCargos->setCantidadAsignada_informacionDeCargos($_REQUEST["cantidadDeMaterialesAsignados"]);
$infoCargos->setFk_personal_informacionDeCargos($_SESSION['idDeBomberoMasReciente']);

$d->crearInformacionCargos($infoCargos);
$cantidadNueva=($d->getStockDeMaterial($_REQUEST['cboMaterialesDisponibles']))-($_REQUEST["cantidadDeMaterialesAsignados"]);
$d->actualizarStockDeMaterialMenor($_REQUEST['cboMaterialesDisponibles'],$cantidadNueva);

if(isset($_SESSION['seEstaModificandoUBombero'])){
  header("location: CargarFichaAModificar.php");
}else{
    header("location: ../CrearFicha.php");
}
?>
