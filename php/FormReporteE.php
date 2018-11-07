<?php
session_start();
if (($_SESSION['codigo']) != '') {
    $idJornadaCulminada = $_GET['variable'];
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
                                Resultado Jornada Electoral<br>
                                <small><?php echo $_GET['tipo']?></small>
                            </center>
                        </h1>
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
                                    <form role="form" method="POST">

                                        <div class="table-responsive" id="ResultadosJornada">
                                            <?php include_once 'ResultadosJornada.php'; ?>
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
