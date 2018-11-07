<?php
session_start();
include_once '../Facade/facVotacion.php';
$facade = facVotacion::getInstance();
$num=$facade->ValidarVoto($_SESSION['codigo'],$_GET['id']);
if (($_SESSION['codigo']) != '' and $num<1 ) {
    $codigoSesion=$_SESSION['codigo'];
   $idJornadaVotacion= $_GET['id'];
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
                                Eleccion <?php echo " ".$_GET['tipo'] ?><br>
                                 

                            </center>
                        </h1>
                    </section>
                   
                    <?php 
                        include 'Votacion.php';?>

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
