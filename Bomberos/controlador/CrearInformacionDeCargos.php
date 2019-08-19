<?php
require_once("../model/Data.php");
session_start();
$d= new Data();

$infoCargos=new Tbl_informacionDeCargos();

$materialesAsignadosAlCargo=$_REQUEST["cantidadDeMaterialesAsignados"];

$infoCargos->setId_informacionDeCargos($_SESSION['idDeBomberoMasReciente']);
$infoCargos->setFk_materialMenorAsignado_informacionDeCargos($_REQUEST['cboMaterialesDisponibles']);
$infoCargos->setCantidadAsignada_informacionDeCargos($materialesAsignadosAlCargo);
$infoCargos->setFk_personal_informacionDeCargos($_SESSION['idDeBomberoMasReciente']);

$d->crearInformacionCargos($infoCargos);
$cantidadNueva=($d->getStockDeMaterial($_REQUEST['cboMaterialesDisponibles']))-($materialesAsignadosAlCargo);
$d->actualizarStockDeMaterialMenor($_REQUEST['cboMaterialesDisponibles'],$cantidadNueva);

echo $_REQUEST['cboMaterialesDisponibles'];
echo $cantidadNueva;

if(isset($_SESSION['seEstaModificandoUBombero'])){
  header("location: CargarFichaAModificar.php");
}else{
    header("location: ../CrearFicha.php");
}

?>
