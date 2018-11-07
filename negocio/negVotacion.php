<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


include_once '../DTO/JornadaElectoral_DTO.php';
include_once '../DTO/candidato_DTO.php';
include_once '../DTO/estudiante_DTO.php';
include_once '../DTO/usuario_DTO.php';
include_once '../DTO/voto_DTO.php';
include_once '../DTO/fotocandidato_DTO.php';


include_once '../DAO/JornadaElectoral_DAO.php';
include_once '../DAO/candidato_DAO.php';
include_once '../DAO/estudiante_DAO.php';
include_once '../DAO/usuario_DAO.php';
include_once '../DAO/voto_DAO.php';
include_once '../DAO/fotocandidato_DAO.php';

class negVotacion {

    public function datetimeCompleto() {
        $time = time();
        $actual_time = date('Y-m-d H:i:s', $time);
        return $actual_time;
    }

    public function enviarHash($mail, $time) {
        $str = $mail . $time;
        $hash = md5($str);
        return $hash;
    }

    public function CompararHash($hash1, $hash2) {
        if (strcmp(trim($hash1), trim($hash2)) === 0) {
            return true;
        } else {
            return FALSE;
        }
    }

    //TABLA VOTO
    public function RegistrarVotoB($cedula, $hash, $fecha, $idJornada, $votoBlanco) {
        $moddao = new voto_DAO();
        $result = $moddao->RegistrarVotoB($cedula, $hash, $fecha, $idJornada, $votoBlanco);
        return $result;
    }

    public function RegistrarVoto($cedula, $hash, $fecha, $idJornada, $idCandidato) {
        $moddao = new voto_DAO();
        $result = $moddao->RegistrarVoto($cedula, $hash, $fecha, $idJornada, $idCandidato);
        return $result;
    }

    public function ValidarVoto($codigo, $id) {
        $moddao = new voto_DAO();
        $result = $moddao->Verificar($codigo, $id);
        return $result;
    }

    //FIN TABLA VOTO
    //tabla usuario 
    public function validarAdmin($mail, $contrasena) {
        $moddao = new usuario_DAO();
        $result = $moddao->ValidarAdmin($mail, $contrasena);
        return $result;
    }

    public function ValidarCorreo($correoA) {
        $moddao = new usuario_DAO();
        $result = $moddao->ValidarCorreo($correoA);
        return $result;
    }

    public function ActualizarPassword($usuario, $ncontra) {
        $moddao = new usuario_DAO();
        $result = $moddao->ActualizarPassword($usuario, $ncontra);
        return $result;
    }

    //FIN TABLA USUARIO
    //tabla estudiante
    public function validarEstudiante($codigo, $cedula, $contrasena) {
        $moddao = new estudiante_DAO();
        $result = $moddao->validarEstudiante($codigo, $cedula, $contrasena);
        return $result;
    }

    public function ValidarCorreoE($correoE, $codigo) {
        $moddao = new estudiante_DAO();
        $result = $moddao->ValidarCorreoE($correoE, $codigo);
        return $result;
    }

    public function ActualizarPasswordE($usuario, $ncontra) {
        $moddao = new estudiante_DAO();
        $result = $moddao->ActualizarPasswordE($usuario, $ncontra);
        return $result;
    }

