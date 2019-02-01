<?php
require_once("../model/Data.php");
require_once("../model/Tbl_MaterialMenor.php");
$data = new Data();


$materialMenor= new Tbl_MaterialMenor();

$materialMenor->setId_material_menor($_REQUEST["idMaterialMenor"]);
$materialMenor->setNombre_material_menor($_REQUEST["txtnombreMaterial"]);
$materialMenor->setFk_entidad_a_cargo_material_menor($_REQUEST["entidad"]);
$materialMenor->setColor_material_menor($_REQUEST["txtcolorMaterial"]);
$materialMenor->setCantidad_material_menor($_REQUEST["txtcantidadMaterial"]);
$materialMenor->setMedida_material_menor($_REQUEST["numMedida"]);
$materialMenor->setFk_unidad_de_medida_material_menor($_REQUEST["cboxMedida"]);
$materialMenor->setFk_ubicacion_fisica_material_menor($_REQUEST["cboxUbicacion"]);
$materialMenor->setFabricante_material_menor($_REQUEST["txtFabricante"]);
$materialMenor->setFecha_de_caducidad_material_menor($_REQUEST["txtCaducidad"]);
$materialMenor->setProveedor_material_menor($_REQUEST["txtProveedor"]);
$materialMenor->setFk_tipo_de_bodega_material_menor($_REQUEST["cboTipoDeBodega"]);


$data->actualizarMaterialMenor($materialMenor);

header("location: ../buscarInventario.php");

?>
