<?php
session_start();
$id = isset($_REQUEST['datos'])?$_REQUEST['datos']:"";

if($id==1){
  unset($_SESSION["resultadosDeBusquedaDeBomberos"]);
}
elseif($id==2){
  unset($_SESSION["resultadosDeBusquedaDeUnidad"]);
}
elseif($id==3){
  unset($_SESSION["resultadosDeBusquedaDeMaterialMenor"]);
}

?>
