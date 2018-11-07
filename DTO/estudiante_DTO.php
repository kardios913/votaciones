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
class estudiante_DTO {
    //put your code here

    private $codigo;
    private $nombre;
    private $contraseña;
    private $telefono;
    private $correoElectronico;
    private $correoInstitucional;
    private $fechaIngreso;
    private $estado;
    private $nombreCarrera;
    private $cedula;





    function __construct() {

    }

    function getCodigo() {
        return $this->codigo;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getContraseña() {
        return $this->contraseña;
    }

    function getTelefono() {
        return $this->telefono;
    }

    function getCorreoElectronico() {
        return $this->correoElectronico;
    }

    function getCorreoInstitucional() {
        return $this->correoInstitucional;
    }

    function getFechaIngreso() {
        return $this->fechaIngreso;
    }

    function getEstado() {
        return $this->estado;
    }

    function getNombreCarrera() {
        return $this->nombreCarrera;
    }

    function getCedula() {
        return $this->cedula;
    }

    function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setContraseña($contraseña) {
        $this->contraseña = $contraseña;
    }

    function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    function setCorreoElectronico($correoElectronico) {
        $this->correoElectronico = $correoElectronico;
    }

    function setCorreoInstitucional($correoInstitucional) {
        $this->correoInstitucional = $correoInstitucional;
    }

    function setFechaIngreso($fechaIngreso) {
        $this->fechaIngreso = $fechaIngreso;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

    function setNombreCarrera($nombreCarrera) {
        $this->nombreCarrera = $nombreCarrera;
    }

    function setCedula($cedula) {
        $this->cedula = $cedula;
    }












}
