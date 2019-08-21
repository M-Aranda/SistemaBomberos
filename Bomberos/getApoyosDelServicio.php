<?php
require_once("model/Data.php");
$data = new Data();

$id = isset($_REQUEST['idServicio'])?$_REQUEST['idServicio']:"";

$arrayDeApoyoss = $data->getApoyosDelServicio($id);

$contenedorDeJSONs= array();

foreach ($arrayDeApoyoss as $a => $apoyo) {

  $idApoyo=$apoyo->getIdApoyo();
  $entidad=$apoyo->getFkEntidad();
  $responsable=$apoyo->getResponsable();
  $ppuu=$apoyo->getPpuu();


  $arrayRepresentativoDelObjeto=array("idApoyo"=>$idApoyo ,"nombreEntidadApoyo"=> ($entidad),
                                    "responsableApoyo"=> ($responsable),
                                     "ppuuApoyo"=> ($ppuu));

  $obj=json_encode($arrayRepresentativoDelObjeto);

  $contenedorDeJSONs[]=$obj;
}

echo json_encode($contenedorDeJSONs);
?>
