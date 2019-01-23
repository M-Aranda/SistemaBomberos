<?php


require_once("../model/Data.php");

require_once("../model/Tbl_InfoHistorica.php");
require_once("../model/Tbl_InfoPersonal.php");
require_once("../model/Tbl_Compania.php");
require_once("../model/Tbl_Region.php");


/*
require_once("../model/Tbl_comuna.php");
require_once("../model/Tbl_EntrenamientoEstandar.php");
require_once("../model/Tbl_EstadoCurso.php");
require_once("../model/Tbl_GrupoSanguineo.php");
require_once("../model/Tbl_InfoAcademica.php");
require_once("../model/Tbl_InfoBomberil.php");
require_once("../model/Tbl_InfoFamiliar.php");
require_once("../model/Tbl_InfoHistorica.php");
require_once("../model/Tbl_InfoLaboral.php");
require_once("../model/Tbl_InfoMedica1.php");
require_once("../model/Tbl_InfoMedica2.php");
require_once("../model/Parentesco.php");
require_once("../model/Provincia.php");
*/

 $idInformacionHistorica=0;
 $fkRegioninformacionHistorica=$_REQUEST["cboRegion2"];
 $cuerpo=$_REQUEST["txtCuerpoInfoHistorica"];
 $compania=$_REQUEST["txtCompania"];
 $fechaDeCambio=$_REQUEST["fechaInfoHistorica"];
 $premio=$_REQUEST["txtPremioInforHistorica"];
 $motivo=$_REQUEST["txtMotivoInfoHistorica"];
 $detalle=$_REQUEST["txtDetallesInfoHistorica"];
 $cargo=$_REQUEST["txtCargoInfoHistorica"];
 $fkInfoPersonalinformacionHistorica=1;


$infoHistorica=new Tbl_InfoHistorica();

$infoHistorica->setIdInformacionHistorica($idInformacionHistorica);
$infoHistorica->setfkRegioninformacionHistorica($fkRegioninformacionHistorica);
$infoHistorica->setcuerpo($cuerpo);
$infoHistorica->setcompania($compania);
$infoHistorica->setfechaDeCambio($fechaDeCambio);
$infoHistorica->setPremio($premio);
$infoHistorica->setmotivo($motivo);
$infoHistorica->setdetalle($detalle);
$infoHistorica->setCargo($cargo);
$infoHistorica->setfkInfoPersonalinformacionHistorica($fkInfoPersonalinformacionHistorica);

$d= new Data();


$d->crearInformacionHistorica($infoHistorica);


header("location: ../CrearFicha.php");

?>
