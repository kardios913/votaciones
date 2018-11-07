<?php
session_start();
include_once '../Facade/facVotacion.php';
$facade = facVotacion::getInstance();
$num = $facade->ValidarVoto($_SESSION['codigo'], $_GET['id']);
if (($_SESSION['codigo']) != '' and $num < 1) {
    $idJornada=$_GET['id'];
    $mail= $_GET['co'];
   $hash=$facade->enviarHash($mail);
    include("sendemail.php");
    
   sendemail($mail, $hash);
    ?>
    <!DOCTYPE html>
    <html lang="es">
        <?php include '../util/heap.php'; ?>

        <body class="hold-transition skin-red sidebar-mini">
            <div class="wrapper">
                <?php include "../util/headerE.php"; ?>
                <div class="content-wrapper">

                    <!-- Content Header (Page header) -->
                    <section class="content-header">
                        <h1>
                            <center>
                                Validar Voto
                            </center>
                        </h1>
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
                                    <form role="form" method="POST" action="VotarB.php" id="ValidarVoto">
                                        <div class="box-body">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="mail" name="mail" class="form-control" value=" <?php echo $mail?>" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label>Jornada</label>
                                                <input type="text" name="idJornada" class="form-control" value=" <?php echo $idJornada?>" readonly>
                                            </div>
                                            <div class="form-group">
                                                <input type="password" name="HashEnviado" class="form-control" value=" <?php echo $hash ?>" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label>Clave de Confirmacion</label>
                                                <input type="password" name="Hash" class="form-control">
                                            </div>
                                        </div>
                                        <!-- /.box-body -->

                                        <div class="box-footer">
                                            <button type="submit" class="btn btn-primary">Validar</button>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.box -->
                            </div>
                            <!--/.col (left) -->

                        </div>
                
            </section>

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
