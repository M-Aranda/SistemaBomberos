<?php


require_once("../model/Data.php");

require_once("../model/Tbl_EntrenamientoEstandar.php");
require_once("../model/Tbl_InfoPersonal.php");
require_once("../model/Tbl_EstadoCurso.php");

/*
require_once("../model/Tbl_comuna.php");

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



  $idEntrenamientoEstandar=$_REQUEST[""];
  $fechaEntrenamientoEstandar=$_REQUEST[""];
  $actividad=$_REQUEST[""];
  $fkEstadoCurso=$_REQUEST[""];
  $fkInformacionPersonal=$_REQUEST[""];


$infoEntrenamientoEstandar=new Tbl_EntrenamientoEstandar();

$infoEntrenamientoEstandar->setIdEntrenamientoEstandar($idEntrenamientoEstandar);
$infoEntrenamientoEstandar->setfechaEntrenamientoEstandar($fechaEntrenamientoEstandar);
$infoEntrenamientoEstandar->setactividad($actividad);
$infoEntrenamientoEstandar->setFkEstadoCurso($fkEstadoCurso);
$infoEntrenamientoEstandar->setFkInformacionPersonal($fkInformacionPersonal);


$d= new Data();

$d->crearInformacionEntrenamientoEstandar($infoEntrenamientoEstandar);


header("location: ../index.php");






?>
