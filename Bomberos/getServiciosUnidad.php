<?php
require_once("model/Data.php");


$data = new Data();

$id = isset($_REQUEST['datos'])?$_REQUEST['datos']:"";

$arrayDeEmergencias = $data->getServicioUnidadPorFkServicio($id);

$contenedorDeJSONs= array();

foreach ($arrayDeEmergencias as $ae => $emer) {


  $idSer=$emer->getId_servicio_unidad();
  $nombreUnidad=$data->getNombreDeUnidadPorId($emer->getFk_unidad());
  $momento6_0=$emer->getMomento6_0();
  $momento6_3=$emer->getMomento6_3();
  $momento6_7=$emer->getMomento6_7();
  $momento6_8=$emer->getMomento6_8();
  $momento6_9=$emer->getMomento6_9();
  $momento6_10=$emer->getMomento6_10();




  $arrayRepresentativoDelObjeto=array("id"=>$idSer ,"nombre"=> utf8_encode($nombreUnidad),
                                    "momento6_0"=> $momento6_0,
                                     "momento6_3"=> $momento6_3,
                                     "momento6_7"=> $momento6_7, "momento6_8"=> $momento6_8,
                                     "momento6_9"=> $momento6_9, "momento6_10"=> $momento6_10);


  $obj=json_encode($arrayRepresentativoDelObjeto);

  $contenedorDeJSONs[]=$obj;
}

/*
foreach ($contenedorDeJSONs as $c => $conte) {
  echo $conte;
}
*/
echo json_encode($contenedorDeJSONs);

?>
