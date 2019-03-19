<?php
require_once("../model/Data.php");
$data = new Data();

function deleteElement($element, &$array){
    $index = array_search($element, $array);
    if($index !== false){
        unset($array[$index]);
    }
}


$servicio = isset($_REQUEST['servicio'])?$_REQUEST['servicio']:"";
$sector = isset($_REQUEST['sector'])?$_REQUEST['sector']:"";

$listadoDeUnidadesAEnviar=$data->determinarCarrosADespacharSegunCodigoDeServicioYSector($servicio,$sector);

foreach ($listadoDeUnidadesAEnviar as $lu => $unidad) {
  $disponibilidad=$data->getEstadoDeEmergenciaDeLaUnidad($unidad);
  if($disponibilidad!=1){
    deleteElement($unidad,$listadoDeUnidadesAEnviar);
  }
}

if(empty($listadoDeUnidadesAEnviar)){
  echo "No se selecciono ninguna unidad disponible";
}


?>
