<?php

Class Tbl_servicio_unidad{

  private $id_servicio_unidad;
  private $fk_servicio;
  private $fk_unidad;


  public function __construct(){
  }

  public function getId_servicio_unidad(){
      return $this->id_servicio_unidad;
  }

  public function setId_servicio_unidad($id_servicio_unidad){
      $this->id_servicio_unidad = $id_servicio_unidad;
  }


  public function getFk_servicio(){
    return $this->fk_servicio;
  }

  public function setFk_servicio($fk_servicio){
      $this->fk_servicio = $fk_servicio;
  }

  public function getFk_unidad(){
      return $this->fk_unidad;
  }

  public function setFk_unidad($fk_unidad){
      $this->fk_unidad = $fk_unidad;
  }





}

 ?>
