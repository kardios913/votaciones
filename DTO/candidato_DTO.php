<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of candidato_DTO
 *
 * @author carlos
 */
class candidato_DTO {
    //put your code here

    private $cedula;
    private $descripcion;
    private $jornadaElectoral;
    private $estado;
    private $foto;
    private $codigo;





    function __construct() {

    }

    function getCedula() {
        return $this->cedula;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getJornadaElectoral() {
        return $this->jornadaElectoral;
    }

    function getestado() {
        return $this->estado;
    }
    function getFoto(){
      return $this->foto;
    }
    function getCodigo() {
        return $this->codigo;
    }

    function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

        function setCedula($cedula) {
        $this->cedula = $cedula;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setJornadaElectoral($jornadaElectoral) {
        $this->jornadaElectoral = $jornadaElectoral;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }
    function setFoto($foto){
      $this->foto =$foto;
    }











}
