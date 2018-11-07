<?php

include_once ('../util/conexion2.php');
include_once ('../DTO/usuario_DTO.php');

class usuario_DAO {

    //put your code here

    private $bd;

    function __construct() {
        $this->bd = conexion2::getInstance();
    }

    public function ValidarAdmin($mail, $contrasena) {

        $this->bd->conection();
        $consulta = "select * from usuario"
                . " where correo='$mail' "
                . "and contrasena='$contrasena';";
        $consul = $this->bd->ejecutarConsultaSQL($consulta);
        $result = $this->bd->getCantidadFilas($consul);

        return $result;
    }
    public function ValidarCorreo($correoA){

        $this->bd->conection();
        $consulta = "select * from usuario"
                . " where correo='$correoA';";
        $consul = $this->bd->ejecutarConsultaSQL($consulta);
        $result = $this->bd->getCantidadFilas($consul);

        return $result;
    }
    public function ActualizarPassword($usuario, $ncontra){

        $this->bd->conection();
        $consulta = "UPDATE `usuario` SET contrasena = '$ncontra'  WHERE correo ='$usuario';";
       $result = $this->bd->ejecutarConsultaSQL($consulta);
        return $result;
    }

    public function CargarDatosS($mail) {
        $this->bd->conection();
        $consulta = "SELECT foto FROM usuario WHERE correo='$mail';";
        $consul = $this->bd->ejecutarConsultaSQL($consulta);
        return $consul;
    }

    public function getArray($result) {
        return ($this->bd->getArray($result));
    }

    public function getObject($result) {
        return ($this->bd->getObject($result));
    }

}