    public function CargarDatosE($codigo) {
        $moddao = new estudiante_DAO();
        $result = $moddao->CargarDatosE($codigo);
        $row = $moddao->getArray($result);
        $foto = $row['foto'];
        $nombre = $row['nombre'];
        $script = "<li class='dropdown user user-menu'>
                    <!-- Menu Toggle Button -->
                    <a href='#' class='dropdown-toggle' data-toggle='dropdown'>
                        <!-- The user image in the navbar-->
                        <img src='" . $foto . "' class='user-image' alt='User Image'>
                        <!-- hidden-xs hides the username on small devices so only the image appears. -->
                        <span class='hidden-xs'>" . $nombre . "</span>
                    </a>
                    <ul class='dropdown-menu'>
                        <!-- The user image in the menu -->
                        <li class='user-header'>
                            <img src='" . $foto . "' class='img-circle' alt='User Image'>

                            <p>
                                " . $nombre . "
                                <small>UFPS</small>
                            </p>
                        </li>

                        <!-- Menu Footer-->
                        <li class='user-footer'>
                            <div class='pull-left'>
                                <a href='../php/FormCambiarContrasenaE.php' class='btn btn-default btn-flat'>Cambiar Clave</a>
                            </div>
                            <div class='pull-right'>
                                <a href='../util/cerrarSesionE.php' class='btn btn-default btn-flat'>Salir</a>
                            </div>
                        </li>
                    </ul>
                </li>";
        return $script;
    }

    public function CargarDatosS($mail) {
        $moddao = new usuario_DAO();
        $result = $moddao->CargarDatosS($mail);
        $row = $moddao->getArray($result);
        $foto = $row['foto'];
        $script = "<li class='dropdown user user-menu'>
                    <!-- Menu Toggle Button -->
                    <a href='#' class='dropdown-toggle' data-toggle='dropdown'>
                        <!-- The user image in the navbar-->
                        <img src='" . $foto . "' class='user-image' alt='User Image'>
                        <!-- hidden-xs hides the username on small devices so only the image appears. -->
                        <span class='hidden-xs'>SECRETARIA GENERAL</span>
                    </a>
                    <ul class='dropdown-menu'>
                        <!-- The user image in the menu -->
                        <li class='user-header'>
                            <img src='" . $foto . "' class='img-circle' alt='User Image'>

                            <p>
                                SECRETARIA GENERAL
                                <small>UFPS</small>
                            </p>
                        </li>

                        <!-- Menu Footer-->
                        <li class='user-footer'>
                            <div class='pull-left'>
                                <a href='../php/FormCambiarContrasena.php' class='btn btn-default btn-flat'>Cambiar Clave</a>
                            </div>
                            <div class='pull-right'>
                                <a href='../util/cerrarSesion.php' class='btn btn-default btn-flat'>Salir</a>
                            </div>
                        </li>
                    </ul>
                </li>";
        return $script;
    }

    //fin tabla estudiante
    //tabla Jornada

    public function Comunicado() {
        $man = new JornadaElectoral_DAO();
        $listado = $man->ListarComunicado();

        $tablaJornada = "";


        if ($row = $man->getArray($listado)) {

            do {

                $tablaJornada .= " <div class='one'>" .
                        "<h2><span>" . $row['tipojornada'] . "</span></h2>" .
                        "<p>Fecha de Inicio de la Jornada: " . $row['fechainicio'] . "</p>" .
                        "<p> hasta : " . $row['fechafin'] . "</p>" .
                        "<br>" .
                        "<p>Fecha Registro de Candidatura: " . $row['InicioCandidato'] . "</p>" .
                        "<p>hasta : " . $row['FinCandidato'] . "</p>
                            </div>";
            } while ($row = $man->getArray($listado));

            return $tablaJornada;
        } else {
            echo " <div class='one'>
                   <p>Comunicados No Disponible</p>
                   </div>";
        }
    }

    public function RegistarJornada($fechaInicio, $fechaFin, $tipoJornada, $estado, $usuario, $fechaInicioC, $fechaFinC) {
        $moddao = new JornadaElectoral_DAO();
        $result = $moddao->RegistarJornada($fechaInicio, $fechaFin, $tipoJornada, $estado, $usuario, $fechaInicioC, $fechaFinC);
        return $result;
    }

    public function EditarJornada($fechaInicio, $fechaFin, $tipoJornada, $id, $fechaInicioC, $fechaFinC) {
        $mod = new jornadaElectoral_DTO();
        $mod->setFechaInicio($fechaInicio);
        $mod->setFechaFin($fechaFin);
        $mod->setTipoJornada($tipoJornada);
        $mod->setIdJornada($id);
        $mod->setFechaInicioC($fechaInicioC);
        $mod->setFechaFinC($fechaFinC);
        $moddao = new JornadaElectoral_DAO();
        $result = $moddao->EditarJornada($mod);
        return $result;
    }

