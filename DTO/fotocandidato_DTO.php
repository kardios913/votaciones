<?PHP
class fotocandidato_DTO {
 private $codigo;
 private $idJornada;
 private $ruta;
    
 function __construct() {
     
 }
 function getCodigo() {
     return $this->codigo;
 }

 function getIdJornada() {
     return $this->idJornada;
 }

 function getRuta() {
     return $this->ruta;
 }

 function setCodigo($codigo) {
     $this->codigo = $codigo;
 }

 function setIdJornada($idJornada) {
     $this->idJornada = $idJornada;
 }

 function setRuta($ruta) {
     $this->ruta = $ruta;
 }



}
