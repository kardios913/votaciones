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
class jornadaElectoral_DTO {
    //put your code here

    private $idJornada;
    private $fechaInicio;
    private $fechaFin;
    private $tipoJornada;
    private $estado;
    private $usuario;
    private $fechaInicioC;
    private $fechaFinC;




    function __construct() {

    }

    function getIdJornada() {
        return $this->idJornada;
    }

    function getFechaInicio() {
        return $this->fechaInicio;
    }

    function getFechaFin() {
        return $this->fechaFin;
    }

    function getTipoJornada() {
        return $this->tipoJornada;
    }

    function getEstado() {
        return $this->estado;
    }

    function getUsuario() {
        return $this->usuario;
    }

    function getFechaInicioC() {
        return $this->fechaInicioC;
    }

    function getFechaFinC() {
        return $this->fechaFinC;
    }

    function setIdJornada($idJornada) {
        $this->idJornada = $idJornada;
    }

    function setFechaInicio($fechaInicio) {
        $this->fechaInicio = $fechaInicio;
    }

    function setFechaFin($fechaFin) {
        $this->fechaFin = $fechaFin;
    }

    function setTipoJornada($tipoJornada) {
        $this->tipoJornada = $tipoJornada;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

    function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    function setFechaInicioC($fechaInicioC) {
        $this->fechaInicioC = $fechaInicioC;
    }

    function setFechaFinC($fechaFinC) {
        $this->fechaFinC = $fechaFinC;
    }





    }
