<?php


require_once("../model/Data.php");

require_once("../model/Tbl_InfoAcademica.php");
require_once("../model/Tbl_InfoPersonal.php");
require_once("../model/Tbl_EstadoCurso.php");

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


 $idInformacionAcademica=0;
 $fechaInformacionAcademica=$_REQUEST["txtFechaActividadAcademica"];
 $actividadInformacionAcademica=$_REQUEST["txtActivdidadAcademica"];
 $fkEstadoCursoInformacionAcademica=$_REQUEST["cboEstadoCursoAcademico"];
 $fkInformacionPersonalInformacionAcademica=1;


$infoAcademica=new Tbl_InfoAcademica();

$infoAcademica->setIdidInformacionAcademica($idInformacionAcademica);
$infoAcademica->setfechaInformacionAcademica($fechaInformacionAcademica);
$infoAcademica->setactividadInformacionAcademica($actividadInformacionAcademica);
$infoAcademica->setfkEstadoCursoInformacionAcademica($fkEstadoCursoInformacionAcademica);
$infoAcademica->setfkInformacionPersonalInformacionAcademica($fkInformacionPersonalInformacionAcademica);


$d= new Data();

$d->crearInformacionAcademica($infoAcademica);


 header("location: ../CrearFicha.php");






?>
