<?php

require_once("../model/Data.php");
require_once("../model/Tbl_InfoBomberil.php");
require_once("../model/Tbl_InfoPersonal.php");
require_once("../model/Tbl_Region.php");
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

$d= new Data();

$id=1;
$fk_region=$_REQUEST["cboRegion"];
$cuerpo=$_REQUEST["txtcuerpo"];
$fk_compania=$_REQUEST["compania"];
$fk_cargo=$_REQUEST["cboCargo"];
$fecha_ingreso=$_REQUEST["txtfingreso"];
$nrg=$_REQUEST["txtgeneral"];
$fk_estado=$_REQUEST["cboEstadoBombero"];
$nrc=$_REQUEST["txtcia"];
$fk_infoPersonal=$_REQUEST["cboBombero1"];


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

$d->crearInformacionBomberil($infoBomberil);


header("location: ../CrearFicha.php");


?>
