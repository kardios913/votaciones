<?php

include_once ('../util/conexion2.php');
include_once ('../DTO/JornadaElectoral_DTO.php');

class candidato_DAO {

    //put your code here

    private $bd;

    function __construct() {
        $this->bd = conexion2::getInstance();
    }
    
    public function getArray($result) {
        return ($this->bd->getArray($result));
    }

    public function getObject($result) {
        return ($this->bd->getObject($result));
    }

    public function ListarCandidatos() {
        $this->bd->conection();
        $consulta = "SELECT c.idJornada ,c.cedula,e.nombre,e.nombreCarrera,j.tipojornada,c.estado "
                . "From estudiante e JOIN candidato c on (e.cedula = c.cedula) JOIN jornada j on (c.idJornada = j.id) "
                . "where j.estado ='Activo' ORDER by c.estado DESC;";
        $result = $this->bd->ejecutarConsultaSQL($consulta);
        return $result;
    }
    public function RegistrarCandidatura($idJornada,$cedula,$descripcion) {
        $this->bd->conection();
        $consulta = "INSERT INTO candidato(`idJornada`, `cedula`, `descripcion`, `estado`, `codigo`) VALUES ('$idJornada','$cedula','$descripcion','Sin Revisar','$cedula');";
        $result = $this->bd->ejecutarConsultaSQL($consulta);
        return $result;
    }
    public function RegistrarImagen($cedula, $idJornada,$file){
        $this->bd->conection();
        $consulta = "INSERT INTO `fotocandidato`( `ruta`, `idJornada`, `codigo`) VALUES ('$file','$idJornada','$cedula');";
        $result = $this->bd->ejecutarConsultaSQL($consulta);
        return $result;
    }
    public function actualizarFoto(){}


    public function AprobarCandidatura($cedula, $idJornada){
        $this->bd->conection();
        $consulta = "SELECT  e.nombre,c.cedula, e.nombreCarrera,c.idJornada, j.tipojornada, c.descripcion,c.estado "
                . "FROM candidato c join estudiante e on (c.cedula=e.cedula)join"
                . " jornada j on (c.idJornada=j.id) WHERE c.idJornada='$idJornada' AND c.cedula='$cedula';";
        $result = $this->bd->ejecutarConsultaSQL($consulta);
        return $result;
    }
    public function CargarImagen($cedula, $idJornada) {
         $this->bd->conection();
        $consulta = "SELECT ruta FROM fotocandidato f JOIN candidato c ON(f.idJornada=c.idJornada AND f.codigo=c.codigo) "
                . "WHERE c.idJornada='$idJornada' AND c.codigo='$cedula';";
        $result = $this->bd->ejecutarConsultaSQL($consulta);
        return $result;
    }
    public function VerificarCandidatura($idJornada,$codigo){
      $this->bd->conection();
        $consulta ="SELECT idJornada, codigo FROM candidato "
                . "WHERE idJornada='$idJornada' and codigo='$codigo';";
    $res = $this->bd->ejecutarConsultaSQL($consulta);
    $result= $this->bd->getCantidadFilas($res);  
    return $result;
    }
    public function AprobarPostulado($estado,$cedula,$idJornada){
      $this->bd->conection();
        $consulta ="UPDATE candidato SET estado='$estado' "
                . "WHERE idJornada='$idJornada'and cedula='$cedula';";
    $result = $this->bd->ejecutarConsultaSQL($consulta);
        return $result;
    }
    public function EstadoCandidatura(candidato_DTO $jd){
    $id=$jd->getJornadaElectoral();
    $codigo=$jd->getCodigo();
    $estado=$jd->getestado();
     $this->bd->conection();
        $consulta = "UPDATE candidato SET estado='$estado' "
                . "WHERE idJornada='$id' and codigo='$codigo';";
        $result = $this->bd->ejecutarConsultaSQL($consulta);
        return $result;
}
    public function EditarCandidatura(candidato_DTO $jd){
    $id=$jd->getJornadaElectoral();
    $codigo=$jd->getCodigo();
    $descripcion=$jd->getDescripcion();
    $estado=$jd->getestado();
     $this->bd->conection();
        $consulta = "UPDATE candidato SET  descripcion='$descripcion',estado='$estado'"
                . " WHERE idJornada='$id' and codigo='$codigo';";
        $result = $this->bd->ejecutarConsultaSQL($consulta);
        return $result;
}
}
