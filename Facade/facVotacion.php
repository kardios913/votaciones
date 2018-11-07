<?php

include_once '../negocio/negVotacion.php';

class facVotacion {

    //put your code here

    static $_instance;
    private $negVotacion;

    function __construct() {
        $this->negVotacion = new negVotacion();
    }

    private function __clone() {
        
    }

    public static function getInstance() {
        if (!(self::$_instance instanceof self)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function datetimeCompleto() {
        return $this->negVotacion->datetimeCompleto();
    }
    
    public function enviarHash($mail){
        $time= $this->negVotacion->datetimeCompleto();
        return $this->negVotacion->enviarHash($mail,$time);
    }
    public function CompararHash($hash1,$hash2) {
        return $this->negVotacion->CompararHash($hash1,$hash2);
    }

    //TABLA VOTO
    public function  RegistrarVotoB($cedula,$hash,$fecha,$idJornada,$votoBlanco){
        return $this->negVotacion->RegistrarVotoB($cedula,$hash,$fecha,$idJornada,$votoBlanco);
    }
    public function  RegistrarVoto($cedula,$hash,$fecha,$idJornada,$idCandidato){
        return $this->negVotacion->RegistrarVoto($cedula,$hash,$fecha,$idJornada,$idCandidato);
    }
    
        
    public function ValidarVoto($codigo,$id) {
    return $this->negVotacion->ValidarVoto($codigo, $id);
}
    
    //FIN TABLA VOTO
    //TABLA USUARIO
    public function validarAdmin($mail, $contrasena) {
        return $this->negVotacion->validarAdmin($mail, $contrasena);
    }
    public function ValidarCorreo($correoA) {
        return $this->negVotacion->ValidarCorreo($correoA);
    }

    public function ActualizarPassword($usuario, $ncontra) {
        return $this->negVotacion->ActualizarPassword($usuario, $ncontra);
    }

    //Fin tabla Usuario
    //TABLA ESTUDIANTE
    public function validarEstudiante($codigo, $cedula, $contrasena) {
        return $this->negVotacion->validarEstudiante($codigo, $cedula, $contrasena);
    }
    public function ValidarCorreoE($correoE,$codigo){
        return $this->negVotacion->ValidarCorreoE($correoE,$codigo);
    }

    public function ActualizarPasswordE($usuario, $ncontra) {
        return $this->negVotacion->ActualizarPasswordE($usuario, $ncontra);
    }

//FIN TABLA ESTUDIANTE
    //TABLA JORNADA
    public function RegistarJornada($fechaInicio, $fechaFin, $tipoJornada, $estado, $usuario, $fechaInicioC, $fechaFinC) {
        return $this->negVotacion->RegistarJornada($fechaInicio, $fechaFin, $tipoJornada, $estado, $usuario, $fechaInicioC, $fechaFinC);
    }

    public function EditarJornada($fechaInicio, $fechaFin, $tipoJornada, $id, $fechaInicioC, $fechaFinC) {
        return $this->negVotacion->EditarJornada($fechaInicio, $fechaFin, $tipoJornada, $id, $fechaInicioC, $fechaFinC);
    }

    public function TablaJornda() {
        return $this->negVotacion->TablaJornada();
    }
    public function ListarCandidatosJornada($idJornadaVotacion,$codigo){
        return $this->negVotacion->ListarCandidatosJornada($idJornadaVotacion,$codigo);
    }

    public function TablaJorndaE($codigo) {
        return $this->negVotacion->TablaJornadaE($codigo);
    }
    public function TablaJorndaProceso($codigo){
        return $this->negVotacion->TablaJorndaProceso($codigo);
    }

    public function TablaCandidaturas($codigo) {
        return $this->negVotacion->TablaCandidaturas($codigo);
    }

    public function CancelarJornada($id) {
        return $this->negVotacion->CancelarJornada($id);
    }

    public function Comunicado() {
        return $this->negVotacion->Comunicado();
    }

    //fin tabla jornada
    //Tabla Candidatura
    public function CancelarCandidatura($id, $codigo) {
        return $this->negVotacion->CancelarCandidatura($id, $codigo);
    }

    public function RegistrarImagen($cedula, $idJornada, $file) {
        return $this->negVotacion->RegistrarImagen($cedula, $idJornada, $file);
    }

    public function RegistrarCandidatura($idJornada, $cedula, $descripcion) {
        return $this->negVotacion->RegistrarCandidatura($idJornada, $cedula, $descripcion);
    }

    public function EditarImagen($codigo, $idJornada, $file) {
        return $this->negVotacion->EditarImagen($codigo, $idJornada, $file);
    }

    public function EditarCandidatura($idJornada, $codigo, $descripcion) {
        return $this->negVotacion->EditarCandidatura($idJornada, $codigo, $descripcion);
    }

    public function TablaPostulados() {
        return $this->negVotacion->TablaPostulados();
    }

    public function AprobarCandidatura($cedula, $idJornada) {
        return $this->negVotacion->AprobarCandidatura($cedula, $idJornada);
    }

    public function CargarImagen($cedula, $idJornada) {
        return $this->negVotacion->CargarImagen($cedula, $idJornada);
    }

    public function AprobarPostulado($estado, $cedula, $idJornada) {
        return $this->negVotacion->AprobarPostulado($estado, $cedula, $idJornada);
    }

    //FIn Tabla Candidatura
    //ESTUDIANTE
    public function CargarDatosE($codigo) {
        return $this->negVotacion->CargarDatosE($codigo);
    }

    //FIN ESTUDIANTE
    //USUARIO
    public function CargarDatosS($mail) {
        return $this->negVotacion->CargarDatosS($mail);
    }

    //FIN USUARIO

    //RESULTADOS
    public function Resultados($idJornada){
        return $this->negVotacion->Resultados($idJornada);
    }
    //RESULTADOS
    }
