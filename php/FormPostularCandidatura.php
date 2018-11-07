<?php
session_start();
if (($_SESSION['codigo']) != '') {
    ?>
    <!DOCTYPE html>
    <html>
        <!DOCTYPE html>
        <html lang="es">
            <?php include '../util/heap.php'; ?>

            <body class="hold-transition skin-red sidebar-mini">
                <div class="wrapper">
                    <?php include "../util/headerE.php"; ?>            <!-- Content Wrapper. Contains page content -->
                    <div class="content-wrapper">

                        <!-- Content Header (Page header) -->
                        <section class="content-header">
                            <h1>
                                <center>
                                    Inscripción Candidatura
                                    <small>Formulario Inicial</small>
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
                        <section class="content">
                            <div class="row">
                                <!-- left column -->
                                <div class="col-md-8 col-md-offset-2">
                                    <!-- general form elements -->
                                    <div class="box box-danger">

                                        <!-- /.box-header -->
                                        <!-- form start -->
                                        <form role="form" method="POST" action="PostularCandidatura.php" id="PostularCandidatura" enctype="multipart/form-data">
                                            <div class="box-body">
                                                <div class='form-group'>
                                                    <label>Codigo</label>
                                                    <input type='text' name='codigo' class='form-control' value='<?php echo $_SESSION['codigo'] ?>' readonly>
                                                </div> 
                                                <div class='form-group'>
                                                    <label>Jornada</label>
                                                    <input type='text' name='idJornada' class='form-control' value='<?php echo $_GET['variable'] ?>' readonly>
                                                </div> 
                                                <div class='form-group'>
                                                    <label>Cargue su Fotografia </label>
                                                    <input name="foto" type="file" id="foto" class="form-control" accept="image/jpeg,image/png">
                                                </div> 
                                                <div class="form-group">
                                                    <label>Descripción</label>
                                                    <textarea class="form-control" title="Use este Campo para escribir sus propuestas y el porque quiere ser electo" name="descripcion" required>

                                                    </textarea>
                                                </div>
                                            </div>
                                            <!-- /.box-body -->

                                            <div class="box-footer">
                                                <button type="submit" class="btn btn-primary">Postular</button>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- /.box -->
                                </div>
                                <!--/.col (left) -->

                            </div>
                        </section>
                        <!-- /.content -->

                    </div>
                </div>
                <!-- /.content-wrapper -->
                <footer>
                    <?php include "../util/footer.php"; ?>
                </footer>
                <script>



                    $('#PostularCandidatura').submit(function (e) {
                        var data = new FormData(this); //Creamos los datos a enviar con el formulario
                        $.ajax({
                            url: '../php/PostularCandidatura.php', //URL destino
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
                <script src="../js/app.min.js"></script>

            </body>
        </html>
        <?php
    } else {
        header("location:FormLoginEstudiante.php");
    }
    ?>
