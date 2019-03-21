<?php
require_once("..model/Data.php");

$data = new Data();

$id = isset($_REQUEST['datos'])?$_REQUEST['datos']:"";

$unidad = $data->obtenerUnidadesDisponibles();
foreach ($unidad as $u) {
    echo "<option value='".$u->getIdUnidad()."'>";
        echo $u->getNombreUnidad();
    echo"</option>";
}

?>
