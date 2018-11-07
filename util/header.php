
<!DOCTYPE html>
<header class="main-header">

   <a href="../php/FormAdmin.php" class="logo">
      <!-- logo for regular state and mobile devices -->
     <span class="logo-mini"> <img src="../imagen/logo_ufps.png"/></span>
      <span  class="logo-lg" ><b>UFPS</b> votaciones</span>
<!--     
      <img  class="logo-lg img-responsive " src="../imagen/logo_votaciones2.png"/>-->

   </a>


    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

<?php include 'CargarDatosS.php';?>
            </ul>
        </div>
    </nav>
</header>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header"><center>Menu del Sistema</center></li>
            <!-- Optionally, you can add icons to the links 
             <li><a href="#" onclick="FromRegistroModulo();">Registro Materias</a></li>-->
            <li><a href="../php/FormAdmin.php"><i class="fa fa-home"></i> <span>Inicio</span></a></li>
            <li><a href="../php/FormRegistrarJornada.php" ><i class="fa fa-edit"></i> <span>Registrar Jornada</span></a></li>
            <li><a href="../php/FormListarJornada.php"><i class="fa fa-book"></i> <span>Listado Jornadas </span></a></li>
            <li><a href="../php/FormListarPostulados.php"><i class="fa fa-book"></i> <span>Listado de Postulados</span></a></li>
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