    public function CancelarJornada($id) {
        $mod = new jornadaElectoral_DTO();
        $mod->setIdJornada($id);
        $mod->setEstado('Cancelado');
        $moddao = new JornadaElectoral_DAO();
        $result = $moddao->EstadoJornada($mod);
        return $result;
    }

    public function CancelarCandidatura($id, $codigo) {
        $mod = new candidato_DTO();
        $mod->setJornadaElectoral($id);
        $mod->setCodigo($codigo);
        $mod->setEstado('Cancelado');
        $moddao = new candidato_DAO();
        $result = $moddao->EstadoCandidatura($mod);
        return $result;
    }

    public function ListarCandidatosJornada($idJornadaVotacion,$codigo) {
        $man = new JornadaElectoral_DAO();
        $man1 = new estudiante_DAO();
        $id = $idJornadaVotacion;
        $listado = $man->ListarCandidatosJornada($idJornadaVotacion);
        $coreo=$man1->correoSesion($codigo);
        $row1 = $man1->getArray($coreo);
        $tablaJornada = "<section class='content'>
          <div class='row'>
          <div class='col-md-4'>
                            <div class='container-fluid well span6'>
                               <div class='row-fluid'>
                                  <div class='span2' >
                                      <img src='../imagen/blanco.png' width='50%' height='50%' class='center-block'>
                                  </div>
            
                                  <div class='span8'>
                                      <h2 style='font-family: times, serif; font-size:14pt; font-style:italic;text-align:center'>Voto en</h2>
                                      <h6 style='font-family: times, serif; font-size:14pt; font-style:italic;text-align:center'> Blanco  </h6>
            
                                    </div>

                                    <div class='span2'>
                                            <div class='btn-group '>
                                             <a class='btn btn-primary' href='FormValidarVotoB.php?id=$id&co=".$row1['correoInstitucional']."'role='button'>Votar</a>
                                            </div>
                                  </div>
                                </div>
                              </div>
                            </div>";
        if ($row = $man->getArray($listado)) {

            do {
                $tablaJornada .= "<div class='col-md-4'>
                            <div class='container-fluid well span6'>
                               <div class='row-fluid'>
                                  <div class='span2' >"
                        . "<img src='" . $row['ruta'] . "' width='50%' height='50%' class='center-block'>
                                  </div>
            
                                  <div class='span8'>"
                        . "<h2 style='font-family: times, serif; font-size:14pt; font-style:italic;text-align:center'><b>" . $row['nombre'] . "</b></h2>"
                        . "<h6 style='font-family: times, serif; font-size:14pt; font-style:italic'>" . $row['nombreCarrera'] . "</h6>"
                        . "</div>
                                    <div class='span2'>
                                            <div class='btn-group '>
                                            <a class='btn btn-primary' href='FormValidarVoto.php?id=" . $row['idJornada'] . "&cod=" . $row['codigo'] . "&co=".$row1['correoInstitucional']."'role='button'>Votar</a>
                                             </div>
                                  </div>
                                </div>
                              </div>
                            </div>";
            } while ($row = $man->getArray($listado));
            $tablaJornada .= "</div>
        </section>";
            return $tablaJornada;
        } else {
            echo 'NO HAY JORNADAS ELECTORALES REGISTRADAS';
        }
    }

