<?php

Class Tbl_informacionDeCargos{

  private $id_informacionDeCargos;
  private $nombre_informacionDeCargos;
  private $marca_informacionDeCargos;
  private $talla_informacionDeCargos;
  private $serie_informacionDeCargos;
  private $fecha_informacionDeCargos;
  private $fk_personal_informacionDeCargos;

  public function __construct(){
  }

  public function getId_informacionDeCargos(){
      return $this->id_informacionDeCargos;
  }

  public function setId_informacionDeCargos($id_informacionDeCargos){
      $this->id_informacionDeCargos = $id_informacionDeCargos;
  }


  public function getNombre_informacionDeCargos(){
    return $this->nombre_informacionDeCargos;
  }

  public function setNombre_informacionDeCargos($nombre_informacionDeCargos){
      $this->nombre_informacionDeCargos = $nombre_informacionDeCargos;
  }

  public function getMarca_informacionDeCargos(){
      return $this->marca_informacionDeCargos;
  }

  public function setMarca_informacionDeCargos($marca_informacionDeCargos){
      $this->marca_informacionDeCargos = $marca_informacionDeCargos;
  }


  public function getTalla_informacionDeCargos(){
    return $this->talla_informacionDeCargos;
  }

  public function setTalla_informacionDeCargos($talla_informacionDeCargos){
      $this->talla_informacionDeCargos = $talla_informacionDeCargos;
  }

  public function getSerie_informacionDeCargos(){
      return $this->serie_informacionDeCargos;
  }

  public function setSerie_informacionDeCargos($serie_informacionDeCargos){
      $this->serie_informacionDeCargos = $serie_informacionDeCargos;
  }

  public function getFecha_informacionDeCargos(){
    return $this->fecha_informacionDeCargos;
  }

  public function setFecha_informacionDeCargos($fecha_informacionDeCargos){
      $this->fecha_informacionDeCargos = $fecha_informacionDeCargos;
  }

  public function getFk_personal_informacionDeCargos(){
      return $this->fk_personal_informacionDeCargos;
  }

  public function setFk_personal_informacionDeCargos($fk_personal_informacionDeCargos){
      $this->fk_personal_informacionDeCargos = $fk_personal_informacionDeCargos;
  }





}

 ?>
