<?php

Class Tbl_Genero{

  private $idGenero;
  private $NombreGenero;

  public function __construct(){

  }

  public function getIdGenero(){
      return $this->idGenero;
  }

  public function setIdGenero($idGenero){
      $this->idGenero = $idGenero;
  }


  public function getNombreGenero(){
    return $this->nombreGenero;
  }

  public function setNombreEstadoCivil($NombreGenero){
      $this->NombreGenero = $NombreGenero;
  }

}

 ?>
