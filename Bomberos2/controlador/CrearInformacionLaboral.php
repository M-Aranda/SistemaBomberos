<?php


require_once("../model/Data.php");

require_once("../model/Tbl_InfoLaboral.php");


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


$idInformacionLaboral=$_REQUEST[""];
$nombreEmpresainformacionLaboral=$_REQUEST[""];
$direccionEmpresainformacionLaboral=$_REQUEST[""];
$telefonoEmpresainformacionLaboral=$_REQUEST[""];
$cargoEmpresainformacionLaboral=$_REQUEST[""];
$fechaIngresoEmpresainformacionLaboral=$_REQUEST[""];
$areaDeptoEmpresainformacionLaboral=$_REQUEST[""];
$afp_informacionLaboral=$_REQUEST[""];
$profesion_informacionLaboral=$_REQUEST[""];
$fkInfoPersonalinformacionLaboral=$_REQUEST[""];

$infoLaboral=new Tbl_InfoLaboral();

$infoLaboral->setIdidInformacionLaboral($idInformacionLaboral);
$infoLaboral->setnombreEmpresainformacionLaboral($nombreEmpresainformacionLaboral);
$infoLaboral->setdireccionEmpresainformacionLaboral($direccionEmpresainformacionLaboral);
$infoLaboral->settelefonoEmpresainformacionLaboral($telefonoEmpresainformacionLaboral);
$infoLaboral->setcargoEmpresainformacionLaboral($cargoEmpresainformacionLaboral);
$infoLaboral->setfechaIngresoEmpresainformacionLaboral($fechaIngresoEmpresainformacionLaboral);
$infoLaboral->setareaDeptoEmpresainformacionLaboral($areaDeptoEmpresainformacionLaboral);
$infoLaboral->setafp_informacionLaboral($afp_informacionLaboral);
$infoLaboral->setprofesion_informacionLaboral($profesion_informacionLaboral);
$infoLaboral->setfkInfoPersonalinformacionLaboral($fkInfoPersonalinformacionLaboral);


$d= new Data();
$d->crearInformacionLaboral($infoLaboral);



header("location: ../index.php");






?>
