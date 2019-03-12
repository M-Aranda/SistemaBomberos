<?php
require_once("../model/Data.php");
session_start();

$d= new Data();

$idSer=$_REQUEST["idServicioSeleccionado"];

$_SESSION["idDeServicioQueSeEstaManipulando"]=$idSer;


header("location: ../centraldeAlarma.php");
?>
