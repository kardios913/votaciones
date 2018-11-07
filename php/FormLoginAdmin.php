<?php
include_once '../Facade/facVotacion.php';
$facade = facVotacion::getInstance();
session_start();
if (empty($_SESSION['mail'])) {
    ?>

    <!DOCTYPE html>
    <html>
        <head>



            <meta charset="UTF-8"> <!-- meta para que acepte todos los caracteres especiales-->
            <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!--etiqueta para internet explored-->
            <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- que la web se adapte al ancho ,
                                                                                     que no tenga zoon iinicial-->
            <title>Votaciones-UFPS</title>
            <link href="../css/bootstrap.min.css" rel="stylesheet">

            <link href="../css/Style.css" rel="stylesheet">
        </head>
        <body>

            <div class="login">
                <div class="wrap">

                    <!-- SLIDER -->
                    <div class="content">
                        <!-- LOGO -->
                        <div class="logo">
                            <img src="../imagen/logo_ufps.png" >
                        </div>
                        <!-- SLIDESHOW -->
                        <div id="slideshow">
                            <?php include_once 'comunicado.php'; ?>
                        </div>
                    </div>
                    <!-- LOGIN FORM -->
                    <div class="user">

                        <div class="form-wrap">
                            <!-- TABS -->
                            <div class="tabs">
                                <h2 class="login-tab" style="color:#fff"> <span>Administrador<span></h2>
                                            </div>
                                            <!-- TABS CONTENT -->
                                            <div class="tabs-content">
                                                <!-- TABS CONTENT LOGIN -->
                                                <div id="login-tab-content" class="active">
                                                    <form class="login-form" action="" method="post" id="validarAdmin">
                                                        <input type="Email" class="input" name="mail" id="user_login"  placeholder="Email or Username" required autofocus>
                                                        <input type="password" class="input" name="contra" id="user_pass" autocomplete="off" placeholder="Password"required >
                                                        <button type="submit" class="button">Login</button>
                                                    </form>
                                                    <div class="row">
                                                        <div class="col-sm-3">                
                                                        </div>
                                                        <div class="col-sm-6">

                                                            <div class="form-group">
                                                                <div class="fg-line" id="resultvalidaradmin">

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-3">                
                                                        </div>
                                                    </div> 
                                                    <div class="help-action">
                                                        <p><i class="fa fa-arrow-left" aria-hidden="true"></i><a href="FormValidarCorreo.php" class="open">¿olvidaste tu contraseña?</a></p>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                            </div>
                                            </div>
                                            </div>
                                            <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
                                            <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
                                            <script src='//production-assets.codepen.io/assets/common/stopExecutionOnTimeout-b2a7b3fe212eaa732349046d8416e00a9dec26eb7fd347590fbced3ab38af52e.js'></script>
                                            <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
                                            <script >

                                                // SLIDESHOW
                                                $(function () {
                                                    $('#slideshow > div:gt(0)').hide();
                                                    setInterval(function () {
                                                        $('#slideshow > div:first')
                                                                .fadeOut(1000)
                                                                .next()
                                                                .fadeIn(1000)
                                                                .end()
                                                                .appendTo('#slideshow');
                                                    }, 3850);
                                                });
                                            </script>
                                            <script>
                                                // VALIDANDO DATOS
                                                $('#validarAdmin').submit(function (e) {
                                                    var data = new FormData(this); //Creamos los datos a enviar con el formulario
                                                    $.ajax({
                                                        url: 'validarAdmin.php', //URL destino
                                                        data: data,
                                                        processData: false, //Evitamos que JQuery procese los datos, daría error
                                                        contentType: false, //No especificamos ningún tipo de dato
                                                        type: 'POST',
                                                        success: function (data) {
                                                            $('#resultvalidaradmin').html(data);
                                                        }
                                                    });

                                                    e.preventDefault(); //Evitamos que se mande del formulario de forma convencional
                                                });
                                            </script>
                                            </body>
                                            </html>


                                            <?php
                                        } else {
                                            header("location:FormAdmin.php");
                                        }
                                        ?>