    public function TablaJornada() {
        $man = new JornadaElectoral_DAO();
        $listado = $man->ListarJornadas();


        $tablaJornada = "<table id='mytable' class='table table-bordred table-striped'>\n"
                . " <thead>\n"
                . "            <tr>"
                . "                <th>Id Jornada</th>"
                . "                <th>Fecha Inicio</th>"
                . "                <th>Fecha Fin</th>"
                . "                <th>Tipo Jornada</th>"
                . "                <th>Estado</th>"
                . "                <th>Inicio Registro</th>"
                . "                <th>Fin Registro</th>"
                . "                <th>Editar</th>"
                . "                <th>Cancelar</th>"
                . "                <th>Reporte</th>"
                . "            </tr>\n"
                . "</thead>\n"
                . "<tbody>\n";


        if ($row = $man->getArray($listado)) {

            do {


                $tablaJornada .= "<tr>\n"
                        . "<td>" . $row['id'] . "</td>"
                        . "<td>" . $row['fechainicio'] . "</td>\n"
                        . "<td>" . $row['fechafin'] . "</td>\n"
                        . "<td>" . $row['tipojornada'] . "</td>\n"
                        . "<td>" . $row['Estado'] . "</td>\n"
                        . "<td>" . $row['InicioCandidato'] . "</td>\n"
                        . "<td>" . $row['FinCandidato'] . "</td>";
                if ($row['Estado'] == 'Activo') {
                    $tablaJornada .= "<td><a class='btn btn-primary' href='FormEditarJornada.php?variable=" . $row['id'] . "' role='button'><i class='fa fa-pencil'></i></a></td>"
                            . "<td><a class='btn btn-danger' href='CancelarJornada.php?variable=" . $row['id'] . "' role='button'><i class='fa fa-close'></i></a></td>"
                            . "<td></td>";
                }if ($row['Estado'] == 'Culminado') {
                    $tablaJornada .= "<td></td><td></td><td><a class='btn btn-success' href='FormReporte.php?variable=" . $row['id'] . "&tipo=" . $row['tipojornada'] . "'role='button'><i class='fa fa-book'></i></a></td>";
                } else {
                    $tablaJornada .= "<td></td><td></td><td></td>";
                }
            } while ($row = $man->getArray($listado));
            $tablaJornada .= "</tbody>\n</table>\n";
            return $tablaJornada;
        } else {
            echo 'NO HAY JORNADAS ELECTORALES REGISTRADAS';
        }
    }

    public function TablaJorndaProceso($codigo) {
        $man = new JornadaElectoral_DAO();
        $vot = new voto_DAO();
        $listado = $man->ListarJornadasProceso();


        $tablaJornada = "<table id='mytable' class='table table-bordred table-striped'>\n"
                . " <thead>\n"
                . "            <tr>"
                . "                <th>Id Jornada</th>"
                . "                <th>Tipo Jornada</th>"
                . "                <th>Votar</th>"
                . "            </tr>\n"
                . "</thead>\n"
                . "<tbody>\n";


        if ($row = $man->getArray($listado)) {

            do {


                $tablaJornada .= "<tr>\n"
                        . "<td>" . $row['id'] . "</td>"
                        . "<td>" . $row['tipojornada'] . "</td>";
                $Jproceso = $row['id'];
                $num = $vot->Verificar($codigo, $Jproceso);
                if ($num > 0) {
                    $tablaJornada .= "<td></td>";
                } else {
                    //ced=" . $row['cedula'] . "&id=" . $row['idJornada'] .
                    $tablaJornada .= "<td><a class='btn btn-success' href='FormVotacion.php?id=" . $row['id'] . "&tipo=" . $row['tipojornada'] . "'role='button'><i class='fa fa-gavel'></i></a></td>";
                }
            } while ($row = $man->getArray($listado));
            $tablaJornada .= "</tbody>\n</table>\n";
            return $tablaJornada;
        } else {
            echo 'NO HAY JORNADAS ELECTORALES EN PROCESO';
        }
    }

