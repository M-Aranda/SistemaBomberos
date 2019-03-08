<?php
  require_once("../model/Data.php");
  $data = new Data();

  $idServicio= isset($_REQUEST['idServicioACerrar'])?$_REQUEST['idServicioACerrar']:"";

  $data->cerrarServicio($idServicio);

 ?>
