<?php

Class Tbl_InfoHistorico{


      private $idInformacionHistorica;
      private $fkRegioninformacionHistorica;
      private $cuerpo;
      private $compania;
      private $fechaDeCambio;
      private $tipoDeCambio;
      private $motivo;
      private $detalle;
      private $fkInfoPersonalinformacionHistorica;

      public function __construct(){
      }

      public function getIdInformacionHistorica(){
          return $this->idInformacionHistorica;
      }

      public function setIdInformacionHistorica($idInformacionHistorica){
          $this->idInformacionHistorica = $idInformacionHistorica;
      }


      public function getfkRegioninformacionHistorica(){
        return $this->fkRegioninformacionHistorica;
      }

      public function setfkRegioninformacionHistorica($fkRegioninformacionHistorica){
          $this->fkRegioninformacionHistorica = $fkRegioninformacionHistorica;
      }

      public function getcuerpo(){
        return $this->cuerpo;
      }

      public function setcuerpo($cuerpo){
          $this->cuerpo = $cuerpo;
      }

      public function getcompania(){
          return $this->compania;
      }

      public function setcompania($compania){
          $this->compania = $compania;
      }

      public function getfechaDeCambio(){
          return $this->fechaDeCambio;
      }

      public function setfechaDeCambio($fechaDeCambio){
          $this->fechaDeCambio = $fechaDeCambio;
      }

      public function gettipoDeCambio(){
          return $this->tipoDeCambio;
      }

      public function settipoDeCambio($tipoDeCambio){
          $this->tipoDeCambio = $tipoDeCambio;
      }

      public function getmotivo(){
          return $this->motivo;
      }

      public function setmotivo($motivo){
          $this->motivo = $motivo;
      }

      public function getdetalle(){
          return $this->detalle;
      }

      public function setdetalle($detalle){
          $this->detalle = $detalle;
      }

      public function getfkInfoPersonalinformacionHistorica(){
          return $this->fkInfoPersonalinformacionHistorica;
      }

      public function setfkInfoPersonalinformacionHistorica($fkInfoPersonalinformacionHistorica){
          $this->fkInfoPersonalinformacionHistorica = $fkInfoPersonalinformacionHistorica;
      }



}
?>
