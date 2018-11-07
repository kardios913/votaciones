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
class voto_DTO {
    //put your code here

    private $cedula;
    private $fechaVoto;
    private $foto;
    private $candidato;
    private $jornadaElectoral;





    function __construct() {

    }

    function getCedula() {
        return $this->cedula;
    }

    function getFechaVoto() {
        return $this->fechaVoto;
    }

    function getFoto() {
        return $this->foto;
    }

    function getCandidato() {
        return $this->candidato;
    }

    function getJornadaElectoral() {
        return $this->jornadaElectoral;
    }

    function setCedula($cedula) {
        $this->cedula = $cedula;
    }

    function setFechaVoto($fechaVoto) {
        $this->fechaVoto = $fechaVoto;
    }

    function setFoto($foto) {
        $this->foto = $foto;
    }

    function setCandidato($candidato) {
        $this->candidato = $candidato;
    }

    function setJornadaElectoral($jornadaElectoral) {
        $this->jornadaElectoral = $jornadaElectoral;
    }



    }
