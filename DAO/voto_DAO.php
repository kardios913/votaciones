<?php

include_once ('../util/conexion2.php');
include_once ('../DTO/voto_DTO.php');

class voto_DAO {
    //put your code here
    
        private $bd;
    
    function __construct() {
       $this->bd = conexion2::getInstance();
}

public function  Verificar($codigo,$Jproceso){
    $this->bd->conection();
        $consulta ="SELECT * from voto WHERE cedula='$codigo' and idJornada=$Jproceso;";
    $res = $this->bd->ejecutarConsultaSQL($consulta);
    $result= $this->bd->getCantidadFilas($res);  
    return $result;
}
public function  Resultados($idJornada){
    $this->bd->conection();
        $consulta ="SELECT COUNT(v.idCandidato) VOTOS, v.idCandidato, e.nombre, e.nombreCarrera FROM voto v join estudiante e on (v.idCandidato=e.codigo) WHERE idJornada =$idJornada
GROUP BY v.idCandidato
ORDER BY COUNT(v.idCandidato) DESC";
    $result = $this->bd->ejecutarConsultaSQL($consulta);
    return $result;
}
public function  ResultadosB($idJornada){
    $this->bd->conection();
        $consulta ="SELECT COUNT(v.VotoBlanco) AS VOTOS FROM voto v  WHERE idJornada =$idJornada";
    $result = $this->bd->ejecutarConsultaSQL($consulta);
    return $result;
}
public function  TotalVotos($idJornada){
    $this->bd->conection();
        $consulta ="SELECT COUNT(*) AS VOTOS FROM voto v where v.idJornada =$idJornada";
    $result = $this->bd->ejecutarConsultaSQL($consulta);
    return $result;
}

public function RegistrarVotoB($cedula,$hash,$fecha,$idJornada,$votoBlanco) {
    $this->bd->conection();
    $consulta="INSERT INTO `voto`(`cedula`,`Hash`, `idJornada`, `VotoBlanco`, `fechaVoto`) VALUES ('$cedula','$hash',$idJornada,$votoBlanco,'$fecha');";
    $result = $this->bd->ejecutarConsultaSQL($consulta);
    return $result;
}
public function RegistrarVoto($cedula,$hash,$fecha,$idJornada,$idCandidato) {
    $this->bd->conection();
    $consulta="INSERT INTO `voto`(`cedula`, `Hash`, `idJornada`,  `idCandidato`, `fechaVoto`) VALUES ('$cedula','$hash',$idJornada,$idCandidato,'$fecha');";
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
    ?>