    public function TablaJornadaE($codigo) {
        $man = new JornadaElectoral_DAO();
        $cdao = new candidato_DAO();
        $listado = $man->ListarJornadasE();

//j.id, j.fechainicio, j.fechafin, j.tipojornada 

        $tablaJornada = "<table id='mytable' class='table table-bordred table-striped'>\n"
                . " <thead>\n"
                . "            <tr>"
                . "                <th>Id Jornada</th>"
                . "                <th>Fecha Inicio</th>"
                . "                <th>Fecha Fin</th>"
                . "                <th>Tipo Jornada</th>"
                . "                <th>Estado</th>"
                . "                <th>Postularme</th>"
                . "                <th>Reporte</th>"
                . "            </tr>\n"
                . "</thead>\n"
                . "<tbody>\n";


        if ($row = $man->getArray($listado)) {

            do {


                $tablaJornada .= "<tr>\n"
                        . "<td>" . $row['id'] . "</td>"
                        . "<td>" . $row['fechainicio'] . "</td>\n"
                        . "<td>" . $row['fechafin'] . "</td>\n"
                        . "<td>" . $row['tipojornada'] . "</td>\n"
                        . "<td>" . $row['Estado'] . "</td>";

                if ($row['Estado'] == 'Activo' and $cdao->VerificarCandidatura($row['id'], $codigo) < 1) {
                    $tablaJornada .= "<td><a class='btn btn-primary' href='FormPostularCandidatura.php?variable=" . $row['id'] . "' role='button'><i class='fa fa-gavel'></i></a></td>"
                            . "<td></td>";
                } else {
                    if ($row['Estado'] == 'Culminado') {
                        $tablaJornada .= "<td></td><td><a class='btn btn-success' href='FormReporteE.php?variable=" . $row['id'] . "&tipo=" . $row['tipojornada'] . "'role='button'><i class='fa fa-book'></i></a></td>";
                    } else {
                        $tablaJornada .= "<td></td><td></td>";
                    }
                }
            } while ($row = $man->getArray($listado));
            $tablaJornada .= "</tbody>\n</table>\n";
            return $tablaJornada;
        } else {
            echo 'NO HAY JORNADAS ELECTORALES REGISTRADAS';
        }
    }

    public function TablaCandidaturas($codigo) {
        $man = new JornadaElectoral_DAO();
        $cdao = new candidato_DAO();
        $listado = $man->TablaCandidaturas($codigo);

//j.id ,j.fechainicio,j.fechafin,j.tipojornada ,j.estado ,c.estado, c.codigo 

        $tablaJornada = "<table id='mytable' class='table table-bordred table-striped'>\n"
                . " <thead>\n"
                . "            <tr>"
                . "                <th>Id</th>"
                . "                <th>Fecha Inicio</th>"
                . "                <th>Fecha Fin</th>"
                . "                <th>Jornada</th>"
                . "                <th>Estado Jornada</th>"
                . "                <th>Estado Candidatura</th>"
                . "                <th>Editar</th>"
                . "                <th>Cancelar</th>"
                . "                <th>Reporte</th>"
                . "            </tr>\n"
                . "</thead>\n"
                . "<tbody>\n";


        if ($row = $man->getArray($listado)) {

            do {


                $tablaJornada .= "<tr>\n"
                        . "<td>" . $row['id'] . "</td>"
                        . "<td>" . $row['fechainicio'] . "</td>\n"
                        . "<td>" . $row['fechafin'] . "</td>\n"
                        . "<td>" . $row['tipojornada'] . "</td>\n"
                        . "<td>" . $row['Estado'] . "</td>\n"
                        . "<td>" . $row['estado'] . "</td>";

                if ($row['Estado'] == 'Activo' and ( $row['estado'] == 'Sin Revisar' or $row['estado'] == 'Aprobado')) {
                    $tablaJornada .= "<td><a class='btn btn-primary' href='FormEditarCandidatura.php?variable=" . $row['id'] . "&cod=" . $codigo . "' role='button'><i class='fa fa-pencil'></i></a></td>"
                            . "<td><a class='btn btn-danger' href='CancelarCandidatura.php?variable=" . $row['id'] . "&cod=" . $codigo . "' role='button'><i class='fa fa-remove'></i></a></td>"
                            . "<td></td>";
                } else {
                    if ($row['Estado'] == 'Culminado') {
                        $tablaJornada .= "<td></td><td></td><td><a class='btn btn-success' href='FormReporteE.php?variable=" . $row['id'] . "&tipo=" . $row['tipojornada'] . "'role='button'><i class='fa fa-book'></i></a></td>";
                    } else {
                        $tablaJornada .= "<td></td><td></td><td></td>";
                    }
                }
            } while ($row = $man->getArray($listado));
            $tablaJornada .= "</tbody>\n</table>\n";
            return $tablaJornada;
        } else {
            echo 'NO HAY JORNADAS ELECTORALES REGISTRADAS';
        }
    }

