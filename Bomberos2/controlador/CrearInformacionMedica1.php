<?php


require_once("../model/Data.php");

require_once("../model/Tbl_InfoMedica1.php");


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




$idInformacionMedica1=$_REQUEST[""];
$prestacionMedica_informacionMedica1=$_REQUEST[""];
$alergias_informacionMedica1=$_REQUEST[""];
$enfermedadesCronicasinformacionMedica1=$_REQUEST[""];
$fkInfoPersonalinformacionMedica1=$_REQUEST[""];

$infoMedica1=new Tbl_InfoMedica1();

$infoMedica1->setidInformacionMedica1($idInformacionMedica1);
$infoMedica1->setprestacionMedica_informacionMedica1($prestacionMedica_informacionMedica1);
$infoMedica1->setalergias_informacionMedica1($alergias_informacionMedica1);
$infoMedica1->setenfermedadesCronicasinformacionMedica1($enfermedadesCronicasinformacionMedica1);
$infoMedica1->setfkInfoPersonalinformacionMedica1($fkInfoPersonalinformacionMedica1);


$d= new Data();

$d->crearInformacionMedica1($infoMedica1);


header("location: ../index.php");






?>
