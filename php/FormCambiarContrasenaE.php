<?php
include_once '../Facade/facVotacion.php';
$facade = facVotacion::getInstance();
session_start();
if(($_SESSION['codigo'])!='') {
    ?>
    <!DOCTYPE html>
    <html lang="es">
        <?php include '../util/heap.php'; ?>

        <body class="hold-transition skin-red sidebar-mini">
            <div class="wrapper">
                <?php include "../util/headerE.php"; ?>
                <!-- Content Wrapper. Contains page content -->
                <div class="content-wrapper">

                    <!-- Content Header (Page header) -->
                    <section class="content-header">
                        <h1>
                            <center>
                                Cambio de Contraseña <br>
                                <small>Estudiante</small>
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
                                    <form role="form" method="POST" action="CambiarContrasenaE.php" id="CambiarContrasenaE">
                                        <div class="box-body">
                                            <div class="form-group">
                                                <label>Usurio</label>
                                                <input type="text" name="usuario" class="form-control" value=" <?php echo $_SESSION['codigo'] ?>" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label>Documento</label>
                                                <input type="password" name="documento" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Contraseña Actual</label>
                                                <input type="password" name="contrasena" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Nueva Contraseña</label>
                                                <input type="password" name="Nuevacontrasena" class="form-control">
                                            </div>
                                        </div>
                                        <!-- /.box-body -->

                                        <div class="box-footer">
                                            <button type="submit" class="btn btn-primary">Guardar</button>
                                        </div>
                                    </form>
                                </div>
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



        $('#CambiarContrasenaE').submit(function (e) {
            var data = new FormData(this); //Creamos los datos a enviar con el formulario
            $.ajax({
                url: '../php/CambiarContrasenaE.php', //URL destino
                data: data,
                processData: false, //Evitamos que JQuery procese los datos, daría error
                contentType: false, //No especificamos ningún tipo de dato
                type: 'POST',
                success: function (data) {
                    $('#resultregistrar').html(data);
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
    header("location:FormLoginEstudiante.php");
}
?>