    //FIN TABLA JORNADA
    //tabla candidato
    public function TablaPostulados() {
        $man = new candidato_DAO();
        $listado = $man->ListarCandidatos();

        $tablaJornada = "<table id='mytable' class='table table-bordred table-striped'>\n"
                . " <thead>\n"
                . "            <tr>"
                . "                <th>Id</th>"
                . "                <th>Cedula</th>"
                . "                <th>Nombre</th>"
                . "                <th>Carrera</th>"
                . "                <th>Jornada</th>"
                . "                <th>Estado</th>"
                . "                <th>Revisar</th>"
                . "            </tr>\n"
                . "</thead>\n"
                . "<tbody>\n";


        if ($row = $man->getArray($listado)) {

            do {


                $tablaJornada .= "<tr>\n"
                        . "<td>" . $row['idJornada'] . "</td>"
                        . "<td>" . $row['cedula'] . "</td>"
                        . "<td>" . $row['nombre'] . "</td>\n"
                        . "<td>" . $row['nombreCarrera'] . "</td>\n"
                        . "<td>" . $row['tipojornada'] . "</td>\n"
                        . "<td>" . $row['estado'] . "</td>";
                if ($row['estado'] == 'Sin Revisar') {
                    $tablaJornada .= "<td><a class='btn btn-primary' href='FormRevisarPostulado.php?ced=" . $row['cedula'] . "&id=" . $row['idJornada'] . "' role='button'><i class='fa fa-pencil'></i></a></td>";
                } else {
                    $tablaJornada .= "<td></td>";
                }
            } while ($row = $man->getArray($listado));
            $tablaJornada .= "</tbody>\n</table>\n";
            return $tablaJornada;
        } else {
            echo 'NO HAY JORNADAS ELECTORALES REGISTRADAS';
        }
    }

    public function AprobarCandidatura($cedula, $idJornada) {
        $man = new candidato_DAO();
        $listado = $man->AprobarCandidatura($cedula, $idJornada);
        $ruta = $man->CargarImagen($cedula, $idJornada);
        $rowt = $man->getArray($ruta);
        $row = $man->getArray($listado);
        //   <?php echo $val['descripcion']; 
        $cad = "<div class='span2'>
                <img src='" . $rowt['ruta'] . "' width='50%' height='50%' class='center-block'>" .
                "</div>
             <div class='form-group'>
             <label>Cedula</label>
            <input type='text' name='cedula' class='form-control' value='" . $row['cedula'] . "' readonly>
            </div> 
            <div class='form-group'>
             <label>Nombre</label>
            <input type='text' name='nombre' class='form-control' value='" . $row['nombre'] . "' readonly>
            </div>
            <div class='form-group'>
            <label>Carrera</label>
            <input type='text' name='carrera' class='form-control' value='" . $row['nombreCarrera'] . "' readonly>
            </div>
            <div class='form-group'>
             <label>Jornada</label>
            <input type='text' name='idJornada' class='form-control' value='" . $row['idJornada'] . "' readonly>
            </div> 
                                            <div class='form-group'>
                                                <label>Jornada</label>
                                               <input type='text' name='jornada' class='form-control' value='" . $row['tipojornada'] . "' readonly>
                                            </div>
                                              <div class='form-group'>
                                            <label for='comment'>Descripción</label>
                                            <textarea class='form-control' name='descripcion'  rows='5' readonly >" . $row['descripcion'] . "</textarea>
                                        </div>
                                            
                                            <div class='form-group'>
                                                <label>Estado</label>
                                                <select name='estado' class='form-control' required>
                                                    <option value='Sin Revisar'>Sin Revisar</option>
                                                    <option value='Aprobado'>Aprobado</option>
                                                    <option value='Rechazado'>Rechazado</option>
                                                   </select>
                                            </div>";
        return $cad;
    }

