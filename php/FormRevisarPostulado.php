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
                                Revisar Candidatura<br>
                                <small>Jornadas Electorales</small>
                            </center>
                        </h1>
                        <br>

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
                                    <?php 
                                    $idJornada = $_GET['id'];
                                    $cedula = $_GET['ced'];
                                    ?>

                                    <form role="form" method="POST" action="AprobarPostulado.php" id="AprobarPostulado">
                                        <div class="box-body">
                                            <?php
                                            include_once '../Facade/facVotacion.php';
                                            $facade = facVotacion::getInstance();
                                            

                                            echo $result = $facade->AprobarCandidatura($cedula, $idJornada);
                                            ?>

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
                        <!-- /.content -->
                    </section>
                </div>
            </div>

            <!-- /.content-wrapper -->
            <?php include "../util/footer.php"; ?>
            <script>



                $('#AprobarPostulado').submit(function (e) {
                    var data = new FormData(this); //Creamos los datos a enviar con el formulario
                    $.ajax({
                        url: '../php/AprobarPostulado.php', //URL destino
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




            </script>

            <!-- REQUIRED JS SCRIPTS -->
            <!-- jQuery 2.2.3 -->
            <script src="../js/jquery-2.2.3.min.js"></script>
            <!-- Bootstrap 3.3.6 -->
            <script src="../js/bootstrap.min.js"></script>
            <!-- AdminLTE App -->
            <script src="../js/app.js"></script>
        </body>
    </html>
    <?php
} else {
    header("location:FormLoginAdmin.php");
}
?>