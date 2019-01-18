<?php


  Class Tbl_EntidadPropietaria{

    private $idEntidadPropietaria;
    private $nombreEntidadPropietaria;

    public function __construct(){
    }

    public function getIdEntidadPropietaria(){
        return $this->idEntidadPropietaria;
    }

    public function setIdEntidadPropietaria($idEntidadPropietaria){
        $this->idEntidadPropetaria = $idEntidadPropietaria;
    }

    public function getNombreEntidadPropietaria(){
      return $this->nombreEntidadPropietaria;
    }

    public function setNombreEntidadPropietaria($nombreEntidadPropietaria){
      $this->nombreEntidadPropietaria = $nombreEntidadPropietaria;
    }

  }

 ?>
