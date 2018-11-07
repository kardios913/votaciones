<?php
session_start();
if(($_SESSION['codigo'])!=''){
  ?>
<!DOCTYPE html>
<html lang="es">
  <?php include '../util/heap.php';?>

    <body class="hold-transition skin-red sidebar-mini">
        <div class="wrapper">
            <?php include "../util/headerE.php"; ?>
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">

                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        <center>
                            Pagina Principal<br>
                            <small>Seleccion una Opción</small>
                        </center>
                    </h1>
                </section>
                <!-- Main content -->
                <section class="content">
                    <div class="row">

                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-red">
                                <div class="inner">

                                    <p>Listar Jornadas Electorales </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-pie-graph"></i>
                                </div>
                                <a href="FormListarJornadaE.php"  class="small-box-footer">Acceder <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-3 col-xs-6">

                            <!-- small box -->
                            <div class="small-box bg-red">
                                <div class="inner">

                                    <p>Listar Candidatura </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-pie-graph"></i>
                                </div>
                                <a href="FormListarCandidaturas.php" class="small-box-footer">Acceder <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                         <div class="col-lg-3 col-xs-6">

                            <!-- small box -->
                            <div class="small-box bg-red">
                                <div class="inner">

                                    <p>Jornadas en Proceso </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-pie-graph"></i>
                                </div>
                                <a href="FormJornadasProceso.php" class="small-box-footer">Acceder <i class="fa fa-arrow-circle-right"></i></a>
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
}else{
header("location:FormLoginEstudiante.php");
}
?>


