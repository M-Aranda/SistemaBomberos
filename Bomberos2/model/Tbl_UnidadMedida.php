<?php

Class Tbl_UnidadMedida{

  private $idUnidadMedida;
  private $nombreUnidadMedida;

  public function __construct(){
  }

  public function getIdUnidadMedida(){
      return $this->idUnidadMedida;
  }

  public function setIdUnidadMedida($idUnidadMedida){
      $this->idUnidadMedida = $idUnidadMedida;
  }


  public function getNombreUnidadMedida(){
    return $this->nombreCargo;
  }

  public function setNombreUnidadMedida($nombreUnidadMedida){
      $this->nombreUnidadMedida = $nombreUnidadMedida;
  }


}

 ?>
