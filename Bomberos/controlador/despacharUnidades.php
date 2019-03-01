<?php
require_once("../Model/Data.php");
session_start();
$data = new Data();



if(isset($_SESSION["idDeServicioCreado"])){
 $idServicio=$_SESSION["idDeServicioCreado"];

  $idTipoDeServicio=$_REQUEST["tipoServicio"];
  $idSector=$_REQUEST["sector"];
  $listadoDeUnidadesAEnviar=array();
  $listadoDeUnidadesAEnviar=$data->determinarCarrosADespacharSegunCodigoDeServicioYSector($idTipoDeServicio,$idSector);

  foreach ($listadoDeUnidadesAEnviar as $lis => $unidad) {
    $data->registrarDespachoEnviado($idServicio,$unidad);
  }


  unset($_SESSION["idDeServicioCreado"]);
}



//Mandar tonos aqui

 header("location: ../centralDeDespacho.php");

?>
