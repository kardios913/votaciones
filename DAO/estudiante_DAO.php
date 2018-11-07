<?php

include_once ('../util/conexion2.php');
include_once ('../DTO/usuario_DTO.php');

class estudiante_DAO {

    //put your code here

    private $bd;

    function __construct() {
        $this->bd = conexion2::getInstance();
    }

    public function validarEstudiante($codigo, $cedula, $contrasena) {

        $this->bd->conection();
        $consulta = "select * from estudiante where codigo='$codigo' and cedula='$cedula' and contrasena='$contrasena';";
        $consul = $this->bd->ejecutarConsultaSQL($consulta);
        $result = $this->bd->getCantidadFilas($consul);

        return $result;
    }
    public function ValidarCorreoE($correoE,$codigo){

        $this->bd->conection();
        $consulta = "SELECT * FROM `estudiante` WHERE correoInstitucional = '$correoE' AND codigo =$codigo;";
        $consul = $this->bd->ejecutarConsultaSQL($consulta);
        $result = $this->bd->getCantidadFilas($consul);

        return $result;
    }
     public function ActualizarPasswordE($usuario, $ncontra){

        $this->bd->conection();
        $consulta = "UPDATE `estudiante` SET contrasena = '$ncontra'  WHERE codigo ='$usuario';";
       $result = $this->bd->ejecutarConsultaSQL($consulta);
        return $result;
    }

    
    public function CargarDatosE($codigo){
        $this->bd->conection();
        $consulta = "SELECT nombre,foto FROM estudiante WHERE codigo=$codigo;";
        $consul = $this->bd->ejecutarConsultaSQL($consulta);
        return $consul;
    }
    public function correoSesion($codigo){
        $this->bd->conection();
        $consulta = "SELECT correoInstitucional FROM estudiante WHERE codigo=$codigo;";
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
