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
class usuario_DTO {
    //put your code here

    private $usuario;
    private $contrasena;





    function __construct() {

    }

    function getUsuario() {
        return $this->usuario;
    }

    function getContrasena() {
        return $this->contrasena;
    }

    function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    function setContrasena($contrasena) {
        $this->contrasena = $contrasena;
    }



    }
