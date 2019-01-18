<?php

require_once("../model/Data.php");
require_once("../model/Tbl_InfoBomberil.php");

require_once("../model/Tbl_InfoPersonal.php");

require_once("../model/Tbl_Region.php");
require_once("../model/Tbl_Compañia.php");
require_once("../model/Tbl_EstadoBombero.php");
require_once("../model/Tbl_Cargo.php");

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

$id=0;
$fk_region=$_REQUEST[""];
$cuerpo=$_REQUEST[""];
$fk_compania=$_REQUEST[""];
$fk_cargo=$_REQUEST[""];
$fecha_ingreso=$_REQUEST[""];
$nrg=$_REQUEST[""];
$fk_estado=$_REQUEST[""];
$nrc=$_REQUEST[""];
$fk_infoPersonal=$_REQUEST[""];

$d= new Data();
$infoBomberil= new Tbl_InfoBomberil();

$infoBomberil->setIdInformacionBomberil($id);
$infoBomberil->setfkRegioninformacionBomberil($fk_region);
$infoBomberil->setcuerpoInformacionBomberil($cuerpo);
$infoBomberil->setfkCompaniainformacionBomberil($fk_compania);
$infoBomberil->setfkCargoinformacionBomberil($fk_cargo);
$infoBomberil->setfechaIngresoinformacionBomberil($fecha_ingreso);
$infoBomberil->setNRegGeneralinformacionBomberil($nrg);
$infoBomberil->setfkEstadoinformacionBomberil($fk_estado);
$infoBomberil->setNRegCiainformacionBomberil($nrc);
$infoBomberil->setfkInfoPersonalinformacionBomberil($fk_infoPersonal);



header("location: ../index.php");


?>
