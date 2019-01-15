<?php

Class Tbl_EstadoCivil{

    private $idEstadoCivil;
    private $NombreEstadoCivil;

    public function __construct(){

    }

    public function getIdEstadoCivil(){
        return $this->idEstadoCivil;
    }

    public function setIdEstadoCivil($idEstadoCivil){
        $this->idEstadoCivil = $idEstadoCivil;
    }

    public function getNombreEstadoCivil(){
      return $this->nombreEstadoCivil;
    }

    public function setNombreEstadoCivil($NombreEstadoCivil){
        $this->NombreEstadoCivil = $NombreEstadoCivil;
    }

}



 ?>
