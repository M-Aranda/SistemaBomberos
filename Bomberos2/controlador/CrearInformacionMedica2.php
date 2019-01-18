<?php


require_once("../model/Data.php");

require_once("../model/Tbl_InfoMedica2.php");
require_once("../model/Tbl_GrupoSanguineo.php");
require_once("../model/Parentesco.php");
require_once("../model/Tbl_InfoPersonal.php");


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




 $idInformacionMedica2=$_REQUEST[""];
 $medicamentosHabitualesinformacionMedica2=$_REQUEST[""];
 $nombreContactoinformacionMedica2=$_REQUEST[""];
 $telefonoContactoinformacionMedica2=$_REQUEST[""];
 $fkParentescoContactoinformacionMedica2=$_REQUEST[""];
 $nivelActividadFisicainformacionMedica2=$_REQUEST[""];
 $esDonanteinformacionMedica2=$_REQUEST[""];
 $esFumadorinformacionMedica2=$_REQUEST[""];
 $fkGrupoSanguineoinformacionMedica2=$_REQUEST[""];
 $fkInfoPersonalinformacionMedica2=$_REQUEST[""];


$infoMedica2=new Tbl_InfoMedica2();

$infoMedica2->setidInformacionMedica2($idInformacionMedica2);
$infoMedica2->setmedicamentosHabitualesinformacionMedica2($medicamentosHabitualesinformacionMedica2);
$infoMedica2->setnombreContactoinformacionMedica2($nombreContactoinformacionMedica2);
$infoMedica2->settelefonoContactoinformacionMedica2($telefonoContactoinformacionMedica2);
$infoMedica2->setfkParentescoContactoinformacionMedica2($fkParentescoContactoinformacionMedica2);
$infoMedica2->setnivelActividadFisicainformacionMedica2($nivelActividadFisicainformacionMedica2);
$infoMedica2->setesDonanteinformacionMedica2($esDonanteinformacionMedica2);
$infoMedica2->setesFumadorinformacionMedica2($esFumadorinformacionMedica2);
$infoMedica2->setfkGrupoSanguineoinformacionMedica2($fkGrupoSanguineoinformacionMedica2);
$infoMedica2->setfkInfoPersonalinformacionMedica2($fkInfoPersonalinformacionMedica2);


$d= new Data();

$d->crearInformacionMedica2($infoMedica2);


header("location: ../index.php");






?>
