<?php

include_once ('../util/conexion2.php');
include_once ('../DTO/fotocandidato_DTO.php');

class fotocandidato_DAO {
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
 
public function EditarJornada(fotocandidato_DTO $jd) {
        $id = $jd->getIdJornada();
        $codigo = $jd->getCodigo();
        $file= $jd->getRuta();
        $this->bd->conection();
        $consulta = "UPDATE fotocandidato SET ruta='$file' "
                . "WHERE idJornada = $id AND codigo =$codigo;";
        $result = $this->bd->ejecutarConsultaSQL($consulta);
        return $result;
    }

    }
    ?>