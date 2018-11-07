<?php

class conexion2 {

    private $servidor = "localhost"; //"gidis.ufps.edu.co";
    private $usuario = "root"; //"votacionesufps"
    private $constrasena = "1234"; //"votacionesufps"
    private $bd = "votacion"; //"votacionesufps"

//    private $servidor = "gidis.ufps.edu.co";
//    private $usuario = "votacionesufps";
//    private $constrasena = "votacionesufps";
//    private $bd = "votacionesufps";

//private $servidor = "localhost";
//    private $usuario = "root";
//    private $constrasena = "docuxerluis";
//    private $bd = "votacion";


    private $conexion;
    static $_instance;

    function __construct() {
        $this->conection();
    }

    /**
     * Metodo para realizar la conexión a la BD
     */
    public function conection() {
        if ($this->conexion == null || $this->conexion == "") {

            $this->conexion = new mysqli($this->servidor, $this->usuario, $this->constrasena, $this->bd);
            /* comprobar la conexión */
            if ($this->conexion->connect_errno) {
                printf("Falló la conexión: %s\n", $this->conexion->connect_error);
                exit();
            }
        } else {
            if (!mysqli_ping($this->conexion)) {
                $this->conexion = null;
                $this->conection();
            }
        }
    }

    private function __clone() {
        
    }

    public static function getInstance() {
        if (!(self::$_instance instanceof self)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    /**
     * Metodo para ejecutar la Consulta SQL
     * @param type $consulta consulta a realizar
     * @return type Devuelve el contenido de la consulta en caso de estar bien,
     * de lo contrario mostrara el error correspondiente
     */
    public function ejecutarConsultaSQL($consulta) {
        if (!mysqli_ping($this->conexion)) {
            $this->conexion = null;
            $this->conection();
        }
        $result = mysqli_query($this->conexion, $consulta);
        if ($result === FALSE) {
            die(mysqli_error($this->conexion));
            return FALSE;
        }

        return $result;
    }

    /**
     * Metodo para consultar datos y devolver en Arrat
     * @param type $result datos de consulta
     * @return type array
     */
    public function getArray($result) {
        return mysqli_fetch_array($result);
    }

    public function getObject($result) {
        return mysqli_fetch_object($result);
    }

    public function getCantidadFilas($result) {
        return mysqli_num_rows($result);
    }

    public function desconnetar() {
        mysqli_close($this->conexion);
    }

    public function GetIdInsertado() {
        mysql_insert_id();
    }

}
