<?php


require_once("../model/Data.php");

require_once("../model/Tbl_InfoHistorica.php");
require_once("../model/Tbl_InfoPersonal.php");

require_once("../model/Tbl_Compañia.php");
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

 $idInformacionHistorica=$_REQUEST[""];
 $fkRegioninformacionHistorica=$_REQUEST[""];
 $cuerpo=$_REQUEST[""];
 $compania=$_REQUEST[""];
 $fechaDeCambio=$_REQUEST[""];
 $tipoDeCambio=$_REQUEST[""];
 $motivo=$_REQUEST[""];
 $detalle=$_REQUEST[""];
 $fkInfoPersonalinformacionHistorica=$_REQUEST[""];


$infoHistorica=new Tbl_InfoHistorica();

$infoHistorica->setIdInformacionHistorica($idInformacionHistorica);
$infoHistorica->setfkRegioninformacionHistorica($fkRegioninformacionHistorica);
$infoHistorica->setcuerpo($cuerpo);
$infoHistorica->setcompania($compania);
$infoHistorica->setfechaDeCambio($fechaDeCambio);
$infoHistorica->settipoDeCambio($tipoDeCambio);
$infoHistorica->setmotivo($motivo);
$infoHistorica->setdetalle($detalle);
$infoHistorica->setfkInfoPersonalinformacionHistorica($fkInfoPersonalinformacionHistorica);

$d= new Data();

$d->crearInformacionHistorica($infoHistorica);


header("location: ../index.php");






?>
