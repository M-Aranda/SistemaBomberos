<?php

require_once("../model/Data.php");
require_once("../model/Tbl_InfoMedica1.php");
require_once("../model/Tbl_InfoMedica2.php");
require_once("../model/Tbl_GrupoSanguineo.php");
require_once("../model/Tbl_Parentesco.php");
require_once("../model/Tbl_InfoPersonal.php");



$idInformacionMedica1=0;
$prestacionMedica_informacionMedica1=$_REQUEST["txtpresmedica"];
$alergias_informacionMedica1=$_REQUEST["txtalergias"];
$enfermedadesCronicasinformacionMedica1=$_REQUEST["txtenfermedadescronicas"];
$fkInfoPersonalinformacionMedica1=$_REQUEST["cboBomberoInfoMedica"];

$infoMedica1=new Tbl_InfoMedica1();

$infoMedica1->setidInformacionMedica1($idInformacionMedica1);
$infoMedica1->setprestacionMedica_informacionMedica1($prestacionMedica_informacionMedica1);
$infoMedica1->setalergias_informacionMedica1($alergias_informacionMedica1);
$infoMedica1->setenfermedadesCronicasinformacionMedica1($enfermedadesCronicasinformacionMedica1);
$infoMedica1->setfkInfoPersonalinformacionMedica1($fkInfoPersonalinformacionMedica1);


$d= new Data();

$d->crearInformacionMedica1($infoMedica1);




 $idInformacionMedica2=0;
 $medicamentosHabitualesinformacionMedica2=$_REQUEST["txtmedicamentosHabituales"];
 $nombreContactoinformacionMedica2=$_REQUEST["txtnomContacto"];
 $telefonoContactoinformacionMedica2=$_REQUEST["txttlfcontacto"];
 $fkParentescoContactoinformacionMedica2=$_REQUEST["cboParentesco1"];
 $nivelActividadFisicainformacionMedica2=$_REQUEST["txtactvfisica"];

if ($_POST['txtdonante'] == 'seleccionado') {
  $esDonanteinformacionMedica2=TRUE;
}else {
  $esDonanteinformacionMedica2=FALSE;
}

if ($_POST['txtfumador'] == 'seleccionado') {
  $esFumadorinformacionMedica2=TRUE;
}else {
  $esFumadorinformacionMedica2=FALSE;
}


 $fkGrupoSanguineoinformacionMedica2=$_REQUEST["cboGrupoSanguineo"];
 $fkInfoPersonalinformacionMedica2=$_REQUEST["cboBomberoInfoMedica"];


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


$d->crearInformacionMedica2($infoMedica2);



header("location: ../CrearFicha.php");






?>
