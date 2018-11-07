<?php

include_once ('../util/conexion2.php');
include_once ('../DTO/JornadaElectoral_DTO.php');

class JornadaElectoral_DAO {

    //put your code here

    private $bd;

    function __construct() {
        $this->bd = conexion2::getInstance();
    }

    public function ListarComunicado() {
        $this->bd->conection();
        
        //SELECT  `tipojornada` , fechainicio , fechafin  FROM `jornada` WHERE Estado = 'Activo'
        $consulta = "SELECT `tipojornada`, `fechainicio`, `fechafin`,`InicioCandidato`, `FinCandidato` FROM `jornada` where `Estado` = 'Activo' ;";
        $result = $this->bd->ejecutarConsultaSQL($consulta);
        return $result;
    }
   
    public function RegistarJornada($fechaInicio, $fechaFin, $tipoJornada, $estado, $usuario,$fechaInicioC,$fechaFinC) {
        $this->bd->conection();
        $consulta = "insert into jornada(fechainicio,fechafin,tipojornada,Estado,usuario,InicioCandidato,FinCandidato) "
                . "values('$fechaInicio','$fechaFin','$tipoJornada','$estado','$usuario','$fechaInicioC','$fechaFinC');";
        $result = $this->bd->ejecutarConsultaSQL($consulta);
        return $result;
    }

    public function ListarJornadas() {
        $this->bd->conection();
        $consulta = "SELECT `id`, `fechainicio`, `fechafin`, `tipojornada`, `Estado`,`InicioCandidato`, `FinCandidato` FROM `jornada` ;";
        $result = $this->bd->ejecutarConsultaSQL($consulta);
        return $result;
    }
    public function ListarCandidatosJornada($idJornadaVotacion) {
        $this->bd->conection();
        $consulta = "SELECT ruta, nombre, nombreCarrera, c.idJornada ,c.codigo,e.correoInstitucional "
                . "FROM candidato c join fotocandidato f on (c.idJornada=f.idJornada and c.cedula=f.codigo)"
                . "JOIN estudiante e on(c.cedula=e.cedula) WHERE c.estado='Aprobado' and c.idJornada ='$idJornadaVotacion';";
        $result = $this->bd->ejecutarConsultaSQL($consulta);
        return $result;
    }
    public function ListarJornadasE() {
        $this->bd->conection();
        $consulta = "SELECT j.id, j.fechainicio, j.fechafin, j.tipojornada, j.Estado FROM jornada j ;" ;
        $result = $this->bd->ejecutarConsultaSQL($consulta);
        return $result;
    }
    public function ListarJornadasProceso(){
        $this->bd->conection();
        $consulta = "SELECT id, tipojornada FROM `jornada` WHERE Estado ='Proceso';" ;
        $result = $this->bd->ejecutarConsultaSQL($consulta);
        return $result;
    }
    public function TablaCandidaturas($codigo){
        $this->bd->conection();
        $consulta = "SELECT j.id ,j.fechainicio,j.fechafin,j.tipojornada ,j.Estado ,c.estado, c.codigo"
                . " FROM candidato c JOIN jornada j ON (c.idJornada=j.id) WHERE c.codigo='$codigo';";
        $result = $this->bd->ejecutarConsultaSQL($consulta);
        return $result;
    }

    public function EditarJornada(jornadaElectoral_DTO $jd) {
        $id = $jd->getIdJornada();
        $fechainicio = $jd->getFechaInicio();
        $fechafin = $jd->getFechaFin();
        $tipojor = $jd->getTipoJornada();
        $fechainicioC = $jd->getFechaInicioC();
        $fechafinC = $jd->getFechaFinC();
        $this->bd->conection();
        $consulta = "update jornada set fechainicio='$fechainicio',fechafin='$fechafin',tipojornada='$tipojor' ,InicioCandidato='$fechainicioC' ,FinCandidato='$fechafinC' "
                . " WHERE id='$id';";
        $result = $this->bd->ejecutarConsultaSQL($consulta);
        return $result;
    }
public function EstadoJornada(jornadaElectoral_DTO $jd){
    $id=$jd->getIdJornada();
    $estado=$jd->getEstado();
     $this->bd->conection();
        $consulta = "update jornada set Estado='$estado'  WHERE id='$id';";
        $result = $this->bd->ejecutarConsultaSQL($consulta);
        return $result;
}


    public function getArray($result) {
        return ($this->bd->getArray($result));
    }

    public function getObject($result) {
        return ($this->bd->getObject($result));
    }

    

}
