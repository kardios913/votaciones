<?php
include_once '../Facade/facVotacion.php';
$facade = facVotacion::getInstance();
session_start();
if (($_SESSION['mail']) != '') {
    ?>
    <!DOCTYPE html>
    <html lang="es">
        <?php include '../util/heap.php'; ?>

        <body class="hold-transition skin-red sidebar-mini">
            <div class="wrapper">
                <?php include "../util/header.php"; ?>
                <!-- Content Wrapper. Contains page content -->
                <div class="content-wrapper">

                    <!-- Content Header (Page header) -->
                    <section class="content-header">
                        <h1>
                            <center>
                                Formulario de actualizacion <br>
                                <small>Jornadas Electorales</small>
                            </center>
                        </h1>
                        <br>
                        <?php if (isset($msg)) { ?>
                            <div class="col-md-12">
                                <div class="alert alert-info alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <strong></strong> <?php echo $msg; ?>
                                </div>
                            </div>
                            <?php
                        }
                        unset($msg);
                        ?>
                    </section>

                    <!-- Main content -->
                    </section>
                    <!-- Main content -->
                    <section class="content">
                        <div class="row">
                            <!-- left column -->
                            <div class="col-md-8 col-md-offset-2">
                                <!-- general form elements -->
                                <div class="box box-danger">

                                    <!-- /.box-header -->
                                    <!-- form start -->
                                    <form role="form" method="POST" action="EditarJornada.php" id="EditarJornada">
                                        <div class="box-body">
                                            <div class="form-group">
                                                <label>Usurio</label>
                                                <input type="text" name="usuario" class="form-control" value=" <?php echo $_SESSION['mail'] ?>" readonly>
                                            </div>

                                            <div class="form-group">
                                                <label>Codigo de Jornada</label>
                                                <input type="text" name="id" class="form-control" value=" <?php echo $_GET['variable'] ?>" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label>Fecha de Inicio de La Jornada Electoral</label>
                                                <input type="date" class="form-control" name="inicio"  required>
                                            </div>
                                            <div class="form-group">
                                                <label>Fecha Fin de La Jornada Electoral</label>
                                                <input type="date" class="form-control" name="fin"  required>
                                            </div>
                                            <div class="form-group">
                                                <label>Fecha de Inicio de Registro de Candidaturas</label>
                                                <input type="date" class="form-control" name="inicioCa"  required>
                                            </div>
                                            <div class="form-group">
                                                <label>Fecha Fin de Registro de Candidaturas</label>
                                                <input type="date" class="form-control" name="finCa"  required>
                                            </div>

                                            <div class="form-group">
                                                <label>Tipo de La Jornada Electoral</label>
                                                <select name="tipo" class="form-control" required>
                                                    <option value="Comite de admisiones">Comite de admisiones</option>
                                                    <option value="Comite administrativo">Comite administrativo</option>
                                                    <option value="Comite curricular">Comite curricular</option>
                                                    <option value="Representante de consejo de Facultad">Representante de consejo de Facultad</option>
                                                    <option value="Representante de Bienestar Universitario">Representante de Bienestar Universitario</option>
                                                </select>
                                            </div>

                                        </div>
                                        <!-- /.box-body -->

                                        <div class="box-footer">
                                            <button type="submit" class="btn btn-primary">Guardar</button>
                                        </div>
                                    </form>

                                    <!-- /.box -->
                                </div>
                                <!--/.col (left) -->

                            </div>
                        </div>
                    </section>
                    <!-- /.content -->
                </div>
            </div>
            <!-- /.content-wrapper -->
            <?php include "../util/footer.php"; ?>
            <script>



                $('#EditarJornada').submit(function (e) {
                    var data = new FormData(this); //Creamos los datos a enviar con el formulario
                    $.ajax({
                        url: '../php/EditarJornda.php', //URL destino
                        data: data,
                        processData: false, //Evitamos que JQuery procese los datos, daría error
                        contentType: false, //No especificamos ningún tipo de dato
                        type: 'POST',
                        success: function (data) {
                            $('#resulteditar').html(data);
                        }
                    });

                    e.preventDefault(); //Evitamos que se mande del formulario de forma convencional
                });


                $('#data_1 .form-group.date').datepicker({
                    format: "yyyy-mm-dd",
                    todayBtn: "linked",
                    keyboardNavigation: false,
                    forceParse: false,
                    calendarWeeks: true,
                    autoclose: true
                });



            </script>
            <!-- REQUIRED JS SCRIPTS -->
            <!-- jQuery 2.2.3 -->
            <script src="../js/jquery-2.2.3.min.js"></script>
            <!-- Bootstrap 3.3.6 -->
            <script src="../js/bootstrap.min.js"></script>
            <!-- AdminLTE App -->
            <script src="../js/app.js"></script>
        </div>
    </body>
    </html>
    <?php
} else {
    header("location:FormLoginAdmin.php");
}
?>