    public function AprobarPostulado($estado, $cedula, $idJornada) {
        $moddao = new candidato_DAO();
        $result = $moddao->AprobarPostulado($estado, $cedula, $idJornada);
        return $result;
    }

    public function RegistrarImagen($cedula, $idJornada, $file) {
        $moddao = new candidato_DAO();
        $result = $moddao->RegistrarImagen($cedula, $idJornada, $file);
        return $result;
    }

    public function RegistrarCandidatura($idJornada, $cedula, $descripcion) {
        $moddao = new candidato_DAO();
        $result = $moddao->RegistrarCandidatura($idJornada, $cedula, $descripcion);
        return $result;
    }

    public function EditarImagen($codigo, $idJornada, $file) {
        $mod = new fotocandidato_DTO();
        $mod->setCodigo($codigo);
        $mod->setIdJornada($idJornada);
        $mod->setRuta($file);
        $moddao = new fotocandidato_DAO();
        $result = $moddao->EditarJornada($mod);
        return $result;
    }

    public function EditarCandidatura($idJornada, $codigo, $descripcion) {
        $mod = new candidato_DTO();
        $mod->setJornadaElectoral($idJornada);
        $mod->setCodigo($codigo);
        $mod->setDescripcion($descripcion);
        $mod->setEstado('Sin Revisar');
        $moddao = new candidato_DAO();
        $result = $moddao->EditarCandidatura($mod);
        return $result;
    }

// fin tabla candidato
//RESULTADOS
    public function Resultados($idJornada) {
        $man = new voto_DAO;
        $listado = $man->Resultados($idJornada);
        $VBlanco = $man->ResultadosB($idJornada);
        $votos = $man->TotalVotos($idJornada);


        $tablaJornada = "<table id='mytable' class='table table-bordred table-striped'>\n"
                . " <thead>\n"
                . "            <tr>"
                . "                <th>Codigo</th>"
                . "                <th>Nombre</th>"
                . "                <th>Carrera</th>"
                . "                <th>Votos</th>"
                . "            </tr>\n"
                . "</thead>\n"
                . "<tbody>\n";


        if ($row = $man->getArray($listado)) {

            do {


                $tablaJornada .= "<tr>\n"
                        . "<td>" . $row['idCandidato'] . "</td>"
                        . "<td>" . $row['nombre'] . "</td>"
                        . "<td>" . $row['nombreCarrera'] . "</td>"
                        . "<td>" . $row['VOTOS'] . "</td>";
            } while ($row = $man->getArray($listado));
        if($row = $man->getArray($VBlanco)) {
             $tablaJornada .= "<tr>\n"
                        . "<td>0000</td>"
                        . "<td>VOTO EN BLANCO</td>"
                        . "<td></td>"
                        . "<td>" . $row['VOTOS'] . "</td>";
        }
        if($row = $man->getArray($votos)) {
             $tablaJornada .= "<tr>\n"
                        . "<td></td>"
                        . "<td></td>"
                        . "<td>TOTAL VOTOS</td>"
                        . "<td>" . $row['VOTOS'] . "</td>";
        }
            $tablaJornada .= "</tbody>\n</table>\n";
            return $tablaJornada;
        } else {
            echo 'LOS CANDIDATOS NO PRESENTAN VOTOS';
        }
    }
  
    
//FIN RESULTADOS    
}
